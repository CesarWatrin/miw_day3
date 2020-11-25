<?php
// Boilerplate for exercice DAY 3 at university MIW 05
// Code is bad and poor... but just enough for skills students :-)

// Redirect to script to send email
if (!empty($_POST['email'])) {

   // Sending invitation by email
   header('Location: send_email.php?email='.$_POST['email']);
   exit;

}

$body_class = "";

// Display delivery status, (tips anti-refreshing)
if (!empty($_GET['delivery']) and $_GET['delivery'] === "sent") {

   // Sending invitation by email
   // echo "OK c'est envoyé..";
   $body_class = "delivery_sent";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <title>Chritmas Party</title>
   <style type="text/css">
   /* .delivery : lorsque le message a été envoyé */
   .delivery_sent .submit {
      /* on enlève ce qui été précédemment écris */
      display: none;
   }

   .delivery_sent .sended {
      display: block;
      background-color: rgba(255, 255, 255, 0.5);
      text-align: center;
      width: 400px;
      height: 260px;
      border-radius: 20px;
      border: 2px solid #707070;
   }

   .delivery_sent .sended img {
      width: 60%;
      padding-top: 5%;
      padding-left: 10%;
   }

   body {
      background: url('img/background.png') no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
   }

   html {
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
   }

   form {
      display: flex;
      flex-direction: row;
      justify-content: center;
      padding: 5%;
   }

   input:first-of-type {
      width: 500px;
      height: 70px;
      margin-right: 20px;
      border: 2px solid #B2B2B2;
      border-radius: 5px 0 0 5px;
      color: #8D8B8B;
      text-align: left;
      font-size: 25px;
      padding-left: 30px;
      font-weight: bold;
   }

   input:last-of-type {
      width: 250px;
      height: 76px;
      border: 0;
      border-radius: 0 5px 5px 0;
      color: #ffffff;
      background-color: rgba(0, 0, 0, 0);
      background-image: url('img/send.png');
      background-position: 180px;
      background-repeat: no-repeat;
      background-color: #C30078;
      text-align: left;
      font-size: 25px;
      padding-left: 25px;
      font-weight: bold;
   }

   .sended {
      display: none;
   }
   </style>
</head>
<body class="<?= $body_class ?>">
   <form action="#" method="post">
      <div class="submit">
         <input type="email" name="email" placeholder="Ton email de star..." required/>
         <input type="submit" value="Inscris-toi !"/>
      </div>
      <div class="sended">
         <img src="img/send2.png" alt="sended">
      </div>
   </form>
</body>
</html>
