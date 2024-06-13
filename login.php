<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>franceinfo</title>
        <meta name="keywords" content="franceinfo">
        <meta name="description" content="franceinfo">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet" type="text/css" media="all">

    </head>
    <body>

        <header>
            <img src="slike/logo.jpg" alt="logo">
            <nav>
                <a href="index.html">pocetna</a>
                <a href="index.php">home</a>
                <a href="artikl.html">artikl</a>
                <a href="kategorija.php">kategorija</a>
                <a href="unos.php">unos</a>
                <a href="clanak.php">clanak</a>
                <a href="administracija.php">administracija</a>
            </nav>
        </header>


        <form name="forma" action="skripta.php" method="POST">
            <div class="form-group">
                 <label for="korisnik">Korisnicko ime:</label>
                 <input type="text" class="form-control" id="naslov" name="naslov" />
            </div>
            <div class="form-group">
                 <label for="lozinka">Lozinka:</label><br>
                 <input type="text" class="form-control" id="naslov" name="naslov" />
            </div>
            
           <div class="form-item"> 
            <button type="reset" value="Poništi">Poništi</button> 
            <button type="submit" value="Prihvati">Prihvati</button> 
           </div>
         </form>

         <?php

         $ime = $_POST['ime']; 
         $prezime = $_POST['prezime']; 
         $username = $_POST['username']; 
         $lozinka = $_POST['pass']; 
         $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH); 
         $razina = 0; $registriranKorisnik = ''; 
         $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?"; 
         $stmt = mysqli_stmt_init($dbc); 
         if (mysqli_stmt_prepare($stmt, $sql)) { 
            mysqli_stmt_bind_param($stmt, 's', $username); 
            mysqli_stmt_execute($stmt); 
            mysqli_stmt_store_result($stmt); 
        } 
         if(mysqli_stmt_num_rows($stmt) > 0){ 
            $msg='Korisničko ime već postoji!'; 
        } else {
            $sql = "INSERT INTO korisnik (ime, prezime,korisnicko_ime, lozinka, razina)VALUES (?, ?, ?, ?, ?)"; 
            $stmt = mysqli_stmt_init($dbc); 
            if (mysqli_stmt_prepare($stmt, $sql)) { 
                mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina); 
                mysqli_stmt_execute($stmt); 
                $registriranKorisnik = true; 
            } 
        } 
        mysqli_close($dbc);
        ?>
        <?php
        if($registriranKorisnik == true) { 
            echo '<p>Korisnik je uspješno registriran!</p>'; 
            } else { ?> 
            <section role="main"> 
                <form enctype="multipart/form-data" action="" method="POST"> 
                    <div class="form-item"> 
                        <span id="porukaIme" class="bojaPoruke"></span> 
                        <label for="title">Ime: </label> 
                        <div class="form-field"> 
                            <input type="text" name="ime" id="ime" class="form-field-textual"> 
                        </div> 
                    </div> 
                    <div class="form-item"> 
                        <span id="porukaPrezime" class="bojaPoruke"></span> 
                        <label for="about">Prezime: </label> 
                        <div class="form-field"> 
                            <input type="text" name="prezime" id="prezime" class="form-field-textual"> 
                        </div> 
                    </div> 
                    <div class="form-item"> 
                        <span id="porukaUsername" class="bojaPoruke"></span> 
                        <label for="content">Username:</label>
                        <?php echo '<br><span class="bojaPoruke">'.$msg.'</span>'; ?> 
                        <div class="form-field"> 
                            <input type="text" name="username" id="username" class="form-field-textual"> 
                        </div> 
                    </div> 
                    <div class="form-item"> 
                        <span id="porukaPass" class="bojaPoruke"></span> 
                        <label for="password">Lozinka: </label> 
                        <div class="form-field">
                            <input type="password" name="password" id="password" class="form-field-textual"> 
                        </div> 
                    </div> 
                        <div class="form-item"> 
                            <span id="porukaPassRep" class="bojaPoruke"></span> 
                            <label for="password">Ponovite lozinku: </label> 
                            <div class="form-field"> 
                                <input type="password" name="passwordRep" id="passwordRep" class="form-field-textual"> 
                            </div>
                        </div> 
                        <div class="form-item"> 
                            <button type="submit" value="Prijava" id="slanje">Prijava</button> 
                        </div> 
                </form> 

            </section> 
            <script type="text/javascript"> 
            document.getElementById("slanje").onclick = function(event) { 
                var slanjeForme = true; 
                var poljeIme = document.getElementById("ime"); 
                var ime = document.getElementById("ime").value; 
                if (ime.length == 0) { 
                    slanjeForme = false; 
                    poljeIme.style.border="1px dashed red"; 
                    document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>";
                } else { 
                    poljeIme.style.border="1px solid green"; 
                    document.getElementById("porukaIme").innerHTML=""; 
                }
                var poljePrezime = document.getElementById("prezime"); 
                var prezime = document.getElementById("prezime").value; 
                if (prezime.length == 0) { 
                    slanjeForme = false;
                    poljePrezime.style.border="1px dashed red"; 
                    document.getElementById("porukaPrezime").innerHTML="<br>Unesite Prezime!<br>"; 
                } else { 
                    poljePrezime.style.border="1px solid green"; 
                    document.getElementById("porukaPrezime").innerHTML=""; 
                }
                var poljeUsername = document.getElementById("username"); 
                var username = document.getElementById("username").value; 
                if (username.length == 0) { 
                    slanjeForme = false; poljeUsername.style.border="1px dashed red"; 
                    document.getElementById("porukaUsername").innerHTML="<br>Unesite korisničko ime!<br>"; 
                } else { 
                    poljeUsername.style.border="1px solid green"; 
                    document.getElementById("porukaUsername").innerHTML=""; 
                }
                var poljePass = document.getElementById("lozinka"); 
                var pass = document.getElementById("lozinka").value; 
                var poljePassRep = document.getElementById("lozinkaRep"); 
                var passRep = document.getElementById("lozinkaRep").value; 
                if (lozinka.length == 0 || lozinkaRep.length == 0 || lozinka != lozinkaRep) { 
                    slanjeForme = false; 
                    poljePass.style.border="1px dashed red"; 
                    poljePassRep.style.border="1px dashed red"; 
                    document.getElementById("porukaPass").innerHTML="<br>Lozinke nisu iste!<br>"; 
                    document.getElementById("porukaPassRep").innerHTML="<br>Lozinke nisu iste!<br>"; 
                } else { 
                    poljePass.style.border="1px solid green"; 
                    poljePassRep.style.border="1px solid green"; 
                    document.getElementById("porukaPass").innerHTML=""; 
                    document.getElementById("porukaPassRep").innerHTML=""; 
                } 
                if (slanjeForme != true) { 
                    event.preventDefault(); 
                }
            }; 
            </script> 
            <?php 
        } 
        ?>

        <footer>
            <p>france.tv</p>
        </footer>

    
    <!--É é ê  à, â, ù, û, ü, ô, î  ç-->
    
    </body>
    
    </html>