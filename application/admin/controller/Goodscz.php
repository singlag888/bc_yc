<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model;
use think\Db;
use think\Request;

class Goodscz extends Controller
{
    const app_id = '1';

    public function index()
    {
        if (Request()->isAjax()) {
            $model = new model\Goods();
            $limit = input('get.limit');
            $page = input('get.page');
            $statr = $limit * ($page - 1);
            $search = input('get.search');
            $count = $model->count();
            $data = $model->where('name', "like", "%{$search}%")->limit($statr, $limit)->select();
            $list['msg'] = "";
            $list['count'] = $count;
            $list['code'] = 0;
            $list['data'] = $data;
            // var_dump($list);die;
            return json($list);
        }
        return $this->fetch('index');
    }

    public function add()
    {
        if (Request()->isPost()) {
            $Model = new model\Goods();
            $number = input('post.number');
            if ($number >= 101) {
                return json(['code' => 10]);//不能大于101
            } else if ($number == 0) {
                return json(['code' => 11]);//不能小于0
            }
            $arr = cz();
            $data = array();
            for ($i = 0; $i < $number; $i++) {
                $data[$i]['name'] = $arr[$i];
            }
            is_api();
            $url_code = input('post.url_code');
            $start_s = input('post.start_s');;
            $category_id = input('post.category_id');;
            $inser_data = array();

            foreach ($data as $j => $datum) {

                $inserts['name'] = $inser_data[]['name'] = $datum['name'];
                $inserts['start_s'] = $inser_data[$j]['start_s'] = $start_s;
                $inserts['url_code'] = $inser_data[$j]['url_code'] = $url_code;
                $inserts['category_id'] = $inser_data[$j]['category_id'] = $category_id;
                $Model->insert($inserts);
                $goods_id['goods_id'] = db('goods')->getLastInsID();
                //获取所有Goods_id 存入中间表
                $zhData = [];
                $goods_j_id = Db::table('goods_j')->field('id')->select();
                foreach ($goods_j_id as $z => $value) {
                    //db('zj')->where('goods_j_id', 0)->update(['goods_j_id' => $value['id']]);
                    $zhData[$z] = [
                        'goods_id' => $goods_id['goods_id'],
                        'goods_j_id' => $value['id'],
                    ];
                }
                db('zj')->insertAll($zhData);
                //  $sql = Db::table('goods_j_id')->getLastSql();
                // var_dump($sql);
            }die;

//            $Model->insertAll($inser_data);

            // $goods_id_j = db('zj')->where()
//            if ($result) {
//                return json(['code' => 1]);
//            } else {
//                return json(['code' => 0]);
//            }
        }
        $data = db('good_category')->select();
        return $this->fetch('add', ['data' => $data]);
    }

//    public function edit($id)
//    {
//        //   $str = '6228480402564890018';
////        preg_match('/([\d]{2})([\d]{2})([\d]{2})([\d]{2})([\d]{0,})?/', $mt_code,$match);
////
////        unset($match[0]);
////        echo implode(' ', $match);
//        if (is_numeric($id)) {
//            $arr = array(
//                'name' => input('post.name'),
//                'category_id' => input('post.category_id'),
//                'url_code' => input('post.url_code'),
//            );
//            $result = db('goodscz')->where('id', $id)->update($arr);
//            if ($result) {
//                return json(['code' => 1]);
//            } else {
//                return json(['code' => 0]);
//            }
//        }
//
//    }

    public function delete($id)
    {
        if (is_numeric($id)) {
            $res = db('goodscz')->where('id', $id)->delete();
            if ($res) {
                return json(['code' => 1]);
            } else {
                return json(['code' => 2]);
            }
        } else {
            return json(['code' => 0]);
        }
    }


}