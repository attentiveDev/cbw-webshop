<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function showFatalError($error) {
    echo "<!DOCTYPE html><html><head><style>body {background-color:#eee;color:#e00;text-shadow: 1px 1px 3px #777;font-size:1.2em;}</style></head><body>";
    echo "<p class='error'><strong>KRITISCHER ANWENDUNGSFEHLER:</strong><br><br>" . $error . "</p></body></html>";
    die();
}

function getRequestValue($name) {
    $value = isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
    return $value;
}

function getShortText($text) {
    $words = 10;
    if (str_word_count($text) < $words) {
        $words = str_word_count($text);
    }
    $textArray = explode(" ", $text);
    $newText = '';
    for ($x = 0; $x <= $words - 1; $x++) {
        if (isset($textArray[$x])) {
            $newText .= $textArray[$x] . " ";
        }
    }
    if (strlen($text) > strlen($newText)) {
        $newText .= "...";
    }
    return $newText;
}

function isVerifiedCustomer() {
    if (isset($_SESSION["customerVerified"]) && $_SESSION["customerVerified"] == true) {
        return true;
    } else {
        return false;
    }
}