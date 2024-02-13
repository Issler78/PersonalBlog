<?php

namespace App\Enums;

enum PostCategory: string
{
    case F = "Front-End";
    case B = "Back-End";
    case M = "Mobile";
    case G = "Guides";
    
    public static function fromValue(string $category)
    {
        foreach (self::cases() as $case)
        {
            if ($case->name == $category)
            {
                return $case->value;
            }
        }
        
        throw new \ValueError("Invalid Category");
    }
}
