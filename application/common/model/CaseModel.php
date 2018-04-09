<?php

    namespace app\common\model;

    use think\Model;

    /**
     * 会员模型
     */
    class CaseModel Extends Model
    {
        protected $table = 'ding_case';
        /**
         * 获取案件类型
         *
         * @param   string $value
         * @param   array  $data
         *
         * @return string
         */
        public function getTypeAttr($value, $data)
        {
            $status = [
                '0' => '刑事案件',
                '1' => '民事案件',
                '2' => '行政案件',
                '3' => '法律顾问',
                '4' => '单项法律顾问',
                '5' => '仲裁案件'
            ];

            return $status[ $value ];
        }

        /**
         *
         *
         * @param $value
         * @param $data
         * @return mixed
         */
        public function getIdentityAttr($value, $data)
        {
            $status = [
                '0' => '未知',
                '1' => '犯罪嫌疑人/被告',
                '2' => '被害人'
            ];

            return $status[ $value ];
        }

        /**
         * 获取案件状态
         * 0-未知 1-侦察终结 2-移送审查起诉 3-一审终结 4-二审终结 5-申诉/再审终结 6-执行终结7-再审终结
         *
         * @param   string $value
         * @param   array  $data
         *
         * @return string
         */
        public function getCaseStatusAttr($value, $data)
        {
            $status = [
                '0' => '未知',
                '1' => '侦察终结',
                '2' => '移送审查起诉',
                '3' => '一审终结',
                '4' => '二审终结',
                '5' => '申诉/再审终结 ',
                '6' => '执行终结',
                '7' => '再审终结 '
            ];

            return $status[ $value ];
        }
    }
