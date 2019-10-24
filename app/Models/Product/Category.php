<?php

namespace App\Models\Product;
use App\Models\BaseModel;

class Category extends BaseModel
{
    const TABLE = "zm_category";
    public static $fieldsMap = array(
        'id'            => array('name'=>'ID',  'desc'=>''),
        'category_pid'  => array('name'=>'父级类目', 'desc'=>''),
        'category_name' => array('name'=>'类目名称', 'desc'=>''),
        'type'          => array('name'=>'类目类型', 'desc'=>''),
        'style'         => array('name'=>'展示样式', 'desc'=>''),
        'weight'        => array('name'=>'权重', 'desc'=>''),
		'date_type'		=> array('name'=>'日期类型', 'desc'=>''),
		'price_type'	=> array('name'=>'计价方式', 'desc'=>''),
        'operator'   => array('name'=>'操作人', 'desc'=>''),
        'create_time'=> array('name'=>'创建时间', 'desc'=>''),
        'update_time'=> array('name'=>'更新时间', 'desc'=>''),
        
    );
    
    public static function getBreadcrumb()
    {
        return $breadcrumb = array(
            '首页'=>array(
                'uri'   =>'',
                'icon'  =>'fa fa-home',
            ),
            '产品'=>array(
                'uri'   =>'',
                'icon'  =>'fa fa-list-ul',
            ),
            '类目'=>array(
                'uri'   =>'#',
                'icon'  =>'',
            )
        );
    }
    
    public static function getFiledDistinct($fileds='')
    {
        $table = Category::TABLE;
        $query = "select {$fileds} from {$table} group by {$fileds}";
        return \DB::reconnect()->select($query);
    }
    
    public static function getQuery($page, $pageSize, $params, $orderby='', $fields='*')
    {
        $table = self::TABLE;
        $tableColumns = BaseModel::Factory()->getTableColumns($table);
        list($where, $bindValues) = BaseModel::Factory()->getConditions($params);

        $offset = ($page-1) * $pageSize;
        $limit = "limit $pageSize offset $offset";
        $where = empty($where) ? "" : "where $where";
        $query = "select {$fields} from {$table} {$where} {$orderby} {$limit}";
        $result = \DB::reconnect()->select($query, $bindValues);
        $query = "select count(*)cnt from {$table} {$where}";
        $totalRecords = self::getTotalRecords($query, $bindValues);
        return array($totalRecords, $result, $tableColumns);
        
    }
    
    public static function getTotalRecords($query, $bindValues, $database="mysql")
    {
        $result = \DB::reconnect($database)->selectOne($query, $bindValues);
        return empty($result->cnt) ? 0 : $result->cnt;
    }
    
    public static function postAdd($params)
    {
        return \DB::table(Category::TABLE)->insertGetId($params);
    }
    
    public static function postUpdate($where, $params)
    {
        list($k, $v) = $where;
        return \DB::table(Category::TABLE)->where($k, $v)
        ->update($params);
    }
    
    public static function postDelete($params)
    {
        $table = Category::TABLE;
        list($where, $bindValues) = BaseModel::Factory()->getConditions($params);
        $query = "delete from {$table} where $where";
        \DB::connection()->delete($query, $bindValues);
        return;
    }
    
    
    public static function getCategory($fetch_mode=\PDO::FETCH_OBJ, $params=array())
    {
        $table = Category::TABLE;
        list($where, $bindValues) = BaseModel::Factory()->getConditions($params);
        $where = empty($where) ? "" : "where {$where}";
        $query = "select * from {$table} {$where}";
        return \DB::connection()->select($query, $bindValues);
    }
}
