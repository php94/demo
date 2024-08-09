<?php

declare(strict_types=1);

namespace App\Php94\Demo\Http\Admin\Content;

use App\Php94\Admin\Http\Common;
use PHP94\Db;
use PHP94\Request;
use PHP94\Template;

class Index extends Common
{
    public function get()
    {
        $data = [];
        $where = [];
        $where['ORDER'] = [
            'id' => 'DESC',
        ];

        $q = Request::get('q');
        if (is_string($q) && strlen($q)) {
            $where['OR'] = [
                'title[~]' => $q,
                'body[~]' => $q,
            ];
        }

        $data['total'] = Db::count('php94_demo_content', $where);
        $data['page'] = Request::get('page', 1) ?: 1;
        $data['size'] = Request::get('size', 20) ?: 20;
        $data['pages'] = ceil($data['total'] / $data['size']) ?: 1;
        $where['LIMIT'] = [($data['page'] - 1) * $data['size'], $data['size']];
        $data['datas'] = Db::select('php94_demo_content', '*', $where);

        return Template::render('admin/content/index@php94/demo', $data);
    }
}
