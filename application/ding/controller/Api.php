<?php

namespace app\ding\controller;

use app\common\model\CaseModel;
use think\Db;

/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/2/23
 * Time: 17:13
 */
class Api
{
    protected $ret = [
        'code' => 0,
        'msg' => ''
    ];
    protected $token = '';
    protected $user_id = '';
    protected $user_info = '';
    protected $code = '';

    /**
     * Api constructor.
     */
    public function __construct()
    {
        $code = request()->param('code');
        if (empty($code)) {
            return $this->ret['msg'] = '没有登陆';
        }
        $dingAuth = new \dingtalk\api\Auth();
        $this->token = $dingAuth->getAccessToken();
        $data = $this->get_user_info($code);

        if ($data == false) {
            return $this->ret['msg'] = '请求错误';
        }
        $this->user_id = $data->userid;
        $this->user_info = $data;
    }

    public function get_user_info($code)
    {
        $dingUser = new \dingtalk\api\User();
        $user = $dingUser->getUserInfo($this->token, $code);

        if ($user->errcode != 0) {
            return false;
        }

        $user_info = $dingUser->get($this->token, $user->userid);
        if ($user_info->errcode != 0) {
            return false;
        }

        return $user_info;
    }

    public function test()
    {
        return json(['tt' => $this->user_info]);
    }

    /**
     * 添加案件
     *
     * @return \think\response\Json
     */
    public function add_case()
    {
        $data = request()->post();

        if ($data) {
            $rel_data = [
                'userid' => $this->user_id,
                'case_id' => $data['case_source'],//案件
                'type' => $data['type'],//类型
                'mandator' => $data['mandator'],//委托人
                'phone' => $data['phone'],//联系方式
                //                    'identity'        => $data['identity'],//身份 1-犯罪嫌疑人/被告 2-被害人
                //                    'crime'           => $data['crime'],//罪名,
                'user_ids' => $data['user_ids'],//委托律师
                'money' => $data['money'],//收费金额
                'm_status' => $data['m_status'], //1-一次付清 2-其它
                'remake' => $data['remake'],//备注
                'involve' => $data['involve'],// 1-涉及国家安全 2-涉及公共利益 3-涉及其他案外干扰因素
                'involve_content' => $data['involve_content'],//涉及备注
                'appoint' => $data['appoint'],//约定
                'appoint_content' => $data['appoint_content'],//约定
                'create_time' => date('Y-m-d H:i:s', time())
            ];
            $num = Db::name('case')->where(['type' => $data['type']])->count();

            switch ($data['type']) {
                case '0': //刑事案件
                    $rel_data['identity'] = $data['identity'];//身份 1-犯罪嫌疑人/被告 2-被害人
                    $rel_data['crime'] = $data['crime'];//罪名
                    $rel_data['case_num'] = date('Y', time()) . 'XS' . ($num + 100000);
                    $rel_data['case_status'] = $data['case_status'];//合同期限 0-未知 1-侦察终结 2-移送审查起诉 3-一审终结 4-二审终结 5-申诉/再审终结 6-执行终结7-再审终结

                    break;
                case '1'://民事案件
                    $rel_data['reason'] = $data['reason'];//案由
                    $rel_data['case_num'] = date('Y', time()) . 'MS' . ($num + 100000);
                    $rel_data['case_status'] = $data['case_status'];
                    break;
                case '2'://行政案件
                    $rel_data['crime'] = $data['crime'];//罪名
                    $rel_data['opposite'] = $data['opposite'];//对方当事人姓名/名称
                    $rel_data['identity'] = $data['identity'];//身份 1-犯罪嫌疑人/被告 2-被害人
                    $rel_data['reason'] = $data['reason'];//案由
                    $rel_data['case_num'] = date('Y', time()) . 'XZ' . ($num + 100000);
                    $rel_data['case_status'] = $data['case_status'];
                    break;
                case '3'://法律顾问
                    $rel_data['start_time'] = $data['start_time'];
                    $rel_data['end_time'] = $data['end_time'];
                    $rel_data['case_num'] = date('Y', time()) . 'FSGW' . ($num + 100000);
                    $rel_data['crime'] = $data['crime'];//罪名
                    break;
                case '4'://单项法律顾问
                    $rel_data['commitment'] = $data['commitment'];//委托事项
                    $rel_data['case_num'] = date('Y', time()) . 'FSDX' . ($num + 100000);
                    $rel_data['crime'] = $data['crime'];//罪名
                    break;
                case '5'://仲裁案件
                    $rel_data['opposite'] = $data['opposite'];//对方当事人姓名/名称
                    $rel_data['reason'] = $data['reason'];//案由
                    $rel_data['case_num'] = date('Y', time()) . 'FSZC' . ($num + 100000);
                    $rel_data['case_status'] = $data['case_status'];
                    break;
                default:
                    $this->ret['msg'] = '类型错误';

                    return json($this->ret);
                    break;
            }

            $case_id = Db::name('case')->insertGetId($rel_data);
            if ($case_id) {
                //发送消息
                $message = new Message();
                $opt = [];
                $opt['touser'] = '162115220838174179';//141622563826067052 李亚桐
                if ($data['involve'] != null || $data['appoint'] != "0") {
                    $opt['touser'] = '135331244821362564|141622563826067052|162115220838174179'; //162115220838174179盛欣悦
                }
                $opt['toparty'] = '';
                $opt['agentid'] = '162800495';
                $opt['msgtype'] = 'link';
                $opt['link'] = [
                    'messageUrl' => url('manage_case/info_case@dt.julongjinrong.top', 'id=' . $case_id),
                    'picUrl' => '',
                    'title' => '收案填报消息',
                    'text' => '有来自于' . $this->user_info->name . '新的审批消息'
                ];

                $message->send_message($opt);

                $this->ret['code'] = 1;
                $this->ret['msg'] = '成功';
            } else {
                $this->ret['msg'] = '失败';
            }
        } else {
            $this->ret['msg'] = 0;
        }

        return json($this->ret);
    }

