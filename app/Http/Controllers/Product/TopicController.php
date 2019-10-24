<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\BaseController;
use App\Models\Product\Category;
use Illuminate\Support\Facades\Input;
use App\Models\Admin\User;
use App\Models\Product\Banner;
use App\Models\Product\Topic;

class TopicController extends BaseController
{
    public $defaultPage = 1;
    public $defaultPageSize = 20;

    public function getList()
    {
        $page = $this->defaultPage;
        $pageSize = $this->defaultPageSize;
        $params = array();
        list($total, $records, $columns) = Topic::getQuery($page, $pageSize, $params);
        
        $totalPages = ceil($total / $pageSize);
        return \View::make("product.topic.list", array(
            'breadcrumb' => Topic::getBreadcrumb(),
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
        list($total, $records, $columns) = Topic::getQuery($page, $pageSize, $params);

        $totalPages = ceil($total / $pageSize);
        return \View::make("product.topic.query", array(
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
        $params['update_time'] = date("Y-m-d H:i:s");
        Topic::postAdd($params);
        $this->setEmpty($params);
        return $this->postQuery($params);
    }

    
    public function postRow($params=array())
    {
        if (!empty($params)) {
            return Topic::getQuery($this->defaultPage, 
                $this->defaultPageSize, $params);            
        }
        
        $tableColumns = Input::get('tableColumns', '');
        $params = $this->getInputParams($tableColumns);
        list($total, $records, $columns) = Topic::getQuery($this->defaultPage, $this->defaultPageSize, $params);
        return \View::make("product.topic.inputgroup", array(
            'columns' => $columns,
            'fillData' => $records,
        ));
    }
    
    public function postUpdate()
    {
        $tableColumns = Input::get('tableColumns', '');
        $params = $this->getInputParams($tableColumns);
        unset($params['create_time']);
        $params['update_time'] = date("Y-m-d H:i:s");
        $id = 0;
        if (isset($params['id'])) $id = $params['id'];
        Topic::postUpdate(array('id',$id), $params);
        $this->setEmpty($params);
        return $this->postQuery($params);
    }
    
    private function parseStr2Array($str)
    {
        $result = array();
        $pattern="/(\S+)\s+(\S+)/";
        preg_match_all($pattern, $str, $matches, PREG_SET_ORDER);
        foreach ($matches as $k=> $v) {
            if (!$v) continue;
            array_shift($v);
            list($img, $item) = $v; 
            $result[$img] = $item;
        }
        return $result;
    }

    public function postDelete()
    {
        $tableColumns = Input::get('tableColumns', '');
        $params = $this->getInputParams($tableColumns);
        Topic::postDelete(array('id'=>$params['id']));
        
        $this->setEmpty($params);
        return $this->postQuery($params);
    }
    
}
