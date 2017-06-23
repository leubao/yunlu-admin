<?php
// +----------------------------------------------------------------------
// | 微信第三方开放平台
// +----------------------------------------------------------------------
// | Copyright (c) 201 7http://www.leubao.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: zhoujing <zhoujing@leubao.com>
// +----------------------------------------------------------------------
namespace app\wechat\controller;
use EasyWeChat\Foundation\Application;
class Index
{
    public function _initialize()
    {
      $options = [
        // ... 阿里智游
        'open_platform' => [
            'app_id'   => 'wxc59cb703a285be97',//第三方平台appid
            'secret'   => 'dd004943e9e03f2b155ee58a888b55cc',//第三方平台appsecret
            'token'    => 'xSAlr6dAwpzri0Wy',//第三方平台access_token
            'aes_key'  => '9AMIYZmQ1TWIhTQgktVhhpLu3tLeJZie16CkW8EItf7',//第三方平台消息加密
            ],
        // ...
      ];

    }
    //获取预授权码
    public function pre_auth_code()
    {
      $app = new Application($this->options);
      $openPlatform = $app->open_platform;
      $code = $openPlatform->pre_auth->getCode();
    }
    public function index()
    {

    }
}
