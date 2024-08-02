<?php

declare(strict_types=1);

namespace App\Php94\Demo\Http\Home;

use PHP94\Facade\Db;

class Index extends Common
{
    public function get()
    {
        $count = Db::count('php94_demo_content');
        return 'hello world 后台一共录入了' . $count . '篇内容';
    }
}
