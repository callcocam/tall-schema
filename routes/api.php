<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/reports/models', function (Request $request) {
   
    $ignore = [
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
        "Policy",
        "PoliticaDeDesistencia",
        "PoliticaDeInscricao",
        "Relationship",
        "Relatorio",
        "Status",
        "Pagina",
        "Page",
        "Detalhe"
    ];
    return \Tall\Schema\Schema::models(array_merge($ignore, config('schema.ignore.models',[])));
})->name('tall.schema.api.reports.models');

Route::get('/reports/tables', function (Request $request) {
    return \Tall\Schema\Schema::tables(config('schema.ignore.tables',[]));
})->name('tall.schema.api.reports.tables');