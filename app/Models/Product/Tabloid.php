<?php

namespace App\Models\Product;
use App\Models\BaseModel;

class Tabloid extends BaseModel
{
    const TABLE = "zm_tabloid";
    public static $fieldsMap = array(
        'id'            => array('name'=>'ID', 'desc'=>''),
        'author'        => array('name'=>'作者', 'desc'=>''),
        'title'         => array('name'=>'文摘标题 ', 'desc'=>''),
        'digest'        => array('name'=>'文摘摘要', 'desc'=>''),
        'content'       => array('name'=>'文摘内容', 'desc'=>''),
        'wc'            => array('name'=>'文摘字数', 'desc'=>''),
        'channel'       => array('name'=>'渠道名称', 'desc'=>''),
        'publish_time'  => array('name'=>'发布时间', 'desc'=>''),
        'is_publish'    => array('name'=>'是否发布', 'desc'=>''),
        'operator'      => array('name'=>'操作人', 'desc'=>''),
        'create_time'   => array('name'=>'创建时间', 'desc'=>''),
        'update_time'   => array('name'=>'更新时间', 'desc'=>''),
        
    );
    
    public static function getBreadcrumb()
    {
        return $breadcrumb = array(
            '首页'=>array(
                'uri'   =>'',
                'icon'  =>'fa fa-home',
            ),
            '文摘'=>array(
                'uri'   =>'',
                'icon'  =>'fa fa-list-ul',
            ),
            '列表'=>array(
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
    
    public static function getQuery($page, $pageSize, $params, $order='',$fields='*')
    { 
        $table = self::TABLE;
        $tableColumns = BaseModel::Factory()->getTableColumns($table);
        
        if (isset($params['title'])) $params['title'] = "%{$params['title']}%";
        if (isset($params['author'])) $params['author'] = "%{$params['author']}%";
        if (isset($params['digest'])) $params['digest'] = "%{$params['digest']}%";
        if (isset($params['content'])) $params['content'] = "%{$params['content']}%";
        list($where, $bindValues) = BaseModel::Factory()->setFieldsLikeCollect('title')->
        setFieldsLikeCollect('author')->setFieldsLikeCollect("digest")->setFieldsLikeCollect("content")
        ->getConditions($params);

        $offset = ($page-1) * $pageSize;
        $limit = "limit $pageSize offset $offset";
        $where = empty($where) ? "" : "where $where";
        $order = empty($order) ? "" : "$order";
        $query = "select {$fields} from {$table} {$where} {$order} {$limit}";
        $result = \DB::reconnect()->select($query, $bindValues);
        $query = "select count(*)cnt from {$table} {$where}";
        $totalRecords = self::getTotalRecords($query, $bindValues);
        return array($totalRecords, $result, $tableColumns);
        
    }
    
    
    public static function getMinMaxID()
    {
        $result = array(0, 0);
        list($total, $records,$columns) = self::getQuery(1, 1, array(), '', 'max(id)max,min(id)min');
        $result = array(
            $records[0]->min,
            $records[0]->max,
        );
        return $result;
    }
    
    public static function getTotalRecords($query, $bindValues, $database="mysql")
    {
        $result = \DB::reconnect($database)->selectOne($query, $bindValues);
        return empty($result->cnt) ? 0 : $result->cnt;
    }
    
    public static function postAdd($params)
    {
        return \DB::table(Tabloid::TABLE)->insertGetId($params);
    }
    
    public static function postUpdate($where, $params)
    {
        list($k, $v) = $where;
        return \DB::table(Tabloid::TABLE)->where($k, $v)
        ->update($params);
    }
    
    public static function postDelete($params)
    {
        $table = Tabloid::TABLE;
        list($where, $bindValues) = BaseModel::Factory()->getConditions($params);
        $query = "delete from {$table} where $where";
        \DB::connection()->delete($query, $bindValues);
        return;
    }
    
    public static function getTag($fetch_mode=\PDO::FETCH_OBJ, $params=array())
    {
        $table = Tabloid::TABLE;
        list($where, $bindValues) = BaseModel::Factory()->getConditions($params);
        $where = empty($where) ? "" : "where {$where}";
        $query = "select distinct tag from {$table} {$where}";
        return \DB::connection()->select($query, $bindValues);
    }
    
    public static function getCategory($fetch_mode=\PDO::FETCH_OBJ, $params=array())
    {
        $table = Tabloid::TABLE;
        list($where, $bindValues) = BaseModel::Factory()->getConditions($params);
        $where = empty($where) ? "" : "where {$where}";
        $query = "select category_id,count(*)cnt from {$table} {$where} group by category_id";
        return \DB::connection()->select($query, $bindValues);
    }
    
    public static function urlBase64Encode(&$result)
    {
        foreach ($result as $key=>$value) {
            $result[base64_encode(trim($key))] = $value;
            unset($result[$key]);
        }
    }
    
    public static function urlBase64Decode(&$result)
    {
        foreach ($result as $key=>$value) {
            $result[base64_decode(trim($key))] = $value;
            unset($result[$key]);
        }
    }
    
    public static function array2str($result)
    {
        $str = array();
        foreach ($result as $k=> $v) {
            $str[] = "{$k}\t{$v}";
        }
        return implode("\n", $str);
    }
    
    public static function getBanner()
    {
        $params = array();
        $params['is_display'] = 1;
        $params['type'] = 2;
        $table = self::TABLE;
        list($where, $bindValues) = BaseModel::Factory()->getConditions($params);
        $where = empty($where) ? "" : "where $where";
        $query = "select distinct img_item_map from {$table} {$where}";
        $result = \DB::connection()->select($query, $bindValues);
        return $result;
    }
}
