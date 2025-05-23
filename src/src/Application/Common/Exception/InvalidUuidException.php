<?php

declare(strict_types=1);

namespace App\Application\Common\Exception;


use InvalidArgumentException;

final class InvalidUuidException extends InvalidArgumentException
{

    public function __construct(string $uuid = '')
    {
        parent::__construct(
            sprintf(
                'Invalid UUID format: "%s"',
                $uuid
            )
        );
    }

}