<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Schema\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class UUIDType extends Type
{
    /**
     * Implement to respect the contract. Generator is not using this method.
     * Can safely ignore.
     *
     * @codeCoverageIgnore
     * @inheritDoc
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return 'UUID';
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return Types::UUID;
    }
}