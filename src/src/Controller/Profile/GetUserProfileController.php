<?php

declare(strict_types=1);

namespace App\Controller\Profile;

use App\Application\Common\Exception\InvalidUuidException;
use App\Application\Profile\UseCase\GetAggregatedProfile\GetAggregatedProfileRequest;
use App\Application\Profile\UseCase\GetAggregatedProfile\GetAggregatedProfileUseCase;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final readonly class GetUserProfileController
{

    public function __construct(
        private GetAggregatedProfileUseCase $useCase
    ) {
    }

    #[Route('/profile/{id}', name: 'profile.get', methods: [Request::METHOD_GET])]
    public function __invoke(string $id): JsonResponse
    {
        if (!Uuid::isValid($id)) {
            throw new InvalidUuidException($id);
        }

        $result = $this->useCase->handle(
            new GetAggregatedProfileRequest(
                Uuid::fromString($id)
            )
        );

        return new JsonResponse(
            $result->getData()
        );
    }

}