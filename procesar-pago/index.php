<?php

echo $_POST['pref'];


		$code = $_POST['pref'];


		$php_curl = curl_init();
		curl_setopt_array($php_curl, array(
		    CURLOPT_URL => "https://api.mercadopago.com/v1/payments/".$code,
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 30000,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "GET",
		    CURLOPT_HTTPHEADER => array(
		      // Set POST here requred headers
		        "accept: */*",
		        "accept-language: en-US,en;q=0.8",
		        "content-type: application/json",
		        "Authorization: Bearer APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398",
		    ),
		));


		$final_results = curl_exec($php_curl);
		$err = curl_error($php_curl);
		curl_close($php_curl);


		var_dump($final_results);