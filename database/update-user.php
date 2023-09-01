<?php
$data = $_POST;
$user_id = (int) $data['userId'];
$first_name =  $data['f_name'];
$last_name =  $data['l_name'];
$email =  $data['email'];

try {
    $sql = "UPDATE users SET email=?, first_name=?, last_name=?, updated_at=? WHERE id=?";
    include('connection.php');
    $conn->prepare($sql)->execute([$email, $first_name, $last_name, date('Y-m-d H:i:s'), $user_id]);

    echo json_encode([
        'status' => true,
        'message' => $first_name . ' ' . $last_name . ' Successfully updated '
    ]);
} catch (\PDOException $e) {
    echo json_encode([
        'status' => false,
        'message' => 'Error while updating users!'
    ]);
}
