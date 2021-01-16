<?php

use App\Models\Link;

return [
    'title'   => 'Recommended Links',
    'single'  => 'Recommended Link',

    'model'   => Link::class,

    // 访问权限判断
    'permission'=> function()
    {
        // 只允许站长管理资源推荐链接
        return Auth::user()->hasRole('Founder');
    },

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'title' => [
            'title'    => 'Name',
            'sortable' => false,
        ],
        'link' => [
            'title'    => 'Link',
            'sortable' => false,
        ],
        'operation' => [
            'title'  => 'Operation',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'title' => [
            'title'    => 'Name',
        ],
        'link' => [
            'title'    => 'Link',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'Link ID',
        ],
        'title' => [
            'title' => 'Name',
        ],
    ],
];
