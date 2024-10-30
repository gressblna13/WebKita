<?php
$foodImages = [
    'aparizer1.jpg', 'aparizer2.jpg', 'aparizer3.jpg', 'aparizer4.jpg',
    'main1.jpg', 'main2.jpg', 'main3.jpg', 'main4.jpg',
    'des1.jpg', 'des2.jpg', 'des3.jpg', 'des4.jpg',
    'mum1.jpg', 'mum2.jpg', 'mum3.jpg', 'mum4.jpg'
];

$foods = [];

for ($i = 0; $i < count($foodImages); $i++) {
    if ($i < 4) {
        $foodType = 'Appetizer Menu';
    } elseif ($i < 8) {
        $foodType = 'Main Dish Menu';
    } elseif ($i < 12) {
        $foodType = 'Dessert';
    } else {
        $foodType = 'Drink';
    }

    $description = 'Description for ' . $foodType . ' ' . ($i + 1);

    $foods[] = [
        'id' => $i + 1,
        'title' => $foodType . ' ' . ($i + 1),
        'description' => $description,
        'imageUrl' => '../images/' . $foodImages[$i]
    ];
}

echo json_encode($foods);
?>
