<?php

declare(strict_types=1);

namespace App\Php94\Demo\Http\Admin\Content;

use App\Php94\Admin\Http\Common;
use PHP94\Facade\Db;
use PHP94\Help\Request;
use PHP94\Form\Field\Hidden;
use PHP94\Form\Field\Text;
use PHP94\Form\Field\Textarea;
use PHP94\Form\Form;
use PHP94\Help\Response;

class Update extends Common
{
    public function get()
    {
        $content = Db::get('php94_demo_content', '*', [
            'id' => Request::get('id'),
        ]);
        $form = new Form('编辑内容');
        $form->addItem(
            (new Hidden('id', $content['id'])),
            (new Text('标题', 'title', $content['title'])),
            (new Textarea('内容', 'body', $content['body'])),
        );
        return $form;
    }

    public function post()
    {
        $content = Db::get('php94_demo_content', '*', [
            'id' => Request::post('id'),
        ]);

        Db::update('php94_demo_content', [
            'title' => Request::post('title'),
            'body' => Request::post('body'),
        ], [
            'id' => $content['id'],
        ]);

        return Response::success('操作成功！');
    }
}
