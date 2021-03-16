<?php
$stringConnection = 'mysql:dbname=Books;host=localhost;';
$user = 'admin_barbara';
$password = 'b01042000H@';

try {
    $bd = new PDO($stringConnection, $user, $password);

    $preu = 50;

    $sql = 'SELECT title, author,year, price FROM books';

    $statement = $bd->prepare($sql);

    $statement = $bd->bindParam(':preu', $preu, PDO::PARAM_INT);
    //$books = $bd->query($sql);


    $statement->execute();

    $books = $statement->fetchAll();


    echo '<table>';
    echo '<tr>';
    echo '<td>' . "title" . '</td>';
    echo '<td>' . "Author" . '</td>';
    echo '<td>' . "Price" . '</td>';
    echo '</tr>';

    while ($book = $statement->fetch(PDO::FETCH_OBJ)) {
        echo '<tr>';
        echo '<td>' . $book->title . '</td>';
        echo '<td>' . $book->author . '</td>';
        echo '<td>' . $book->price . '</td>';
        echo '</tr>';
    }
    echo '</table>';

} catch
(PDOException $e) {
    echo "Error: " . $e;
}