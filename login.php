<?php
session_start();

if(isset($_POST['submit'])){
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['password'] = $_POST['password'];

    $data = file_get_contents('files/user.json');

    $user = json_decode($data);

    $username = $user->name;
    $userpassword = $user->password;

    
    if (($_SESSION['name']== $username) && ($_SESSION['password'] == $userpassword)){

        $_SESSION['user'] = array($username, $userpassword);

        // echo 'Valid user';

        echo '<script>location.href="welcome.php"</script>';
    }
    else{
         
        echo '<script language="javascript">';
        echo 'alert("Invalid user name or password")';
        echo '</script>';
    }
    
}
?>


<!DOCTYPE html>
<html>
<head>
  <title> </title>
</head>

<body>

    <form action="login.php" method="POST">
         <label for="name">User Name</label>
        <input type="name" name="name" placeholder="name">
        <br>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="password">
        <br>
        <br>

        <button type="submit" name="submit">Submit</button>
    </form>

</body>
</html>