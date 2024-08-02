{include common/header@php94/admin}
<h1 class="py-3">内容管理</h1>

<div class="d-flex flex-column gap-3">
    <div>
        <a class="btn btn-primary" href="{echo $router->build('/php94/demo/admin/content/create')}">创建内容</a>
    </div>

    <div>
        <form class="row g-3 align-items-center" action="{echo $router->build('/php94/demo/admin/content/index')}" method="GET">
            <div class="col-auto">
                <div class="input-group">
                    <div class="input-group-text">搜索:</div>
                    <input type="search" name="q" value="{:$request->get('q')}" onchange="this.form.submit();" class="form-control" placeholder="请输入关键词..">
                </div>
            </div>
            <div class="col-auto">
                <input type="hidden" name="page" value="1">
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered mb-0 d-table-cell">
            <thead>
                <tr>
                    <th>#</th>
                    <th>标题</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                {foreach $datas as $v}
                <tr>
                    <td>{$v.id}</td>
                    <td class="text-nowrap">{$v.title}</td>
                    <td class="text-nowrap">
                        <a href="{echo $router->build('/php94/demo/admin/content/update', ['id'=>$v['id']])}">编辑</a>
                        <a href="{echo $router->build('/php94/demo/admin/content/delete', ['id'=>$v['id']])}" onclick="return confirm('确定删除吗？删除后不可恢复！');">删除</a>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

    <div class="d-flex align-items-center flex-wrap gap-1">
        <a class="btn btn-primary {$page>1?'':'disabled'}" href="{echo $router->build('/php94/demo/admin/content/index', array_merge($_GET, ['page'=>1]))}">首页</a>
        <a class="btn btn-primary {$page>1?'':'disabled'}" href="{echo $router->build('/php94/demo/admin/content/index', array_merge($_GET, ['page'=>max($page-1, 1)]))}">上一页</a>
        <div class="d-flex align-items-center gap-1">
            <input class="form-control" type="number" name="page" min="1" max="{$pages}" value="{$page}" onchange="location.href=this.dataset.url.replace('__PAGE__', this.value)" data-url="{echo $router->build('/php94/demo/admin/content/index', array_merge($_GET, ['page'=>'__PAGE__']))}">
            <span>/{$pages}</span>
        </div>
        <a class="btn btn-primary {$page<$pages?'':'disabled'}" href="{echo $router->build('/php94/demo/admin/content/index', array_merge($_GET, ['page'=>min($page+1, $pages)]))}">下一页</a>
        <a class="btn btn-primary {$page<$pages?'':'disabled'}" href="{echo $router->build('/php94/demo/admin/content/index', array_merge($_GET, ['page'=>$pages]))}">末页</a>
        <div>共{$total}条</div>
    </div>
</div>
{include common/footer@php94/admin}