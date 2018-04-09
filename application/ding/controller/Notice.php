<?php
    namespace app\ding\controller;
    /**
     * Created by PhpStorm.
     * User: PC
     * Date: 2018/2/12
     * Time: 12:54
     */
    class Notice extends Base
    {
        public function index()
        {
            return $this->fetch();
        }
    }