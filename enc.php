<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $nrmlpass = "kundan2813";
    $encpass = password_hash("kundan2813", PASSWORD_DEFAULT);

    echo password_verify($nrmlpass, $encpass);

    ?>
</body>

</html>