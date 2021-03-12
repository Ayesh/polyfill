<?php

$output = $_FILES;
foreach ($_FILES as $name => $file) {
    unset($file['tmp_name']);
    $output[$name] = $file;
}
print_r($output);
