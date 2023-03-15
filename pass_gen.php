<?php

require 'vendor/autoload.php';
require 'my_hash.php';

$login = 'kasiro';
$pass = '45105!45105!';
$site = 'habr.com';
$sym = '|';

// $ps_test = $login.$sym.$site.$sym.$pass;
$ps = $login.$sym.$site.$sym.$pass;
echo $ps . PHP_EOL;

$ps_hash = bpsr_wrapper($ps);
echo $ps_hash . PHP_EOL;
echo password_generate($ps, 12) . PHP_EOL;
dump(bpsr_verify($ps, $ps_hash));
