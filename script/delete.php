<?php

$data = json_decode(file_get_contents('php://input'), true);
if (isset($data['article'])) {
    require __DIR__ . '/library.php';

    $article_id = (isset($data['article']['id']) ? $data['article']['id'] : null);

    if ($article_id == null) {
        http_response_code(401);
        echo json_encode(['errors' => ["Id  required"]]);
    }else{
        // Update the Article
        $article = new Article();
        $article->delete($article_id);
    }
}

?>
