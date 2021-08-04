<?php

include '../vendor/autoload.php';

$client = new \Csjmapi\client\TopClient([
    'user_id'     => 69330,
    'role_id'     => 69330,
    'securityKey' => '9c713db7a01d968378ac5489defc22b1',
]);

$appServer = $client->getAppServer();
$adServer = $client->getAdServer();
$waterfallFlowServer = $client->getWaterfallFlowServer();

//添加应用到聚合
//$info = $appServer->addApp(50031358);
//查询聚合应用
//$info = $appServer->app();
//查询应用聚合配置
//$info = $appServer->appConf(5154690);
//更新应用聚合配置
/*$info = $appServer->updateAppConf(5154690, [
    'network_app_id' => 113231,
    'network'        => 2
]);*/




print_r($info);