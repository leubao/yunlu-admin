<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    //商户后台
    'merchant'     => [
        '__file__'   => ['common.php'],
        '__dir__'    => ['behavior', 'controller', 'model'],
        'controller' => ['Index', 'Public', 'User','Logs'],
        'model'      => ['User','LoginLog','ActionLog','PayLog']
    ],
    //公众配置
    'common'        =>  [
        '__file__'   => ['common.php'],
        '__dir__'    => ['controller', 'model'],
        'controller' => ['LubRDF', 'Base', 'ApiBase'],
        'model'      => ['User']
    ],
    //收银台 支付
    'cashier'     => [
        '__file__'   => ['common.php'],
        '__dir__'    => ['controller', 'model','Service'],
        'controller' => ['Index', 'Cashier', 'Setting'],
        'Service'    => ['Pay'],
        'model'      => ['PaySetting']
    ],
    //订单模块
    'order'     => [
        '__file__'   => ['common.php'],
        '__dir__'    => ['controller', 'model'],
        'controller' => ['Index'],
        'model'      => ['Order']
    ],
];
