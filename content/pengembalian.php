<?php
$query = mysqli_query($koneksi, "SELECT peminjaman.no_peminjaman, pengembalian.* FROM pengembalian LEFT JOIN peminjaman ON peminjaman.id = pengembalian.id_peminjaman ORDER BY id DESC");
?>


<div class="container">
    <div class="row">
        <div class="col=sm-12">
            <fieldset class="border border-black border-2 p-3">
                <legend class="float-none w-auto px-3">Data Pengembalian</legend>
                <div align="right">
                    <a href="?pg=tambah-pengembalian" class="btn btn-primary">Tambah</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Peminjaman</th>


                                <th>Denda</th>
                                <th>Aksi</th>
                            <tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($query)):
                            ?>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['no_peminjaman'] ?></td>
                                <td><?php echo $row['status'] ?></td>
                                <td><?php echo $row['denda'] ?></td>
                                <td>
                                    <a href="?pg=tambah-pengembalian&detail=<?php echo $row['id'] ?>"
                                        class="btn btn-success btn-sm">Detail</a>
                                    <a href="?pg=tambah-pengembalian&delete=<?php echo $row['id'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger btn-sm">Delete</a>
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