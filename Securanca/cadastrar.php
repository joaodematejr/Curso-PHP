<?php

$email = $_POST["inputEmail"];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
    "secret" => "6LetjWIUAAAAAEQ5SYm76zOG6Cwql0n4VTfbOVkb",
    "response" => $_POST["g-recaptcha-response"],
    "remoteip" => $_SERVER["REMOTE_ADDR"],

)));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$repactcha = json_decode(curl_exec($ch), true);

curl_close($ch);

if ($repactcha["success"] === true) {
    echo "OK: " . $_POST["inputEmail"];
} else {
    header("Location: exemplo-04.php");
}