<?php

namespace App\Models\Admin;
use App\Models\BaseModel;
use DB;

class User extends BaseModel
{
    const LOGIN_TABLE = "zm_admin_user";
    const ZMES_KEY = "494c3c27fc4a6fb7c728ae0b";
    const ZMES_IV = "0eaddb87aifs9876";
    const ZMES_EXPIRE = 86400;
    
    public static function doRegister(&$params, $table='zm_admin_user')
    {
        $params['create_time'] = date("Y-m-d H:i:s");
        return DB::table($table)->insert($params);
    }
    
    public static function getUsername()
    {
        $user = self::getUser();
        return $user['username'];
    }

    public static function getMail()
    {
        $user = self::getUser();
        return $user['mail'];
    }

    public static function getDisplay()
    {
        $user = self::getUser();
        return $user['display'];
    }

    public static function isLogin()
    {
        $user = self::getUser();

        if (!empty($user["username"]) 
            && !empty($user["time"]) 
            && (time() - $user["time"]) <= self::ZMES_EXPIRE ) {
            return true;
        } else {
            return false;
        }
    }

    public static function getUser()
    {
        $user = array();
        if (!empty($_COOKIE["admin_user"])) {
            $pfadmin = $_COOKIE["admin_user"];
            $u = openssl_decrypt($pfadmin, 'AES-128-CFB', self::ZMES_KEY, OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING, self::ZMES_IV);
            $u = json_decode($u, true);
            if (!empty($u["user"])) {
                $user = array(
                    "username" => $u["user"],
                    "time"     => $u["time"],
                    "ip"       => $u["ip"],
                );
            }
        }
        return $user;
    }

    public static function logout()
    {
        setcookie("admin_user", "", time() - 3600, "/");
    }

    public static function login(&$params)
    {
        $user = self::doLogin($params);
        if (empty($user['user'])) {return false;}
        $user["time"] = time();
        $user["ip"] = request()->getClientIp();
        $encrypt = openssl_encrypt(json_encode($user), 'AES-128-CFB', self::ZMES_KEY, OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING, self::ZMES_IV);
        setcookie("admin_user", $encrypt, 0, "/");
        $_COOKIE["admin_user"] = $encrypt;
        return true;
    }
    
    public static function doLogin(&$params, $table="zm_admin_user")
    {
        list($where, $bindValues) = BaseModel::Factory()->getConditions($params);
        $user = \DB::selectOne("select * from {$table} where {$where}", $bindValues);
        return ['user' => $user->username];
    }
    
}
