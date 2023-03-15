<?php

require './jhp_modules/Sh.php';

function password_generate(int $r, int $passlen = 12) {
    $abc = '!0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $pass = '';
    srand($r);
    for ($i = 1; $i <= $passlen; $i++) {
        $pass .= $abc[rand(0, strlen($abc) - 1)];
    }
    return $pass;
}

function bpsr_wrapper(string $string, int $cost = 0) {
    $min = 1;
    $max = 99;
    if ($cost === 0) {
        $r = rand($min, $max);
    } else {
        if ($cost >= $min && $cost <= $max) {
            $r = $cost;
        } else {
            throw new Exception('invalid $cost = '.$cost);
        }
    }
    return '$1bsr$'.$r.'$'.bpsr_encode($string, $r);
}

function salt_generate(int $r, int $saltlen = 13) {
    $abc = './0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $salt = '';
    srand($r);
    for ($i = 1; $i <= $saltlen; $i++) {
        $salt .= $abc[rand(0, strlen($abc) - 1)];
    }
    return $salt;
}

function bpsr_verify(string $password, string $hash){
    $i = (int) explode('$', $hash)[2];
    if (bpsr_wrapper($password, $i) === $hash) {
        return true;
    }
    return false;
}

function bpsr_encode(string $string, int $r) {
    CODER_caesar::$abc = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $salt = salt_generate($r);
    $hash = base64_encode($string);
    $hash = substr($hash, 0, -2);
    $salt_encode = CODER_caesar::caesarEncode($salt, $r);
    $hash_encode = CODER_caesar::caesarEncode($hash, $r+10);
    return $salt_encode.$hash_encode;
}
