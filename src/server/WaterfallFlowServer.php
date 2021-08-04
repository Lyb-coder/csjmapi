<?php


namespace Csjmapi\server;


class WaterfallFlowServer extends BaseServer
{
    /**
     * 批量创建代码位
     * @param $app_id
     * @param array $ad_unit_list
     * @return mixed
     */
    public function batchAdslot($ad_unit_id, $ad_slot_list = [], $experiment_group = null)
    {
        $this->setApi('/union_pangle/open/api/mediation/batch_adslot');

        $pars = [
            'ad_unit_id'   => $ad_unit_id,
            'ad_slot_list' => $ad_slot_list,
        ];
        if ($experiment_group) {
            $pars['experiment_group'] = $experiment_group;
        }
        $this->setParams($pars);

        $info = $this->send();
        return $info;
    }

    /**
     * 查询代码位列表（瀑布流详情）
     * @param $app_id
     * @param array $ad_unit_list
     * @return mixed
     */
    public function waterfallDetail($ad_unit_id, $experiment_group = null)
    {
        $this->setApi('/union_pangle/open/api/mediation/waterfall_detail');

        $pars = [
            'ad_unit_id' => $ad_unit_id,
        ];
        if ($experiment_group) {
            $pars['experiment_group'] = $experiment_group;
        }
        $this->setParams($pars);

        $info = $this->send();
        return $info;
    }

    /**
     * 更新代码位
     * @param $app_id
     * @param array $ad_unit_list
     * @return mixed
     */
    public function updateAdslot($id,
        $ad_unit_id,
        $experiment_group = null,
        $ad_slot_id = null,
        $price = null,
        $sort_type = null,
        $status = null,
        $ad_slot_name = null,
        $origin_type = null)
    {
        $this->setApi('/union_pangle/open/api/mediation/update_adslot');

        $pars = [
            'id'         => $id,
            'ad_unit_id' => $ad_unit_id,
        ];
        if ($experiment_group)
            $pars['experiment_group'] = $experiment_group;
        if ($ad_slot_id)
            $pars['ad_slot_id'] = $ad_slot_id;
        if ($price)
            $pars['price'] = $price;
        if ($sort_type)
            $pars['sort_type'] = $sort_type;
        if ($status)
            $pars['status'] = $status;
        if ($ad_slot_name)
            $pars['ad_slot_name'] = $ad_slot_name;
        if ($origin_type)
            $pars['origin_type'] = $origin_type;

        $this->setParams($pars);

        $info = $this->send();
        return $info;
    }


    /**
     * 删除代码位
     * @param $app_id
     * @param array $ad_unit_list
     * @return mixed
     */
    public function deleteAdslot($id, $ad_unit_id, $experiment_group = null)
    {
        $this->setApi('/union_pangle/open/api/mediation/delete_adslot');

        $pars = [
            'id'         => $id,
            'ad_unit_id' => $ad_unit_id,
        ];
        if ($experiment_group) {
            $pars['experiment_group'] = $experiment_group;
        }
        $this->setParams($pars);

        $info = $this->send();
        return $info;
    }
}