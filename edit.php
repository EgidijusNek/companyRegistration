<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM companies WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$company = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name']) && isset($_POST['registration_code'])  && isset($_POST['email'])) {
  $name = $_POST['name'];
  $registration_code = $_POST['registration_code'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $comment = $_POST['comment'];
  $sql = 'UPDATE companies SET name=:name, registration_code=:registration_code, email=:email, phone=:phone, comment=:comment WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':registration_code' => $registration_code, ':email' => $email, ':phone' => $phone, ':comment' => $comment, ':id' => $id])) {
    header("Location: /");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update company</h2>
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
          <input value="<?= $company->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="registration_code">Registration Code</label>
          <input value="<?= $company->registration_code; ?>" type="text" name="registration_code" id="registration_code" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $company->email; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="tel" value="<?= $company->phone; ?>" name="phone" id="phone" class="form-control">
        </div>
        <div class="form-group">
          <label for="comment">Comment</label>
          <textarea name="comment" id="comment" class="form-control" rows="5"><?= $company->comment; ?></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update company</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
