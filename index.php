<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD</title>
</head>
<body>

<h2>Student Registration</h2>

<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Mobile: <input type="text" name="mobile" required><br><br>
    Department: <input type="text" name="department" required><br><br>
    <input type="submit" name="submit" value="Add Student">
</form>

<hr>

<?php
if (isset($_POST['submit'])) {
    mysqli_query($conn, "INSERT INTO student (name,email,mobile,department)
    VALUES ('$_POST[name]','$_POST[email]','$_POST[mobile]','$_POST[department]')");
}

$result = mysqli_query($conn, "SELECT * FROM student");

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['name']." | ".$row['email']." | ".$row['mobile']." | ".$row['department'];
    echo " <a href='edit.php?id=".$row['id']."'>Edit</a>";
    echo " <a href='delete.php?id=".$row['id']."'>Delete</a><br>";
}
?>

</body>
</html>