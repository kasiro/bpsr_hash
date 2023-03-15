<?php

require 'vendor/autoload.php';
require 'my_hash.php';
require './jhp_modules/uid_generator.php';
require './jhp_modules/Colors.php';
uid_generator::$abc = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

$hash = trim(file_get_contents('bpsr.hash'));
$r = (int) explode('$', $hash)[2];
for ($i = 1; $i <= 999999999999999; $i++) {
    srand($i);
    $res = uid_generator::uid_generate('xxxx-xxxx-xxxx-xxxx', 'x');
    $h = bpsr_wrapper($res, $r);
    if ($h == $hash) {
        dd($res);
    }
    echo Colors::setColor($res . ' (' . number_format($i, 0, ' ', ' ') . ')', 'red') . PHP_EOL;
}
