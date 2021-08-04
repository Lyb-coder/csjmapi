<?php


namespace Csjmapi\server;

class AdServer extends BaseServer
{
    /**
     * 批量创建广告位
     * @param $app_id
     * @param array $ad_unit_list
     * @return mixed
     */
    public function BatchAdunit($app_id,$ad_unit_list = []){
        $this->setApi('/union_pangle/open/api/mediation/batch_adunit');

        $this->setParams([
            'app_id' => $app_id,
            'ad_unit_list' => json_encode($ad_unit_list)
        ]);

        $info = $this->send();
        return $info;
    }
    /**
     * 查询广告位
     * @param $app_id
     * @return mixed
     */
    public function adunit($app_id){
        $this->setApi('/union_pangle/open/api/mediation/adunit');

        $this->setParams([
            'app_id' => $app_id
        ]);

        $info = $this->send();
        return $info;
    }
    /**
     * 更新广告位
     * @param $app_id
     * @param array $ad_unit_list
     * @return mixed
     */
    public function updateAdunit($app_id,$ad_unit_id,$ad_unit_name,$status){
        $this->setApi('/union_pangle/open/api/mediation/update_adunit');

        $this->setParams([
            'app_id' => $app_id,
            'ad_unit_id' => $ad_unit_id,
            'ad_unit_name' => $ad_unit_name,
            'status' => $status,
        ]);

        $info = $this->send();
        return $info;
    }
    /**
     * 删除广告位
     * @param $app_id
     * @param array $ad_unit_list
     * @return mixed
     */
    public function deleteAdunit($app_id,$ad_unit_id){
        $this->setApi('/union_pangle/open/api/mediation/delete_adunit');

        $this->setParams([
            'app_id' => $app_id,
            'ad_unit_id' => $ad_unit_id
        ]);

        $info = $this->send();
        return $info;
    }
}