<?php

$dades = simplexml_load_file('cd_catalog.xml');

try {
    if (isset($dades)) {
        $resultado = $dades->xpath('/CATALOG/CD/TITLE[../PRICE/text()>"8"]');

        echo '<table>';
        echo '<tr>';
        echo '<th>' . "Titulos con precio mayor a > 8 " . '</th>';
        echo '</tr>';

        foreach ($resultado as $i => $row) {
            echo '<tr>';
            echo '<td>' . $row . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
} catch (Exception $e) {
    echo 'Error: ', $e->getMessage(), "\n";
}
