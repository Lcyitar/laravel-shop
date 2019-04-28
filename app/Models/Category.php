<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    protected $fillable = ['name', 'is_directory', 'level', 'path'];
    protected $casts =[
        'is_directory' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        //监听 category 的创建事件, 用于初始化 path 和 level 字段值
        static::creating(function (Category $category) {
            //如果创建的是一个跟目录
            if (is_null($category->parent_id)) {
                //将层级设置为 0
                $category->level = 0;
                //将 path 设为 -
                $category->path = '-';
            } else {
                //将 level 值设为父类 level + 1
                $category->level = $category->parent->level + 1;
                //将 path 值设为父类 path 追加父类 id 以及最后跟上一个 - 分隔符
                $category->path = $category->parent->path . $category->parent_id . '-';
            }
        });
    }

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    //定义一个访问器，获取所有祖先类目 id 值
    public function getPathIdsAttribute()
    {
        return array_filter(explode('-', trim($this->path, '-')));
    }

    //定义一个访问器，获取所有祖先类目并按层级排序
    public function getAncestorsAttribute()
    {
        return Category::query()
            ->whereIn('id', $this->path_ids)
            ->orderBy('level')
            ->get();
    }

    //定义一个访问器, 获取以 - 分隔的所有祖先类目名称以及当前类目的名称
    public function getFullNameAttribute()
    {
        return $this->ancestors
            ->pluck('name')
            ->push($this->name)
            ->implode(' - ');
    }


}
