<?php

$command = escapeshellcmd('python ../python/edits.py');
$output = shell_exec($command);

echo "<script> location.href='testinggrounds.php'; </script>";
        exit;

?>
