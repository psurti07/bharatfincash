<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Openmoney Payment</title>
    <script src="<?php echo OPENMONEY_URL; ?>"></script>
</head>

<body onload="triggerLayer();">
    <div id="layerloader">
        <?php
        if (!empty($error))
            echo $error;
        if (isset($postData)) { ?>
            <?php echo $postData;
        } ?>
    </div>
</body>

</html>