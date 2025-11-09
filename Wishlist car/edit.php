<?php
$link = mysqli_connect("localhost", "root", "") or die(mysqli_error($link));
mysqli_select_db($link, "user_car_system") or die(mysqli_error($link));

$id = $_GET["id"]; // ID of the car to edit
$name = "";
$color = "";
$brand = "";
$price = "";
$year = "";

// Get car info from database
$res = mysqli_query($link, "SELECT * FROM cars WHERE id=$id");
while ($row = mysqli_fetch_array($res)) {
    $name = $row["name"];
    $color = $row["color"];
    $brand = $row["brand"];
    $price = $row["price"];
    $year = $row["year"];
}
?>

<html lang="en">
<head>
    <title>Update Car Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="col-lg-4">
        <h2>Car Information Form</h2>
        <form action="" name="form1" method="post">
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
                            <input type="number" step="1000" class="form-control" name="price">
                        </div>

                        <div class="form-group">
                            <label>Year:</label>
                            <input type="number" class="form-control" name="year">
                        </div>
                        <div class="form-group">
                            <label>Image:</label>
                            <input type="file" class="form-control" name="picture" accept="image/*" required>
                        </div>
            <button type="submit" name="update" class="btn btn-default">Update</button>
        </form>
    </div>
</div>
</body>

<?php
if (isset($_POST["update"])) {
    mysqli_query($link, "UPDATE cars SET 
        name='$_POST[name]',
        brand='$_POST[brand]',
        color='$_POST[color]',
        price='$_POST[price]',
        year='$_POST[year]'
        WHERE id=$id") or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
        alert("Car information updated successfully!");
        window.location = "home.php";
    </script>
    <?php
}
?>
</html>
