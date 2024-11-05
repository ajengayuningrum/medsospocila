<?php
if (isset($_POST['tambah'])) {
   $nama_buku  = $_POST['nama_buku'];
   $penerbit  = $_POST['penerbit'];
   $tahun_terbit  = $_POST['tahun_terbit'];
   $pengarang  = $_POST['pengarang'];
    $id_kategori  = $_POST['id_kategori'];
    
$insert = mysqli_query($koneksi, "INSERT INTO book (id_kategori, nama_buku, penerbit, tahun_terbit, pengarang) VALUES('$id_kategori','$nama_buku','$penerbit','$tahun_terbit','$pengarang')");

header("location:?pg=book&tambah=berhasil");

} 

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editBook = mysqli_query($koneksi, "SELECT * FROM book WHERE id = '$id'");
$rowEdit  = mysqli_fetch_assoc($editBook);

if (isset($_POST['edit'])) {
    $id_kategori = $_POST['id_kategori'];
    $nama_buku =  $_POST['nama_buku'];
    $penerbit =  $_POST['penerbit'];
    $tahun_terbit =  $_POST['tahun_terbit'];
    $pengarang =  $_POST['pengarang'];

    $update = mysqli_query($koneksi, "UPDATE book SET nama_buku='$nama_buku', penerbit='$penerbit', tahun_terbit='$tahun_terbit', pengarang='$pengarang', id_kategori='$id_kategori' WHERE id='$id'");
    header("location:?pg=book&ubah=berhasil");

}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM book WHERE id  = '$id'");
    header("location:?pg=book&hapus=berhasil");
}

$queryKategori =  mysqli_query($koneksi, "SELECT * FROM kategori");


?>



<div class="container">
    <div class="row">
        <div class="col=sm-12">
            <fieldset class="border border-black border-2 p-3">  
                <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Buku</legend>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Kategori</label>
                        <select name="id_kategori" id="" class="form-control">
                            <option value="">Pilih Kategori</option>
                            <!-- option yang datanya diambil dari tabel kategori -->
                             <?php while ($rowKategori  = mysqli_fetch_assoc($queryKategori)): ?>
                            <option <?php echo isset($_GET['edit'])?($rowKategori['id'] == $rowEdit['id_kategori'] ? 'selected' : '') : '' ?> value="<?php echo $rowKategori['id']?>">
                                <?php echo $rowKategori['nama_kategori']?>
                            </option>
                            <?php endwhile ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Buku</label>
                        <input type="text" class="form-control" name="nama_buku" placeholder="Masukkan nama buku" value="<?php echo isset($_GET['edit'])? $rowEdit['nama_buku'] :''?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" placeholder="Masukkan nama penerbit" value="<?php echo isset($_GET['edit'])? $rowEdit['penerbit'] :''?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tahun Terbit</label>
                        <input type="text" class="form-control" name="tahun_terbit" placeholder="Masukkan tahun terbit" value="<?php echo isset($_GET['edit'])? $rowEdit['tahun_terbit'] :''?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" name="pengarang" placeholder="Masukkan nama pengarang" value="<?php echo isset($_GET['edit'])? $rowEdit['pengarang'] :''?>">
                    </div>
                    <div class="mb-3">
                        <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </form>
        </fieldset>
        </div>
    </div>
</div>
