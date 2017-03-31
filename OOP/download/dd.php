<?php
$filename = "something.doc";

header("Content-Length: " . filesize($filename));
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=something.doc');

readfile($filename);
?>