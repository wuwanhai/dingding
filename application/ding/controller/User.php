<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/1/29
     * Time: 14:13
     */
    namespace app\ding\controller;

    class User extends Base
    {
        public function dept_list()
        {
            $deptDing = new \dingtalk\api\Department();
            $result = $deptDing->listDept($this->token);
            return json($result);
        }

        public function user_list()
        {
            $userDing = new \dingtalk\api\User();
            $deptId = request()->get('dept_id');
            $result = $userDing->simplelist($this->token, $deptId);
            return json($result);
        }
    }