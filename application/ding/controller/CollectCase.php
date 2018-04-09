<?php
    /**
     * 收案填报
     * User: PC
     * Date: 2018/2/8
     * Time: 23:44
     */

    namespace app\ding\controller;


    class CollectCase extends Base
    {
        /**
         * 收案填报类型
         *
         * @return mixed
         */
        public function index()
        {
            return $this->fetch();
        }

        /**
         * 刑事案件
         *
         * @return mixed
         */
        public function crown_case()
        {
            return $this->fetch();
        }

        /**
         * 民事案件
         *
         * @return mixed
         */
        public function civil_case()
        {
            return $this->fetch();
        }

        /**
         * 行政案件
         *
         * @return mixed
         */
        public function administrative_case()
        {
            return $this->fetch();
        }

        /**
         * 法律顾问案件
         *
         * @return mixed
         */
        public function legal_counsel_case()
        {
            return $this->fetch();
        }

        /**
         * 单项法律事务案件
         *
         * @return mixed
         */
        public function law_affair_case()
        {
            return $this->fetch();
        }

        /**
         * 仲裁案件
         *
         * @return mixed
         */
        public function arbitration_case()
        {
            return $this->fetch();
        }
    }