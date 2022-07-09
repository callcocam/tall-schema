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
    'ignore'=>[
        'models'=>[], //araary
        'tables'=>['reports','filters','cells','sessions'], //araary
    ],
    'paths'=>[
        'app/Models'
    ],
];