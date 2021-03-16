<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Upload CVS file</h1>
<form action="php/main.php" method="post" enctype="multipart/form-data">
    Select csv to upload:
    <input type="file" name="file" id="file">
    <input type="submit" value="Upload csv" name="submit">
</form>
<?php
if (isset($_SESSION["direction"])) {
    $file = $_SESSION["direction"];

    //Save the file into 2d array
    //$delimiter = checkDelimiter($file);
    foreach ($file as $fileRow) $fileFromUser[] = explode(',', $fileRow);
    //Create the table dynamically
    if (isset($fileFromUser)) {
        echo '<table>';
        echo '<tr>';
        foreach ($fileFromUser as $i => $row) {
            echo '<tr>';
            foreach ($row as $userValue) {
                if ($i == 0) {
                    echo '<th>' . $userValue . '</th>';
                    if ($i > 0) {//Not header
                        echo '</tr>';
                        break;
                    }
                } else {
                    echo '<td>' . $userValue . '</td>';
                }
            }
        }
        echo '</table>';
    }
    $_SESSION["direction"] = null;

}
//Crear funcion check delimiters, firebase
/*   function checkDelimiter($file)
{ $delimiters = [";", ",", "\t", "|"];
    $firstLine = fgets($file); //Get the first line of a file
    foreach ($file as $valor) {
        if (in_array(str_split($valor), $delimiters)) {
            return $valor;
        }
    }}*/
?>
</body>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<!--<script src="/__/firebase/8.2.5/firebase-app.js"></script>-->

<!-- TODO: Add SDKs for Firebase products that you want to use-->
<!--    https://firebase.google.com/docs/web/setup#available-libraries -->
<!--<script src="/__/firebase/8.2.5/firebase-analytics.js"></script>-->

<!-- Initialize Firebase -->
<!--<script src="/__/firebase/init.js"></script>-->-->
</html>