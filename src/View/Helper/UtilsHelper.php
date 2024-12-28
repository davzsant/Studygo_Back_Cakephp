<?php

namespace App\View\Helper;

use Cake\I18n\DateTime;
use Cake\View\Helper;


class UtilsHelper extends Helper
{
    /**
     * Format the Data, if data is less then one day, it`s calc the difference in the time to now else just return the date
     * @param DateTime $data
     * @return string
     */
    public static function transform_post_date(DateTime $date): string
    {
        $now = DateTime::now();
        if($now->diffInDays($date) < 1)
        {
            return $date->timeAgoInWords();
        }

        return $date->i18nFormat();


    }
}
