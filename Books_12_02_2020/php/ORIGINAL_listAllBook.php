<?php
$stringConnection = 'mysql:dbname=Books;host=localhost;';
$user = 'admin_barbara';
$password = 'b01042000H@';

try {
    $bd = new PDO($stringConnection, $user, $password);
    $sql = 'SELECT title, author,year, price FROM books';
    $statement = $bd->prepare($sql);  //Es más robusta
    //$books = $bd->query($sql);
    //Todo: estudiar
    $statement->execute();
    $books = $statement->fetchAll();


    /* foreach ($books as $book) {
            echo "Title: " . $book['title'] . " Author: " . $book['author'] . " Price: " . $book['price'] . "\n";
        }*/
    //Print table

    //Es rocomendable usar PDO prepare
    echo '<table>';
    echo '<tr>';
    echo '<th>' . "title" . '</th>';
    echo '<th>' . "Author" . '</th>';
    echo '<th>' . "Price" . '</th>';
    echo '</tr>';
    foreach ($books as $book) {
        echo '<tr>';
        echo '<td>' . $book['title'] . '</td>';
        echo '<td>' . $book['author'] . '</td>';
        echo '<td>' . $book['price'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';

} catch
(PDOException $e) {
    echo "Error: " . $e;
}