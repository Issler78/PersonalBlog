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
    function dateFormat(string $date)
    {
        $dateTime = date_create($date);
        $dateFormat = date_format($dateTime, "M jS, g:i A");

        return $dateFormat;
    }
}

if (!function_exists("addStyles"))
{
    function addStyles(string $content)
    {
        $patterns = [
            '/<h(\d)(.*?)>(.*?)<\/h\1>/i',
            '/<img(.*?)>/i'
        ];

        $replacements = [
            '<h$1 class="fw-bold mt-5">$3</h$1>',
            '<img$1 class="img-fluid" style="max-width: 100%; height: auto;">'
        ];

        $formattedContent = preg_replace($patterns, $replacements, $content);

        return $formattedContent;
    }
}