    /**
     * 案件列表
     *
     * @return \think\response\Json
     */
    public function case_list()
    {
        $data = request()->param();

        $where = [];
        if (!empty($data['keyword'])) {
            $where['name'] = [''];
        }
        $list = model('CaseModel')->where($where)->order('create_time desc')->select();
        if ($list) {
            $this->ret['code'] = 1;
            $this->ret['msg'] = '成功';
            $this->ret['data'] = $list;
        } else {
            $this->ret['msg'] = '失败';
        }

        return json($this->ret);
    }

    /**
     * 案件详情
     *
     * @return \think\response\Json
     */
    public function case_info()
    {
        $id = request()->param('id');

        $where = ['id' => $id];
        $info = model('CaseModel')->where($where)->find();
        $info['lawsuit'] = Db::name('lawsuit')->where(['case_id' => $id])->find();
        if ($info) {
            $this->ret['code'] = 1;
            $this->ret['msg'] = '成功';
            $this->ret['data'] = $info;
        } else {
            $this->ret['msg'] = '失败';
        }

        return json($this->ret);
    }

    /**
     * 同意拒绝
     *
     * @return \think\response\Json
     */
    public function is_case()
    {
        $data = request()->param();
        if (!$data['id']) {
            $this->ret['msg'] = '缺少id';

            return json($this->ret);
        }
        if (!$data['is_true']) {
            $this->ret['msg'] = '缺少参数is_true';

            return json($this->ret);
        }
        if ($data['is_true'] == 1) {
            $ret = Db::name('case')->where(['id' => $data['id']])->update(['audit' => 1]);
            $strmsg = '已通过';
        } else if ($data['is_true'] == 2) {
            $ret = Db::name('case')->where(['id' => $data['id']])->update(['audit' => 2]);
            $strmsg = '已拒绝';
        } else {
            $ret = false;
        }
        if ($ret == true) {
            //发送通知
            $case_info = Db::name('case')->where(['id' => $data['id']])->find();
            //发送消息
            $message = new Message();
            $opt = [];
            $opt['touser'] = $case_info['userid'];
            $opt['toparty'] = '';
            $opt['agentid'] = '162800495';
            $opt['msgtype'] = 'link';
            $opt['link'] = [
                'messageUrl' => url('manage_case/info_case@dt.julongjinrong.top', 'id=' . $data['id']),
                'picUrl' => '',
                'title' => '收案填报消息',
                'text' => '你的收案' . $strmsg
            ];

            $message->send_message($opt);


            $this->ret['code'] = 1;
            $this->ret['msg'] = '成功';
        } else {
            $this->ret['msg'] = '失败';
        }

        return json($this->ret);
    }

