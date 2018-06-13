<?php

$data = json_decode(file_get_contents('php://input'), TRUE);
//var_dump($data);
if (isset($data['article'])) {

    require __DIR__ . '/library.php';

    $name = (isset($data['article']['name']) ? $data['article']['name'] : NULL);
    $description = (isset($data['article']['description']) ? $data['article']['description'] : NULL);
    $price = (isset($data['article']['price']) ? $data['article']['price'] : NULL);

    // validated the request
    if ($name == NULL) {
        http_response_code(400);
        echo json_encode(['errors' => ["Name  required"]]);
    } else {

        // Add the article
        $article = new Article();

        echo $article->create($name, $description, $price);
    }
}
  ?>
