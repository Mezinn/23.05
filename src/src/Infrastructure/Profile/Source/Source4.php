<?php

declare(strict_types=1);

namespace App\Infrastructure\Profile\Source;

use App\Domain\Profile\Contract\ProfileSourceInterface;
use App\Domain\Profile\Entity\ProfileField;
use Ramsey\Uuid\UuidInterface;

final class Source4 implements ProfileSourceInterface
{

    public function fetchProfileFields(UuidInterface $userId): array
    {
        return [
            new ProfileField(
                'unknown',
                'alien',
                0
            ),
        ];
    }

}