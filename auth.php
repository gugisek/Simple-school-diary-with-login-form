<?php
    // if($_POST['login']=="" || $_POST['password']=="") {
    //     header("Location: index.php");
    //     echo "<p class='m-0 mt-30px text-red'>Wpisz login</p>";
        
    // }else {
    //     if(isset($_POST['login']) && isset($_POST['password'])) {
    //         $login = $_POST['login'];
    //         $password = $_POST['password'];
    //         $conn = mysqli_connect('localhost', 'root', '', 'dzienniczek_ucznia');
    //         $query = "SELECT * FROM `uczen` WHERE `Login` = '$login' AND `Haslo` = '$password'";
    //         $result = mysqli_query($conn, $query);
    //         if(mysqli_num_rows($result) > 0) {
    //             $_SESSION['zalogowany'] = true;
    //             header("Location: panel.php");
    //         } else {
                
    //             echo "<p class='m-0 mt-30px text-red'>Niepoprawny login lub hasło</p>";
    //         }
    //     }
    // }
?>  
<?php
        
        if($_GET['login']=="" || $_GET['password']=="") {
            
        }
        else {
            if(isset($_GET['login']) && isset($_GET['password'])) {
            $login = $_GET['login'];
            $password = $_GET['password'];
            $conn = mysqli_connect('localhost', 'root', '', 'dzienniczek_ucznia');
            $query = "SELECT * FROM `uczen` WHERE `Login` = '$login' AND `Haslo` = '$password'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) > 0) {
                $_SESSION['zalogowany'] = true;
                header("Location: panel.php");
            } else {
                
                echo "<p class='m-0 mt-30px text-red'>Niepoprawny login lub hasło</p>";
            }
        }
        }
    ?>