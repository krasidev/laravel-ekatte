<?php

return [
    'panel' => [
        'profile' => [
            'labels' => [
                'name' => 'Име',
                'email' => 'Имейл адрес',
                'role' => 'Роля',
                'current_password' => 'Текуща парола',
                'password' => 'Парола',
                'password_confirmation' => 'Потвърди парола'
            ],
            'placeholders' => [
                'role' => '-- Избери --'
            ],
            'buttons' => [
                'update' => 'Обнови',
                'update-password' => 'Обнови парола'
            ]
        ],
        'settlements' => [
            'table' => [
                'filters' => [
                    'district_id' => 'Област',
                    'municipality_id' => 'Община',
                    'town_hall_id' => 'Кметство'
                ],
                'headers' => [
                    'id' => 'ID',
                    'ekatte' => 'ЕКАТТЕ',
                    'name' => 'Име',
                    'settlement_kind' => [
                        'name' => 'Вид'
                    ],
                    'district' => [
                        'name' => 'Област'
                    ],
                    'municipality' => [
                        'name' => 'Община'
                    ],
                    'town_hall' => [
                        'name' => 'Кметство'
                    ],
                    'created_at' => 'Добавен',
                    'updated_at' => 'Обновен',
                    'actions' => 'Действия'
                ]
            ],
            'labels' => [
                'ekatte' => 'ЕКАТТЕ',
                'name' => 'Име',
                'settlement_kind_id' => 'Вид',
                'district_id' => 'Област',
                'municipality_id' => 'Община',
                'town_hall_id' => 'Кметство'
            ],
            'placeholders' => [
                'settlement_kind_id' => '-- Избери --',
                'district_id' => '-- Избери --',
                'municipality_id' => '-- Избери --',
                'town_hall_id' => '-- Избери --'
            ],
            'buttons' => [
                'filter' => 'Филтри',
                'export' => 'Експортирай на всичко',
                'store' => 'Добави',
                'update' => 'Обнови',
                'destroy' => 'Изтрий'
            ]
        ],
        'town-halls' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'code' => 'Код',
                    'ekatte' => 'ЕКАТТЕ',
                    'name' => 'Име',
                    'municipality' => [
                        'name' => 'Община'
                    ],
                    'created_at' => 'Добавен',
                    'updated_at' => 'Обновен',
                    'actions' => 'Действия'
                ]
            ],
            'labels' => [
                'code' => 'Код',
                'ekatte' => 'ЕКАТТЕ',
                'name' => 'Име',
                'municipality_id' => 'Община'
            ],
            'placeholders' => [
                'municipality_id' => '-- Избери --'
            ],
            'buttons' => [
                'export' => 'Експортирай на всичко',
                'store' => 'Добави',
                'update' => 'Обнови',
                'destroy' => 'Изтрий'
            ]
        ],
        'municipalities' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'code' => 'Код',
                    'ekatte' => 'ЕКАТТЕ',
                    'name' => 'Име',
                    'district' => [
                        'name' => 'Област'
                    ],
                    'created_at' => 'Добавен',
                    'updated_at' => 'Обновен',
                    'actions' => 'Действия'
                ]
            ],
            'labels' => [
                'code' => 'Код',
                'ekatte' => 'ЕКАТТЕ',
                'name' => 'Име',
                'district_id' => 'Област'
            ],
            'placeholders' => [
                'district_id' => '-- Избери --'
            ],
            'buttons' => [
                'export' => 'Експортирай на всичко',
                'store' => 'Добави',
                'update' => 'Обнови',
                'destroy' => 'Изтрий'
            ]
        ],
        'districts' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'code' => 'Код',
                    'ekatte' => 'ЕКАТТЕ',
                    'name' => 'Име',
                    'region' => [
                        'name' => 'Регион'
                    ],
                    'created_at' => 'Добавен',
                    'updated_at' => 'Обновен',
                    'actions' => 'Действия'
                ]
            ],
            'labels' => [
                'code' => 'Код',
                'ekatte' => 'ЕКАТТЕ',
                'name' => 'Име',
                'region_id' => 'Регион'
            ],
            'placeholders' => [
                'region_id' => '-- Избери --'
            ],
            'buttons' => [
                'export' => 'Експортирай на всичко',
                'store' => 'Добави',
                'update' => 'Обнови',
                'destroy' => 'Изтрий'
            ]
        ],
        'regions' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'code' => 'Код',
                    'name' => 'Име',
                    'created_at' => 'Добавен',
                    'updated_at' => 'Обновен',
                    'actions' => 'Действия'
                ]
            ],
            'labels' => [
                'code' => 'Код',
                'name' => 'Име'
            ],
            'buttons' => [
                'export' => 'Експортирай на всичко',
                'store' => 'Добави',
                'update' => 'Обнови',
                'destroy' => 'Изтрий'
            ]
        ],
        'users' => [
            'table' => [
                'filters' => [
                    'trashed' => [
                        'options' => [
                            'all' => 'Всички потребители',
                            'deleted' => 'Изтрити потребители'
                        ]
                    ]
                ],
                'headers' => [
                    'id' => 'ID',
                    'name' => 'Име',
                    'email' => 'Имейл адрес',
                    'roles' => 'Роля',
                    'created_at' => 'Добавен',
                    'updated_at' => 'Обновен',
                    'deleted_at' => 'Изтрит',
                    'actions' => 'Действия'
                ]
            ],
            'labels' => [
                'name' => 'Име',
                'email' => 'Имейл адрес',
                'password' => 'Парола',
                'password_confirmation' => 'Потвърди парола',
                'role' => 'Роля'
            ],
            'placeholders' => [
                'role' => '-- Избери --'
            ],
            'buttons' => [
                'filter' => 'Филтри',
                'export' => 'Експортирай на всичко',
                'store' => 'Добави',
                'update' => 'Обнови',
                'destroy' => 'Изтрий',
                'restore' => 'Възстанови'
            ]
        ],
        'roles' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'name' => 'Роля',
                    'guard_name' => 'Guard Name',
                    'readonly' => 'Само за четене',
                    'created_at' => 'Добавен',
                    'updated_at' => 'Обновен',
                    'actions' => 'Действия'
                ]
            ],
            'labels' => [
                'name' => 'Роля'
            ],
            'legends' => [
                'permissions' => 'Разрешения'
            ],
            'buttons' => [
                'store' => 'Добави',
                'update' => 'Обнови',
                'destroy' => 'Изтрий'
            ]
        ],
        'permissions' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'name' => 'Име',
                    'guard_name' => 'Guard Name',
                    'created_at' => 'Добавен',
                    'updated_at' => 'Обновен',
                    'actions' => 'Действия'
                ]
            ],
            'labels' => [
                'name' => 'Име',
                'guard_name' => 'Guard Name'
            ],
            'legends' => [
                'roles' => 'Роли'
            ],
            'buttons' => [
                'update' => 'Обнови'
            ]
        ]
    ]
];
