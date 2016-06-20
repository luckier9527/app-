<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller {

    public function index() {
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>', 'utf-8');
    }

    /**
     * 用户登录.
     * @param type $username
     * @param type $pwd
     */
    public function login($username, $pwd) {
        $model       = D('Member');
        $data        = [
            'username' => $username, 'password' => $pwd
        ];
        $model->create($data, 'login');
        if (($member_info = $model->login()) !== false) {
            $data = [
                'success'  => true,
                'errorMsg' => '',
                'result'   => $member_info,
            ];
        } else {
            $data = [
                'success'  => false,
                'errorMsg' => $model->getError(),
                'result'   => [],
            ];
        }
        $this->ajaxReturn($data);
    }

    /**
     * 获取banner列表
     * @param type $adKind
     */
    public function banner($adKind) {
        $model = D('Banner');
        $list  = $model->getListByAdKind($adKind);
        if ($list !== false) {
            foreach ($list as $key => $value) {
                $value['id']     = (int) $value['id'];
                $value['type']   = (int) $value['type'];
                $value['adKind'] = (int) $value['adKind'];
                $list[$key]      = $value;
            }
            $data = [
                'success'  => true,
                'errorMsg' => '',
                'result'   => $list,
            ];
        } else {
            $data = [
                'success'  => false,
                'errorMsg' => $model->getError(),
                'result'   => [],
            ];
        }
        $this->ajaxReturn($data);
    }

    /**
     * 获取秒杀列表
     */
    public function seckill() {
        $model = D('SecondKill');
        $list  = $model->getList();
        if ($list !== false) {
            foreach ($list as $key => $value) {
                $value['timeLeft']     = (int) $value['timeLeft'];
                $value['type']   = (int) $value['type'];
                $value['productId'] = (int) $value['productId'];
                $list[$key]      = $value;
            }
            $data = [
                'success'  => true,
                'errorMsg' => '',
                'result'   => [
                    'total' => count($list),
                    'rows'  => $list
                ],
            ];
        } else {
            $data = [
                'success'  => false,
                'errorMsg' => $model->getError(),
                'result'   => [],
            ];
        }
        $this->ajaxReturn($data);
    }

    /**
     * 猜你喜欢.
     */
    public function getYourFav() {
        $model = D('Favorite');
        $list  = $model->getList();
        if ($list !== false) {
            foreach ($list as $key => $value) {
                $value['productId'] = (int) $value['productId'];
                $list[$key]      = $value;
            }
            $data = [
                'success'  => true,
                'errorMsg' => '',
                'result'   => [
                    'total' => count($list),
                    'rows'  => $list
                ],
            ];
        } else {
            $data = [
                'success'  => false,
                'errorMsg' => $model->getError(),
                'result'   => [],
            ];
        }

        $this->ajaxReturn($data);
    }

}
