<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 mx-auto mt-5">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="card-title">
                            <h5>Medsos QT</h5>
                            <p>Silahkan masuk dengan akun anda</p>
                        </div>
                        <?php if(isset($_GET['register'])): ?>
                        <div class="alert alert-success">Registrasi pengguna berhasil</div>
                        <?php endif ?>
                        <form action="actionLogin.php" method="post">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Masukkan Email Anda">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7">
                            </div>
                            <div class="form-group mb-3">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Masuk</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mt-3">
                <div class="card-body">
                    <p>Belum punya akun?</p><a href="register.php" class="text-secondary">Buat Akun</a>
                </div>
            </div>
            </div>
            
        </div>
    </div>
    </div>
</body>
</html>