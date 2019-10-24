<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\BaseController;
use App\Models\Product\Goods;
use Illuminate\Support\Facades\Input;
use App\Models\Admin\User;

class GoodsController extends BaseController
{
    public $defaultPage = 1;
    public $defaultPageSize = 30;

    public function getList()
    {
        $page = $this->defaultPage;
        $pageSize = $this->defaultPageSize;
        $params = array();
        list($total, $records, $columns) = Goods::getQuery($page, $pageSize, $params);
        $totalPages = ceil($total / $pageSize);
        return \View::make("product.goods.list", array(
            'breadcrumb' => Goods::getBreadcrumb(),
            'columns' => $columns,
            'records' => $records,
            'total' => $total,
            'page'  => $page,
            'totalPages' => $totalPages,
            'pageSize' => $pageSize,
        ));
    }

    public function postQuery($params=array())
    {
        $page = Input::get('page') ? : $this->defaultPage;
        $pageSize = Input::get('pageSize') ? : $this->defaultPageSize;
        if (empty($params)) {
            $tableColumns = Input::get('tableColumns', '');
            $params = $this->getInputParams($tableColumns);
        }
        list($total, $records, $columns) = Goods::getQuery($page, $pageSize, $params);

        $totalPages = ceil($total / $pageSize);
        return \View::make("product.goods.query", array(
            'columns' => $columns,
            'records' => $records,
            'total' => $total,
            'page'  => $page,
            'totalPages' => $totalPages,
            'pageSize' => $pageSize,
        ));
    }

    public function postAdd()
    {
        $tableColumns = Input::get('tableColumns', '');
        $params = $this->getInputParams($tableColumns);
        $this->base64Encode($params,'slideimgs,intro');
        $params['operator'] = User::getUsername();
        $params['create_time'] = date("Y-m-d H:i:s");
        
        Goods::postAdd($params);
        $this->setEmpty($params);
        return $this->postQuery($params);
    }
    
    public function postRow($params=array())
    {
        if (!empty($params)) {
            return Goods::getQuery($this->defaultPage, 
                $this->defaultPageSize, $params);            
        }
        
        $tableColumns = Input::get('tableColumns', '');
        $params = $this->getInputParams($tableColumns);
        list($total, $records, $columns) = Goods::getQuery($this->defaultPage, $this->defaultPageSize, $params);
        return \View::make("product.goods.inputgroup", array(
            'columns' => $columns,
            'fillData' => $records,
        ));
    }
    
    public function postUpdate()
    {
        $tableColumns = Input::get('tableColumns', '');
        $params = $this->getInputParams($tableColumns, true);
        $this->base64Encode($params,'slideimgs,intro');
        $params['operator'] = User::getUsername();
        
        $id = 0;
        if (isset($params['id'])) $id = $params['id'];
        Goods::postUpdate(array('id',$id), $params);
        $this->setEmpty($params);
        return $this->postQuery($params);
    }

    public function postDelete()
    {
        $tableColumns = Input::get('tableColumns', '');
        $params = $this->getInputParams($tableColumns);
        Goods::postDelete(array('id'=>$params['id']));
        
        $this->setEmpty($params);
        return $this->postQuery($params);
    }	
	
}