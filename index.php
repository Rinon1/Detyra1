<?php
session_start();
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detyra 1</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
    <h1>Complete the contact form</h1>

<div class="container">
  <?php if(isset($_SESSION['error'])) :?>
  <span style="color:red"><?=$_SESSION['error']?></span>
<?php endif; ?>
  <?php if(isset($_SESSION['success'])) :?>
  <span style="color:green"><?=$_SESSION['success']?></span>
<?php endif; ?>
  <form action="user_page.php" method="post" name="user">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="First name">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Last name">

    <label for="Email">Email</label>
    <input type="email" id="email" name="email" placeholder="Email">

    <label for="Phone number">Phone number</label>
    <input type="tel" name="number"placeholder="Phone number">

    <label for="Message">Message</label>
    <textarea id="message" name="message" placeholder="Write your message" style="height:200px"></textarea>
    

    <input type="submit" name="submit" value="Submit">
  </form>
</div>
</body>
</html>
<?php
session_destroy();
?>