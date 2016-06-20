<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Model;

/**
 * Description of BannerModel
 *
 * @author qingf
 */
class BannerModel extends \Think\Model{
    /**
     * 获取指定类型的banner列表
     */
    public function getListByAdKind($ad_kind=2) {
        return $this->field('id,type,ad_url as adUrl,web_url as webUrl,ad_kind as adKind')->where(['ad_kind'=>$ad_kind])->select();
    }
}
