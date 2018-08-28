<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model;
class Goodscz extends Controller
{
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
    public function add(){}
    public function edit(){}
    public function delete(){}
}