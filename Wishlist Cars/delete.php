<?php
//creating a database connection - $link is a variable use for just connection class
$link = mysqli_connect("localhost", "root", "") or die(mysqli_error($link));
mysqli_select_db($link, "user_car_system") or die(mysqli_error($link));

$id = $_GET["id"]; // ID of the car to delete

// Get car information (to display confirmation)
$res = mysqli_query($link, "SELECT * FROM cars WHERE id=$id");
$car = mysqli_fetch_array($res);


// When the user confirms deletion
if (isset($_GET["confirm"]) && $_GET["confirm"] == "yes") {
    $delete_query = "DELETE FROM cars WHERE id=$id";
    mysqli_query($link, $delete_query) or die(mysqli_error($link));
    header("Location: home.php"); // Redirect back to the car list
    exit;
}
?>

<!-- Confirmation page -->
<h2>Are you sure you want to remove this car from your wishlist?</h2>

<button>
  <a href="delete.php?id=<?php echo $id ?>&confirm=yes">Yes</a>
</button>
<button>
  <a href="home.php">No</a>
</button>
