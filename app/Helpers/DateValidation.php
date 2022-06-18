<?php

namespace App\Helpers;
use Carbon\Carbon;
class DateValidation{
    public static function basicValidation(String $startDate, String $endDate, Int $dateRange = 31){
        $start=Carbon::create($startDate.'00:00:00');
        $end=Carbon::create($endDate.'23:59:59');
        if( $end > $start->copy()->addDays($daterange) )
            return 'End Date maksimal '.$daterange.' hari setelah Start Date';
        
        if($start > $end)
            return 'Start Date tidak boleh melebihi End Date';

        return false;
    } 
}