<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\BaseController;
use App\Models\Product\Goods;
use Illuminate\Support\Facades\Input;
use App\Models\Admin\User;
use App\Models\Product\Category;
use App\Models\Product\Banner;
use App\Models\BaseModel;
use App\Models\Product\Topic;
use App\Models\Product\Tabloid;
use App\Models\Constant;
use App\Models\Product\Strategy;

class ApiController extends BaseController
{
    public $defaultPage = 1;
    public $defaultColumn = 2;
    public $defaultPageSize = 30;
    
    public function test() {
        $params['username'] = 'zhuwanxiong-xy';
        $params['name'] = '超级管理员';
        list($where, $bind) = BaseModel::Factory()->getConditions($params);
        $query = "select a.username,b.* from zm_user_role a join zm_role b on a.role_id=b.id where $where";
        $result = \DB::reconnect()->select($query, $bind);
        echo "$query\n";
        print_r($result);
    }

    public function getList()
    {
        $page = Input::get('page', $this->defaultPage);
        $column = Input::get('column', $this->defaultColumn);
        $pageSize = Input::get('pageSize', $this->defaultPageSize);
        $searchFields = 'id,name,keyword,category_id';
        $fields = "{$searchFields},intro,attrs,price,price_tag,channel,thumbnail,slideimgs,detail_uri,video_uri,
            category_id,storages,deals,favorites,pageview,comments,book_max,buy_max";
        $params = $this->getInputParams($searchFields);
        $params['is_onsale'] = 1;
        
        list($total, $records, $columns) = Goods::getQuery($page, $pageSize, $params, '', $fields);
        
        $this->arrayChunk($records, $column);
        $totalPages = ceil($total / $pageSize);
        
        return $this->reponseJson(array(
            'records' => $records,
            'total' => $total,
            'page'  => $page,
            'totalPages' => $totalPages,
            'pageSize' => $pageSize,
            )
        );
    }
	
	public function searchGoods()
    {
        $page = Input::get('page', $this->defaultPage);
        $column = Input::get('column', 0);
        $pageSize = Input::get('pageSize', $this->defaultPageSize);
        $searchFields = 'id,name,keyword,category_id';
        $fields = "{$searchFields},intro,attrs,price,price_tag,channel,thumbnail,slideimgs,detail_uri,video_uri,
            category_id,storages,deals,favorites,pageview,comments,book_max,buy_max";
        $params = $this->getInputParams($searchFields);
        $params['is_onsale'] = 1;
        
        list($total, $records, $columns) = Goods::getQuery($page, $pageSize, $params, '', $fields);
        
		if ($column !=0 ) {
			$this->arrayChunk($records, $column);
		}
        
        $totalPages = ceil($total / $pageSize);
        
        return $this->reponseJson(array(
            'records' => $records,
            'total' => $total,
            'page'  => $page,
            'totalPages' => $totalPages,
            'pageSize' => $pageSize,
            )
        );
    }
    
    public function arrayChunk(&$records, $column)
    {
        $records = array_chunk($records, $column);
    }
    
    public function getRecommend()
    {
        $page = Input::get('page', $this->defaultPage);
        $column = Input::get('column', $this->defaultColumn);
        $pageSize = Input::get('pageSize', $this->defaultPageSize);
        $searchFields = 'id,name,keyword,category_id';
        $fields = "{$searchFields},intro,attrs,price,price_tag,channel,thumbnail,slideimgs,detail_uri,video_uri,
        category_id,storages,deals,favorites,pageview,comments,book_max,buy_max";
        $params = $this->getInputParams($searchFields);
        $params['is_onsale'] = 1;
        
        list($total, $records, $columns) = Goods::getQuery($page, $pageSize, $params, '', $fields);
        
        if ($column != 0) {
            $this->arrayChunk($records, $column);
        }
        $totalPages = ceil($total / $pageSize);

        return $this->reponseJson(array(
            'records' => $records,
            'total' => $total,
            'page'  => $page,
            'totalPages' => $totalPages,
            'pageSize' => $pageSize,
            )
        );
    }
    
    public function getStrategy()
    {
        $page = Input::get('page', $this->defaultPage);
        $column = Input::get('column', 0);
        $pageSize = Input::get('pageSize', $this->defaultPageSize);
        $searchFields = 'id,title';
        $fields = "{$searchFields},url,image,tag,width,height";
        $params = $this->getInputParams($searchFields);
        $params['is_display'] = 1;
        
        list($total, $records, $columns) = Strategy::getQuery($page, $pageSize, $params, 'order by weight asc', $fields);
        
        if ($column != 0) {
            $this->arrayChunk($records, $column);
        }
        $totalPages = ceil($total / $pageSize);
        
        return $this->reponseJson(array(
                'records' => $records,
                'total' => $total,
                'page'  => $page,
                'totalPages' => $totalPages,
                'pageSize' => $pageSize,
            )
        );
    }
    
