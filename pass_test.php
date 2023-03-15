<?php

require 'vendor/autoload.php';
require 'my_hash.php';
require './jhp_modules/uid_generator.php';
require './jhp_modules/Colors.php';
uid_generator::$abc = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

$hash = trim(file_get_contents('bpsr.hash'));
$r = (int) explode('$', $hash)[2];
for ($i = 5240837; $i <= 999999999999999; $i++) {
    $m = round(microtime(true) - $i);
    srand($m);
    $res = uid_generator::uid_generate('xxxx-xxxx-xxxx-xxxx', 'x');
    $h = bpsr_wrapper($res, $r);
    if ($h == $hash) {
        dd($res);
    }
    echo Colors::setColor($res . ' (' . $m . ')', 'red') . PHP_EOL;
    $m = microtime(true) - $i;
    srand($m);
    $res = uid_generator::uid_generate('xxxx-xxxx-xxxx-xxxx', 'x');
    $h = bpsr_wrapper($res, $r);
    if ($h == $hash) {
        dd($res);
    }
    echo Colors::setColor($res . ' (' . $m . ')', 'cyan') . PHP_EOL;
    srand($i);
    $res = uid_generator::uid_generate('xxxx-xxxx-xxxx-xxxx', 'x');
    $h = bpsr_wrapper($res, $r);
    if ($h == $hash) {
        dd($res);
    }
    echo Colors::setColor($res . ' (' . $i . ')', 'blue') . PHP_EOL;
}
