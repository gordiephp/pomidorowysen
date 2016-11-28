<?php 
session_start();

function esc($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'utf-8');
}

function generate_token() {
    return $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));  
}

function check_token($token) {
    if(isset($_SESSION['token']) && $token === $_SESSION['token']) {
        unset($_SESSION['token']);
        return true;
    }
    return false;
}