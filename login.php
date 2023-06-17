<?php
session_start();
require "assets/database.php";

if(isset($_SESSION['auth']) && $_SESSION['auth'] == true){
    header("location: quiz.php");
    exit;
}

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
            if (password_verify($pwd, $data['passwort'])){
                //Session
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $data['id'];
                $_SESSION['vorname'] = $data['vorname'];
                header("location:quiz.php");
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
    <link rel="stylesheet" href="assets/css.css">
    <title><h1>Login</h1></title>
</head>
<body>

    <ul class="bar">    
        <li><a href="index.html">Home</a></li>
        <li><a href="quiz.php">Quiz</a></li>
        <li style="float: right;"><a class="active" href="login.php">Login</a></li>
        <li style="float: right;"><a href="register.php">Registrierung</a></li>
        <li style="float: right;"><?php echo $_SESSION['vorname']; ?></li>
    </ul>

    <div class="content">
        <header>Login</header>

        <div class="login_formular">
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

                <p>
                    Noch nicht <a href="register.php">registriert</a>?
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