    public function getCategory($type, $category_pid)
    {
        $page = Input::get('page') ? : $this->defaultPage;
        $pageSize = Input::get('pageSize') ? : 100;
        $searchFields = 'id,category_name,type';
        $fields = "{$searchFields},category_pid,weight,style,date_type,price_type";
        $params = $this->getInputParams($searchFields);
        $params['type'] = $type;
        $params['category_pid'] = $category_pid;
        $orderby = 'order by category_pid,weight';
        list($total, $records, $columns) = Category::getQuery($page, $pageSize, $params, $orderby, $fields);
        $totalPages = ceil($total / $pageSize);
        
        return $this->reponseJson(array(
            'records' => $records,
            'total' => $total,
            'page'  => $page,
            'totalPages' => $totalPages,
            'pageSize' => $pageSize,
            )
        );
    }
    
    public function getStoreCategory()
    {
        return $this->getCategory(2, 4);
    }
    
    public function getDiscoverCategory()
    {
        return $this->getCategory(2, 13);
    }
    
    public function getSplash($type=1, $maxSize=1)
    {
        $page = Input::get('page') ? : $this->defaultPage;
        $pageSize = Input::get('pageSize') ? : 100;
        $searchFields = 'title,sub_title,img_item_map';
        $fields = "{$searchFields}";
        $params['type'] = $type;
        $params['is_display'] = 1;
        list($total, $records, $columns) = Banner::getQuery($page, $pageSize, $params, '', $fields);
        $totalPages = ceil($total / $pageSize);
        $records = array_slice($records, 0, $maxSize);
        
        return $this->reponseJson(array(
            'records' => $records,
            'total' => $total,
            'page'  => $page,
            'totalPages' => $totalPages,
            'pageSize' => $pageSize,
            )
        );
    }
    
    public function getGoods($params)
    {
        $page = Input::get('page', $this->defaultPage);
        $pageSize = Input::get('pageSize', $this->defaultPageSize);
        $searchFields = 'id,name,keyword,category_id';
        $fields = "{$searchFields},intro,attrs,price,price_tag,channel,thumbnail,slideimgs,detail_uri,video_uri,
        category_id,storages,deals,favorites,pageview,comments,book_max,buy_max";
        return Goods::getQuery($page, $pageSize, $params, '', $fields, "FillKvs");
    }
    
    public function getTopic2Goods()
    {
        $result = array();
        $topics = Topic::getTopic();
        if (!isset($topics[0])) return $result;
        foreach ($topics as $k=> $v) {
            $params['id'] = $v->goods_id;
            list($total, $records, $columns) = $this->getGoods($params);
            $result[] = array(
                'title'     => $v->title,
                'sub_title' => $v->sub_title,
                'image'     => $v->image,
                'address'   => $v->address,
                'type'      => 'TOPIC',
                'style'     => $v->style,
                'data'      => $records,
            );
        }    
        return $result;
    }
    
    
    public function getBanner2Goods()
    {
        $result = array();
        $banners = Banner::getBanner();
        if (!isset($banners[0])) return $result;
        // <img, goods_id>
        $map = json_decode($banners[0]->img_item_map, true);
        $params['id'] = implode(',', array_values($map));
        list($total, $records, $columns) = $this->getGoods($params);
        $this->replaceThumbnail($records, $map);
        $result[] = array(
            'title'     => '',
            'sub_title' => '',
            'image'     => '',
            'address'   => '',
            'type'      => 'BANNER',
            'style'     => '',
            'data'      => $records,
        );
        return $result;
    }
    
    public function replaceThumbnail(&$result, $map)
    {
        $map = array_flip($map);
        foreach ($result as $k=> $v) {
            if (isset($map[$v->id])) {
                $v->thumbnail = $map[$v->id];
            }
            $result[$k] = $v;
        }
    }
    
    
    public function getDiscovery()
    {
        $records = array();
        $banner = $this->getBanner2Goods();
        $topics = $this->getTopic2Goods();
        $records = array_merge($banner, $topics);
        return $this->reponseJson(array(
            'records' => $records,
            'total' => count($records),
            'page'  => $this->defaultPage,
            'totalPages' => 1,
            'pageSize' => $this->defaultPageSize,
            )
        );
    }
    
