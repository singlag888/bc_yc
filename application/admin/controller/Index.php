<?php

namespace app\admin\controller;

use app\admin\model;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch('index');
    }

    public function zm()
    {
        return $this->fetch('zm');
    }

    public function _empty()
    {
        echo "<h1>Not Found (#404)</h1>

    <div class=\"alert alert-danger\">
        Page not found.    </div>
    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>";
    }
}