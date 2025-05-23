<?php

declare(strict_types=1);

namespace App\Application\Profile\UseCase\GetAggregatedProfile;


use Ramsey\Uuid\UuidInterface;

final readonly class GetAggregatedProfileRequest
{

    public function __construct(
        private UuidInterface $userId
    ) {
    }

    public function getUserId(): UuidInterface
    {
        return $this->userId;
    }

}