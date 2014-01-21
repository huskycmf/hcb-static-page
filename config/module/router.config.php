<?php
return array(
    'routes' => array(
        'hc-backend' => array(
            'child_routes' => array(
                'page' => include __DIR__ . '/router/common.config.php'
            )
        )
    )
);
