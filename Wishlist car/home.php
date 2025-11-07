<?php
/*
Ghi chú: đoạn mã này được chuyển thành note (comment) để tạm tắt kiểm tra phiên đăng nhập.

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
*/
$link = mysqli_connect("localhost", "root", "") or die(mysqli_error($link));
mysqli_select_db($link, "user_car_system") or die(mysqli_error($link));
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('557999897_1382035573925255_4608887295426551651_n.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            min-height: 100vh;
        }
        .car-card {
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px;
        }
        .sidebar {
            position: fixed;
            top: 70px;
            right: 100px;
            left: auto;
            width: 300px;
            padding: 15px;
            border-radius: 20px;
            max-height: 95vh;
            overflow-y: auto; /* Nếu form dài thì chính form sẽ cuộn */
        }
<<<<<<< HEAD

        /* Make car cards align nicely */
=======
>>>>>>> d6130663412535722c0e9471f03f6395b0007af5
        .car-card {
            display: inline-block;
            vertical-align: top;
            width: 300px;
            background-color: rgba(255, 255, 255, 0.6);
        }
        .car-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
        }
        .car-container {
            display: flex;
            flex-wrap: wrap;
        }
        /*.car-info {
            margin-top: 10px;
<<<<<<< HEAD
            background-color: rgba(255, 255, 255, 0.6);
        }*/
        .btn-group-custom button {
            margin-right: 5px;
        }
        .custom-navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 15px 20px;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        

    .logout-box {
        padding: 5px 15px;
        background-color: rgba(255, 255, 255, 0.6);
        border-radius: 5px;
        position: fixed;
        top: 15px;
        right: 20px;
    }

    .logout-btn {
        color: white;
        text-decoration: none;
    }

    .top-title {
        color: white;
        font-size: 30px;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
    }
    .top-bar {
        width: 100%;
        height: 60px;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999;
        padding: 8px 15px;
        background: rgba(255,255,255,0.0);
        background-image: url('557999897_1382035573925255_4608887295426551651_n.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
}
=======
        }
        .logout-box {
            padding: 5px 15px;
            background-color: rgba(255, 255, 255, 0.6);
            border-radius: 5px;
            position: fixed;
            top: 15px;
            right: 20px;
        }
        .logout-btn {
            color: white;
            text-decoration: none;
        }
        .top-title {
            color: white;
            font-size: 30px;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        .top-bar {
            width: 100%;
            height: 60px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            padding: 8px 15px;
            background: rgba(255,255,255,0.0);
            background-image: url('557999897_1382035573925255_4608887295426551651_n.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }
>>>>>>> d6130663412535722c0e9471f03f6395b0007af5
    </style>
</head>

<body>
<div class="top-bar">

    <div class="logout-box">
        <a href="login.php" class="logout-btn">Log out</a>
    </div>

    <div class="top-title">WELCOME TO THE WORLD OF CARS!</div>

</div>


<div class="container-fluid" style="padding: 20px;">

<div class="row">

        <!-- FORM CREATE CAR (bên trái) -->
        <div class="sidebar">
            <div class="panel panel-default" style="background-color: rgba(255, 255, 255, 0.6);">
                <div class="panel-heading"><h3 class="text-center">Create New Car</h3></div>

                <div class="panel-body">
                    <form action="" method="post">

                        <div class="form-group">
                            <label>Car Name:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label>Brand:</label>
                            <input type="text" class="form-control" name="brand" required>
                        </div>

                        <div class="form-group">
                            <label>Color:</label>
                            <input type="text" class="form-control" name="color">
                        </div>

                        <div class="form-group">
                            <label>Price:</label>
                            <input type="number" step="0.01" class="form-control" name="price">
                        </div>

                        <div class="form-group">
                            <label>Year:</label>
                            <input type="number" class="form-control" name="year">
                        </div>
                        <div class="form-group">
                            <label>Image:</label>
                            <input type="file" class="form-control" name="picture" accept="image/*" required>
                        </div>

                        <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '1'; ?>">

                        <script>
                            // Ensure the form uses multipart/form-data so file uploads work
                            document.addEventListener('DOMContentLoaded', function () {
                                var form = document.querySelector('form[action=""]') || document.forms[0];
                                if (form) {
                                    form.enctype = 'multipart/form-data';
                                    form.encoding = 'multipart/form-data'; // for older browsers
                                }
                            });
                        </script>

                        <button type="submit" name="create" class="btn btn-primary btn-block">
                            Create
                        </button>

                    </form>
                </div>
            </div>
        </div>
    
        <!-- LIST CAR (bên phải) -->
        <div class="col-md-8" style="margin-top: 60px; margin-left: 100px;">
            <h2 class="text-center" style="margin-left: -180px; color: #fff;">WISHLIST CAR</h2>
            <div class="car-container" style="display: flex; flex-wrap: wrap; gap: 15px;">

                <?php
                $res = mysqli_query($link, "SELECT * FROM cars ORDER BY id DESC");
                while ($row = mysqli_fetch_array($res)) {
                ?>

                <div class="car-card" style="width: 260px; background-color: rgba(255, 255, 255, 0.6);; padding: 10px; border-radius: 10px;">
                    <img src="<?php echo $row['picture']; ?>"  style="width:100%; height:150px; object-fit:cover; border-radius:8px;">

                    <div class="car-info" style="margin-top: 10px;">
                        <h4><?php echo $row['name']; ?></h4>
                        <p><b>Brand:</b> <?php echo $row['brand']; ?></p>
                        <p><b>Color:</b> <?php echo $row['color']; ?></p>
                        <p><b>Year:</b> <?php echo $row['year']; ?></p>
                        <p><b>Price:</b> <?php echo number_format($row['price']); ?> USD</p>
                    </div>

                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                </div>

                <?php 
            } 
            ?>

            </div>
        </div>

    </div>
</div>

</body>



<?php
// INSERT CAR
if (isset($_POST["create"])) {

    // Lấy thông tin file ảnh
    $picture_name = $_FILES['picture']['name'];
    $tmp = $_FILES['picture']['tmp_name'];

    // Lưu file vào cùng thư mục (vì ảnh và home.php cùng vị trí)
    move_uploaded_file($tmp, $picture_name);

    // Lưu tên file (không cần thư mục)
    $path = $picture_name;

    // Thêm vào CSDL
    mysqli_query($link, "
        INSERT INTO cars(name, brand, color, price, year, picture)
        VALUES(
            '$_POST[name]',
            '$_POST[brand]',
            '$_POST[color]',
            '$_POST[price]',
            '$_POST[year]',
            '$path'
        )
    ") or die(mysqli_error($link));

    echo "<script>alert('New car created successfully!'); window.location='';</script>";
}
?>


</html> 