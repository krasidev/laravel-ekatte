<?php

return [
    'panel' => [
        'profile' => [
            'labels' => [
                'name' => 'Name',
                'email' => 'E-Mail Address',
                'role' => 'Role',
                'current_password' => 'Current Password',
                'password' => 'Password',
                'password_confirmation' => 'Confirm Password'
            ],
            'placeholders' => [
                'role' => '-- Choose --'
            ],
            'buttons' => [
                'update' => 'Update',
                'update-password' => 'Update Password'
            ]
        ],
        'settlements' => [
            'table' => [
                'filters' => [
                    'district_id' => 'District',
                    'municipality_id' => 'Municipality',
                    'town_hall_id' => 'Town hall'
                ],
                'headers' => [
                    'id' => 'ID',
                    'ekatte' => 'EKATTE',
                    'name' => 'Name',
                    'settlement_kind' => [
                        'name' => 'Kind'
                    ],
                    'district' => [
                        'name' => 'District'
                    ],
                    'municipality' => [
                        'name' => 'Municipality'
                    ],
                    'town_hall' => [
                        'name' => 'Town hall'
                    ],
                    'created_at' => 'Created At',
                    'updated_at' => 'Updated At',
                    'actions' => 'Actions'
                ]
            ],
            'labels' => [
                'ekatte' => 'EKATTE',
                'name' => 'Name',
                'settlement_kind_id' => 'Kind',
                'district_id' => 'District',
                'municipality_id' => 'Municipality',
                'town_hall_id' => 'Town hall'
            ],
            'placeholders' => [
                'settlement_kind_id' => '-- Choose --',
                'district_id' => '-- Choose --',
                'municipality_id' => '-- Choose --',
                'town_hall_id' => '-- Choose --'
            ],
            'buttons' => [
                'filter' => 'Filters',
                'export' => 'Export All',
                'store' => 'Create',
                'update' => 'Update',
                'destroy' => 'Delete'
            ]
        ],
        'town-halls' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'code' => 'Code',
                    'ekatte' => 'EKATTE',
                    'name' => 'Name',
                    'municipality' => [
                        'name' => 'Municipality'
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
                'municipality_id' => 'Municipality'
            ],
            'placeholders' => [
                'municipality_id' => '-- Choose --'
            ],
            'buttons' => [
                'export' => 'Export All',
                'store' => 'Create',
                'update' => 'Update',
                'destroy' => 'Delete'
            ]
        ],
        'municipalities' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'code' => 'Code',
                    'ekatte' => 'EKATTE',
                    'name' => 'Name',
                    'district' => [
                        'name' => 'District'
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
                'district_id' => 'District'
            ],
            'placeholders' => [
                'district_id' => '-- Choose --'
            ],
            'buttons' => [
                'export' => 'Export All',
                'store' => 'Create',
                'update' => 'Update',
                'destroy' => 'Delete'
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
                'export' => 'Export All',
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
                'export' => 'Export All',
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
                    'roles' => 'Role',
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
                'password_confirmation' => 'Confirm Password',
                'role' => 'Role'
            ],
            'placeholders' => [
                'role' => '-- Choose --'
            ],
            'buttons' => [
                'filter' => 'Filters',
                'store' => 'Create',
                'update' => 'Update',
                'destroy' => 'Delete',
                'restore' => 'Restore'
            ]
        ],
        'roles' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'name' => 'Role',
                    'guard_name' => 'Guard Name',
                    'readonly' => 'Readonly',
                    'created_at' => 'Created At',
                    'updated_at' => 'Updated At',
                    'actions' => 'Actions'
                ]
            ],
            'labels' => [
                'name' => 'Role'
            ],
            'legends' => [
                'permissions' => 'Permissions'
            ],
            'buttons' => [
                'store' => 'Create',
                'update' => 'Update',
                'destroy' => 'Delete'
            ]
        ],
        'permissions' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'name' => 'Name',
                    'guard_name' => 'Guard Name',
                    'created_at' => 'Created At',
                    'updated_at' => 'Updated At',
                    'actions' => 'Actions'
                ]
            ],
            'labels' => [
                'name' => 'Name',
                'guard_name' => 'Guard Name'
            ],
            'legends' => [
                'roles' => 'Roles'
            ],
            'buttons' => [
                'update' => 'Update'
            ]
        ]
    ]
];
