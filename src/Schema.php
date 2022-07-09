<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Schema 
{
    
    /**
     * Get DB schema by the database connection name.
     *
    * @throws \Exception
     */
    public static function make()
    {
        $driver = \DB::getDriverName();

        if (!$driver) {
            throw new Exception('Failed to find database driver.');
        }

        switch ($driver) {
             case \Tall\Schema\Enum\Driver::MYSQL()->getValue():
                return app(\Tall\Schema\IMySQLSchema::class);
                break;
            default:
                throw new \Exception('The database driver in use is not supported.');
        }
    }

    public static function tables($ignoreTables = []){
        $tables = self::make()->getTableNames()->toArray();
        $options = [];
        foreach($tables as $table){
            if(!in_array($table, $ignoreTables)){
                $options[] = [
                    "id"=>$table,
                    "name"=>$table,
                ];
            }
        }
        return $options;
    }

    
    public static function models($ignore = []){
        
        if($paths = config("schema.paths")){
            foreach($paths as $path){
                $tables = self::getModels(base_path($path));
                foreach($tables as $table){
                    $label = \Str::afterLast($table, '\\');
                    if(!in_array($label, $ignore)){
                        $collection[]= ["id"=>$table,"name"=>$label];
                    }
                }
            }
        }
        return collect($collection);
    }

    protected static function getModels($path): Collection
    {
        $models = collect(File::allFiles($path))
            ->map(function ($item) {
                $path = $item->getRealPath();
                $class = \Str::afterLast($path, base_path());
                $class = \Str::beforeLast($class,'.');
                $class = \Str::replace( "/", "\\",$class);
                $class = \Str::title($class);    
                return $class;
            })
            ->filter(function ($class) {
                $valid = false;    
                if (class_exists($class)) {
                    $reflection = new \ReflectionClass($class);
                    $valid = $reflection->isSubclassOf(Model::class) &&
                        !$reflection->isAbstract();
                }
    
                return $valid;
            });
        return $models->values();
    }

}
