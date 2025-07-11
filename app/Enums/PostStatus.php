<?php

namespace App\Enums;

enum PostStatus: string
{
    case PUBLISHED = 'published';
    case UNPUBLISHED = 'unpublished';

    public function label(): string
    {
        return match ($this) {
            self::PUBLISHED   => 'Published',
            self::UNPUBLISHED => 'Unpublished',
        };
    }
}