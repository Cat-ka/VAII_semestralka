<?php

include_once '../includes/init.php';

if (isset($user)) {
    if (isset($db1)) {
        $status = $user->signup($_POST, $db1);
    }
}

if ($status === 'success') {
    echo json_encode([
        'success' => 'success',
        'message' => '<p class="alert alert-success">Si uspesne zaregistrovany!</p>',
        'signout' => 1,
    ]);
} else if ($status === 'missing_fields') {
    echo json_encode([
        'error' => 'error',
        'message' => '<p class="alert alert-danger">Vsetky polia su povinne!</p>',
    ]);
} else if ($status === 'email_exists') {
    echo json_encode([
        'error' => 'error',
        'message' => '<p class="alert alert-danger">Zadany email sa uz pouziva!</p>',
    ]);
} else if ($status === 'mismatch_password') {
    echo json_encode([
        'error' => 'error',
        'message' => '<p class="alert alert-danger">Hesla sa nezhoduju!</p>',
    ]);
} else if ($status === 'error') {
    echo json_encode([
        'error' => 'error',
        'message' => '<p class="alert alert-danger">Nespravny email alebo heslo!</p>'
    ]);
}

