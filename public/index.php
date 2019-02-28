<?php include "templates/header.php"; ?>

<ul>
	<li><a href="create.php"><strong>Create</strong></a> - add a user</li>
	<li><a href="read.php"><strong>Search</strong></a> - find a user</li>
	<li><a href="update.php"><strong>Update</strong></a> - edit a user</li>
	<li><a href="delete.php"><strong>Delete</strong></a> - delete a user</li>
</ul>
<?php
require "../config.php";
require "../common.php";

try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM users";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>

        
<h2>Read users Details</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Age</th>
            <th>Location</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["id"]); ?></td>
            <td><?php echo escape($row["firstname"]); ?></td>
            <td><?php echo escape($row["lastname"]); ?></td>
            <td><?php echo escape($row["email"]); ?></td>
            <td><?php echo escape($row["age"]); ?></td>
            <td><?php echo escape($row["location"]); ?></td>
            <td><?php echo escape($row["date"]); ?> </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php include "templates/footer.php"; ?>