<?php
require_once("Controller.php");

  $controller = new Controller();
  $getTokenResponse = $controller->startAction();

  if ($getTokenResponse->getState() == 1)  // Success
  {
      $token = $getTokenResponse->getResult();
      $description = "شناسه پرداخت با موفقیت دریافت شده است. برای انتقال به درگاه پرداخت بر روی دکمه پرداخت کلیک نمایید.";
  }
  else
  {
      $token = "";
      $description = "خطا در دریافت شناسه پرداخت: " . $getTokenResponse->getErrorDescription();
  }

?>

<!DOCTYPE html>
<html>
<body>

<h2>ECD IPG SAMPLE</h2>

<form method="post" action="https://ecd.shaparak.ir/ipg_ecd/PayStart">



  <!-- set token -->
  <input type="hidden" name="Token" placeholder="Token" value="<?php echo $token ?>" />



  <input type="text" name="amount" value="1000" readonly="readonly">
  <br><br>
  <input type="submit" value="پرداخت">
</form>

<p><?php echo $description ?></p>

</body>
</html>