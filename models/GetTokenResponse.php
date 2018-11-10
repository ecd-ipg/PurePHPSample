<?php

class GetTokenResponse
{
    private $state;
    private $result;
    private $errorDescription;
    private $errorCode;

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setResult($result)
    {
        $this->result = $result;
    }

    public function getErrorDescription()
    {
        return $this->errorDescription;
    }

    public function setErrorDescription($errorDescription)
    {
        $this->errorDescription = $errorDescription;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
    }



}