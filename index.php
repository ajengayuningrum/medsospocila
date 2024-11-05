<?php
ob_start();
ob_clean();
session_start();

// if (empty($_SESSION['NAMA'])) {
//     header("location:login.php?access=failed");
// }

include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <title>Document</title>

    <style>
        .cover {
            height: 200px;
        }

        .cover img{
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>



    <div class="wrapper">
        <?php include 'navbar.php' ?>

        <?php
        if (isset($_GET['pg'])) {
            if (file_exists('content/' . $_GET['pg'] . '.php')) {
                include 'content/' . $_GET['pg'] . '.php';
            }
        } else {
            include 'content/dashboard.php';
        }
        ?>

    </div>

    <!-- <div class="container mt-5 text-center">
        <div class="row">
            <div class="col-4 mt-5">
                <img src="fotoppkd.png" alt="" class="img-fluid">
            </div>
            <div class="col-7 mt-5 mb-4 fst-italic">
                <h3 style="padding-top: 30px">"Jadilah penjaga pintu menuju petualangan tak terbatas, karena setiap kunci yang diatur adalah kunci menuju cakrawala pengetahuan yang lebih luas"</h3>
            </div>
        </div> -->

    <footer class="fixed-bottom bg-secondary" style="min-height: 65px">
        <p class="text-center pt-3 px-4">Copyright &copy 2024 PPKD - Jakarta Pusat.</p>
    </footer>
    </div>

    <script src="bootstrap-5.3.3/dist/js/jquery-3.7.1.min.js"></script>
    <script src="bootstrap-5.3.3/dist/js/moment.js"></script>
    <script src="bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

    <script>
      $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>

    <script>
        $("#id_peminjaman").change(function() {
            let no_peminjaman = $(this).find('option:selected').text();
            let tbody = $('tbody'), newRow = "";
            $.ajax({
                url: "ajax/getPeminjam.php?no_peminjaman=" + no_peminjaman,
                type: "get",
                dataType: "json",
                success: function(res) {
                    $('#no_pinjam').val(res.data.no_peminjaman);
                    $('#tgl_peminjaman').val(res.data.tgl_peminjaman);
                    $('#tgl_pengembalian').val(res.data.tgl_pengembalian);
                    $('#nama_anggota').val(res.data.nama_anggota);
                    
                    let tanggal_kembali = new moment(res.data.tgl_pengembalian);
                    let currentDate = new Date().toJSON().slice(0, 10);
                    console.log(currentDate);
                    let tanggal_di_kembalikan = new moment(currentDate);
                    let selisih =  tanggal_di_kembalikan.diff(tanggal_kembali, "days");

                    if (selisih < 0) {
                        selisih = 0;
                    }

                    let biaya_denda = 100000;
                    let totalDenda = selisih * biaya_denda;
                    $('#denda').val(totalDenda);


                    $.each(res.detail_peminjaman, function(key,val) {
                        newRow += "<tr>";
                        newRow += "<td>" + val.nama_buku + "</td>";
                        newRow += "</td>";
                    });

                    tbody.html(newRow);

                }
            });
        });
    </script>
</body>

</html>