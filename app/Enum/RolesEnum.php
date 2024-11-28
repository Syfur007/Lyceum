<?php

namespace App\Enum;

enum RolesEnum: string
{
    case Admin = 'admin';
    case Student = 'student';
    case Teacher = 'teacher';

    public static function all(): array
    {
        return [
            self::Admin->value => "Admin",
            self::Student->value => "Student",
            self::Teacher->value => "Teacher",
        ];
    }

    public function getRole()
    {
        return match ($this) {
            self::Admin => "Admin",
            self::Student => "Student",
            self::Teacher => "Teacher",
            default => "Unknown",
        };
    }
}
