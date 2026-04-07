<?php

namespace App\Entity;

class User
{
    private ?int $id = null;

    private(set) ?string $name = null;

    public ?array $extra {
        get => $this->extra ?? [];
        set => $value;
    }
}
