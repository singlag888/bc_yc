<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model;

class Category extends Controller
{
    public function index()
    {
        if (Request()->isAjax()) {
            $model = new model\Category();
            $count = $model->count();
            $limit = input('get.limit');
            $page = input('get.page');
            $statr = $limit * ($page - 1);
            $search = input('get.search');
            $data = $model->where('name', "like", "%{$search}%")->limit($statr, $limit)->select();
            $list['msg'] = "";
            $list['count'] = "$count";
            $list['code'] = 0;
            $list['data'] = $data;
            return json($list);
        }

        return $this->fetch('index');
    }

    public function add()
    {
        if (Request()->isPost()) {
            $data['name'] = input('post.name');
            $result = db('category')->insert($data);
            if ($result) {
                return json(['code' => 1]);
            } else {
                return json(['code' => 0]);
            }
        }
        return $this->fetch('add');
    }

    public function edit($id)
    {
        if (Request()->isPost()) {
            $datas['name'] = input('post.name');
            $result = db('category')->where('id', $id)->update($datas);
            if ($result) {
                return json(['code' => 1]);
            } else {
                return json(['code' => 0]);
            }
        }
        $data = db('category')->where('id', $id)->find();
        return $this->fetch('edit', ['data' => $data]);
    }

    public function delete($id)
    {
        if (is_numeric($id)) {
            $model = new model\Category();
            $is_id = $model->where('id', $id)->find();
            $goods = db('goodscz')->where('category_id', $is_id['id'])->select();
            if ($goods) {
                return json(['code' => 3]);
            }
            $res = db('category')->where('id', $id)->delete();
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