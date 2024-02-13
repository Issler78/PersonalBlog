<?php

namespace App\Enum;

enum PostCategory: string
{
    case F = "Front-End";
    case B = "Back-End";
    case M = "Mobile";
    case G = "Guides";
    
    public static function fromValue($name)
    {
        foreach (self::cases() as $case)
        {
            if ($case->value == $name)
            {
                return $case->value;
            }
        }
        
        throw new \ValueError("Invalid Category");
    }
}
