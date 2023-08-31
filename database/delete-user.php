<?php
$data = $_POST;
$user_id = (int) $data['user_id'];
$first_name =  $data['f_name'];
$last_name =  $data['l_name'];
try {
    $command = "DELETE FROM users WHERE id={$user_id}";
    include('connection.php');
    $conn->exec($command);

    echo json_encode([
        'status' => true,
        'message' => $first_name . ' ' . $last_name . ' Successfully deleted '
    ]);
} catch (\PDOException $e) {
    echo json_encode([
        'status' => false,
        'message' => 'Error while deleting users!'
    ]);
}
