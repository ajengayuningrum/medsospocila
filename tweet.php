<?php
if (isset($_POST['posting'])) {
    $content = $_POST['content'];

    // jika gambar mau diubah
    if (!empty($_FILES['foto']['name'])) {
        $nama_foto =  $_FILES['foto']['name'];
        $ukuran_foto =  $_FILES['foto']['size'];

        $ext = array('png', 'jpg', 'jpeg');
        $extFoto  = pathinfo($nama_foto, PATHINFO_EXTENSION);

        //jika extension foto tidak ada ext yang terdaftar di array ext maka foto tidak boleh diupload
        if (!in_array($extFoto, $ext)) {
            echo "Ext tidak ditemukan";
            die;
        } else {
            //pindahkan gambar dari tmp folder ke folder yang sudah kita buat
            // unlink() : menghapus file
            unlink('upload/' . $rowUser['foto']);
            move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $nama_foto);

            $insert = mysqli_query($koneksi, "INSERT INTO tweet(content, id_user, foto) VALUES('$content', '$id_user', '$nama_foto') ");
        }
    }  //jika tidak mau diubah
    else {
        $insert = mysqli_query($koneksi, "INSERT INTO tweet(content, id_user) VALUES('$content', '$id_user') ");
    }
    header("location:?pg=profil&tweet=berhasil");
}

$queryPosting = mysqli_query($koneksi, "SELECT * FROM tweet WHERE id_user='$id_user' ");

?>
<div class="row">
    <div class="col-sm-12" align="right">
        <button class="btn btn-outline-success fw-bold" style="border-radius: 18px;" data-bs-toggle="modal" data-bs-target="#exampleTweet">Tweet</button>
    </div>
    <div class="col-sm-12 mt-3">
        <?php while ($rowPosting = mysqli_fetch_assoc($queryPosting)): ?>
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <img src="upload/<?php echo !empty($rowUser['foto']) ? $rowUser['foto'] : 'https://placehold.co/500x200' ?>" alt="..." width="100" class="border border-2 rounded-circle">
                </div>
                <div class="flex-grow-1 ms-3">
                    <?php if (!empty($rowPosting['foto'])): ?>
                        <img width="300" src="upload/<?php echo $rowPosting['foto'] ?>" alt="">
                    <?php endif; ?>
                    <?php echo $rowPosting['content'] ?>
                </div>
            </div>
            <hr>
        <?php endwhile ?>
    </div>
</div>

<div class="modal fade" id="exampleTweet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tweet</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <textarea name="content" id="summernote" class="form-control" placeholder="Apa yang sedang hangat dibicarakan?!"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" name='foto' type="file" id="formFile">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" name="posting">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>