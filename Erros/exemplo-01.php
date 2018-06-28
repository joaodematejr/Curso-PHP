<?php

function error_handler($code, $message, $file, $line)
{
    echo json_encode(array(
        'code' => $code,
        'mensagem' => $message,
        'file' => $file,
        'line' => $line,
    ));
}

set_error_handler("error_handler");

echo $r;
