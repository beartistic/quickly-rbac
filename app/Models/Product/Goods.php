<?php

namespace App\Models\Product;
use App\Models\BaseModel;

class Goods extends BaseModel
{
    const TABLE = "zm_product";
    public static $fieldsMap = array(
        'id'            => array('name'=>'ID', 'desc'=>''),
        'name'          => array('name'=>'商品名称', 'desc'=>''),
        'keyword'       => array('name'=>'关键词', 'desc'=>''),
        'intro'         => array('name'=>'图片简介', 'desc'=>''),
        'attrs'         => array('name'=>'商品属性', 'desc'=>''),
        'channel'       => array('name'=>'合作渠道', 'desc'=>''),
        'location'      => array('name'=>'所在位置', 'desc'=>''),
        'contact'       => array('name'=>'联系方式', 'desc'=>''),
        'price'         => array('name'=>'价格', 'desc'=>''),
        'price_tag'     => array('name'=>'价格标签', 'desc'=>''),
        'thumbnail'     => array('name'=>'缩略图', 'desc'=>''),
        'slideimgs'     => array('name'=>'滑动图片', 'desc'=>''),
        'detail_uri'    => array('name'=>'详情页', 'desc'=>''),
        'video_uri'     => array('name'=>'视频', 'desc'=>''),
        'video_open'    => array('name'=>'视频打开方式', 'desc'=>''),
        'preview_time'     => array('name'=>'试看时长', 'desc'=>''),
        'category_id'   => array('name'=>'分类', 'desc'=>''),
        'storages'      => array('name'=>'库存', 'desc'=>''),
        'deals'         => array('name'=>'交易量', 'desc'=>''),
        'favorites'     => array('name'=>'喜欢次数', 'desc'=>''),
        'pageview'      => array('name'=>'浏览次数', 'desc'=>''),
        'is_onsale'     => array('name'=>'是否开卖', 'desc'=>''),
        'comments'      => array('name'=>'评论次数', 'desc'=>''),
		'book_max'      => array('name'=>'最多预订', 'desc'=>''),
		'buy_max'		=> array('name'=>'最多购买', 'desc'=>''),
		'is_delete'		=> array('name'=>'是否删除', 'desc'=>''),
		'is_nice'		=> array('name'=>'是否精选', 'desc'=>''),
        'operator'      => array('name'=>'编辑人', 'desc'=>''),
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
            '商品'=>array(
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
        $where = 'where type=2';
        $query = "select {$fileds} from {$table} ${where} group by {$fileds}";
        return \DB::reconnect()->select($query);
    }
    
    public static function getQuery($page, $pageSize, $params, $order='', $fields='*', $fillType="")
    {
        $table = self::TABLE;
        $tableColumns = BaseModel::Factory()->getTableColumns($table);
        
        if (isset($params['name'])) $params['name'] = "%{$params['name']}%";
        if (isset($params['keyword'])) $params['keyword'] = "%{$params['keyword']}%";
        if (isset($params['channel'])) $params['channel'] = "%{$params['channel']}%";
        $instance = BaseModel::Factory();
        $instance->setFieldsLikeCollect('name')->
        setFieldsLikeCollect('keyword')->setFieldsLikeCollect('channel');
        
        if ($fillType) {
            $instance->setFillParamType($fillType);
        }
        list($where, $bindValues) = $instance->getConditions($params);
        

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
        return \DB::table(Goods::TABLE)->insertGetId($params);
    }
    
    public static function postUpdate($where, $params)
    {
        list($k, $v) = $where;
        return \DB::table(Goods::TABLE)->where($k, $v)
        ->update($params);
    }
    
    public static function postDelete($params)
    {
        $table = Goods::TABLE;
        list($where, $bindValues) = BaseModel::Factory()->getConditions($params);
        $query = "delete from {$table} where $where";
        \DB::connection()->delete($query, $bindValues);
        return;
    }
    
    public static function getTag($fetch_mode=\PDO::FETCH_OBJ, $params=array())
    {
        $table = Goods::TABLE;
        list($where, $bindValues) = BaseModel::Factory()->getConditions($params);
        $where = empty($where) ? "" : "where {$where}";
        $query = "select distinct tag from {$table} {$where}";
        return \DB::connection()->select($query, $bindValues);
    }
    
    public static function getCategory($fetch_mode=\PDO::FETCH_OBJ, $params=array())
    {
        $table = Goods::TABLE;
        list($where, $bindValues) = BaseModel::Factory()->getConditions($params);
        $where = empty($where) ? "" : "where {$where}";
        $query = "select category_id,count(*)cnt from {$table} {$where} group by category_id";
        return \DB::connection()->select($query, $bindValues);
    }
}
