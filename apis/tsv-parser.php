<?php
$data = file_get_contents('https://docs.google.com/spreadsheets/d/e/2PACX-1vSjPzoYxeBQMbOG921hKGp2unk0IlC6QxLdrrmmo8NKE6jqm9199Lp2NsGjiYWlyv15YHf5G60JdbIj/pub?output=tsv');

$lines = explode("\n", $data);
$keys = explode("\t", $lines[0]);
$out = [];
for ($i = 1; $i < count($lines); $i++) {
    $data = explode("\t", $lines[$i]);
    $item = [];
    for ($y = 0; $y < count($data); $y++) {
        $data[$y] = str_replace("\r", "", $data[$y]);
        $keys[$y] = str_replace("\r", "", $keys[$y]);
        $item[$keys[$y]] = $data[$y];
    }
    array_push($out, $item);
}
file_put_contents("shopping.txt", json_encode($out));
header('Content-Type: application/json');
echo json_encode($out);

