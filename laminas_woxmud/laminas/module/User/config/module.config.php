<?php

declare(strict_types=1);

namespace User;

use Laminas\Router\Http\Literal;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'signup' => [
    			'type' => Literal::class,
    			'options' => [
    				'route' => '/signup',
    				'defaults' => [
    					'controller' => Controller\AuthController::class,
    					'action' => 'create'
    				],
    			],
    		],
        ]
    ],
    'controllers' => [
        'factories' => [
            Controller\AuthController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'auth/create' => __DIR__ . '/../view/user/auth/create.phtml',
        ],
        'template_path_stack' => [
            'user' => __DIR__ . '/../view/'
        ]
    ]
];

?>