<?php

declare(strict_types=1);

namespace App\Infrastructure\Profile\Source;

use App\Domain\Profile\Contract\ProfileSourceInterface;
use App\Domain\Profile\Entity\ProfileField;
use Ramsey\Uuid\UuidInterface;

final class Source1 implements ProfileSourceInterface
{

    public function fetchProfileFields(UuidInterface $userId): array
    {
        return [
            new ProfileField(
                'email',
                'test@test.com',
                0
            ), new ProfileField(
                'name',
                'Bar Dor',
                2
            ),
        ];
    }

}