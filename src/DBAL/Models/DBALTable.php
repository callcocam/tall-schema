<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Schema\DBAL\Models;
use Doctrine\DBAL\Schema\Column as DoctrineDBALColumn;
use Doctrine\DBAL\Schema\Index as DoctrineDBALIndex;
use Doctrine\DBAL\Schema\Table as DoctrineDBALTable;
use Illuminate\Support\Collection;
use Tall\Schema\Models\Column;
use Tall\Schema\Models\Index;
use Tall\Schema\Models\Table;

abstract class DBALTable implements Table
{
    protected $collation;
    protected $columns;
    protected $name;
    protected $indexes;

    /**
     * Create a new instance.
     *
     * @param  \Doctrine\DBAL\Schema\Table  $table
     * @param  array<string, \Doctrine\DBAL\Schema\Column>  $columns  Key is quoted name.
     * @param  array<string, \Doctrine\DBAL\Schema\Index>  $indexes  Key is name.
     */
    public function __construct(DoctrineDBALTable $table, array $columns, array $indexes)
    {
        $this->name      = $table->getName();
        $this->collation = $table->getOptions()['collation'] ?? null;
        $this->columns   = (new Collection($columns))->map(function (DoctrineDBALColumn $column) use ($table) {
            return $this->makeColumn($table->getName(), $column);
        })->values();
        $this->indexes   = (new Collection($indexes))->map(function (DoctrineDBALIndex $index) use ($table) {
            return $this->makeIndex($table->getName(), $index);
        })->values();

        $this->handle();
    }

    /**
     * Instance extend this abstract may run special handling.
     *
     * @return void
     */
    abstract protected function handle(): void;

    /**
     * Make a Column instance.
     *
     * @param  string  $table
     * @param  \Doctrine\DBAL\Schema\Column  $column
     * @return \Tall\Schema\Models\Column
     */
    abstract protected function makeColumn(string $table, DoctrineDBALColumn $column): Column;

    /**
     * Make an Index instance.
     *
     * @param  string  $table
     * @param  \Doctrine\DBAL\Schema\Index  $index
     * @return \Tall\Schema\Models\Index
     */
    abstract protected function makeIndex(string $table, DoctrineDBALIndex $index): Index;

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getColumns(): Collection
    {
        return $this->columns;
    }

    /**
     * @inheritDoc
     */
    public function getIndexes(): Collection
    {
        return $this->indexes;
    }

    /**
     * @inheritDoc
     */
    public function getCollation(): ?string
    {
        return $this->collation;
    }
}