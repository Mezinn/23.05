<?php

namespace App\Infrastructure\Profile\Source;

use App\Domain\Profile\Contract\ProfileSourceInterface;
use App\Domain\Profile\Entity\ProfileField;
use Ramsey\Uuid\UuidInterface;

final class Source2 implements ProfileSourceInterface
{

    public function fetchProfileFields(UuidInterface $userId): array
    {
        return [
            new ProfileField(
                'name',
                'John Foo',
                0
            ),
        ];
    }

}