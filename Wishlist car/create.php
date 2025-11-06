<?php
$link = mysqli_connect("localhost", "root", "") or die(mysqli_error($link));
mysqli_select_db($link, "user_car_system") or die(mysqli_error($link));
?>

<html lang="en">
<head>
    <title>Create New Car</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="col-lg-4">
        <h2>Create New Car</h2>
        <form action="" name="form1" method="post">
            <div class="form-group">
                <label for="name">Car Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter car name" name="name" required>
            </div>
            <div class="form-group">
                <label for="brand">Brand:</label>
                <input type="text" class="form-control" id="brand" placeholder="Enter brand" name="brand" required>
            </div>
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" class="form-control" id="color" placeholder="Enter color" name="color">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" class="form-control" id="price" placeholder="Enter price" name="price">
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" class="form-control" id="year" placeholder="Enter year" name="year">
            </div>
            <div class="form-group">
                <label for="user_id">User ID (Owner):</label>
                <input type="number" class="form-control" id="user_id" placeholder="Enter user ID" name="user_id" required>
            </div>
            <button type="submit" name="create" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>

<?php
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
</body>
</html>
