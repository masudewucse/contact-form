<?php 
  include_once('classes/db.connect.php');
  include_once('classes/contact.class.php');

  $contact = new Contact();
  $contacts = $contact->getAllContacts();
  //$contact->printAll($contacts);
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
<div class="contact-list">
<h2>Contract list</h2>
<div class="container">
   
  <table class="contact-table">
    <thead>
      <tr>
        <th>Date</th>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message (tooltip)</th>
        <th>Action</th>
    </tr>  
    </thead>
    <tbody>
    <?php
    foreach((array)$contacts AS $key=>$values){?>
      <tr>
          <td><?=$values['time']?></td>
          <td><?=$values['fullname']?></td>
          <td><?=$values['email']?></td>
          <td><?=$values['subject']?></td>
          <td><a href="javascript:void(0)" data-tooltip="<?=$values['message']?>">Hover here</a></td>
          <td><a href="javascript:void(0)">Edit </a>&nbsp; | &nbsp;<a href="javascript:void(0)">Delete </a></td>
        </tr>
      <?php }?>
    </tbody>
  </table>
  </div>
  </div>
</body>
</html>