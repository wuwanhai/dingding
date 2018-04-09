<?php
/**
 * 个人账户
 * User: Administrator
 * Date: 2018/2/9
 * Time: 11:44
 */

namespace app\ding\controller;

class IndividualAccount extends Base
{
    /**
     * 个人账户
     *
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 新建办案支出
     *
     * @return mixed
     */
    public function new_case_expend()
    {
        return $this->fetch();
    }
}