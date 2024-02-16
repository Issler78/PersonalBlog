<?php

use App\Enums\PostCategory;

if (!function_exists("getCategoryValue"))
{
    function getCategoryValue($category)
    {
        return PostCategory::fromValue($category);
    }
}

if (!function_exists("formatDate"))
{
    function formatDate(DateTimeInterface $date)
    {
        $formatDate = date_format($date, "M jS, g:i A");

        return $formatDate;
    }
}