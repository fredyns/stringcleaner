<?php

namespace fredyns\stringcleaner;

/**
 * Description of StringCleaner
 *
 * @author Fredy Nurman Saleh <email@fredyns.net>
 */
abstract class StringCleaner
{

    /**
     * remove all spaces, tabs & newline
     *
     * @param string $string
     *
     * @return string
     */
    public static function cleanSpaces($string)
    {
        $string = (string) $string;
        $string = (string) preg_replace('/\s+/', ' ', $string);
        $string = (string) trim($string);

        return $string;
    }

    /**
     * plain text filter
     *
     * @param string $string
     * @return string
     */
    public static function forPlaintext($string)
    {
        $string = Utf8Cleaner::clean($string);
        $string = static::cleanSpaces($string);

        return $string;
    }

    /**
     * html text filter
     *
     * @param string $string
     * @return string
     */
    public static function forRTF($string)
    {
        $string = static::plaintext($string);
        $string = JsCleaner::clean($string);

        return $string;
    }

}