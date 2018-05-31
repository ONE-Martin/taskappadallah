<?php

$data = json_decode(file_get_contents('php://input'), true);
if (isset($data['task'])) {
    require __DIR__ . '/library.php';

    $task_id = (isset($data['task']['id']) ? $data['task']['id'] : null);

    if ($task_id == null) {
        http_response_code(401);
        echo json_encode(['errors' => ["Id  required"]]);
    }else{
        // Update the Task
        $task = new Task();
        $task->delete($task_id);
    }
}

?>
