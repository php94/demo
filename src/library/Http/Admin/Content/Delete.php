<?php

declare(strict_types=1);

namespace App\Php94\Demo\Http\Admin\Content;

use App\Php94\Admin\Http\Common;
use PHP94\Db;
use PHP94\Request;
use PHP94\Response;

class Delete extends Common
{
    public function get()
    {
        Db::delete('php94_demo_content', [
            'id' => Request::get('id'),
        ]);
        return Response::success('操作成功！');
    }
}
