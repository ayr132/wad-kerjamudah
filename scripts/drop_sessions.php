<?php
$db = new PDO('sqlite:' . __DIR__ . '/../database/database.sqlite');
if ($db->exec("DROP TABLE IF EXISTS sessions")) {
    echo "dropped\n";
} else {
    $err = $db->errorInfo();
    echo "error: " . json_encode($err) . "\n";
}
