<?php

use App\Enums\PostCategory;

if (!function_exists("getCategoryValue"))
{
    function getCategoryValue($category)
    {
        return PostCategory::fromValue($category);
    }
}