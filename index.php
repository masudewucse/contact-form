<?php 
  include_once('classes/db.connect.php');
  include_once('classes/validation.class.php');
  include_once('classes/contact.class.php');

  $show_data_preview = false;
  if(isset($_POST['submit_continue'])){
   $validation = new InputValidation($_POST);
   $error = $validation->validateForm();
   if(true === empty($error)){
    $show_data_preview = true;
   }
  }
  if(isset($_POST['submit'])){
    $dbQuery = new Contact();
    $dbQuery->setContact($_POST); 
    header('Location: success.php');
  }
  if(isset($_POST['edit_data'])){
    $show_data_preview = false;
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontaktformular</title>
    <link href="css_js/style.css" media="all" rel="stylesheet" type="text/css">
    <script async src="css_js/script.js"></script>
</head>
<body>
<?php 
if($show_data_preview === false):
?>
<div class="container">
    <h2>Kontaktformular</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <label for="fullname">Full Name<span class="star">*</span></label>
      <input type="text" id="fullname" value="<?=$_POST['fullname']??''?>" placeholder="Full Name"  name="fullname" required minlength="3" maxlength="100">
                <div class="error"><?=$error['fullname']??''?></div>
      <label for="email">Email address<span class="star">*</span> </label>
      <input type="email" id="email" value="<?=$_POST['email']??''?>" placeholder="Email"  name="email" required>
                <div class="error"><?=$error['email']??''?></div>

      <label for="subject">Subject<span class="star">*</span> </label>
      <input type="text" id="subject" value="<?=$_POST['subject']??''?>" placeholder="Subject"  name="subject" required minlength="6" maxlength="250">
                <div class="error"><?=$error['subject']??''?></div>

      <label for="message">Message<span class="star">*</span> </label>
      <textarea id="message" placeholder="Write your messsage.." style="height:200px" name="message" required ><?=$_POST['message']??''?></textarea>
                <div class="error"><?=$error['message']??''?></div>

      <input id="primary_contact" type="submit" value="Send" name="submit_continue">

    </form>
  </div>
<?php
else:
?>
<div class="container">
    <h2>Kontaktformular :: Ihre ausgefüllte Datenübersicht</h2>
    <table>
  <tr>
    <td>Full Name</td>
    <td><?=$_POST['fullname']?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?=$_POST['email']?></td>
  </tr>
  <tr>
    <td>Subject</td>
    <td><?=$_POST['subject']?></td>
  </tr>
  <tr>
    <td>Message</td>
    <td><?=$_POST['message']?></td>
  </tr>
</table>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<input type="hidden" name="fullname" value="<?=$_POST['fullname']?>">
<input type="hidden" name="email" value="<?=$_POST['email']?>">
<input type="hidden" name="subject" value="<?=$_POST['subject']?>">
<input type="hidden" name="message" value="<?=$_POST['message']?>">
<br>
<input id="edit" type="submit" value="Edit" name="edit_data">&nbsp;
<input id="final-submit" type="submit" value="Submit" name="submit">
</form>

</div>  

<?php endif;?>
</body>
</html>