<?php

function giveTotalPrice($groceries) {
    $totalPrice = 0;
    foreach ($groceries as $value) {
        $totalPrice += ($value["price"] * $value["NUMBER"]);
    }
echo number_format($totalPrice, 2, ',', ' ');
}

function buildList($groceries) {
    foreach ($groceries as $value) {
        $price = number_format($value["price"], 2, ',', ' ');
        $itemTotal = number_format(($value["price"] * $value["NUMBER"]), 2, ',', ' ');
            echo
            "<tr>
                <td>{$value["NAME"]}</td>
                <td>{$price}&#8364</td>
                <td>{$value["NUMBER"]}</td>
                <td>{$itemTotal}&#8364</td>
            </tr>";
        }
}