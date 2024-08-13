<?php

use Vinkla\Hashids\Facades\Hashids;


if (!function_exists('hashId')) {
    function hashId($string, $type = 'encode')
    {
        return $type == 'encode' ? Hashids::encode($string) : Hashids::decode($string);
    }
}