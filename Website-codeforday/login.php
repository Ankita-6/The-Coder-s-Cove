<html>

<head>

</head>

<body>
  <?php

  $email  = $_POST['email'];
  $upswd1 = $_POST['upswd1'];




  if (!empty($email) || !empty($upswd1)) {

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "ankita";



    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
      die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
    } else {
      //$SELECT = "SELECT email From register Where email = ? Limit 1";
      $INSERT = "INSERT Into login (username ,password)values(?,?)";

      //Prepare statement
      $stmt = $conn->prepare("select * from register where email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt_result = $stmt->get_result();
      if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data['upswd1'] === $upswd1) {
          $stmt = $conn->prepare($INSERT);
          $stmt->bind_param("ss", $email, $upswd1);
          $stmt->execute();
          echo '<script type="text/javascript"> alert("Login successfully")</script>';
          //echo 'myfunction(){return href="index2.html"}';
          //echo '<script type="text/javascript"> alert(<button onclick="myFunction()">Click me</button>)</script>';
          echo '<a href=index4.html>click here to continue to page</a>';
        }
      } else {
        echo '<script type="text/javascript"> alert("Login failed")</script>';
      }
    }
  } else {
    echo "All field are required";
    die();
  }
  ?>
</body>

</html>