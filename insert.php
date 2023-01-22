            <?php
                session_start();
                if(isset($_GET['przedmiot']) && isset($_GET['ocena']) && isset($_GET['opis'])) {
                    
                    $przedmiot = $_GET['przedmiot'];
                    $ocena = $_GET['ocena'];
                    $opis = $_GET['opis'];
                    $conn = mysqli_connect('localhost', 'root', '', 'dzienniczek_ucznia');
                    $sesja_login = $_SESSION['uzytkownik'];

                    $sql = "SELECT Id_ucznia FROM `uczniowie` WHERE `Login` = '$sesja_login'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $id_ucznia = $row['Id_ucznia'];
                    
                    $query = "INSERT INTO `oceny` (`Id_oceny`, `Id_ucznia`, `Id_przedmiotu`, `Ocena`, `Opis`) VALUES (NULL, '$id_ucznia', '$przedmiot', '$ocena', '$opis')";
                    $result = mysqli_query($conn, $query);
                }
                header("Location: panel.php");
            ?>