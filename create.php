<?php
require 'db.php';
$message = '';
if (isset ($_POST['name']) && isset($_POST['registration_code']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['comment'])) {
  $name = $_POST['name'];
  $registration_code = $_POST['registration_code'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $comment = $_POST['comment'];
  $sql = 'INSERT INTO companies(name, registration_code, email, phone, comment) VALUES(:name, :registration_code, :email, :phone, :comment)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':registration_code' => $registration_code, ':email' => $email, ':phone' => $phone, ':comment' => $comment])) {
    $message = 'data inserted successfully';
  }
}

// define variables and set to empty values
$nameErr = $emailErr = $registration_codeErr = $phoneErr = "";
$name = $email = $registration_code = $phone = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
 
   if (empty($_POST["registration_code"])) {
    $registration_codeErr = "Registration code is required";
  } else {
    $registration_code = test_input($_POST["registration_code"]);
  }

 if (empty($_POST["phone"])) {
    $phoneErr = "Phone number is required";
  } else {
    $phone = test_input($_POST["phone"]);
  }

 if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


  // $error = '';
  // if(array_key_exists('phone', $_POST))
  // {
  //   if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone']))
  //   {
  //     $error = 'Invalid Number!';
  //   }
  // }

 ?>


<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Add your company</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control">
          <span class="text-danger"><?php echo $nameErr;?></span>
            
        </div>
        <div class="form-group">
          <label for="registration_code">Registration Code</label>
          <input type="text" name="registration_code" id="registration_code" class="form-control">
          <span class="text-danger"><?php echo $registration_codeErr;?></span>
          
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
          <span class="text-danger"><?php echo $emailErr;?></span>
          <!-- form submits successfuly if phone number is entered even if  other form fields is empty  -->
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="tel" name="phone" id="phone" class="form-control">
          <span class="text-danger"><?php echo $phoneErr;?></span>
          </div>
        <div class="form-group">
          <label for="comment">Comment</label>
          <textarea class="form-control" name="comment" rows="5" id="comment" placeholder="Maximum 500 simbols"></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Add company to a list</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
