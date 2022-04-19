<?php

/**
 * List of enabled modules for this application.
 *
 * This should be an array of module namespaces used in the application.
 */
return [
    'Laminas\Session',
    'Laminas\Router',
    'Laminas\Validator',
    'Laminas\Mvc\Plugin\FlashMessenger',
    'Application',
    'User', # Let the framework know about newly created modules


    'Laminas\Paginator',
    'Laminas\Navigation',
    'Laminas\Serializer',
    'Laminas\Mail',
    'Laminas\Di',
    'Laminas\Log',
    'Laminas\Db',
    'Laminas\Mvc\Plugin\FilePrg',
    'Laminas\Mvc\Plugin\Identity',
    'Laminas\Mvc\Plugin\Prg',
    'Laminas\Mvc\I18n',
    'Laminas\Mvc\Console',
    'Laminas\Form',
    'Laminas\Hydrator',
    'Laminas\InputFilter',
    'Laminas\Filter',
    // 'Laminas\I18n',
    'Laminas\Cache',
    'Laminas\DeveloperTools',

];