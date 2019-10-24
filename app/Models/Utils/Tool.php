<?php

namespace App\Models\Utils;

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class Tool
{
    public static function uniqidReal($lenght = 13) {
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }   
        return substr(bin2hex($bytes), 0, $lenght);
    }

    public static function put($abs, $file)
    {
        $bucket = 'r0_seeyou';
        $accessKey = '-ibL4zdLpyICphyuQb9mM1qpuSL8GSLiRHmfX73v';
        $secretKey = '863iVPAnejuKKR_tA1AyIZT7T2qwGcj254oEq58m';
        $auth = new Auth($accessKey, $secretKey);
        $token = $auth->uploadToken($bucket);
        $uploadMgr = new UploadManager();
        list($ret, $err) = $uploadMgr->putFile($token, $file, $abs);
        if ($ret) {
            return true;
        }
        return false;

    }

    public static function delete($file)
    {
        $bucket = 'r0_seeyou';
        $accessKey = '-ibL4zdLpyICphyuQb9mM1qpuSL8GSLiRHmfX73v';
        $secretKey = '863iVPAnejuKKR_tA1AyIZT7T2qwGcj254oEq58m';
        $auth = new Auth($accessKey, $secretKey);
        $config = new \Qiniu\Config();
        $bucketManager = new \Qiniu\Storage\BucketManager($auth, $config);
        $err = $bucketManager->delete($bucket, $file);
        if ($err) {
            return false;
        }
        return true;
    }
}
