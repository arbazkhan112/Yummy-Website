<?php
// Include the database connection code
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve dish details from the form
    $dishName = $_POST['dish_name'];
    $imagePath = $_POST['image_path'];
    $ingredients = $_POST['ingredients'];
    $price = $_POST['price'];

    // Insert the new dish into the database
    $sql = "INSERT INTO starters (dish_name, image_path, ingredients, price) VALUES ('$dishName', '$imagePath', '$ingredients', '$price')";
    if ($conn->query($sql) === TRUE) {
        echo "Dish added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include necessary meta tags, stylesheets, and scripts -->
    <!-- ... -->
</head>
<body>

  <!-- Create a form for admin to add dishes -->
  <form method="post" action="">
      <label for="dish_name">Dish Name:</label>
      <input type="text" name="dish_name" required>

      <label for="image_path">Image Path:</label>
      <input type="text" name="image_path" required>

      <label for="ingredients">Ingredients:</label>
      <textarea name="ingredients" required></textarea>

      <label for="price">Price:</label>
      <input type="text" name="price" required>

      <button type="submit">Add Dish</button>
  </form>

</body>
</html>
