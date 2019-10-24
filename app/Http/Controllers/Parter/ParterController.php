<?php

namespace App\Http\Controllers\Parter;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;
use App\Models\BaseModel;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use App\Models\Constant;
use App\Models\Utils\Tool;
use DB;
use Storage;
use Illuminate\Support\Facades\Validator;

class ParterController extends BaseController
{
	public function goods()
    {
        $where = [['channel',User::getUsername()], ['is_delete', 0]];
        $products = DB::table('zm_product')->where($where)->select('id','name','price','thumbnail')->get();
		return view("parter.goods", ['result'=>$products]);
    }

    public function manual()
    {
		return view("parter.manual");
    }
    
	public function order()
    {
        $result = DB::table('zm_order')->join('zm_product', 'zm_order.goods_id', '=', 'zm_product.id')
            ->select('zm_product.name','zm_product.thumbnail','zm_product.price', 'zm_order.*')
            ->where([['zm_product.channel', User::getUsername()], ['zm_order.discard', 0]])
            ->get();
		return view("parter.order", ['result'=>$result]);
    }

	public function orderDetail(Request $request)
    {
        $validator = Validator::make($request->all(), ['id'  => 'required|numeric']);
        if ($validator->fails()) {
            $params = $this->packJson(url('parter/index'), 500, Constant::$zhInvalidParam);
	        return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
        } 
        $result = DB::table('zm_order')->join('zm_product', 'zm_order.goods_id', '=', 'zm_product.id')
            ->select('zm_product.name','zm_product.thumbnail','zm_product.price', 'zm_order.*')
            ->where([['zm_product.channel', User::getUsername()], ['zm_order.id', $request->input('id')]])
            ->first();
		return view("parter.detail", ['result'=>$result]);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id','');
        $one = DB::table('zm_product')
            ->where([['id',$id], ['channel', User::getUsername()]])
            ->select('id','name','attrs','price','thumbnail','slideimgs','book_max','is_onsale','contact','category_id','detail_uri','video_uri')->first();
        if (!$one) return '404 Not Found';
        return view("parter.edit", ['one'=>$one]);
    }

    public function delete(Request $request) {
        $id = $request->input('id',0);
        $result = DB::table('zm_product')->where([['channel',User::getUsername()],['id', $id]])->select('thumbnail','slideimgs')->first();
        if (!$result) return redirect()->action('Parter\ParterController@goods');

        // product has orders not real delete
        $order = DB::table('zm_order')->where([['goods_id', $id]])->first();
        if ($order) {
            DB::table('zm_product')->where([['channel',User::getUsername()],['id', $id]])->update(['is_delete'=>1, 'is_onsale'=>0]);
            return redirect()->action('Parter\ParterController@goods');
        }

        // clean product data before delete
        $result->slideimgs = base64_decode($result->slideimgs);
        $log = [$result->thumbnail, $result->slideimgs];
        Storage::disk('public')->makeDirectory('trash');
        $path = storage_path('app/public/trash');
        file_put_contents("$path/record.txt", implode(',',$log).PHP_EOL, FILE_APPEND);
        DB::table('zm_product')->where([['channel',User::getUsername()],['id', $id]])->delete();
        return redirect()->action('Parter\ParterController@goods');
    }

    private function images($images, $host='http://r.seeyou.biz')
    {
        if (is_string($images)) return "$host/$images"; 
        else if (is_array($images)) {
            array_walk($images, function(&$item, $key) use ($host) {$item = "$host/$item";});
            return implode(',', $images);
        }
        else return '';
    }

    public function add()
    {
		return view("parter.add");
    }
    
