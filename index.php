<?php
require 'db.php';
$sql = 'SELECT * FROM companies';
$statement = $connection->prepare($sql);
$statement->execute();
$companies = $statement->fetchAll(PDO::FETCH_OBJ);
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
        <?php foreach($companies as $company): ?>
          <tr>
            <td><?= $company->id; ?></td>
            <td><?= $company->name; ?></td>
            <td><?= $company->registration_code; ?></td>
            <td><?= $company->email; ?></td>
            <td><?= $company->phone; ?></td>
            <td><?= $company->comment; ?></td>
            <td>
              <a href="edit.php?id=<?= $company->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $company->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
