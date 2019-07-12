<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BasicController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;

class BaseController extends BasicController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function getInputParams($fields='', $is_default=false)
    {
        $params = array();
        if (!$fields) return $params;
        $fields = explode(',', str_replace(array(' ,',', ',' |','| '), ',', trim($fields)));
        foreach ($fields as $v) {
            $value = Input::get($v);
            if (is_string($value)) $value = trim($value);
            if ($value != '') $params[$v] = $value;
            if ($is_default)  $params[$v] = $value;
        }
        return $params;
    }
    
    public function packJson($data, $errno = 0, $errmsg = 'ok')
    {
        return json_encode(array(
            'errno'  => $errno,
            'errmsg' => $errmsg,
            'time'   => time(),
            'data'   => $data,
        ));
    }
    
    public function doUnset(&$params, $keys='')
    {
        $keys = explode(',', str_replace(array(' ,',', ',' |','| '), ',', trim($keys)));
        foreach ($keys as $k) {
            if (isset($params[$k])) {
                unset($params[$k]);
            }
        }
    }
    
    public function base64Encode(&$params, $keys='')
    {
        $keys = explode(',', str_replace(array(' ,',', ',' |','| '), ',', trim($keys)));
        foreach ($keys as $k) {
            if (isset($params[$k])) {
                $params[$k] = base64_encode($params[$k]);
            }
        }
    }
    
    public function addslashes(&$params, $keys='')
    {
        $keys = explode(',', str_replace(array(' ,',', ',' |','| '), ',', trim($keys)));
        foreach ($keys as $k) {
            if (isset($params[$k])) {
                $params[$k] = addslashes($params[$k]);
            }
        }
    }
    
    public function setEmpty(&$params, $keys='')
    {
        if ($keys == '') {
            foreach ($params as $k=> $v) {
                $params[$k] = '';
            }
            return;
        }
        $keys = explode(',', str_replace(array(' ,',', ',' |','| '), ',', trim($keys)));
        foreach ($keys as $k) {
            if (isset($params[$k])) {
                $params[$k] = '';
            }
        }
    }
    
}
