<?php session_start();
    if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true) {
        header("Location: panel.php");
    }
    ?>
<!DOCTYPE html>
<html lang="pl">
<?php include 'head.php'; ?>
<body class="d-flex jev ac flex-col min-height-100vh">
    <h1 class="fw-light m-0">Dzienniczek ucznia</h1>
    <section class="w-20 d-flex flex-col ac jev py-60px px-50px" style="
    border-radius: 30px;
    background: ##f2f2f2;
    box-shadow:  20px 20px 60px #bebebe,
                -20px -20px 60px #ffffff;">
        <form method="GET" action = "index.php" class="text-center">
            <p class="mt-0">Login</p>
            <input type="text" name="login" id="login" class="login-input text-center">
            <p>Hasło</p>
            <input type="password" name="password" id="password" class="login-input text-center">
            <br>
            <button type="submit" id="login-button" class="mt-10px">Zaloguj</button>
        </form>
        <?php
        
            if(isset($_GET['login']) && isset($_GET['password'])) {
                $login = $_GET['login'];
                $password = $_GET['password'];
                if($login == '') {
                    echo "
                    <script>
                        document.getElementById('login').style.borderBottom = '1px solid red';
                        document.getElementById('login').placeholder = 'Wpisz login';
                    </script>
                    ";
                }
                if($password == '') {
                    echo "
                    <script>
                        document.getElementById('password').style.borderBottom = '1px solid red';
                        document.getElementById('password').placeholder = 'Wpisz hasło';
                    </script>
                    ";
                }
                if($login != '' && $password != '') {
                    $conn = mysqli_connect('localhost', 'root', '','dzienniczek_ucznia');
                    $query = "SELECT * FROM `uczen` WHERE `Login` = '$login' AND `Haslo` = '$password'";
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result) > 0) {
                        $_SESSION['uzytkownik'] = $login;
                        $_SESSION['zalogowany'] = true;
                        header("Location: panel.php");
                    } else {
                        echo "<p class='m-0 mt-30px text-red'>Niepoprawny login lub hasło</p>";
                    }
                }
            }
            
        ?>
        
    </section>
    <a class="text-sub2 text-italic fw-light fs-07 text-none" href="http://ui.gugisek.pl" target="_blank">by gugisek</a>
    
</body>
</html>