<?php

// Асоціативний масив “бугалтерія”
// (Код, ПІБ; посада; стаж роботи; зарплата, кількість дітей).
// Запит учасників з країни Х, вік яких не менший за Y.


$buch = [
    'code' => null,
    'fullname' => null,
    'work' => null,
    'age' => null,
    'zp' => null,
    'kids' => null
];

$buch_arr = [
    [
        'code' => 1,
        'fullname' => 'Корник Олександр Володимирович',
        'work' => 'detailer',
        'age' => 8,
        'zp' => 1000,
        'kids' => 2
    ],
    [
        'code' => 2,
        'fullname' => 'Gracie Perry',
        'work' => 'engineer',
        'age' => 2,
        'zp' => 1500,
        'kids' => 4
    ],
    [
        'code' => 3,
        'fullname' => 'Conner Bridges',
        'work' => 'tankist',
        'age' => 54,
        'zp' => 2000,
        'kids' => 0
    ],
    [
        'code' => 4,
        'fullname' => 'Tara Pearce',
        'work' => 'tankist',
        'age' => 12,
        'zp' => 2500,
        'kids' => 18
    ],
];

if (isset($_POST['code'])) {
    $buch_arr[] = [
        'code' => $_POST['code'] ?? '',
        'fullname' => $_POST['fullname'] ?? '',
        'work' => $_POST['work'] ?? '',
        'age' => $_POST['age'] ?? '',
        'zp' => $_POST['zp'] ?? '',
        'kids' => $_POST['kids'] ?? '',
    ];
}

$buch_arr = array_filter($buch_arr, function ($element) {
    $return_flag = true;
    if (isset($_GET['work']) && $element['work'] != $_GET['work']) {
        $return_flag = false;
    }
    if ($return_flag && isset($_GET['kids']) && $element['kids'] < $_GET['kids']) {
        $return_flag = false;
    }
    return $return_flag;
});

include 'templates/competition_table.phtml';
include 'templates/competition_form_create.phtml';