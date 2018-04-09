<?php
/**
 * 办案支出
 * User: Administrator
 * Date: 2018/2/9
 * Time: 11:58
 */

namespace app\ding\controller;

class ExpendCase extends Base
{
    /**
     * 办案支出
     *
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();
    }
}