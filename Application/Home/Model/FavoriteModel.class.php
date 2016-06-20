<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Model;

/**
 * Description of FavoriteModel
 *
 * @author qingf
 */
class FavoriteModel extends \Think\Model{
    public function getList() {
        return $this->field('price,name,icon_url as iconUrl,product_id as productId')->select();
    }
}
