<?php
/**
 * 办案用章
 * User: Administrator
 * Date: 2018/2/9
 * Time: 11:39
 */

namespace app\ding\controller;

class ChapterCase extends Base
{

    /**
     * 办案用章主页
     *
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 其他用章
     *
     * @return mixed
     */
    public function chapter_other()
    {
        return $this->fetch();
    }

    /**
     * 空白函件
     *
     * @return mixed
     */
    public function chapter_blank()
    {
        return $this->fetch();
    }

    /**
     * 用章记录
     *
     * @return mixed
     */
    public function chapter_record()
    {
        return $this->fetch();
    }

}