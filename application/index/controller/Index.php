<?php

namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
    }
//
    public function ces($goods_id, $catygor_id)
    {
        $where['g.id'] = $goods_id;
        $db = Db('goods')
            ->alias('g')
            ->join('zj z', 'g.id=z.goods_id', 'LEFT')
            ->join('goods_j j', 'j.id=z.goods_j_id', 'LEFT')
            ->field('g.id,g.name,g.url_code,z.id as z_id,j.qs,j.number,j.rand_code,j.is_yes')
            ->where($where)
            ->select();
        $i = "";
        $c = "";
        foreach ($db as $ke => $value) {
            //计算
            if ($value['is_yes'] == 1) {
                $arr[] = ++$i;
                $c = 0;//归零

            } else {
                $i = 0;//归零
                $arr_c[] = ++$c;
            }
        }
        //当前连对
        $lx_D = $i;
        //最大正确连续次数
        $max = max($arr);
        //最大连续错误
        $max_c = max($arr_c);

    }


//uid	用户ID	GET	必填	1057123
//token	通信令牌	GET	必填	16c60ff5ac9acc7c715fff30d8cba796619bcb33
//http://api.caipiaokong.cn/lottery/?name=cqssc&format=json&uid=1057123&token=16c60ff5ac9acc7c715fff30d8cba796619bcb33
//bjpks
    public function add()
    {
        //根据分类展示所有的商品
        //  $category = db('category')->select();
        //$data =array();
        //  foreach ($category as $ke=>$value){
        //     $category[$ke]['goodsdata'] = db('goodscz')->where('category_id',$value['id'])->select();
        //   }
        //   var_dump($category);

        //       return json(['catygory'=>$catygory]);
        // var_dump($catygory);
//        $arr = array();
//        foreach ($catygory as $ke => $c) {
//            $arr[$ke]['name'] =$c['name'];
//            $arr[$ke]['id'] = $c['id'];
//
//        }
//    var_dump($arr);


//        $params['name']   = 'bjpks';
//        $params['format'] = 'json';
//        $params['uid'] = '1057123';
//        $params['token'] = '16c60ff5ac9acc7c715fff30d8cba796619bcb33';
//        $params['phone'] = input('post.phone');
//        $params['appkey'] = 'd9890c0773df24c8c86c268538b40534';
//        $result = wx_http_request('http://api.caipiaokong.cn/lottery/', $params);
//        var_dump($result);
//        $data = json_decode($result);
//        $arr = array();
//        foreach ($data as $ke => $v) {
//            $arr[$ke]['number'] = $v->number;
//            $arr[$ke]['dateline'] = $v->dateline;
//            $arr[$ke]['qs'] = $ke;
//        }

        //  db('goods_details')->insert($arr);
    }
}
