<?php
$db = new SQLite3(__DIR__ . '/../database/database.sqlite');
$res = $db->query("SELECT name, sql FROM sqlite_master WHERE type='table' AND name='sessions'");
$row = $res->fetchArray(SQLITE3_ASSOC);
if ($row) {
    echo "sessions table SQL:\n";
    echo $row['sql'] . "\n\n";
    echo "PRAGMA table_info('sessions'):\n";
    $res2 = $db->query("PRAGMA table_info('sessions')");
    while ($r = $res2->fetchArray(SQLITE3_ASSOC)) {
        echo json_encode($r) . "\n";
    }
} else {
    echo "no sessions table\n";
}
