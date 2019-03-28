<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
        .error {
          color: red;
        }
    </style>
  </head>
  <body>
    <?php
        $fullname = $email = $password = "";
        $nameErr = $emailErr = $passErr ="";

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
          if (empty($_POST["fname"])) {
            $nameErr = "Name field is request";
          }else {
            $fullname = input_valid($_POST["fname"]);
              if (!preg_match("/^[a-zA-Z ]*$/",$_POST["fname"])) {
                $nameErr = "Only letters and white space allowed";
            }
          }

          if (empty($_POST['email'])) {
            $emailErr = "Email field is request";
          }else {
            $email = input_valid($_POST["email"]);
              if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email address";
              }
          }

          if (empty($_POST["password"])) {
              $passErr = "Password field is request";
            }else {
              $password = input_valid($_POST["password"]);
              if(preg_match('/[^A-Za-z0-9]+/', $_POST["password"]) && strlen($_POST["password"]) <= 8) {
                  $passErr = "Password should be more than 8 characters and alphanumeric";
                }
            }
          }
        function input_valid($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       }
     ?>
    <form class="" action="" method="post">
        <label for="fullname">Fullname</label>
        <input type="text" name="fname" value="<?php echo $fullname ?>" id="fullname">
        <span class="error"><?php echo $nameErr; ?></span>
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" value="<?php echo $email ?>">
        <span class="error"><?php echo $emailErr;?></span>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" value="<?php echo $password ?>">
        <span class="error"><?php echo $passErr; ?></span>
        <br>
        <button type="submit" name="button">Send</button>
    </form>
    <?php
        $arr = array("Volvo", "BMW", "Toyota", "Nisaan", "Audi");
        $index_val = array_search("Toyota", $arr);
        echo $arr[$index_val];
        echo "<br>";
        foreach ($arr as $key => $value) {
          if ($value == "Toyota") {
            echo $value;
          }
        }
        echo "<br>";

        // for ($i="*"; strlen($i) <= 8 ; $i) {
        //   echo $i . "<br>";
        //   $i = $i . "*";
        // }

        for ($i=0; $i <= 8; $i++) {
          for ($j=$i; $j >= 0; $j--) {
            echo "*";
          }
          echo "<br>";
        }
     ?>



  </body>
</html>
