<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Schema\Models;

use Tall\Schema\Models\Enum\Migrations\Method\ColumnType;

interface Column extends Model
{
    /**
     * Get the column name.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Get the table name.
     *
     * @return string
     */
    public function getTableName(): string;

    /**
     * Get the column type.
     *
     * @return \App\Schema\Models\Enum\Migrations\Method\ColumnType
     */
    public function getType(): ColumnType;

    /**
     * Get the column length.
     *
     * @return int|null
     */
    public function getLength(): ?int;

    /**
     * Get the column scale.
     *
     * @return int
     */
    public function getScale(): int;

    /**
     * Check if the column is unsigned.
     *
     * @return bool
     */
    public function isUnsigned(): bool;

    /**
     * Check if the column is fixed.
     *
     * @return bool
     */
    public function isFixed(): bool;

    /**
     * Check if the column is not null.
     *
     * @return bool
     */
    public function isNotNull(): bool;

    /**
     * Get the column default value.
     *
     * @return string|null
     */
    public function getDefault(): ?string;

    /**
     * Get the column collation.
     *
     * @return string|null
     */
    public function getCollation(): ?string;

    /**
     * Get the column charset.
     *
     * @return string|null
     */
    public function getCharset(): ?string;

    /**
     * Check if the column is autoincrement.
     *
     * @return bool
     */
    public function isAutoincrement(): bool;

    /**
     * Get the column precision.
     *
     * @return int
     */
    public function getPrecision(): int;

    /**
     * Get the column comment.
     *
     * @return string|null
     */
    public function getComment(): ?string;

    /**
     * Get the column preset values.
     * This is usually used for `enum` and `set`.
     *
     * @return string[]
     */
    public function getPresetValues(): array;

    /**
     * Check if the column uses "on update CURRENT_TIMESTAMP".
     * This is usually used for MySQL `timestamp` and `timestampTz`.
     *
     * @return bool
     */
    public function isOnUpdateCurrentTimestamp(): bool;
}