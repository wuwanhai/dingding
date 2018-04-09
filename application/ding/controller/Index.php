<?php
    /**
     * 首页
     * User: Administrator
     * Date: 2018/2/7
     * Time: 16:04
     */
    namespace app\ding\controller;

    class Index extends Base
    {
        public function test()
        {
            $dingApp = new \dingtalk\api\Application();
            $dingAuth = new \dingtalk\api\Auth();
            $token = $dingAuth->getAccessToken();
            $list = $dingApp->applicationList($token,['code'=>1]);

            dump($list);
            exit();
        }

        public function index()
        {
            $dingApp = new \dingtalk\api\Application();
            $dingAuth = new \dingtalk\api\Auth();
            $token = $dingAuth->getAccessToken();
            $list = $dingApp->applicationList($token,['code'=>1]);

            $arr = [];
            $corpid = CORPID;

            foreach ($list->appList as $k=>$v){
//                if (empty($v->ompLink)){
                    $v->ompLink = "dingtalk://dingtalkclient/action/switchtab?index=2&name=work&scene=1&corpid=$corpid&agentid=".$v->agentId;
//                }
                $arr[$k]=[
                    'ompLink'=>$v->ompLink,
                    'name'=>$v->name,
                    'appIcon'=>$v->appIcon,
                    'appDesc'=>$v->appDesc,
                    'agentId'=>$v->agentId
                ];
            }

            $this->assign('list',$arr);

            return $this->fetch();
        }
    }