<?php

//      https://authenticationbycall.com/docs
//      ver. 05112017

class abc
{



// Creating new authentication
    public function authpost($api_token, $form_token, $telephone)
    {
        $params = array(
            'method' => 'authpost',
            'api_token' => $api_token,
            'form_token' => $form_token,
            'telephone' => $telephone,
        );

        $response = $this->api_curl($params);
        $response = json_decode($response, true);
//        print_r($response);
        return $response;
    }

// check status of authentication
    public function authget($api_token, $form_token, $uniq_id)
    {
        $params = array(
            'method' => 'authget',
            'api_token' => $api_token,
            'form_token' => $form_token,
            'uniq_id' => $uniq_id,
        );
        $response = $this->api_curl($params);
        $response = json_decode($response, true);
//        print_r($response);
        return $response;
    }

//  geting list of phonenumbers that waiting calls
    public function phonenumbersget($api_token, $form_token)
    {
        $params = array(
            'method' => 'phonenumbersget',
            'api_token' => $api_token,
            'form_token' => $form_token
        );
        $response = $this->api_curl($params);
        $response = json_decode($response, true);
//        print_r($response);
        return $response;
    }

//  method for send curl
    private function api_curl($params)
    {
        $url = 'https://authenticationbycall.com/api/';

        $myCurl = curl_init();
        curl_setopt_array($myCurl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($params)
        ));
        $response = curl_exec($myCurl);
        curl_close($myCurl);
        return $response;
    }


    public function api_fileGetContents($link)
    {
        return file_get_contents($link);
    }

}