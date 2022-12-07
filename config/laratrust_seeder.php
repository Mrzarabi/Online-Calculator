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
        'is_owner' => [
            'currency'          => 'c,r,u,d',
            //TODO جک کنم ببینم بی حساب به انگلیسی چی میشه همون بزارم
            'document'          => 'c,r,u',
            'contactUs'         => 'r,d',
            'country'           => 'c,r,u,d',
            'exchange'          => 'c,r,u,d,s',
            'feedback'          => 'r,d,a',
            'image'             => 'c,r',
            'inventory'         => 'c,r',
            'location'          => 'r',
            'order'             => 'r,d,a,s',
            'ticket_session'    => 'r,cl,s',
            'ticket_item'       => 'r,d,u,c',
            'user'              => 'r,d,s',
            'profile'           => 'r,u'
        ],

        // '3362c127-65aa-4950-b14f-2fc86b53ea88' => [
        //     'user' => 'r,u',
        //     'image' => 'r',
        //     'ticket' => 'c,r',
        // ],
    ],

    'roles_label' => [
        'is_owner' => [
            'name'          => 'owner',
            'description'   => 'website owner'
        ],
        // '3362c127-65aa-4950-b14f-2fc86b53ea88' => [
        //     'name'  => 'customer',
        //     'description' => 'website customer'
        // ]
    ],

    'permissions_map' => [
        'c'     => 'create',
        'r'     => 'read',
        'u'     => 'update',
        'd'     => 'delete',
        'w'     => 'watch',
        'an'    => 'answer',
        'a'     => 'accept',
        'cl'    => 'close',
        's'     => 'search'
    ]
];
