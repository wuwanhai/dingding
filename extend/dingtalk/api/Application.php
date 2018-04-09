<?php
namespace dingtalk\api;
require_once(__DIR__ . "/../util/Http.php");

class Application
{
    private $http;
    public function __construct() {
        $this->http = new \Http();
    }


    /**
     * 获取应用列表
     * @param $accessToken
     * @return mixed
     */
    public function applicationList($accessToken, $chatOpt)
    {
        $response = $this->http->post("/microapp/list",
            array("access_token" => $accessToken),
            json_encode($chatOpt));
        return $response;
    }
}