    public function getLatelyTabloid()
    {
        //list($min, $max) = $this->getMinMax();
        //$params['id'] = $max;
        
        $params['is_publish'] = 1;
        $params['publish_time'] = date("Y-m-d");
        
        return $this->getTabloid($params);
    }
    
    public function getRandTabloid()
    {
        list($min, $max) = $this->getMinMax();
        $params = $this->getInputParams('id');
        if (empty($params['id'])) {
            list($min, $max) = $this->getMinMax();
            //$params['id'] = rand($min, $max);
            $params['id'] = time() % $max;
        }
        return $this->getTabloid($params);
    }
    
    protected function getTabloid($params)
    {
        $page = Input::get('page') ? : $this->defaultPage;
        $pageSize = Input::get('pageSize') ? : 100;
        list($total, $records, $columns) = Tabloid::getQuery($page, $pageSize, $params);
        
        // if rand id not in db, fetch id 1 default
        if (count($records) < 1) {
            $params = array();
            $params['id'] = 1;
            list($total, $records, $columns) = Tabloid::getQuery($page, $pageSize, $params);
        }
        
        return $this->reponseJson(array(
            'records' => $records,
            'total' => count($records),
            'page'  => $this->defaultPage,
            'totalPages' => 1,
            'pageSize' => $this->defaultPageSize,
            )
        );
    }
    
    protected function getMinMax()
    {
        return Tabloid::getMinMaxID();
        
    }
    
    public function getTabloidHtmlTpl()
    {
        $records = array(array('tpl'=> base64_encode(Constant::$htmlTpl)));
        return $this->reponseJson(array(
            'records' => $records,
            'total' => count($records),
            'page'  => $this->defaultPage,
            'totalPages' => 1,
            'pageSize' => $this->defaultPageSize,
            )
        );
    }
    
    public function getApkResurl()
    {
        return $this->reponseJson(array(
            // 'records' => array(array("resurl"=>"http://172.26.3.88:3133/xspeed/shouji.360tpcdn.com/180205/79d9618501eaa9e4c2a09a31f07ab069/com.qihoo360.mobilesafe_259.apk")),
            'records' => array(array("resurl"=>"")),
            'total' => 1,
            'page'  => $this->defaultPage,
            'totalPages' => 1,
            'pageSize' => $this->defaultPageSize,
            )
        );
    }
    
    public function getComLtdInfo()
    {
        //<table  border="1" bordercolor="#FFFFFF" cellspacing="0" cellpadding="2" style="border-collapse:collapse;"><tr><td>鸣谢</td></tr><tr><td>com.squareup.okhttp3:okhttp:3.8.0</td></tr><tr><td>com.google.code.gson:gson:2.8.1</td></tr><tr><td>org.greenrobot:eventbus:3.0.0</td></tr><tr><td>com.github.bumptech.glide:glide:4.0.0-RC1</td></tr><tr><td>com.jaeger.statusbarutil:library:1.4.0</td></tr><tr><td>com.github.ksoichiro:android-observablescrollview:1.6.0</td></tr><tr><td>com.wang.avi:library:2.1.3</td></tr><tr><td>com.afollestad.material-dialogs:core:0.9.4.5</td></tr><tr><td>com.flipboard:bottomsheet-core:1.5.3</td></tr><tr><td>com.blankj:utilcode:1.7.1</td></tr><tr><td>com.github.delight-im:Android-AdvancedWebView:v3.0.0</td></tr><tr><td>com.balysv:material-ripple:1.0.2</td></tr><tr><td>com.yarolegovich:discrete-scrollview:1.3.0</td></tr><tr><td>com.kyleduo.switchbutton:library:2.0.0</td></tr></table>
        $records = array(
            array(
                'company'       => 'seeyou.biz',
                'logo'          => 'http://7xussr.com1.z0.glb.clouddn.com/havana.png',
                'exoneration'   => '<html><head><style>body{font-size:15px;} p{text-align:justify;}</style></head><body><p>APP内容来源于网络，版权归原作者所有。若有侵权，请联系删除。</p></body></html>',
                'email'         => 'seeyou.biz@gmail.com',
                'phone'         => '0000-000000',
                'extra'         => '<html><head><style>body{text-align:justify;font-size:15px;}</style></head><body><p>Designed by Devin Zhu</p></body></html>',
            )
        );
        return $this->reponseJson(array(
            'records' => $records,
            'total' => count($records),
            'page'  => $this->defaultPage,
            'totalPages' => 1,
            'pageSize' => $this->defaultPageSize,
            )
        );
        
    }
	
}
