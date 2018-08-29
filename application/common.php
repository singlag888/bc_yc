<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
// 应用公共文件
//function params()
//{
//    $params['realname'] = input('post.name');
//    $params['phone'] = input('post.phone');
//    $params['appkey'] = 'd9890c0773df24c8c86c268538b40534';
//    return $params;
//}
function httpRequest($url, $method = "GET", $postfields = null, $headers = array(), $debug = false)
{
    $method = strtoupper($method);
    $ci = curl_init();
    /* Curl settings */
    curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);//版本
    curl_setopt($ci, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0");//在HTTP请求中包含一个"User-Agent: "头的字符串。
    curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 60); /* 在发起连接前等待的时间，如果设置为0，则无限等待 */
    curl_setopt($ci, CURLOPT_TIMEOUT, 7); /* 设置cURL允许执行的最长秒数 */
    curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);//将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
    switch ($method) {
        case "POST":
            curl_setopt($ci, CURLOPT_POST, true);//启用时会发送一个常规的POST请求，类型为：application/x-www-form-urlencoded，就像表单提交的一样。
            if (!empty($postfields)) {
                $tmpdatastr = is_array($postfields) ? http_build_query($postfields) : $postfields;
                curl_setopt($ci, CURLOPT_POSTFIELDS, $tmpdatastr);
            }
            break;
        default:
            curl_setopt($ci, CURLOPT_CUSTOMREQUEST, $method); /* //设置请求方式 */
            break;
    }
    $ssl = preg_match('/^https:\/\//i', $url) ? TRUE : FALSE;
    curl_setopt($ci, CURLOPT_URL, $url);//需要获取的URL地址，也可以在curl_init()函数中设置
    if ($ssl) {
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
        curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, FALSE); // 不从证书中检查SSL加密算法是否存在
    }
    //curl_setopt($ci, CURLOPT_HEADER, true); /*启用时会将头文件的信息作为数据流输出*/
    curl_setopt($ci, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ci, CURLOPT_MAXREDIRS, 2);/*指定最多的HTTP重定向的数量，这个选项是和CURLOPT_FOLLOWLOCATION一起使用的*/
    curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ci, CURLINFO_HEADER_OUT, true);
    /*curl_setopt($ci, CURLOPT_COOKIE, $Cookiestr); * *COOKIE带过去** */
    $response = curl_exec($ci);
    $requestinfo = curl_getinfo($ci);
    if ($debug) {
        $html = <<<HTML
        <style>
            *{
            margin:0;
            padding:0;
            font-family: "微软雅黑 Light";
            color:#777; 
            }
            body{
            padding:10px;
            }
            h1{
            border:1px solid #CCCCCC;
            height: 40px;
            line-height: 40px;
            font-size: 20px;
            border-radius: 5px;
            text-align: center;
            background: #F5F5F5;
            }
            div.box{
                padding:10px 0;
            }
            div.line{
            height: 30px;
            line-height: 30px;
            border-bottom: 1px dashed #ccc;
            overflow: auto;
            }
            div.line:hover{
             background: #EEEEEE;;
             }
            span.title{
            display: inline-block;
            width:300px;
            height: 100%;
            }
            span.key{
            color:red;
            display: inline-block;
            width:200px;
            height: 100%;
            }
        </style>
        <h1>PostData</h1>
        <div class="box">
HTML;
        $i = 1;
        foreach ($postfields as $key => $value) {
            $html .= " <div class=\"line\"><span class='key'>{$i}</span><span class=\"title\">{$key}:</span> <span>{$value}</span></div>";
            $i++;
        }
        $html .= <<<HTML
        </div>
        <h1>Info</h1>
            <div class="box">
HTML;
        $i = 1;
        foreach ($requestinfo as $kye => $value) {
            if (is_array($value)) continue;
            $html .= " <div class=\"line\"><span class='key'>{$i}</span><span class=\"title\">{$kye}:</span> <span>{$value}</span></div>";
            $i++;
        }
        $html .= <<<HTML
            </div>
        <h1>Response</h1>
        <div class="box">
            {$response}
        </div>
<div>
HTML;
        $html .= <<<HTML
</div>
HTML;
        echo $html;
    }
    curl_close($ci);
    return $response;
}
//curl
function wx_http_request($url, $params, $body = "", $isPost = false, $isImage = false)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url . "?" . http_build_query($params));
    if ($isPost) {
        if ($isImage) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: multipart/form-data;',
                    "Content-Length: " . strlen($body)
                )
            );
        } else {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: text/plain'
                )
            );
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}