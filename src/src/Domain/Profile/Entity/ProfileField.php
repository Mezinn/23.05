<?php

declare(strict_types=1);

namespace App\Domain\Profile\Entity;

final readonly class ProfileField
{

    public function __construct(
        private string $key,
        private mixed  $value,
        private int    $priority
    ) {
    }

    public function key(): string
    {
        return $this->key;
    }

    public function value(): mixed
    {
        return $this->value;
    }

    public function priority(): int
    {
        return $this->priority;
    }

}