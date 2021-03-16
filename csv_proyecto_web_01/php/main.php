<?php
session_start();

if (isset($_POST['submit'])) {

    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileType = $_FILES['file']['type'];
    $fileTmp = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $fileSiz = $_FILES['file']['size'];

    $fileExten = explode('.', $fileName);

    $fileActualExten = strtolower(end($fileExten));//Get last element from the array 'end'

    $allowed = array('csv');


    if (in_array($fileActualExten, $allowed)) {
        if ($fileError === 0) {
            if ($fileSiz < 700000) {

                $fileNameNew = uniqid('', true) . "." . $fileActualExten;//Save the file with an unique id
                $fileDestination = '../resources/' . $fileNameNew;

                //Save the file into the server
                move_uploaded_file($fileTmp, $fileDestination);

                $_SESSION["direction"] = file($fileDestination);

                header('Location:../index.php');
            } else {
                echo "Your file is too big...";
            }
        } else {
            echo "There was an error uploading your file";
        }
    } else {

        echo "This file extension is not allowed";
    }

}