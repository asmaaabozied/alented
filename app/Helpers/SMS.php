<?php

namespace App\Helpers;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;

class SMS{

    public static function sendSms($to, $message)
    {
        // $code = "+2";
        $id = 'ACac9d9abad2f240e2688e083f38907849';
		$token = '3644eae699cd1623ea093a5e9e50a51f';
		$url = "https://api.twilio.com/2010-04-01/Accounts/$id/SMS/Messages.json";
		$from = '+13343731849';
		// $to = $to; // twilio trial verified number
		$body = $message;
		$data = array (
			'From' => $from,
			'To' => $to,
			'Body' => $body,
		);
		$post = http_build_query($data);
		$x = curl_init($url );
		curl_setopt($x, CURLOPT_POST, true);
		curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
		curl_setopt($x, CURLOPT_POSTFIELDS, $post);
		$y = curl_exec($x);

		curl_close($x);
        $response = json_decode($y,true);
        
        return $response;
    }
}