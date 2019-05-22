<?php

declare(strict_types=1);

namespace Permalink;

class Permalink
{
    public static function create(string $text, string $prefix = '', string $suffix = '') : string
    {
        return self::createSlug($prefix) . self::createSlug($text) . self::createSlug($suffix);
    }

    private static function createSlug(string $text) : string
    {
        $normalizeChars = [
            'Á' => 'A',
            'À' => 'A',
            'Â' => 'A',
            'Ã' => 'A',
            'Å' => 'A',
            'Ä' => 'A',
            'Æ' => 'AE',
            'Ç' => 'C',
            'É' => 'E',
            'È' => 'E',
            'Ê' => 'E',
            'Ë' => 'E',
            'Í' => 'I',
            'Ì' => 'I',
            'Î' => 'I',
            'Ï' => 'I',
            'Ð' => 'Eth',
            'Ñ' => 'N',
            'Ó' => 'O',
            'Ò' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ö' => 'O',
            'Ø' => 'O',
            'Ú' => 'U',
            'Ù' => 'U',
            'Û' => 'U',
            'Ü' => 'U',
            'Ý' => 'Y',

            'á' => 'a',
            'à' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'å' => 'a',
            'ä' => 'a',
            'æ' => 'ae',
            'ç' => 'c',
            'é' => 'e',
            'è' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'í' => 'i',
            'ì' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'ð' => 'eth',
            'ñ' => 'n',
            'ó' => 'o',
            'ò' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ö' => 'o',
            'ø' => 'o',
            'ú' => 'u',
            'ù' => 'u',
            'û' => 'u',
            'ü' => 'u',
            'ý' => 'y',

            'ß' => 'sz',
            'þ' => 'thorn',
            'ÿ' => 'y',
        ];

        $text = str_replace(["&lt;", "&gt;", '&amp;', '&#039;', '&quot;', '&lt;', '&gt;'], [
            "",
            "",
            'e',
            '',
            '',
            '',
            '',
        ], htmlspecialchars_decode($text, ENT_NOQUOTES));
        $text = strtr($text, $normalizeChars);
        $text = html_entity_decode(strtolower($text));

        $a = [
            '/ +/'                 => '-',
            '/ \(/'                => '-',
            '/\) /'                => '-',
            '/_+/'                 => '-',
            '/\//'                 => '-',
            "/[^a-zA-Z0-9\\-_+ ]/" => '',
            '/-+/'                 => '-',
            '/^-/'                 => '',
            '/-$/'                 => '',
        ];

        $replaced = preg_replace(array_keys($a), array_values($a), $text);
        if ($replaced === null) {
            throw new \RuntimeException('Replace failed');
        }

        return trim($replaced, '\\-_.+ ');
    }
}
