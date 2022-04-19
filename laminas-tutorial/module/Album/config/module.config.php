<?php 

namespace Album;

use Laminas\Router\Http\Segment;

return [

    'router' => [
        'routes' => [
            'album' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/album[/:action[/:id]]', #define route and parameters
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*', #regex for action
                        'id'     => '[0-9]+', #regex for id
                    ],
                    'defaults' => [
                        'controller' => Controller\AlbumController::class,
                        'action'     => 'index'
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];

?>