<?php

use App\Enums\PostCategory;

if (!function_exists("getCategoryValue"))
{
    function getCategoryValue($category)
    {
        return PostCategory::fromValue($category);
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

if (!function_exists("getInitials"))
{
    function getInitials(string $username)
    {
        $words = explode(' ', trim($username));
    
        $initials = '';
        
        foreach ($words as $word) {
            // Adiciona as duas primeiras letras da palavra às iniciais
            $initials .= substr($word, 0, 2);
        }
        
        // Retorna as duas primeiras letras das iniciais (ou apenas a primeira, se for uma única palavra)
        return substr($initials, 0, 2);
    }
}