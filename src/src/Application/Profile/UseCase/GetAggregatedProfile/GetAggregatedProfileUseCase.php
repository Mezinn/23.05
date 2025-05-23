<?php

declare(strict_types=1);

namespace App\Application\Profile\UseCase\GetAggregatedProfile;

use App\Application\Profile\Service\ProfileResolver;
use Throwable;

final readonly class GetAggregatedProfileUseCase
{

    public function __construct(
        private iterable        $sources,
        private ProfileResolver $resolver
    ) {
    }

    public function handle(GetAggregatedProfileRequest $request): GetAggregatedProfileResponse
    {
        $fields = [];

        foreach ($this->sources as $source) {
            try {
                $fields = [
                    ...$fields, ...$source->fetchProfileFields(
                        $request->getUserId()
                    )
                ];
            } catch (Throwable) {
                continue;
            }
        }

        $resolved = $this->resolver->resolve(
            $request->getUserId(),
            $fields
        );

        return new GetAggregatedProfileResponse($resolved);
    }

}