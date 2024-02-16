<?php

use App\Enums\PostCategory;

if (!function_exists("getCategoryValue"))
{
    function getCategoryValue($category)
    {
        return PostCategory::fromValue($category);
    }
}

if (!function_exists("dateFormat"))
{
    function dateFormat(DateTimeInterface $date)
    {
        $dateFormat = date_format($date, "M jS, g:i A");

        return $dateFormat;
    }
}