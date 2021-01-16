<?php

use Spatie\Permission\Models\Role;

return [
    'title'   => 'Roles',
    'single'  => 'Role',
    'model'   => Role::class,

    'permission'=> function()
    {
        return Auth::user()->can('manage_users');
    },

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => 'Tags'
        ],
        'permissions' => [
            'title'  => 'Permissions',
            'output' => function ($value, $model) {
                $model->load('permissions');
                $result = [];
                foreach ($model->permissions as $permission) {
                    $result[] = $permission->name;
                }

                return empty($result) ? 'N/A' : implode(' | ', $result);
            },
            'sortable' => false,
        ],
        'operation' => [
            'title'  => 'Operations',
            'output' => function ($value, $model) {
                return $value;
            },
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => 'Tag',
        ],
        'permissions' => [
            'type' => 'relationship',
            'title' => 'Permission',
            'name_field' => 'name',
        ],
    ],

    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => 'Tag',
        ]
    ],

    // 新建和编辑时的表单验证规则
    'rules' => [
        'name' => 'required|max:15|unique:roles,name',
    ],

    // 表单验证错误时定制错误消息
    'messages' => [
        'name.required' => 'Tag cannot be null',
        'name.unique' => 'Tag has existed',
    ]
];
