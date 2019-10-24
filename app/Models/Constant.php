<?php

namespace App\Models;

class Constant
{
    public static $zhLoginSuc = "登录成功，正在跳转...";
    public static $zhLoginFai = "登录失败，正在跳转...";
    public static $zhLoginUsernameEmpty = "账号不允许空，正在跳转...";
    public static $zhLoginPwdEmpty = "密码不允许空，正在跳转...";
    public static $zhRegisterSuc = "注册成功，正在跳转...";
    public static $zhRegisterFail = "注册失败，正在跳转...";
    public static $zhRegisterExists = "用户已存在，正在跳转...";
    public static $zhRegisterUnEmpty = "用户名不允许空，正在跳转...";
    public static $zhRegisterPwdEmpty = "密码不允许空，正在跳转...";
    public static $zhRegisterPwdsNotEqual = "两次输入的密码不一致，正在跳转...";
    public static $zhInvalidParam = "ERROR：参数错误";
    public static $zhResetPwdSuc = "密码重置成功，正在跳转...";
    public static $zhOriPwdEmpty = "原始密码错误，正在跳转...";
    public static $zhPwd1Empty = "重置密码不允许空，正在跳转...";
    public static $zhPwd2Empty = "重置密码不允许空，正在跳转...";
    public static $zhResetPwdsNotEqual = "两次输入的密码不一致，正在跳转...";
    public static $zhUserNotFound = "账号不存在，正在跳转...";
    public static $enLoginSuc = "Login Success";
    public static $enLoginFai = "Login Failed";
    public static $enRegisterSuc = "Register Success";
    public static $enRegisterFail = "Register Failed";
    
    public static $topicTypeMap = [
        'TopImageBottomListOnRow'   => '上面一张大图下部是列表',
        'OneSmallImageOnRow'        => '一行一个小尺寸图',
        'TwoImageOnRow'             => '一行显示两个图映射到商品ID',
        'TopImageBottomGridOnRow'   => '横向栅栏映射到商品ID',
        'OneBigImageOnRow'          => '一行一个大尺寸图',
        'LImageRTextOnRow'          => '左边图片右边文字',
        'LTextRImageOnRow'          => '左边文字右边图片',
    ];

    public static $categoryMap = [
        '22' => '休眠',
        '23' => '相声',
        '29' => '趣闻',
        '24' => '教育',
        '25' => '财经',
        '26' => '音乐',
        '30' => '有物',
    ];

}
