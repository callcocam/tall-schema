<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Schema;

use Illuminate\Support\ServiceProvider;
use Tall\Schema\DBAL\MySQLSchema  as DBALMySQLSchema;

class SchemaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\Tall\Schema\IMySQLSchema::class, DBALMySQLSchema::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom( __DIR__ . '/../routes/api.php');
        $this->mergeConfigFrom(
            __DIR__ . '/../config/schema.php','schema'
        );
        $this->publishes([
            __DIR__.'/../config/schema.php' => config_path('schema.php'),
        ], 'schema');
    }
}
