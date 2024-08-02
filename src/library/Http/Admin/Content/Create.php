<?php

declare(strict_types=1);

namespace App\Php94\Demo\Http\Admin\Content;

use App\Php94\Admin\Http\Common;
use PHP94\Facade\Db;
use PHP94\Help\Request;
use PHP94\Form\Field\Text;
use PHP94\Form\Field\Textarea;
use PHP94\Form\Form;
use PHP94\Help\Response;

class Create extends Common
{
    public function get()
    {
        $form = new Form('添加内容');
        $form->addItem(
            (new Text('标题', 'title')),
            (new Textarea('内容', 'body')),
        );
        return $form;
    }

    public function post()
    {
        Db::insert('php94_demo_content', [
            'title' => Request::post('title'),
            'body' => Request::post('body'),
        ]);
        return Response::success('操作成功！');
    }
}
