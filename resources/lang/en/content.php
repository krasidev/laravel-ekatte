<?php

return [
    'panel' => [
        'profile' => [
            'labels' => [
                'name' => 'Name',
                'email' => 'E-Mail Address',
                'current_password' => 'Current Password',
                'password' => 'Password',
                'password_confirmation' => 'Confirm Password'
            ],
            'buttons' => [
                'update' => 'Update',
                'update-password' => 'Update Password'
            ]
        ],
        'districts' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'code' => 'Code',
                    'ekatte' => 'EKATTE',
                    'name' => 'Name',
                    'region' => [
                        'name' => 'Region'
                    ],
                    'created_at' => 'Created At',
                    'updated_at' => 'Updated At',
                    'actions' => 'Actions'
                ]
            ],
            'labels' => [
                'code' => 'Code',
                'ekatte' => 'EKATTE',
                'name' => 'Name',
                'region_id' => 'Region'
            ],
            'placeholders' => [
                'region_id' => '-- Choose --'
            ],
            'buttons' => [
                'store' => 'Create',
                'update' => 'Update',
                'destroy' => 'Delete'
            ]
        ],
        'regions' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'code' => 'Code',
                    'name' => 'Name',
                    'created_at' => 'Created At',
                    'updated_at' => 'Updated At',
                    'actions' => 'Actions'
                ]
            ],
            'labels' => [
                'code' => 'Code',
                'name' => 'Name'
            ],
            'buttons' => [
                'store' => 'Create',
                'update' => 'Update',
                'destroy' => 'Delete'
            ]
        ],
        'users' => [
            'table' => [
                'filters' => [
                    'trashed' => [
                        'options' => [
                            'all' => 'All Users',
                            'deleted' => 'Deleted Users'
                        ]
                    ]
                ],
                'headers' => [
                    'id' => 'ID',
                    'name' => 'Name',
                    'email' => 'E-Mail Address',
                    'created_at' => 'Created At',
                    'updated_at' => 'Updated At',
                    'deleted_at' => 'Deleted At',
                    'actions' => 'Actions'
                ]
            ],
            'labels' => [
                'name' => 'Name',
                'email' => 'E-Mail Address',
                'password' => 'Password',
                'password_confirmation' => 'Confirm Password'
            ],
            'buttons' => [
                'store' => 'Create',
                'update' => 'Update',
                'destroy' => 'Delete',
                'restore' => 'Restore'
            ]
        ]
    ]
];
