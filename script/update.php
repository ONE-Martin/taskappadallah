<?php

$data = json_decode(file_get_contents('php://input'), true);
if (isset($data['article'])) {
    require __DIR__ . '/library.php';
    $name = (isset($data['article']['name']) ? $data['article']['name'] : null);
    $description = (isset($data['article']['description']) ? $data['article']['description'] : null);
    $article_id = (isset($data['article']['id']) ? $data['article']['id'] : null);
    $price = (isset($data['article']['price']) ? $data['article']['price'] : null);

    if ($name == null) {
        http_response_code(400);
        echo json_encode(['errors' => ["Name  required"]]);
    } else {

        // Update the Article
        $article = new Article();
        $article->Update($name, $description, $article_id, $price);
    }
}
