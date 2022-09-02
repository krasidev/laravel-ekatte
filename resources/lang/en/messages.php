<?php

return [
    'panel' => [
        'alert-success' => [
            'buttons' => [
                'confirm' => 'Close'
            ]
        ],
        'alert-question' => [
            'title' => '',
            'text' => 'Do you want to delete the selected entry?',
            'buttons' => [
                'confirm' => 'Delete',
                'cancel' => 'Cancel'
            ]
        ],
        'alert-question-restore' => [
            'title' => '',
            'text' => 'Do you want to restore the selected entry?',
            'buttons' => [
                'confirm' => 'Restore',
                'cancel' => 'Cancel'
            ]
        ],
        'profile' => [
            'update_success' => [
                'title' => '',
                'text' => 'Profile updated successfully!'
            ],
            'update_password_success' => [
                'title' => '',
                'text' => 'Profile password updated successfully!'
            ]
        ],
        'users' => [
            'store_success' => [
                'title' => '',
                'text' => 'User added successfully!'
            ],
            'update_success' => [
                'title' => '',
                'text' => 'User updated successfully!'
            ]
        ]
    ]
];
