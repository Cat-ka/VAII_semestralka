<?php

require_once '../includes/init.php';

if (isset($user)) {
    if (isset($db1)) {
        $status = $user->changePassword($_POST, $db1);
    }
}

if ($status === 'success') {
    echo json_encode([
        'success' => 'success',
        'message' => '<p class="alert alert-success">Zeslo bolo úspešne zmenené!</p>',
        'signout' => 1,
    ]);
} else if ($status === 'missing_fields') {
    echo json_encode([
        'error' => 'error',
        'message' => '<p class="alert alert-danger">Vsetky polia su povinne!</p>',
    ]);
} else if ($status === 'incorrect_old') {
    echo json_encode([
        'error' => 'error',
        'message' => '<p class="alert alert-danger">Pôvodné heslo je nesprávne!</p>',
    ]);
} else if ($status === 'mismatch_password') {
    echo json_encode([
        'error' => 'error',
        'message' => '<p class="alert alert-danger">Hesla sa nezhoduju!</p>',
    ]);
} else if ($status === 'error') {
    echo json_encode([
        'error' => 'error',
        'message' => '<p class="alert alert-danger">Chyba pri zmene hesla!</p>'
    ]);
}

