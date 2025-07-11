<?php

namespace App\Enums;

enum TargetType: string
{
    case POST = 'post';
    case COMMENT = 'comment';

    public function label(): string
    {
        return match ($this) {
            self::POST    => 'Post',
            self::COMMENT => 'Comment',
        };
    }
}