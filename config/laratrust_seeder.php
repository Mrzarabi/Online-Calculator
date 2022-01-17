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
        '100e82ba-e1c0-4153-8633-e1bd228f7399' => [
            'calculator' => 'c,r,d',
            'clearing' => 'c,r,u',
            'contactUs' => 'r,d',
            'element' => 'c,u,d,s',
            'feedback' => 'r,d,a',
            'image' => 'c,r',
            'inventory' => 'c,r',
            'location' => 'r',
            'order' => 'r,d,a,s',
            'starter' => 'r,cl,s',
            'ticket' => 'an',
            'user' => 'r,d,s',
            'profile' => 'r,u'
        ],

        // '3362c127-65aa-4950-b14f-2fc86b53ea88' => [
        //     'user' => 'r,u',
        //     'image' => 'r',
        //     'ticket' => 'c,r',
        // ],
    ],

    'roles_label' => [
        '100e82ba-e1c0-4153-8633-e1bd228f7399' => [
            'name' => 'owner',
            'description' => 'website owner'
        ],
        // '3362c127-65aa-4950-b14f-2fc86b53ea88' => [
        //     'name'  => 'customer',
        //     'description' => 'website customer'
        // ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'w' => 'watch',
        'an' => 'answer',
        'a' => 'accept',
        'cl' => 'close',
        's' => 'search'
    ]
];
