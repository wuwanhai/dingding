<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/2/8
 * Time: 23:45
 */

namespace app\ding\controller;


use think\Controller;
use think\Session;

class Base extends Controller
{
    public $ret = [
        'code' => 0,
        'msg' => ''
    ];
    protected $token = '';
    protected $user_id = '';
    protected $user_info = '';
    protected $code = '';

    public function _initialize()
    {
        parent::_initialize();
        $dingAuth = new \dingtalk\api\Auth();
        $this->token = $dingAuth->getAccessToken();

        $this->code = request()->get('code');

        $dingAuth = new \dingtalk\api\Auth();
        $resConfig = $dingAuth->getConfig(request()->url(true));
        $config = [
            'timeStamp' => $resConfig['timeStamp'],
            'nonceStr' => $resConfig['nonceStr'],
            'signature' => $resConfig['signature'],
            'corpId' => $resConfig['corpId']
        ];
        $this->view->assign('config', json_encode($config));

//            $dingUser = new \dingtalk\api\User();
//            $user = $dingUser->getUserInfo($this->token, $this->code);
//            $this->user_id = $user->userid;
//
//            $this->user_info = $dingUser->get($this->token, $this->user_id);
    }

//        public function login_auth()
//        {
//            if (request()->has('code')){
//                var_dump(request()->get('code'));exit();
//                Session::set('bh.code',request()->get('code'));
//            }
//            if (!empty(Session::get('bh.code'))){
//                redirect()->restore();
//            }
//            return $this->fetch();
//        }

    public function get_user()
    {
        $dingUser = new \dingtalk\api\User();
        $user = $dingUser->getUserInfo($this->token, request()->param('code'));

        return $user->userid;
    }

    public function upload()
    {
        // 获取表单上传文件
        $file = request()->file('imgFile');

        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->validate([
            'size' => 10485760,
            'ext' => 'jpeg,jpg,png,gif,bmp'
        ])
            ->move(ROOT_PATH . 'public' . DS . 'uploads');
        if ($info) {
            // 成功上传后 获取上传信息
            $ret['code'] = 1;
            $ret['msg'] = '成功';
            $ret['data'] = '/uploads' . DS . $info->getSaveName();

        } else {
            // 上传失败获取错误信息
            $ret['code'] = 0;
            $ret['msg'] = $file->getError();
        }

        return json($ret);

    }

    public function uploadImage($file, $path, $size = '1024', $ext = 'jpg,png,gif')
    {
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->validate([
            'size' => $size,
            'ext' => $ext
        ])
            ->move(ROOT_PATH . 'public' . DS . 'uploads' . $path);
        if ($info) {
            // 成功上传后 获取上传信息
            $images = '/uploads/' . $path . DS . $info->getSaveName();
        } else {
            // 上传失败获取错误信息
            return $file->getError();
        }

        return $images;
    }

}