<?php


class PaymentBackModel
{

    private $state;
    private $amount;
    private $error_code;
    private $error_description;
    private $reference_number;
    private $tracking_number;
    private $buy_id;
    private $token;

    public function __construct($post)
    {
        $this->state = $post["State"];    // integer
        $this->amount = $post["Amount"];
        $this->error_code = $post["ErrorCode"];
        $this->error_description = $post["ErrorDescription"];
        $this->reference_number = $post["ReferenceNumber"];
        $this->tracking_number = $post["TrackingNumber"];
        $this->buy_id = $post["BuyID"];
        $this->token = $post["Token"];
    }

    public function getState()
    {
        return $this->state;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getErrorCode()
    {
        return $this->error_code;
    }

    public function getErrorDescription()
    {
        return $this->error_description;
    }

    public function getReferenceNumber()
    {
        return $this->reference_number;
    }

    public function getTrackingNumber()
    {
        return $this->tracking_number;
    }

    public function getBuyId()
    {
        return $this->buy_id;
    }

    public function getToken()
    {
        return $this->token;
    }


}