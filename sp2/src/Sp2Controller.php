<?php

namespace mowmita\sp2;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Sp2Controller extends Controller
{

    public function index(){

        return view('sp2::demo');
    }
    public function pay(Request $request){
        $info = array(
            'prefix' => "spay",
            'currency' => $request->currency,
            'return_url' => "http://127.0.0.1:8000/subtract/5/2",
            'cancel_url' => "http://127.0.0.1:8000/subtract/5/2",
            'amount' => $request->amount,
            'order_id' => $request->order_id,
            'discsount_amount' => 0,
            'disc_percent' => 0,
            'client_ip' => "http://127.0.0.1:8000/subtract/5/2",
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'email' => $request->email,
            'customer_address' => $request->customer_address,
            'customer_city' => $request->customer_city,
            'customer_state' => $request->customer_state,
            'customer_postcode' => $request->customer_postcode,
            'customer_country' => $request->customer_country,
        );

        $response = $this->getUrl($info);
        $arr = json_decode($response);
   /*     print_r($arr);
        exit();*/
        $url = ($arr->checkout_url);
        return redirect($url);
        //print_r($url);
        /*echo $tok;
        session_start();
        $_SESSION[token"] = "$tok";*/
       // header("Location:$url");
    }
    public function add($a, $b){
        $result = $a + $b;
        return view('sp2::demo', compact('result'));
    }

    public function subtract($a, $b){
        echo $a - $b;
    }

    public function getToken() {
        $user="shurjopay";
        $pass="pyyk97hu&6u6";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://engine.shurjopayment.com/api/get_token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
    "username": "'.$user.'",
    "password": "'.$pass.'"
}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function getUrl($info) {
        $response=$this->getToken();
        $arr=json_decode($response);
        $tok=($arr->token);
        $s_id=($arr->store_id);

        $info2=array(
            'token'=>$tok,
            'store_id'=>$s_id);
        $final_array=array_merge($info2, $info);
        $bodyJson=json_encode($final_array);
      /*  print_r($bodyJson);
        exit();*/
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://engine.shurjopayment.com/api/secret-pay',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$bodyJson,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
            exit();
        }else{
            return $response;
        }

    }

}
