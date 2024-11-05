<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status_id = $_POST['status_id'];
    $user_id = $_POST['user_id'];

    //cek LIKES
    $selectCheck = mysqli_query($koneksi, "SELECT * FROM likes WHERE status_id='$status_id' AND user_id='$user_id'");

    if (mysqli_num_rows($selectCheck) > 0) {
        // jika sudah like, lakukan unlike
        $qUnlike = mysqli_query($koneksi, "DELETE FROM likes WHERE status_id='$id_status' AND user_id='$user_id'");
        if ($qUnlike) {
            //sukses
            $response = [
                'status' => 'sukses',
            ];
        }else {
            //gagal unlike
            $response =[
                'status' => 'gagal',
                'message' => 'Gagal Mengunlike.'
            ];
        }
    }else{
        //jika belum like
        $queryLike = mysqli_query($koneksi, "INSERT INTO likes (user_id, status_id) VALUES ('$user_id', '$status_id')");
        if ($queryLike) {
        $response = [
            'status' =>  'sukses',
            'message' =>  'Berhasil Like.'
        ];
        }
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    
}

?>