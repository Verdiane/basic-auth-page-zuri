<?php

session_start();

if(isset($_POST['submit'])){
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];

    $data = file_get_contents('files/user.json');
    $user = json_decode($data);

    $username = $user->name;
    $userpassword = $user->password;

    if ($_SESSION['name']== $username){

        $userpassword = $_SESSION['password'] ;

        $array_data = array(
            'name' =>$_SESSION['name'],
            'email' => $_SESSION['email'],
            'password' =>$_SESSION['password']
        );

        file_put_contents('files/user.json', json_encode($array_data));  
   
        $_SESSION['user'] = array($username, $userpassword);

        echo '<script>location.href="welcome.php"</script>';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title> </title>
</head>

<body>

    <form action="register.php" method="POST">
         <label for="name">Your Name</label>
        <input type="text" name="name" placeholder="name">
        <br>
        <br>
        <label for="email">Your Email</label>
        <input type="email" name="email" placeholder="email">
        <br>
        <br>
        <label for="password">Your new password</label>
        <input type="password" name="password" placeholder="password">
        <br>
        <br>

        <button type="submit" name="submit">Submit</button>
    </form>

</body>
</html>