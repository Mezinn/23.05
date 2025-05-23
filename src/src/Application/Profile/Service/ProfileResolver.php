<?php

declare(strict_types=1);

namespace App\Application\Profile\Service;

use App\Domain\Profile\Entity\ProfileField;
use Ramsey\Uuid\UuidInterface;

final class ProfileResolver
{

    /**
     * @param ProfileField[] $fields
     * @return array<string, mixed>
     */
    public function resolve(
        UuidInterface $userId,
        array         $fields
    ): array {
        $grouped = [];

        foreach ($fields as $field) {
            if ($field->value() === null) {
                continue;
            }

            $grouped[$field->key()][] = $field;
        }

        $resolved = [
            'id' => $userId->toString()
        ];

        foreach ($grouped as $key => $items) {
            usort(
                $items,
                fn(
                    ProfileField $a,
                    ProfileField $b
                ) => $a->priority() <=> $b->priority()
            );
            $resolved[$key] = reset($items)?->value();
        }

        return $resolved;
    }

}