<?php

namespace Library\Helpers;

use DateTime;

class Helper
{
    /**
     * @return bool|string
     */
    public static function showError()
    {
        return ini_set('display_errors','on');
    }

    /**
     * @param $str
     * @return string
     */
    public static function Mask($str)
    {
        $mask = "%s%s%s.%s%s%s.%s%s%s-%s%s";
        return  vsprintf($mask, str_split($str));
    }

    /**
     * @param $str
     * @return null|string|string[]
     */
    public static function Unmasking($str)
    {
        return preg_replace("/\D+/", "", $str);
    }

    /**
     * @param $date
     * @param $currentFormat
     * @param $newFormat
     * @return string with new format date
     */
    public static function dateFormat($date, $currentFormat, $newFormat)
    {
        $dateString = DateTime::createFromFormat($currentFormat, $date);
        return $dateString->format($newFormat);
    }

    /**
     * @param $str
     * @return bool|string
     */
    public static function cryptography($str)
    {
        // Gera um código/senha de 128 bits criptografado 2 vezes
        $salt = md5('umTextoC0mNum3r0'. $str .'5eL3tr45sSolo');
        $cod = crypt($str, $salt);

        return hash('sha512', $cod);
    }

    /**
     * @param $array
     * @return bool
     */
    public static function validadeInput($array)
    {
        foreach ($array as $key => $item) {

            if(!isset($item) || empty($item)) {
                return false;
            }
        }

        return true;
    }
}