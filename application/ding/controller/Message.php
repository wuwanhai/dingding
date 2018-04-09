<?php

    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/1/29
     * Time: 14:13
     */
    namespace app\ding\controller;

    class Message extends Base
    {
        public function send_message($opt)
        {
            $messageDing = new \dingtalk\api\Message();

            $result = $messageDing->send($this->token, $opt);
            if ($result == true) {
                return true;
            }

            return false;
        }
    }