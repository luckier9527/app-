<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Model;

/**
 * Description of MemberModel
 *
 * @author qingf
 */
class MemberModel extends \Think\Model{
    //自动完成
    protected $_auto = [
        ['password','md5','login','function'],
    ];
    
    /**
     * 根据用户名密码进行登录验证.
     * @return array|null
     */
    public function login() {
        $member_info = $this->field('id,nickname as userName,user_icon as userIcon,wait_pay_count as waitPayCount,wait_receive_count as waitReceiveCount,user_level as userLevel')->where($this->data)->find();
        if($member_info){
            //将用户数据保存到session中
            session('MEM_INFO',$member_info);
        }
        return $member_info;
    }
}
