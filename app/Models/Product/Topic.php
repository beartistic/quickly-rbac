<?php

namespace App\Models\Product;
use App\Models\BaseModel;

class Topic extends BaseModel
{
    const TABLE = "zm_topic";
    public static $fieldsMap = array(
        'id'            => array('name'=>'ID', 'desc'=>''),
        'title'         => array('name'=>'主题名称', 'desc'=>''),
        'sub_title'     => array('name'=>'主题说明', 'desc'=>''),
        'style'         => array('name'=>'布局样式', 'desc'=>''),
        'description'   => array('name'=>'样式说明', 'desc'=>''),
        'goods_id'      => array('name'=>'商品id', 'desc'=>''),
        'image'         => array('name'=>'主题图片', 'desc'=>''),
        'address'       => array('name'=>'主题地址', 'desc'=>''),
        'weight'        => array('name'=>'排序权重', 'desc'=>''),
        'open_with'     => array('name'=>'打开方式', 'desc'=>''),
        'is_display'    => array('name'=>'是否显示', 'desc'=>''),
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
            'topic'=>array(
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
    
    public static function getQuery($page, $pageSize, $params, $order='order by weight asc',$fields='*')
    {
        $table = self::TABLE;
        $tableColumns = BaseModel::Factory()->getTableColumns($table);
        
        if (isset($params['title'])) $params['title'] = "%{$params['title']}%";
        if (isset($params['sub_title'])) $params['sub_title'] = "%{$params['sub_title']}%";
        list($where, $bindValues) = BaseModel::Factory()->setFieldsLikeCollect('title')->
        setFieldsLikeCollect('sub_title')->getConditions($params);

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
    
    public static function getTotalRecords($query, $bindValues, $database="mysql")
    {
        $result = \DB::reconnect($database)->selectOne($query, $bindValues);
        return empty($result->cnt) ? 0 : $result->cnt;
    }
    
    public static function postAdd($params)
    {
        return \DB::table(Topic::TABLE)->insertGetId($params);
    }
    
    public static function postUpdate($where, $params)
    {
        list($k, $v) = $where;
        return \DB::table(Topic::TABLE)->where($k, $v)
        ->update($params);
    }
    
    public static function postDelete($params)
    {
        $table = Topic::TABLE;
        list($where, $bindValues) = BaseModel::Factory()->getConditions($params);
        $query = "delete from {$table} where $where";
        \DB::connection()->delete($query, $bindValues);
        return;
    }
    
    public static function getTag($fetch_mode=\PDO::FETCH_OBJ, $params=array())
    {
        $table = Topic::TABLE;
        list($where, $bindValues) = BaseModel::Factory()->getConditions($params);
        $where = empty($where) ? "" : "where {$where}";
        $query = "select distinct tag from {$table} {$where}";
        return \DB::connection()->select($query, $bindValues);
    }
    
    public static function getCategory($fetch_mode=\PDO::FETCH_OBJ, $params=array())
    {
        $table = Topic::TABLE;
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
    
    public static function getTopic()
    {
        $params = array();
        $params['is_display'] = 1;
        $table = self::TABLE;
        list($where, $bindValues) = BaseModel::Factory()->getConditions($params);
        $where = empty($where) ? "" : "where $where";
        $order = "order by weight asc";
        $query = "select goods_id,title,sub_title,style,image,address from {$table} {$where} {$order}";
        $result = \DB::connection()->select($query, $bindValues);
        return $result;
    }
}
