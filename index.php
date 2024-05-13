<?php
include __DIR__ . '/form.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>OOP Form</title>
</head>
<body>

<div id="formcontainer">
    <h2>Hi! Insert your data :)</h2>
        <?php
            $form = $myform->renderForm();
            echo $form;
        ?>
</div>

</body>
</html>