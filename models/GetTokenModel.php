<?php

class GetTokenModel
{
    private $buyID;
    private $amount;
    private $date;
    private $time;
    private $language;


    public function __construct()
    {
        $this->date = date("Y-m-d");
        $this->time = date("h:i");
    }

    public function getBuyID()
    {
        return $this->buyID;
    }

    public function setBuyID($buyID)
    {
        $this->buyID = $buyID;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

}