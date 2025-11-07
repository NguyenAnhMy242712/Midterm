<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$link = mysqli_connect("localhost", "root", "", "user_car_system");
if (!$link) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
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
            overflow-y: auto;
        }

        .car-card {
            display: inline-block;
            vertical-align: top;
            width: 300px;
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
        .car-info {
            margin-top: 10px;
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
    </style>
</head>

<body>
    <div class="top-bar">
    
        <div class="logout-box">
            <a href="logout.php" class="logout-btn">Log out</a>
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
                                <input type="number" step="10000000" class="form-control" name="price">
                            </div>
    
                            <div class="form-group">
                                <label>Year:</label>
                                <input type="number" class="form-control" name="year">
                            </div>
    
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
    
                    <div class="car-card" style="width: 260px; background: white; padding: 10px; border-radius: 10px;">
                        <img src="uploads/<?php echo $row['picture']; ?>" style="width:100%; height:150px; object-fit:cover; border-radius:8px;">
    
                        <div class="car-info" style="margin-top: 10px;">
                            <h4><?php echo $row['name']; ?></h4>
                            <p><b>Brand:</b> <?php echo $row['brand']; ?></p>
                            <p><b>Color:</b> <?php echo $row['color']; ?></p>
                            <p><b>Year:</b> <?php echo $row['year']; ?></p>
                            <p><b>Price:</b> <?php echo number_format($row['price']); ?> VND</p>
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
    mysqli_query($link, "INSERT INTO cars VALUES (
        NULL,
        '$_POST[name]',
        '$_POST[color]',
        '$_POST[brand]',
        '$_POST[price]',
        '$_POST[year]',
        '$_POST[user_id]'
    )") or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
        alert("New car created successfully!");
        window.location.href = window.location.href;
    </script>
     <?php
}
?>
</html>
