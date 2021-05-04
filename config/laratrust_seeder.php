<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super-admin' => [
            'users' => 'c,r,u,d',
            'institutes' => 'c,r,u,d',
            'courses' => 'c,r,u,d',
            'cities-countries' => 'c,r,u,d',
            'articals' => 'c,r,u,d',
            'services' => 'c,r,u,d',
            'students' => 'c,r,u,d',
            'student-requests' => 'c,r,u,d',
            'visas' => 'c,r,u,d',
        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'institutes' => 'c,r,u,d',
            'courses' => 'c,r,u,d',
            'cities-countries' => 'c,r,u,d',
            'articals' => 'c,r,u,d',
            'services' => 'c,r,u,d',
            'students' => 'c,r,u,d',
            'student-requests' => 'c,r,u,d',
            'visas' => 'c,r,u,d',
        ],
        'employee' => [
            
        ],
        
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
