<?php

namespace fredyns\stringcleaner;

/**
 * Description of JsCleaner
 *
 * @author Fredy Nurman Saleh <email@fredyns.net>
 */
abstract class JsCleaner
{

    /**
     * remove javascript from string.
     * preventing user submitting script.
     *
     * @param string $string
     *
     * @return string
     */
    public static function clean($string = '')
    {
        $string = (string) $string;
        $string = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $string);

        return $string;
    }

}