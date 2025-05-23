<?php

declare(strict_types=1);

namespace App\Domain\Profile\Contract;

use App\Domain\Profile\Entity\ProfileField;
use Ramsey\Uuid\UuidInterface;

interface ProfileSourceInterface
{

    /** @return ProfileField[] */
    public function fetchProfileFields(UuidInterface $userId): array;

}