    /**
     * 添加诉讼
     *
     * @return \think\response\Json
     */
    public function add_lawsuit()
    {
        $data = request()->param();

        $re_data = [
            'opposite_name' => $data['opposite_name'],
            'hear_court' => $data['hear_court'],
            'case_intro' => $data['case_intro'],
            'spy_office' => $data['spy_office'],
            'inspect_office' => $data['inspect_office']
        ];

        $info = Db::name('lawsuit')->where(['case_id' => $data['case_id']])->select();
        if (!empty($info)) {
            $result = Db::name('lawsuit')->where(['case_id' => $data['case_id']])->update($re_data);
        } else {
            $re_data['case_id'] = $data['case_id'];
            $result = Db::name('lawsuit')->insert($re_data);
        }

        if ($result) {
            $this->ret['code'] = 1;
            $this->ret['msg'] = '成功';
            $this->ret['data'] = $info;
        } else {
            $this->ret['msg'] = '失败';
        }

        return json($this->ret);
    }

    /**
     * 添加工作手记
     * @return \think\response\Json
     */
    function add_woke_note()
    {
        $data = request()->param();

        $re_data = [
            'case_id' => $data['case_id'],
            'title' => $data['title'],
            'content' => $data['content'],
            'address' => $data['address'],
            'images' => $data['images'],
            'user_id' => $this->user_id,
            'create_time' => DATE
        ];

        $image_ids = '';
        //判断图片
        if (is_array($data['images'])) {
            foreach ($data['images'] as $v) {
                $img_data = [
                    'cid' => $data['case_id'],
                    'image_url' => $v,
                    'type' => 1,
                    'create_time' => DATE
                ];
                $image_id = Db::name('image')->insertGetId($img_data);
                $image_ids .= $image_id . ',';
            }
            $image_ids = rtrim($image_ids, ',');
        } else {
            $img_data = [
                'cid' => $data['case_id'],
                'image_url' => $data['images'],
                'type' => 1,
                'create_time' => DATE
            ];
            $image_ids = Db::name('image')->insertGetId($img_data);

        }
        $re_data['images'] = $image_ids;


        $result = Db::name('woke_note')->insert($re_data);
        if ($result) {
            $this->ret['code'] = 1;
            $this->ret['msg'] = '成功';
        } else {
            $this->ret['msg'] = '失败';
        }
        return json($this->ret);
    }

    /**
     * 获取工作手记列表
     *
     * @return \think\response\Json
     */
    public function woke_note_list()
    {
        $data = request()->get();

        $list = Db::name('woke_note')
            ->where([])
            ->order('create_time desc')
            ->select();

        if (!empty($list)) {
            foreach ($list as $k => $v) {
                $urls = Db::name('image')
                    ->where(['id' => ['in', $v['images']]])
                    ->column('image_url');
                $list[$k]['image_url'] = $urls;
            }

            $this->ret['code'] = 1;
            $this->ret['msg'] = '成功';
            $this->ret['data'] = $list;
        } else {
            $this->ret['msg'] = '失败';
        }
        return json($this->ret);
    }