    public function doAdd(Request $request)
    {
        $add = [];
        $add['channel'] = User::getUsername();
        $add['name'] = $request->input('name') ?? '';
        $add['contact'] = $request->input('contact') ?? '';
        $add['attrs'] = $request->input('attrs') ?? '';
        $add['detail_uri'] = $request->input('detail_uri') ?? '';
        $add['video_uri'] = $request->input('video_uri') ?? '';
        if (is_numeric($request->input('book_max'))) $add['book_max'] = $request->input('book_max');
        if (is_numeric($request->input('price'))) $add['price'] = $request->input('price');
        if (is_numeric($request->input('is_onsale'))) $add['is_onsale'] = $request->input('is_onsale');
        if (is_numeric($request->input('category_id'))) $add['category_id'] = $request->input('category_id');

        $i = 1;
        $maxFiles = 16;
        $slide = [];
        $path = storage_path('app/public/images');
        if ($request->hasFile('slideimgs')) {
            $slideimgs = $request->file('slideimgs');
            foreach ($slideimgs as $one) {
                if ($i > $maxFiles) {continue;}
                $new = Tool::uniqidReal();
                $ext = $one->extension();
                $file = "$new.$ext";
                $ret = $one->move($path, $file);
                if (Tool::put("$path/$file", $file)) {
                    $slide[] = $file;
                    unlink("$path/$file");
                }
                $i++;
            }
        }

        if ($slide) {
            $add['slideimgs'] = base64_encode($this->images($slide));
        }
        
        $thumb = '';
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $new = Tool::uniqidReal();
            $ext = $thumbnail->extension();
            $file = "$new.$ext";
            $ret = $thumbnail->move($path, $file);
            if (Tool::put("$path/$file", $file)) {
                $thumb = $file;
                unlink("$path/$file");
            }
        }

        if ($thumb) {
            $add['thumbnail'] = $this->images($thumb);
        }

