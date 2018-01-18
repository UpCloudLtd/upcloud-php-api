<?php

$container->loadFromExtension('security', array(
    'providers' => array(
        'default' => array(
            'memory' => array(
                'users' => array(
                    'foo' => array('password' => 'foo', 'roles' => 'ROLE_USER'),
                ),
            ),
        ),
    ),
    'firewalls' => array(
        'simple' => array('pattern' => '/login', 'security' => false),
    ),
));
