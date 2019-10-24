<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;
use App\Models\Admin\User;
use App\Models\Product\Tabloid;

class TabloidController extends BaseController
{
    public $defaultPage = 1;
    public $defaultPageSize = 20;

    public function getList()
    {
        $page = $this->defaultPage;
        $pageSize = $this->defaultPageSize;
        $params = array();
        list($total, $records, $columns) = Tabloid::getQuery($page, $pageSize, $params);
        
        $totalPages = ceil($total / $pageSize);
        return \View::make("product.tabloid.list", array(
            'breadcrumb' => Tabloid::getBreadcrumb(),
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
        list($total, $records, $columns) = Tabloid::getQuery($page, $pageSize, $params);

        $totalPages = ceil($total / $pageSize);
        return \View::make("product.tabloid.query", array(
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
        $params['operator'] = User::getUsername();
        $params['create_time'] = date("Y-m-d H:i:s");
        
        Tabloid::postAdd($params);
        $this->setEmpty($params);
        return $this->postQuery($params);
    }
    
    public function postRow($params=array())
    {
        if (!empty($params)) {
            return Tabloid::getQuery($this->defaultPage, 
                $this->defaultPageSize, $params);            
        }
        
        $tableColumns = Input::get('tableColumns', '');
        $params = $this->getInputParams($tableColumns);
        list($total, $records, $columns) = Tabloid::getQuery($this->defaultPage, $this->defaultPageSize, $params);
        return \View::make("product.tabloid.inputgroup", array(
            'columns' => $columns,
            'fillData' => $records,
        ));
    }
    
    public function postUpdate()
    {
        $tableColumns = Input::get('tableColumns', '');
        $params = $this->getInputParams($tableColumns);
        $id = 0;
        if (isset($params['id'])) $id = $params['id'];
        Tabloid::postUpdate(array('id',$id), $params);
        $this->setEmpty($params);
        return $this->postQuery($params);
    }

    public function postDelete()
    {
        $tableColumns = Input::get('tableColumns', '');
        $params = $this->getInputParams($tableColumns);
        Tabloid::postDelete(array('id'=>$params['id']));
        
        $this->setEmpty($params);
        return $this->postQuery($params);
    }
    
}