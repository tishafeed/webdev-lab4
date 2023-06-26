<!DOCTYPE html>
<?php
    require_once "connect.php";

    $username = $password = "";
    $username_err = $password_err = $err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty(trim($_POST["username"]))){
            $username_err = "Введіть логін.";
        } else{
            $username = trim($_POST["username"]);
        }

        if(empty(trim($_POST["password"]))){
            $password_err = "Введіть пароль.";
        } else{
            $password = trim($_POST["password"]);
        }

        if(empty($username_err) && empty($password_err)){
            $query = "SELECT login, password FROM users WHERE login = ?";

            if($statement = mysqli_prepare($link, $query)){
                mysqli_stmt_bind_param($statement, "s", $username);
                if(mysqli_stmt_execute($statement)){
                    mysqli_stmt_store_result($statement);
                    if(mysqli_stmt_num_rows($statement) >= 1){
                        mysqli_stmt_bind_result($statement, $username, $real_password);
                        if(mysqli_stmt_fetch($statement)){
                            if($password === $real_password){
                                header("Location: https://google.com");
                            } else{
                                $err = "Невірний логін або пароль.";
                            }
                        }
                    } else{
                        $err = "Невірний логін або пароль.";
                    }
                } else{
                    echo "Невідома помилка!";
                }
                mysqli_stmt_close($statement);
            }
        }
        mysqli_close($link);
    }
?>

<html>
    <head>
        <title>Сторінка входу</title>
    </head>

    <body>
        <form method="post">
            <h2>Увійти</h2>
            <p><?php if (!empty($err)) {
                echo $err;
                }?>
                <span><?php echo $username_err; ?></span>
                <span><?php echo $password_err; ?></span>
            </p>
            <label>
                Логін <input type="text" name="username" placeholder="Логін"><br>
            </label>
            <label>
                Пароль <input type="password" name="password" placeholder="Пароль"><br>
            </label>
            <input type="submit" value="Увійти">

        </form>
    </body>
</html>

