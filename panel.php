<?php session_start();
    if(!isset($_SESSION["zalogowany"]) || $_SESSION["zalogowany"] !== true){
        header("location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pl">
<?php include 'components/head.php'; ?>
<script src="scripts/clock.js"></script>
<body class="d-flex jev ac flex-col min-height-100vh" onload="clock()">
    <div class="header d-flex row-dir jc jev w-100 flex-wrap">
        <p class="w-20 m-0" id="zegar"></p>
        
        <?php
        
        $conn = mysqli_connect('localhost', 'root', '', 'dzienniczek_ucznia');
        $sesja_login = $_SESSION['uzytkownik'];
        $query = "SELECT Imie FROM uczniowie WHERE Login = '$sesja_login'";
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)) {
            $imie = $row['Imie'];
            echo "<h1 class='fw-light m-0'>Witaj $imie</h1>";
        }
        ?>
        <div class="btn-hover w-20 d-flex je">
            <div class="logout d-flex">
                <a href="logout.php" class="text-none text-black">Wyloguj</a>
                <a href="logout.php" style="width: 20px; height: 20px; display: block;" class="text-none text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    
    <section class="w-80 border-r-30px p-10px" style="
    border-radius: 30px;
    background: ##f2f2f2;
    box-shadow:  20px 20px 60px #bebebe,
                -20px -20px 60px #ffffff;">
        <div class="d-flex flex-row jev">
            <?php
            
            $conn = mysqli_connect('localhost', 'root', '', 'dzienniczek_ucznia');
            $query = "SELECT * FROM uczniowie WHERE login = '$sesja_login'";
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_assoc($result)) {
                $rok = $row['Rok szkolny'];
                $klasa = $row['Klasa'];
                echo "<p class='fw-light text-sub2 text-italic'>Rok szkolny: $rok</p>";
                echo "<p class='fw-light text-sub2 text-italic'>Klasa: $klasa</p>";
            }
            ?>
        </div>
        <div class="d-flex flex-col jc ac">
            <hr class="w-80">
            <table class="w-80 p-10px text-left" >
                <tr>
                    <th class="fw-normal text-sub2 w-25">Przedmiot</th>
                    <th class="fw-normal text-sub2 w-30">Ocena</th>
                    <th class="fw-normal text-sub2">Komentarz</th>
                </tr>
            </table>
            <hr class="w-80">
            <table class="w-80 p-10px text-left">
                <?php

                $conn = mysqli_connect('localhost', 'root', '', 'dzienniczek_ucznia');
                $query = "SELECT Ocena, Opis, Imie, Nazwa FROM `oceny` join uczniowie on uczniowie.Id_ucznia=oceny.Id_ucznia  join przedmioty on oceny.Id_przedmiotu=przedmioty.Id_przedmiotu where login = '$sesja_login';";
                $result = mysqli_query($conn, $query);
                while($row = $result->fetch_assoc()) 
                {
                    $przedmiot = $row['Nazwa'];
                    $ocena = $row['Ocena'];
                    $opis = $row['Opis'];
                    echo "<tr>
                    <td class='fw-light text-sub2 w-25'>$przedmiot</td>
                    <td class='fw-light text-sub2 w-30'>$ocena</td>
                    <td class='fw-light text-sub2'>$opis</td>
                    </tr>";
                }

                ?>
            </table>
            <hr class="w-80">
            
            
            <form action="insert.php" method="GET" class="w-100 d-flex ac jc">
                <div class="w-80 p-10px text-left d-flex row-dir flex-wrap sb jc gap-5px">
                    <div class="w-25 d-flex flex-row wrap ac gap-5px">
                        Przedmiot: 
                        <select name="przedmiot">
                            <option value="1">Matematyka</option>
                            <option value="2">Język Polski</option>
                            <option value="3">WF</option>
                            <option value="4">Język Angielski</option>
                        </select>
                    </div>
                    <div class="w-15 d-flex flex-row wrap ac gap-5px">
                        Ocena: 
                        <select name="ocena">
                            <option value="1">1</option>
                            <option value="1+">1+</option>
                            <option value="2-">2-</option>
                            <option value="2">2</option>
                            <option value="2+">2+</option>
                            <option value="3-">3-</option>
                            <option value="3">3</option>
                            <option value="3+">3+</option>
                            <option value="4-">4-</option>
                            <option value="4">4</option>
                            <option value="4+">4+</option>
                            <option value="5-">5-</option>
                            <option value="5">5</option>
                            <option value="5+">5+</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                    <div class="d-flex row-dir wrap ac gap-5px">
                        Opis: 
                        <textarea name="opis" id="" cols="30" rows="1"></textarea>
                    </div>
                    <div class="d-flex ac jc">
                        <button type="submit" class="fw-500 ">Dodaj ocenę</button>
                    </div>
                </div>
            </form>
            
            
            
        </div>
    </section>
    <a class="text-sub2 text-italic fw-light fs-07 text-none" href="http://ui.gugisek.pl" target="_blank">by gugisek</a>
    
</body>
</html>