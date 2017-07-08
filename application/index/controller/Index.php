<?php
namespace app\index\controller;
use EasyWeChat\Foundation\Application;
use app\common\controller\LubRDF;
use think\Request;
class Index extends LubRDF
{
	public function __initialize()
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
    public function index()
    {   
        $data = url('index/index/pre_auth_code','','shtml',true);
        return ['data'=>$data, 'status'=>200,'msg'=>'hello word'];
    }
    /**
     * 测试方法
     * @return [type] [description]
     */
    //public function test($id,$name,$param)
    public function test()
    {   
        //$all = Request::instance()->post();
        $all = input('post.param');
        $data = url('index/index/pre_auth_code','','shtml',true);
        return ['data'=>$data, 'status'=>200,'msg'=>'hello word','param'=>$all];
    }
    /**
     * 新增用户
     */
    function add_user(){

    }
    /**
     * 编辑用户
     * @param $id string 用户id
     */
    function edit_user(){

    }
    /**
     * 删除用户
     * @param $id string 用户ID
     */
    function del_user(){

    }
    /**
     * 账号登录
     * @param  string $username 账号
     * @param  string $password 密码
     * @param  string $code     验证码
     * @return true|false
     */
    public function login($username,$password,$code)
    {
        # code...
    }
    public function register($value='')
    {
        # code...
    }
    //获取预授权码
    public function pre_auth_code()
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
      $app = new Application($options);
      $openPlatform = $app->open_platform;
      $code = $openPlatform->pre_auth->getCode();
    }
}
