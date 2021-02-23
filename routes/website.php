<?php
use Illuminate\Support\Facades\Route;

/** Payment Routes *************************************/

//checkout
Route::get('payment-checkout', 'PaymentController@payment_checkout')->name('payment_checkout');
Route::get('payment-success', 'PaymentController@payment_success')->name('payment_success');

Route::get('/payment-checkout', function () {

    $fields = '

    {
        "amount": 1,
        "currency": "KWD",

        "customer": {
          "first_name": "test",
          "middle_name": "test",
          "last_name": "test",
          "email": "test@test.com",
          "phone": {
            "country_code": "965",
            "number": "50000000"
          }
        },
        "source": {
          "id": "src_kw.knet"
        },
        "post": {
          "url": "http://your_website.com/post_url"
        },
        "redirect": {
          "url": "http://your_website.com/redirect_url"
        }
      }

    ';

    $curl = curl_init();

    curl_setopt_array($curl, array(

        CURLOPT_URL => "https://api.tap.company/v2/charges",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $fields,
        CURLOPT_HTTPHEADER => array(
            "authorization: Bearer sk_test_XKokBfNWv6FIYuTMg5sLPjhJ",
            "content-type: application/json",
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return json_decode("cURL Error #:" . $err, true);
    } else {
        return redirect('/payment-retrieve-charge?charge_id=' . json_decode($response, true)['id']);
    }

    // return view('website.payment.checkout' , compact('responseData'));

});

Route::get('/payment-retrieve-charge', function () {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.tap.company/v2/charges/".request('charge_id'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "{}",
        CURLOPT_HTTPHEADER => array(
            "authorization: Bearer sk_test_XKokBfNWv6FIYuTMg5sLPjhJ",
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
});