    /**
     * 添加案件材料
     *
     * @return \think\response\Json
     */
    public function add_materials_files()
    {
        $data = request()->post();
        $re_data = [
            'case_id' => $data['case_id'],
            'user_id' => $this->user_id,
            'title' => $data['title'],
            'remake' => $data['remake'],
            'create_time' => DATE
        ];
        $img_ids = '';
        if(array_key_exists('images',$data) && !empty($data['images'])){
            $img_ids = $this->upImageUrl($data['images'], 2, $data['case_id']);
        }
        $re_data['images'] = $img_ids;
        $result = Db::name('materials_files')->insert($re_data);
        if ($result) {
            $this->ret['code'] = 1;
            $this->ret['msg'] = '成功';
        } else {
            $this->ret['msg'] = '失败';
        }
        return json($this->ret);
    }

    /**
     * 获取案件材料列表
     *
     * @return \think\response\Json
     */
    public function materials_files_list()
    {
        $case_id = request()->get('case_id');

        $list = Db::name('materials_files')
            ->where(['case_id'=>$case_id])
            ->order('create_time desc')
            ->select();

        if (!empty($list)) {
            foreach ($list as $k => $v) {
                $urls = Db::name('image')
                    ->where(['id' => ['in', $v['images']]])
                    ->column('image_url');
                $list[$k]['image_url'] = $urls;
            }

            $this->ret['code'] = 1;
            $this->ret['msg'] = '成功';
            $this->ret['data'] = $list;
        } else {
            $this->ret['msg'] = '失败';
        }
        return json($this->ret);
    }

    /**
     * 获取材料详情
     *
     * @return \think\response\Json
     */
    public function materials_files_detail()
    {
        $fm_id = request()->get('fm_id');//材料id

        $info = Db::name('materials_files')
            ->where(['id' => $fm_id])
            ->order('create_time desc')
            ->find();

        if (!empty($info)) {
            $urls = Db::name('image')
                ->where(['id' => ['in', $info['images']]])
                ->column('image_url');
            $info['image_url'] = $urls;

            $this->ret['code'] = 1;
            $this->ret['msg'] = '成功';
            $this->ret['data'] = $info;
        } else {
            $this->ret['msg'] = '失败';
        }
        return json($this->ret);
    }

    /**
     * 存储图片地址
     *
     * @param $images
     * @param $type
     * @param $case_id
     * @return int|string
     */
    public function upImageUrl($images, $type, $case_id)
    {
        $image_ids = '';
        //判断图片
        if (is_array($images)) {
            foreach ($images as $v) {
                $img_data = [
                    'cid' => $case_id,
                    'image_url' => $v,
                    'type' => $type,
                    'create_time' => DATE
                ];
                $image_id = Db::name('image')->insertGetId($img_data);
                $image_ids .= $image_id . ',';
            }
            $image_ids = rtrim($image_ids, ',');
        } else {
            $img_data = [
                'cid' => $case_id,
                'image_url' => $images,
                'type' => 1,
                'create_time' => DATE
            ];
            $image_ids = Db::name('image')->insertGetId($img_data);
        }

        return $image_ids;
    }

    /**
     * 新建案件进程
     *
     * @return \think\response\Json
     */
    public function new_case_process()
    {
        $data = request()->param();
        $re_data = [
            'case_id' => $data['case_id'],
            'title' => $data['title'],
            'content' => $data['content'],
            'submit_time' => $data['submit_time'],
            'create_time' => DATE
        ];
        $result = Db::name('process')->insert($re_data);
        if ($result) {
            $this->ret['code'] = 1;
            $this->ret['msg'] = '成功';
        } else {
            $this->ret['msg'] = '失败';
        }
        return json($this->ret);
    }

    /**
     * 获取案件进程信息
     *
     * @return \think\response\Json
     */
    public function case_process_list()
    {
        $case_id = request()->get('case_id');

        $list = Db::name('process')
            ->where(['case_id' => $case_id])
            ->order('create_time desc')
            ->select();

        if (!empty($list)) {
            $this->ret['code'] = 1;
            $this->ret['msg'] = '成功';
            $this->ret['data'] = $list;
        } else {
            $this->ret['msg'] = '失败';
        }
        return json($this->ret);
    }

}