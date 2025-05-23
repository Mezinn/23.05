<?php

declare(strict_types=1);

namespace App\Application\Profile\UseCase\GetAggregatedProfile;

final readonly class GetAggregatedProfileResponse
{

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(
        private array $data
    ) {
    }

    public function getData(): array
    {
        return $this->data;
    }

}