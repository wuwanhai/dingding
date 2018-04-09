<?php
/**
 * 案件管理
 * User: Administrator
 * Date: 2018/2/9
 * Time: 11:20
 */

namespace app\ding\controller;

class ManageCase extends Base
{

    /**
     * 案件列表
     *
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 案件详情
     *
     * @return mixed
     */
    public function info_case()
    {
        $this->assign('case_id', request()->param('id'));

        return $this->fetch();
    }

    /**
     * 新建工作手记
     *
     * @return mixed
     */
    public function new_woke_note()
    {
        return $this->fetch();
    }

    /**
     * 工作手记列表
     *
     * @return mixed
     */
    public function woke_note()
    {
        return $this->fetch();
    }

    /**
     * 新建案件材料
     *
     * @return mixed
     */
    public function new_materials_files()
    {
        return $this->fetch();
    }

    /**
     * 案件材料
     *
     * @return mixed
     */
    public function materials_files()
    {
        return $this->fetch();
    }

    /**
     * 案件材料详情
     *
     * @return mixed
     */
    public function materials_files_detail()
    {
        return $this->fetch();
    }


    /**
     * 案件进程
     *
     * @return mixed
     */
    public function course_case()
    {
        return $this->fetch();
    }

    /**
     * 新建诉讼
     *
     * @return mixed
     */
    public function new_lawsuit()
    {
        return $this->fetch();
    }

}