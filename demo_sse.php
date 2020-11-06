<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$mysqli = new mysqli("us-cdbr-east-02.cleardb.com", "b69dd2bc0a0c4e", "a50a94df", "heroku_e949ce84f2e1714");
$calc_table_contents = $mysqli -> query("SELECT * FROM calculations ORDER BY id DESC");
$out = "";
while($row = $calc_table_contents->fetch_array()) {
    $out .= '<pre>' . $row[1] . '</pre>';
}

echo "data: {$out}\n\n";
flush();
?>