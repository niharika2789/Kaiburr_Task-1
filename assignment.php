<?php

$n=$pass=$con=$email=$date="";
$n_e=$pass_e=$con_e=$email_e=$date_e="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["n"])) {
        $n_e = "Name is required";
      } else {
        $n = $_POST["n"];
      }

      if (empty($_POST["pass"])) {
        $pass_e = "Password is required";
      } else {
        $n = $_POST["pass"];
      }

      if (empty($_POST["con"])) {
        $con_e = "Confirm password is required";
      } else {
        $n = $_POST["con"];
      }

      if (empty($_POST["email"])) {
        $email_e = "Email is required";
      } else {
        $email = $_POST["email"];
      }

      if (empty($_POST["date"])) {
        $date_e = "Date is required";
      } else {
        $date = $_POST["date"];
      }
      if($_POST['pass']!==$_POST['con'])
      {
        echo '<script>alert("Passwords are mismatch")</script>';
      }
  
}
?>
<html>
<head>
<title>
18BCN7134
</title>
<link rel="stylesheet" href="18BCN7134_8.css">
</head>
<body>
<form method="POST" action="assignment8.php">
<table>    
<tr>
<td><label class="a"> User Name:  </label></td>
    <td><input type="text" name="n" class='b'><span class="error">* <?php echo $n_e;?></span> </td>
</tr><tr>
    <td><label class="a">Password:  </label> </td> 
    <td><input type="password" name="pass" class='b' ><span class="error">* <?php echo $pass_e;?></span> </td>   
</tr><tr>
    <td><label class="a">Confirm Password: </label></td>
     <td><input type="password" name="con" class="b"><span class="error">* <?php echo $con_e;?></span></td>
</tr><tr>
    <td><label class="a">Email Id: </label></td>
    <td> <input type="text" name="email" class='b'><span class="error">* <?php echo $email_e;?></span> </td>
</tr><tr>
    <td><label class="a">Date of Birth: </label></td>
     <td><input type="date" name="date" class="b"><span class="error">* <?php echo $date_e;?></span></td>
</tr><tr><td>
    <input type="submit" value="Sign-up" name="but" id="sub"></td>
</table>
</form>

</body>
</html>

<?php
if($n!="" || $pass="" || $con!="" || $email!="" || $date!="")
{
    $servername="127.0.0.1";
$username="userid";
$pass="password";

$database="CREATE DATABASE db_vit_18BCN7134";
if (mysqli_query($conn, $database)) {
    echo "Database created successfully";
  } else {
    echo "Error creating database: " . mysqli_error($conn);
  }

$conn=mysqli_connect($servername,$username,$pass,$database);
if(!$conn)
{
    die("Sorry we failed to connect: ".mysqli_connect_error());
}
else{
    echo "Connection on server 127.0.0.1 is successful";
}
  
$sql="CREATE TABLE 18BCN7134_users
(
    uname VARCHAR(12) NOT NULL UNIQUE,
    pass_word VARCHAR(30) NOT NULL,
    email VARCHAR(20) NOT NULL,
    dob VARCHAR(10) NOT NULL,
    PRIMARY KEY(uname)
    )";
if(mysqli_query($conn,$sql)){
    echo "Table created successfully.";
}

    

    $sql_2 = "SELECT uname FROM 18BCN7134_users WHERE HAVING $n" ;
$res = mysqli_query($conn, $sql_2);
$num = mysqli_num_rows($res);
if($num> 0){
    while($num!=0){
        $row = mysqli_fetch_assoc($res);
        if($n==$row[$num])
    die("CHOOSE A DIFFERENT USERNAME ".$sql_2->error);
    $num--;
}
}
else{
    $sql_1="INSERT INTO 18BCN7134_users(uname,pass_word,email,dob) VALUES('$_POST[n]','$_POST[pass]','$_POST[email]','$_POST[date]')";
    $result=mysqli_query($conn,$sql_1);
    if($result)
    {
        echo "Instered into table<br>";
    }
    else{
        die(" Not inserted into table --->".mysqli_error($conn));
    }
}
    
    header("Location:18BCN7134_success.php");

}
?>



