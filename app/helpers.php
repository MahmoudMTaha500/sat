<?php 


// return the avg of stutend rates or swich to the sat rat
function institute_rate($institute_obj){
    $institute_obj;
    if($institute_obj->rate_switch == 0){
        return $institute_obj->sat_rate;
    }else{
        if(empty($institute_obj->rats[0])){
            return 5;
        }else{
            $students_rate = 0;
            $arr_length = count($institute_obj->rats);
            $rate_avg = 0;
            foreach($institute_obj->rats as $rate_el){
                $students_rate += $rate_el->rate;
            }
            $rate_avg = $students_rate/$arr_length;
            return round($rate_avg);

        }
    }
}


function ArabicDate($date) {
    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $your_date = $date; // The Current Date
    $str_date = strtotime($your_date);
    $en_month = date("M", $str_date);
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }

    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = date('D' , $str_date); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);

    header('Content-Type: text/html; charset=utf-8');
    $standard = array("0","1","2","3","4","5","6","7","8","9");
    $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
    // $current_date = $ar_day.' '. date('d' , $str_date).' / '.$ar_month.' / '.date('Y' , $str_date);     // full format
    return $current_date = date('d' , $str_date).' '.$ar_month.' '.date('Y' , $str_date);     // costum format
    $arabic_date = str_replace($standard , $eastern_arabic_symbols , $current_date);

    return $arabic_date;
}



// return the price of selected week
function price_per_week($prices_obj , $weeks){
    $price_per_week=0;


//   $arr = json_decode( $prices_obj);
//   $arr =sort( $arr);
    $prices_obj = $prices_obj->sort();
    // dd($prices_obj);

    foreach($prices_obj as $week_price){
        $price_per_week = $week_price->price;
        if($weeks <= $week_price->weeks){
            $price_per_week = $week_price->price;
            break;
        }
    }
    return $price_per_week;
}