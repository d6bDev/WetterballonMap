<?php
session_start();
require "database.php";

$email = $pwd = "";
$errors = [];

if (isset($_POST['Login'])) {
    $email = trim($_POST['email']);
    $pwd = trim($_POST['pwd']);

    if ($email == '' || $pwd == ''){
        array_push($errors, 'input is missing.');
    }

    if (empty($errors)) {
        $sql = "SELECT id, vorname, passwort FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $data = $stmt->fetch();

        if(!$data) {
            array_push($errors, 'E-Mail not found.');
        } else {
            if (password_verify($pwd, $data['password'])){
                //Session
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $data['id'];
                $_SESSION['vorname'] = $data['vorname'];
                header("location:welcome.php");
            } else {
                array_push($errors, 'Password is wrong.');
            }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Login</h1>

    <form action="<?php echo htmlspecialchars($_Server['PHP_SELF']);?>" method="post">

        <p>
            <label for="email">E-Mail</label>
            <input type="email" id="email" name="email">
        </p>
        
        <p>
            <label for="pwd">Password</label>
            <input type="password" id="pwd" name="pwd">
        </p>

        <p>
            <input type="submit" value="Login" name="Login">
        </p>

    </form>

    <p>
        <?php
            foreach($errors as $error){
                echo $error."<br>";
            }
        ?>
    </p>

</body>
</html>