<?php
require 'db.php';
$sql = 'SELECT * FROM company';
$statement = $connection->prepare($sql);
$statement->execute();
$company = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All companies</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Registration Code</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Comment</th>
          <th>Action</th>
        </tr>
        <?php foreach($company as $companies): ?>
          <tr>
            <td><?= $companies->id; ?></td>
            <td><?= $companies->name; ?></td>
            <td><?= $companies->registration_code; ?></td>
            <td><?= $companies->email; ?></td>
            <td><?= $companies->phone; ?></td>
            <td><?= $companies->comment; ?></td>
            <td>
              <a href="edit.php?id=<?= $companies->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
