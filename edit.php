<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM companies WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$companies = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name']) && isset($_POST['registration_code'])  && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['comment']) ) {
  $name = $_POST['name'];
  $registration_code = $_POST['registration_code'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $comment = $_POST['comment'];
  $sql = 'UPDATE companies SET name=:name, email=:email WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':email' => $email, ':id' => $id])) {
    header("Location: /");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update company </h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $companies->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
          <label for="registration_code">Registration Code</label>
          <input value="<?= $companies->registration_code; ?>" type="text" name="registration_code" id="registration_code" class="form-control">
        </div>
        

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $companies->email; ?>" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
          <label for="phone">Phone</label>
          <input value="<?= $companies->phone; ?>" type="text" name="phone" id="phone" class="form-control">
        </div>
        <div class="form-group">
          <label for="comment">Comment</label>
          <input value="<?= $companies->comment; ?>" type="text" name="comment" id="comment" class="form-control">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-info">Update company</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
