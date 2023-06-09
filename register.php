<?php
include "assets/database.php";

$username = $email = $pwd = $confirm_pwd = '';
$errors = [];

if (isset($_POST['register'])){
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $pwd = trim($_POST['pwd']);
    $confirm_pwd = trim($_POST['confirm_pwd']);

    if ($username == '' || $email == '' || $pwd == '' || $confirm_pwd == ''){
        array_push($errors, 'input is missing.');
    } else {
        $sql = "SELECT id FROM users WHERE vorname = ? OR email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $email]);
        $data = $stmt->fetchAll();

        if(!empty($data)){
            array_push($errors, "Username/E-Mail is already registrated.");
        }

        if ($pwd != $confirm_pwd){
            array_push($errors, 'Password is not the same');
        }
    }

    if (empty($errors)){
        $sql = "INSERT INTO users (vorname, email, passwort) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute([$username, $email, password_hash($pwd, PASSWORD_DEFAULT)])) {
            header("location:login.php");
        } else {
            array_push($errors, "An error has occurred");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Gymnasium, Marianum, Meppen, Emsland, Schulstiftung, Osnabrück, freie Schule, Privatschule, Umweltschule, Wetterballon, Röchling, Haren, Stratoflight, Schüco-Arena">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="assets/css.css">
    <title>Register</title>
</head>
<body>

    <ul class="bar">
        <li><a href="index.php">Home</a></li>
        <li><a href="quiz.php">Quiz</a></li>
        <li style="float: right;"><a href="login.php">Login</a></li>
        <li style="float: right;"><a class="active" href="register.php">Registrierung</a></li>
        <li style="float: right;"><?php echo $_SESSION['vorname']; ?></li>
    </ul>
    <div class="content">
        <header><h1>Register</h1></header>

        <div class="register_formular">
            <form action="<?php echo htmlspecialchars($_Server['PHP_SELF']);?>" method="post">
            
                <p>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="z.B. 11e">
                </p>
                
                <p>
                    <label for="email">E-Mail</label>
                    <input type="email" id="email" name="email" placeholder="z.B. test.Tester@iserv-marianum.de">
                </p>
                
                <p>
                    <label for="pwd">password</label>
                    <input type="password" id="pwd" name="pwd" placeholder="z.B. 123test">
                </p>
                
                <p>
                    <label for="confirm_pwd">confirm password</label>
                    <input type="password" id="confirm_pwd" name="confirm_pwd" placeholder="z.B. 123test">
                </p>

                <p>
                    <input type="submit" value="register" name="register">
                </p>

             </form>

            <p>
                <?php
                    foreach($errors as $error){
                        echo $error."<br>";
                    }
                ?>
            </p>
        </div>
        
    </div>
    
    
</body>
</html>