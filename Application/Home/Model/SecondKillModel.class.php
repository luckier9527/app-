<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Model;

/**
 * Description of SecondKillModel
 *
 * @author qingf
 */
class SecondKillModel extends \Think\Model {

    /**
     * 获取秒杀列表
     * @return type
     * start_time   now_time   end_time
     */
    public function getList() {
        $cond = [
            'start_time' => ['elt', NOW_TIME],
            'end_time'   => ['egt', NOW_TIME],
        ];
        $rows = $this->field('all_price as allPrice,point_price as pointPrice,icon_url as iconUrl,end_time,type,product_id as productId')->where($cond)->select();
        foreach ($rows as $key => $value) {
            $rows[$key]['timeLeft'] = ($value['end_time'] - NOW_TIME)/60;
        }
        return $rows;
    }

}
