<?php
// ==========================================================================
// --- ↓↓ Conexión con la BD ↓↓ ---------------------------------------------
// ==========================================================================

// -------------------------------------------
// --- ↓↓ Variables ↓↓ -----------------------
// -------------------------------------------
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'chat_system';

// -------------------------------------------
// --- ↓↓ Conexión ↓↓ ------------------------
// -------------------------------------------
$connection = new mysqli($host, $user, $pass, $db_name);

// -------------------------------------------
// --- ↓↓ Formato del tiempo ↓↓ --------------
// -------------------------------------------
function formatDate($date){
    // return date('F j, Y, g:i a', strtotime($date));
    return date('g:i a', strtotime($date));
}