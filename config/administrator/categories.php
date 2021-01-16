<?php

use App\Models\Category;

return [
    'title'   => 'Categories',
    'single'  => 'Category',
    'model'   => Category::class,

    // 对 CRUD 动作的单独权限控制，其他动作不指定默认为通过
    'action_permissions' => [
        // 删除权限控制
        'delete' => function () {
            // 只有站长才能删除话题分类
            return Auth::user()->hasRole('Founder');
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title'    => 'Name',
            'sortable' => false,
        ],
        'description' => [
            'title'    => 'Description',
            'sortable' => false,
        ],
        'operation' => [
            'title'  => 'Operations',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'name' => [
            'title' => 'Name',
        ],
        'description' => [
            'title' => 'Description',
            'type'  => 'textarea',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'Category ID',
        ],
        'name' => [
            'title' => 'Name',
        ],
        'description' => [
            'title' => 'Description',
        ],
    ],
    'rules'   => [
        'name' => 'required|min:1|unique:categories'
    ],
    'messages' => [
        'name.unique'   => '分类名在数据库里有重复，请选用其他名称。',
        'name.required' => '请确保名字至少一个字符以上',
    ],
];
