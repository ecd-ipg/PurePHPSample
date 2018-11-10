<?php
require_once("models/GetTokenModel.php");
require_once("models/GetTokenResponse.php");
require_once("models/PaymentBackModel.php");
require_once("requests/GetTokenRequest.php");
require_once("requests/ConfirmRequest.php");
require_once("requests/ReverseRequest.php");


class Controller
{

    public function startAction() {

        $getTokenModel = new GetTokenModel();
        $getTokenModel->setBuyID("12346789");
        $getTokenModel->setAmount("1000");
        $getTokenModel->setLanguage("fa"); // or "en"

        $getTokenRequest = new GetTokenRequest();
        $getTokenResponse = $getTokenRequest->send($getTokenModel);

        return $getTokenResponse;
        // return your view with TOKEN
    }


    // ConstParams::BACK_URI must refer to this action method
    public function backAction() {

        $post = $_POST;  // Returned values from the IPG - after payment
        $paymentBackModel = new PaymentBackModel($post);


        if ($paymentBackModel->getState() == 1) // Payment has been successful
        {
            // STEP 1 :
            // FIND YOUR TRANSACTION RECORD BY YOUR BUY_ID or TOKEN
            // $paymentBackModel->getBuyId()
            // $paymentBackModel->getToken()


            // STEP 2:
            // CHECK RETURNED AMOUNT ($paymentBackModel->getAmount()) WITH YOUR RECORD AMOUNT
            // These two should be equal


            // NOW!!!


            // IF ALL IS OK
                // $confirmRequest = new ConfirmRequest();
                // $confirmRequest->send($paymentBackModel->getToken());

            // ELSE
                // $reverseRequest = new ReverseRequest();
                // $reverseRequest->send($paymentBackModel->getToken());
        }
        else
        {
             $reverseRequest = new ReverseRequest();
             $reverseRequest->send($paymentBackModel->getToken());

        }

        // return your view with payment status
    }
}