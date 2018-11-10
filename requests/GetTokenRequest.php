<?php
require_once(realpath(dirname(__FILE__)) . "/../models/GetTokenResponse.php");
require_once(realpath(dirname(__FILE__)) . "/../ConstParams.php");

class GetTokenRequest
{

    /**
     * @param GetTokenModel $getTokenModel
     * @return GetTokenResponse
     */
    public function send($getTokenModel) {
        $params_string =
            ConstParams::$TERMINAL_NUMBER .
            $getTokenModel->getBuyID() .
            $getTokenModel->getAmount() .
            $getTokenModel->getDate() .
            $getTokenModel->getTime() .
            ConstParams::$BACK_URI .
            ConstParams::$KEY;

        $check_sum = sha1($params_string);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://ecd.shaparak.ir/ipg_ecd/PayRequest',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array(
                "TerminalNumber" => ConstParams::$TERMINAL_NUMBER,
                "BuyID" => $getTokenModel->getBuyID(),
                "Amount" => $getTokenModel->getAmount(),
                "date" => $getTokenModel->getDate(),
                "time" => $getTokenModel->getTime(),
                "RedirectURL" => ConstParams::$BACK_URI,
                "Language" => $getTokenModel->getLanguage(),
                "CheckSum" => $check_sum,
            )
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($response, true);
        $getTokenResponse = new GetTokenResponse();
        $getTokenResponse->setState($response["State"]);
        $getTokenResponse->setResult($response["Res"]);
        $getTokenResponse->setErrorDescription($response["ErrorDescription"]);
        $getTokenResponse->setErrorCode($response["ErrorCode"]);

        return $getTokenResponse;
    }


}