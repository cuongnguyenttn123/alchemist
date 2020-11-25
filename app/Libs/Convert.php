<?php
/**
 * Created by PhpStorm.
 * User: khaih
 * Date: 12/19/18
 * Time: 2:30 PM
 */

namespace App\Libs;
use \DateTime;


class Convert
{


    public static function date_convert($date, $from = 'm/d/Y', $to = 'Y/m/d')
    {
//        $_date = DateTime::createFromFormat($from, $date);
        return strtotime($date);
    }
    public static function int_to_date($date, $format = 'd-m-Y'){

        $_date = date($format, $date);

        return $_date;
    }

}