        $add['create_time'] = date("Y-m-d H:i:s");
        $add['storages'] = 1;       
        DB::table('zm_product')->insert($add);
        return redirect()->action('Parter\ParterController@goods');

    }


    public function doEdit(Request $request)
    {
        $update = [];
        $update['name']  = $request->input('name') ?? '';
        $update['attrs'] = $request->input('attrs') ?? '';
        $update['detail_uri'] = $request->input('detail_uri') ?? '';
        $update['video_uri'] = $request->input('video_uri') ?? '';
        if (is_numeric($request->input('book_max'))) $update['book_max'] = $request->input('book_max');
        if (is_numeric($request->input('price'))) $update['price'] = $request->input('price');
        if (is_numeric($request->input('contact'))) $update['contact'] = $request->input('contact');
        if (is_numeric($request->input('is_onsale'))) $update['is_onsale'] = $request->input('is_onsale');
        if (is_numeric($request->input('category_id'))) $update['category_id'] = $request->input('category_id');
        
        $log = [];
        $row = DB::table('zm_product')->where([['channel',User::getUsername()],['id',$request->id]])->select('slideimgs','thumbnail')->first();
        
        $slide = [];
        $path = storage_path('app/public/images');
        if ($request->hasFile('slideimgs')) {
            $slideimgs = $request->file('slideimgs');
            foreach ($slideimgs as $one) {
                $new = Tool::uniqidReal();
                $ext = $one->extension();
                $file = "$new.$ext";
                $ret = $one->move($path, $file);
                if (Tool::put("$path/$file", $file)) {
                    $slide[] = $file;
                    unlink("$path/$file");
                }
            }
        }

        if ($slide) {
            $log[] = base64_decode($row->slideimgs);
            $update['slideimgs'] = base64_encode($this->images($slide));
        }
        
        $thumb = '';
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $new = Tool::uniqidReal();
            $ext = $thumbnail->extension();
            $file = "$new.$ext";
            $ret = $thumbnail->move($path, $file);
            if (Tool::put("$path/$file", $file)) {
                $thumb = $file;
                unlink("$path/$file");
            }
        }

        if ($thumb) {
            $log[] = $row->thumbnail;
            $update['thumbnail'] = $this->images($thumb);
        }

        if ($log) {
            Storage::disk('public')->makeDirectory('trash');
            $path = storage_path('app/public/trash');
            file_put_contents("$path/record.txt", implode(',',$log).PHP_EOL, FILE_APPEND);
        }
        
        DB::table('zm_product')->where([['id',$request->id], ['channel',User::getUsername()]])->update($update);
        return redirect()->action('Parter\ParterController@edit', ['id' => $request->id]);

    }

	public function doLogin()
	{
	    $inputParams = $this->getInputParams("username,password", true);
        if (empty($inputParams['username'])) {
            $params = $this->packJson(url('parter/login'), 500, Constant::$zhLoginUsernameEmpty);
	        return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
        }
        if (empty($inputParams['password'])) {
            $params = $this->packJson(url('parter/login'), 500, Constant::$zhLoginPwdEmpty);
	        return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
        }
	    BaseModel::Factory()->md5('password', $inputParams);
	    $params = $this->packJson(url('parter/index'), 200, Constant::$zhLoginSuc);
	    if (!User::login($inputParams)) $params = $this->packJson(url('parter/login'), 500, Constant::$zhLoginFai);
	    return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
	}
    
    public function doRegister()
	{
        $inputParams = $this->getInputParams("username,password,password2", true);
        if (!$inputParams['username']) {
	        $params = $this->packJson(url('parter/register'), 500, Constant::$zhRegisterUnEmpty);
	        return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
        }
        if (!$inputParams['password']) {
	        $params = $this->packJson(url('parter/register'), 500, Constant::$zhRegisterPwdEmpty);
	        return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
        }
        if (!$inputParams['password2']) {
	        $params = $this->packJson(url('parter/register'), 500, Constant::$zhRegisterPwdEmpty);
	        return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
        }
        if ($inputParams['password'] != $inputParams['password2']) {
	        $params = $this->packJson(url('parter/register'), 500, Constant::$zhRegisterPwdsNotEqual);
	        return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
        }
        if (User::hasOne($inputParams['username'])) {
	        $params = $this->packJson(url('parter/register'), 500, Constant::$zhRegisterExists);
	        return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
        }
        unset($inputParams['password2']);
	    BaseModel::Factory()->md5('password', $inputParams);
	    if (!User::register($inputParams)) $params = $this->packJson(url('parter/register'), 500, Constant::$zhRegisterFail);
        if (!User::login($inputParams)) $params = $this->packJson(url('parter/login'), 200, Constant::$zhRegisterSuc);
        else $params = $this->packJson(url('parter/index'), 200, Constant::$zhRegisterSuc);
	    return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
	}


    public function resetPwd()
	{
        $inputParams = $this->getInputParams("password,password1,password2", true);
        $inputParams['username'] = User::getUsername();
        $params = $this->packJson(url('parter/index'), 200, Constant::$zhResetPwdSuc);
        if (!$inputParams['password']) {
	        $params = $this->packJson(url('parter/pwd'), 500, Constant::$zhOriPwdEmpty);
	        return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
        }
        if (!$inputParams['password1']) {
	        $params = $this->packJson(url('parter/pwd'), 500, Constant::$zhPwd1Empty);
	        return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
        }
        if (!$inputParams['password2']) {
	        $params = $this->packJson(url('parter/pwd'), 500, Constant::$zhPwd2Empty);
	        return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
        }
        if ($inputParams['password1'] != $inputParams['password2']) {
	        $params = $this->packJson(url('parter/pwd'), 500, Constant::$zhResetPwdsNotEqual);
	        return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
        }
        if (!User::hasOne($inputParams['username'])) {
	        $params = $this->packJson(url('parter/pwd'), 500, Constant::$zhUserNotFound);
	        return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
        }
        BaseModel::Factory()->md5('password', $inputParams);
        BaseModel::Factory()->md5('password1',$inputParams);
        $ret = DB::table('zm_admin_user')
            ->where([['username',$inputParams['username']], ['password', $inputParams['password']]])
            ->update(['password' => $inputParams['password1']]);
	    if (!$ret) $params = $this->packJson(url('parter/pwd'), 500, Constant::$zhResetPwdFail);
	    return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
    }

    public function orderDeny(Request $request)
    {
        $validator = Validator::make($request->all(), ['id'=>'required|numeric', 'type'=>'required|string']);
        if ($validator->fails()) {
            $params = $this->packJson(url('parter/index'), 500, Constant::$zhInvalidParam);
	        return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
        }
        $ret = DB::table('zm_order')->where([['id', $request->input('id')], ['code',0]])->update(["code"=>2,"operator"=>'sys']);
        if ($request->input('type') == 'ajax') return $ret;
        return redirect()->action('Parter\ParterController@orderDetail', ['id' => $request->input('id')]);
    }
    
    public function orderDiscard(Request $request)
    {
        $validator = Validator::make($request->all(), ['id'=>'required|numeric', 'type'=>'required|string']);
        if ($validator->fails()) {
            $params = $this->packJson(url('parter/index'), 500, Constant::$zhInvalidParam);
	        return \Redirect::route('parter/info', array('msg'=>base64_encode($params)));
        }
        $ret = DB::table('zm_order')->where([['id', $request->input('id')], ['code',2]])->update(["discard"=>1]);
        if ($request->input('type') == 'ajax') return $ret;
        return redirect()->action('Parter\ParterController@orderDetail', ['id' => $request->input('id')]);
    }

	public function doLogout()
	{
        User::logout();
        return \View::make('parter/login');
	}
	
}
