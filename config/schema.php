<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

return [
    'routes'=>[
        'tables'=>'tall.schema.api.reports.tables',
        'models'=>'tall.schema.api.reports.models',
    ],
    'models'=>[],
    'tables'=>[],
    'ignore'=>[
        'models'=>[
            "Attribute",
            "Permission",
            "Role",
            "Header",
            "Cell",
            "Coluna",
            "Documento",
            "File",
            "Filter",
            "Image",
            "Description",
            "Relationship",
            "Status"
        ], //araary
        'tables'=>[
            'reports',
            'statuses',
            'relationships',
            'filters',
            'cells',
            'sessions',
            'attributes',
            'permissions',
            'roles',
            'headers',
            'documents',
            'files',
            'images'
    ], //araary
    ],
    'paths'=>[
        'app/Models'
    ],
];