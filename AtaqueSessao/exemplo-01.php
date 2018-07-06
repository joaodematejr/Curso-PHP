<?php

session_start();
//DEPOIS DE VERIFICAR LOGIN REINICIE O ID DA SESSÃO
session_destroy();

session_start();

session_regenerate_id();

echo session_id();
