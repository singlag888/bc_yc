<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model;
use think\Request;

class Goodscz extends Controller
{
    const app_id = '1';

    public function index()
    {
        if (Request()->isAjax()) {
            $model = new model\Goodscz();
            $limit = input('get.limit');
            $page = input('get.page');
            $statr = $limit * ($page - 1);
            $search = input('get.search');
            $data = $model->where('name', "like", "%{$search}%")->limit($statr, $limit)->select();
            $list['msg'] = "";
            $list['code'] = 0;
            $list['data'] = $data;
            return json($list);
        }
        return $this->fetch('index');
    }

    public function add()
    {
        if (Request()->isPost()) {
            $arr = array(
                'name' => input('post.name'),
                'category_id' => input('post.category_id'),
                'url_code' => input('post.url_code'),
            );
            $Model = new model\Goodscz();
            $result = $Model->insert($arr);
            if ($result) {
                return json(['code' => 1]);
            } else {
                return json(['code' => 0]);
            }
        }
        $data = db('category')->select();
        return $this->fetch('add', ['data' => $data]);
    }

    public function edit($id)
    {
        if (is_numeric($id)) {
            $arr = array(
                'name' => input('post.name'),
                'category_id' => input('post.category_id'),
                'url_code' => input('post.url_code'),
            );
            $result = db('goodscz')->where('id', $id)->update($arr);
            if ($result) {
                return json(['code' => 1]);
            } else {
                return json(['code' => 0]);
            }
        }

    }

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