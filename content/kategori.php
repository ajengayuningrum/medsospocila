<?php
$kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id DESC");
?>


<div class="container">
    <div class="row">
        <div class="col=sm-12">
            <fieldset class="border border-black border-2 p-3">
                <legend class="float-none w-auto px-3">Data Kategori</legend>
                <div align="right">
                    <a href="?pg=tambah-kategori" class="btn btn-primary">Tambah</a>
                </div>
                <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover mt-3">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                <tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($rowKategori = mysqli_fetch_assoc($kategori)):
                    ?>
                
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $rowKategori['nama_kategori']?></td>
                    <td>
                        <a href="?pg=tambah-kategori&edit=<?php echo $rowKategori['id']?>"
                        class="btn btn-success btn-sm">Edit</a>

                    <a href="?pg=tambah-kategori&delete=<?php echo $rowKategori['id']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger btn-sm">Delete</a>
                </td>

                </tr>
                <?php endwhile ?>
                </tbody>
                </table>
            </div>
        </fieldset>
        </div>
    </div>
</div>
