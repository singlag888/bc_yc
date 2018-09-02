<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model;

class Admin extends Controller
{
    public function index()
    {
        if (Request()->isAjax()) {
            $model = new model\Admin();
            $limit = input('get.limit');
            $page = input('get.page');
            $statr = $limit * ($page - 1);
            $search = input('get.search');
            $data = $model->where('username', "like", "%{$search}%")->limit($statr, $limit)->select();
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
            $data = array(
                'username' => input('post.username'),
                'pwd' => md5(md5(input('post.username'))),
                'name' => input('post.name'),
                'add_time' => date('Y-m-d H:i:s', time()),
            );
            $result = db('admin')->insert($data);
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
            $datas = array(
                'username' => input('post.username'),
                'pwd' => md5(md5(input('post.username'))),
                'name' => input('post.name'),
            );
            $result = db('admin')->where('id', $id)->update($datas);
            if ($result) {
                return json(['code' => 1]);
            } else {
                return json(['code' => 0]);
            }
        }
        $data = db('admin')->where('id', $id)->find();
        return $this->fetch('edit', ['data' => $data]);
    }

    public function delete($id)
    {
        if (is_numeric($id)) {
            $res = db('admin')->where('id', $id)->delete();
            if ($res) {
                return json(['code' => 1]);
            } else {
                return json(['code' => 2]);
            }
        } else {
            return json(['code' => 0]);
        }
    }

    public function rand_cz()
    {
        $id = input('get.id');
        if ($id >= 101) {
            echo die('数量过大');
        } else if ($id == 0) {
            echo die('必须大于0');
        }
        $arr = cz();
        $data = array();
        for ($i = 0; $i < $id; ++$i) {
            $data[$i]['name'] = $arr[$i];

        }
        foreach ($data as $datum){
            db('goodsname')->insert($datum);
        }
       // var_dump($data);
    }
}