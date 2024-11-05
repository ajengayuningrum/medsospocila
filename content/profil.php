<?php
// menampilkan data user berdasarkan id user

$id_user = $_SESSION['ID'];
$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id_user' ");
$rowUser = mysqli_fetch_assoc($queryUser);

$queryTweet = mysqli_query($koneksi, "SELECT * FROM tweet WHERE id_user='$id_user' ");
$rowTweet = mysqli_fetch_assoc($queryTweet);

if (isset($_POST['simpan'])) {
  $nama_lengkap = $_POST['nama_lengkap'];
  $nama_pengguna = $_POST['nama_pengguna'];
  $email = $_POST['email'];

  // jika gambar mau diubah
  if (!empty($_FILES['foto']['name'])) {
    $nama_foto =  $_FILES['foto']['name'];
    $ukuran_foto =  $_FILES['foto']['size'];

    $ext = array('png', 'jpg', 'jpeg', 'jfif');
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

      $update =  mysqli_query($koneksi, "UPDATE user SET nama_lengkap='$nama_lengkap', nama_pengguna='$nama_pengguna', email ='$email', foto='$nama_foto' WHERE id = '$id_user'");
    }
  }  //jika tidak mau diubah
  else {
    $update = mysqli_query($koneksi, "UPDATE user SET nama_lengkap='$nama_lengkap', nama_pengguna = '$nama_pengguna', email ='$email' WHERE id='$id_user' ");
  }
  header("location:?pg=profil&ubah=berhasil");
}

if (isset($_POST['edit_cover'])) {

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

      $update =  mysqli_query($koneksi, "UPDATE user SET cover='$nama_foto' WHERE id = '$id_user'");
    }
  }
  header("location:?pg=profil&ubah=berhasil");
}
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="cover">
        <img src="<?php echo isset($rowUser['cover']) ? 'upload/' . $rowUser['cover'] : 'https://placehold.co/800x200' ?>" alt="">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="profile-header mt-5 ms-3 pt-4">
        <img width="100" height="100" src="<?php echo isset($rowUser['foto']) ? 'upload/' . $rowUser['foto'] : 'https://placehold.co/100' ?>" alt="" class="rounded-circle border border-2 border-dark">
        <h2><?php echo $rowUser['nama_lengkap'] ?></h2>
        <p>@<?php echo $rowUser['nama_pengguna'] ?></p>
        <p>Deskripsi Singkat</p>
      </div>
    </div>
    <div class="col-sm-6 mt-5" align="right">
      <div class="align-item-center mt-5 pt-4">
        <a href="#" class="btn btn-outline-primary mt-4 me-3 fw-bold" style="border-radius: 18px;" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit Profil</a>
        <a href="#" class="btn btn-outline-primary mt-4 me-3 fw-bold" style="border-radius: 18px;" data-bs-toggle="modal" data-bs-target="#editCover">Edit Cover</a>
      </div>
    </div>
    <div class="col-sm-12 mt-5">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Tweet</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Tweet & Balasan</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Like</button>
        </li>

      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active mt-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
          <?php include 'tweet.php' ?>
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal edit profil -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profil</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nama" name="nama_lengkap" value="<?php echo $rowUser['nama_lengkap'] ?>">
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Username" name="nama_pengguna" value="<?php echo $rowUser['nama_pengguna'] ?>">
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $rowUser['email'] ?>">
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" name='foto' type="file" id="formFile">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal edit cover -->
<div class="modal fade" id="editCover" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Cover</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" name='foto' type="file" id="formFile">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary" name="edit_cover">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>