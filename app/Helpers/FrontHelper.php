<?php
namespace App\Helpers;

class FrontHelper {

    public static function formattedDate($date,$type="news") 
    {
        $format_en = "";
        $format_other = "";

        switch ($type) {
            case 'datepicker':
                $format_en = 'Y-m-d';
                $format_other = 'd/m/Y';
                break;
            default:
                $format_en = 'l, F d | Y';
                $format_other = 'l d, F | Y';            
                break;
        }

        //example
        if(config('app.locale') == 'en')
        {
            return \Date::parse($date)->format($format_en);
        }
        else
        {
            return ucwords(\Date::parse($date)->format($format_other));
        }
    }

    public static function getCookieRegistrado() {
        return \Cookie::get(config('constantes.cookieRegistrado'),null);
    }

    public static function setCookieRegistrado($valor) {
        return \Cookie::queue(\Cookie::make(config('constantes.cookieRegistrado'), md5($valor), 518400));
    }
 
}