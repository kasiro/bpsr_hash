<?php

require 'vendor/autoload.php';
require 'my_hash.php';
require './jhp_modules/uid_generator.php';

$login = '89137759910';
$pass = 'truerealyexp';
$site = 'vk.com';
$sym = '|';

uid_generator::$abc = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

// srand();
$res = uid_generator::uid_generate('xxxx-xxxx-xxxx-xxxx', 'x');
// $ps_test = $login.$sym.$site.$sym.$pass;
// $ps = $login.$sym.$site.$sym.$pass;
// echo $ps . PHP_EOL;

$ps_hash = bpsr_wrapper($res);
echo $ps_hash . PHP_EOL;
// echo $site.': '.password_generate(strlen($ps)) . PHP_EOL;
// dump(bpsr_verify($ps, $ps_hash));
