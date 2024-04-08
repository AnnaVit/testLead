<?php

require 'vendor/autoload.php';

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\ConsoleOutput;

$data = [
    ["internal_history_id" => 2230893, "external_id" => 8615, "external_commission" => 0.0005],
    ["internal_history_id" => 2230891, "external_id" => 2159, "external_commission" => 0.0200],
    ["internal_history_id" => 2230892, "external_id" => 5349, "external_commission" => 0.0060],
    ["internal_history_id" => 563089, "external_id" => 8659, "external_commission" => 0.0054],
    ["internal_history_id" => 217403, "external_id" => 1462, "external_commission" => 0.0040],
    ["internal_history_id" => 2230883, "external_id" => 8859, "external_commission" => 0.0008],
    ["internal_history_id" => 2230581, "external_id" => 5988, "external_commission" => 0.0040],
    ["internal_history_id" => 2230592, "external_id" => 8659, "external_commission" => 0.9000],
    ["internal_history_id" => 208998, "external_id" => 8599, "external_commission" => 0.0600],
    ["internal_history_id" => 217467, "external_id" => 7612, "external_commission" => 0.0090],
    ["internal_history_id" => 2308935, "external_id" => 6923, "external_commission" => 0.0080]
];

$table = new Table(new ConsoleOutput());
$table->setHeaders($data[0]);

array_shift($data);

foreach ($data as $row) {
    $table->addRow($row);
}

$table->render();

//или так, но тогда сама табличка отображаться не будет

/*
echo "<table border='1'>";
echo "<tr><th>internal_history_id</th><th>external_id</th><th>external_commission</th></tr>";
foreach ($data as $row) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

*/
