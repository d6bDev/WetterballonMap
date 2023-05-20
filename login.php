<?php
session_start();
require "database.php";

$id_nmb = "";
$errors = [];

if (isset($_POST['login'])){
    $id_nmb = trim($_POST['id_nmb']);

    if ($id_nmb == ''){
        array_push($errors, 'Eingabe fehlt.');
    }

    if (empty($errors)){
        $sql = "SELECT id from users where email = ?;";
        $stmt = $db->prepare($sql);
        $stmt->execute([$email]);
        $data = $stmt->fetch();

        if(!$data){
            array_push($errors, 'Idenftifikation Nummer nicht gefunden.');
        }
        else {
            //Session
            $_Session['auth'] = true;
            $_Session['id'] = $data['id'];
            header("location: quiz.php")
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form action="<?php echo htmlspecialchars($_Server['PHP_SELF']);?>" method="post">

        <label for="id_nmb">Identifikation nummer</label>
        <input type="text" id="id_nmb" name="id_nmb">

        <input type="submit" value="Login"  name="Login">
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