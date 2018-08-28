<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model;

class User extends Controller
{
    public function index()
    {
        if (Request()->isAjax()) {
            $model = new model\User();
            $limit = input('get.limit');
            $page = input('get.page');
            $statr = $limit * ($page - 1);
            $search = input('get.search');
            $data = $model->where('username',"like","%{$search}%")->limit($statr,$limit)->select();

            $list['msg'] = "";
            $list['code'] = 0;
            $list['data'] = $data;
            return json($list);
        }

        return $this->fetch('index');
    }

}