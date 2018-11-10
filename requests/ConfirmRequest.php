<?php


class ConfirmRequest
{

    public function send($token) {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://ecd.shaparak.ir/ipg_ecd/PayConfirmation',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array(
                "Token" => $token
            )
        ));
        $response = curl_exec($curl);
        curl_close($curl);

    }

}