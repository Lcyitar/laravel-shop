<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('商品类目列表')
            ->description('商品类目练习 - lcyitar')
            ->body($this->grid());
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑商品类目')
            ->body($this->form(true)->edit($id));
    }

    public function create(Content $content)
    {
        return $content
            ->header('创建商品类目')
            ->body($this->form(false));
    }


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category);

        $grid->id('Id')->sortable();
        $grid->name('名称');
        $grid->level('层级');
        $grid->is_directory('是否目录')->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->path('类目路径');
        $grid->actions(function ($action) {
            // 不展示 Laravel-Admin 默认的查看按钮
            $action->disableView();
        });
        $grid->created_at('创建时间');

        return $grid;
    }


    /**
     * Make a form builder.
     *
     * @param $isEditing
     * @return Form
     */
    protected function form($isEditing = false)
    {
        $form = new Form(new Category);

        $form->text('name', '类目名称')->rules('required');

        if ($isEditing) {
            // 不允许用户修改『是否目录』和『夫类目』字段的值
            // 用 dispaly() 方法来展示值
            $form->display('is_directory', '是否目录')->with(function ($value) {
                return $value ? '是' : '否';
            });
            // 支持用符号，来展示关联关系的字段
            $form->display('parents.name', '父类目');
        } else {
            // 定义一个名为『是否目录』的单选框
            $form->radio('is_directory', '是否目录')
                ->options(['1' => '是', '0' => '否'])
                ->default('0')
                ->rules('required');

            // 定义一个名为父类目的下拉框
            $form->select('parent_id', '父类目')->ajax('/admin/api/categories');
        }

        return $form;
    }

    // 定义下拉框搜索接口
    public function apiIndex(Request $request)
    {
        // 用户输入的值通过 q 参数获取
        $search = $request->input('p');

        $result = Category::query()
            ->where('is_directory', true)
            ->where('name', 'like', '%'.$search.'%')
            ->paginate();

        // 查询出来的数据重新组装成 Laravel-Admin 需要的格式
        $result->setCollection($result->getCollection()->map(function (Category $category) {
            return ['id'=>$category->id, 'text'=>$category->full_name];
        }));

        return $result;
    }
}
