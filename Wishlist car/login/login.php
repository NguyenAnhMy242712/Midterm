<html lang="vi" xmlns="">
    <head>
        <title>LOGIN</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <link rel="stylesheet" href="/Wishlist car/assets/font/fontawesome-free-7.0.0-web/fontawesome-free-7.0.0-web/css/all.min.css">
        <link rel="stylesheet" href="/Wishlist car/login/login.css">
    </head>

    <body>
        <div class="container">
            <div class="login d-flex justify-content-center align-items-center">
                <div class="login__form">
                    <h2>Đăng nhập</h2>
                    <form action="validation.php" method="post">
                        <div class="form-group login__form--username">
                            <label for="username" class="form-label">Tên đăng nhập</label>                        
                            <input type="text" id="username" name="user" class="form-control" required>
                            
                        </div>
                        <div class="form-group login__form--password">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        <div class="registration">
                            <p class="mt-3 mb-0">Chưa có tài khoản? <a href="#">Đăng ký ngay</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>   
    </body>

</html>