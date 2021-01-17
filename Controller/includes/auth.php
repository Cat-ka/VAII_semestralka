<?php

include_once 'init.php';

if (!empty($user)) {
    if (isset($db1)) {
        $status = $user->login($_POST, $db1);
    }
}

if ($status === 'success') {
    echo json_encode([
        'success' => 'success',
        'message' => '<p class="alert alert-success">Si uspesne prihlaseny!</p>',
        'url' => '../Views/home.php',
    ]);
} else if ($status === 'missing_fields') {
    echo json_encode([
        'error' => 'error',
        'message' => '<p class="alert alert-danger">Vsetky polia su povinne!</p>',
    ]);
} else if ($status === 'error') {
    echo json_encode([
        'error' => 'error',
        'message' => '<p class="alert alert-danger">Nespravny email alebo heslo!</p>'
    ]);
}

