<?php 
use AmrShawky\LaravelCurrency\Facade\Currency;

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
    foreach($prices_obj as $course_price){
        $price_per_week = $course_price->price;
        if($weeks <= $course_price->weeks){
            break;
        }
    }
    return $price_per_week;
}

// generate random password for users
function random_password() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 9; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

// return the to date of student request
function to_date($from_date , $weeks) {
    $to_date = date('m/d/Y' ,  strtotime($from_date." +$weeks week"));
    return $to_date;
}

function heart_type($course_obj) {
    $student_id = auth()->guard('student')->user()->id;
    foreach($course_obj->student_favourite as $favourite){
        if($favourite->student_id == $student_id){
            return 'fas';
        }
    }
    return 'far';
}


function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();
    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}


function currency_convertor($from, $to, $price_amount) {
    $string = $from . "_" . $to;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://free.currconv.com/api/v7/convert?q=" . $string . "&compact=ultra&apiKey=fc5abbd5b1451aedcb40",
        CURLOPT_RETURNTRANSFER => 1
    ));
    $response = curl_exec($curl);
    $response = json_decode($response, true);
    if($response != null && !isset($response["error"])){
        return $response[$string]*$price_amount;
    }else{
        $converted_price = Currency::convert()
        ->from($from)
        ->to($to)
        ->amount(1)
        ->withoutVerifying()
        ->get();
        
        if($converted_price*$price_amount != 0){
            return $converted_price*$price_amount;
        }else{
            $oanda_url = 'https://cc-api.oanda.com/cc-api/v1/currencies?base='.$from.'&quote='.$to.'&data_type=general_currency_pair&start_date=2022-05-08&end_date=2025-05-09';
            // print_r($oanda_url);
            $oanda_respons = json_decode(CallAPI('GET' , $oanda_url), true)['response'][0];
            $oanda_converted_price = $oanda_respons['average_bid'];
            return $oanda_converted_price*$price_amount;
        }
        
    }

    
}


function send_whatsapp_message($to , $body) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.ultramsg.com/instance3604/messages/chat",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "token=cfy58w02acrkwbv8&to=$to&body=$body&priority=1&referenceId=",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded"
        ),
    ));
    
    if(env('APP_DEBUG')){
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    }
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    // if ($err) {
    //     echo "cURL Error #:" . $err;
    // } else {
    //     echo $response;
    // }

}
