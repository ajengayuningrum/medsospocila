<?php
require_once "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status_id = $_POST['status_id'];
    $user_id = $_POST['user_id'];

    //CHECK STATUS
    $selectCheck = mysqli_query($koneksi, "SELECT * FROM likes WHERE status_id = '$status_id' AND user_id = '$user_id'");

    if (mysqli_num_rows($selectCheck) > 0) {
        //Jika sudah like, lakukan unlike
        $qUnlike = mysqli_query($koneksi, "DELETE FROM likes WHERE status_id = '$status_id' AND user_id = '$user_id'");

        if ($qUnlike) {
            $response = ['status' => 'unliked'];
        } else {
            //gagal unlike
            $response = ['status' => 'error', 'message' => 'Gagal mengunlike'];
        }
    } else {
        //Jika belum like, lakukan like
        $queryLike = mysqli_query($koneksi, "INSERT INTO likes (user_id, status_id) VALUES ('$user_id','$status_id')");

        if ($queryLike) {
            //Sukses
            $response = ['status' => 'likes'];
        } else {
            //Gagal unlike
            $response = ['status' => 'error', 'message' => 'Gagal menyukai'];
        }
    }
    //kirim response
    header('Content-Type: application/json');
    echo json_encode($response);
}
