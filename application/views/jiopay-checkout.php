<!DOCTYPE html>
<html>
<head>
  <title>Jio - Payment Process</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

	<form method="post" action="https://uat.jiopay.co.in/tsp/pg/api/v2/initiateSale">
    <input type="hidden" name="merchantId" value="<?= $postData['merchantId'] ?>">
    <input type="hidden" name="orderId" value="<?= $postData['orderId'] ?>">
    <input type="hidden" name="amount" value="<?= $postData['amount'] ?>">
    <input type="hidden" name="currency" value="<?= $postData['currency'] ?>">
    <input type="hidden" name="returnUrl" value="<?= $postData['returnUrl'] ?>">
    <input type="hidden" name="signature" value="<?= $checksum ?>">
    <button type="submit">Pay Now</button>
</form>

</body>
</html>
