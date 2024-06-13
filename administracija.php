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

        <?php
        $dbc = mysqli_connect('localhost', 'username', 'password', 'vijesti') 
        or die('Error connecting to MySQL server.'. mysqli_connect_error());

        $query = "INSERT INTO vijesti (name, naslov, sadrzaj) VALUES ('!!!', '?', '???')";

        $result = mysqli_query($dbc, $query) or die('Error querying databese.');

        mysqli_close($dbc);
        ?>

        <?php 
        session_start(); 
        include 'connect.php';
        define('UPLPATH', 'img/');
        if (isset($_POST['prijava'])) { 
            $prijavaImeKorisnika = $_POST['username']; 
            $prijavaLozinkaKorisnika = $_POST['lozinka']; 
            $sql = "SELECT username, lozinka, razina FROM korisnik WHERE username = ?"; 
            $stmt = mysqli_stmt_init($dbc); 
            if (mysqli_stmt_prepare($stmt, $sql)) { 
                mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika); 
                mysqli_stmt_execute($stmt); 
                mysqli_stmt_store_result($stmt); 
            } 
            mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika); 
            mysqli_stmt_fetch($stmt);
            if (password_verify($_POST['password'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) { 
                $uspjesnaPrijava = true;
            if($levelKorisnika == 1) { 
                $admin = true; 
            } else { 
                $admin = false; 
                } 
                $_SESSION['$username'] = $imeKorisnika; 
                $_SESSION['$level'] = $levelKorisnika; 
                } else { 
                    $uspjesnaPrijava = false; 
                    } 
        }
        ?>


        <?php
        if (($uspjesnaPrijava == true && $admin == true) || (isset($_SESSION['$username'])) && $_SESSION['$level'] == 1) { 
            $query = "SELECT * FROM vijesti"; 
            $result = mysqli_query($dbc, $query); 
            while($row = mysqli_fetch_array($result)) { 
                }
            } else if ($uspjesnaPrijava == true && $admin == false) { 
                echo '<p>Bok ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali niste administrator.</p>'; 
            } else if (isset($_SESSION['$username']) && $_SESSION['$level'] == 0) {
                 echo '<p>Bok ' . $_SESSION['$username'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>'; 
            } else if ($uspjesnaPrijava == false) { 
        ?>
        <script type="text/javascript">
        </script> 
        <?php 
        } ?> 

        <?php
        $query = "SELECT * FROM vijesti"; 
        $result = mysqli_query($dbc, $query); 
        while($row = mysqli_fetch_array($result)) { 
            echo '<form enctype="multipart/form-data" action="" method="POST"> 
                <div class="form-item"> 
                    <label for="title">Naslov vjesti:</label> 
                <div class="form-field"> 
                    <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'"> 
                </div> 
                </div> 
                <div class="form-item"> 
                    <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label> 
                <div class="form-field"> 
                <textarea name="about" id="" cols="30" rows="10" class="form-field-textual">'.$row['sazetak'].'</textarea> 
                </div> 
                </div> 
                <div class="form-item"> 
                    <label for="content">Sadržaj vijesti:</label> 
                <div class="form-field"> 
                <textarea name="content" id="" cols="30" rows="10" class="form-field-textual">'.$row['tekst'].'</textarea> 
                </div> 
                </div> 
                <div class="form-item"> 
                    <label for="slike">Slika:</label> 
                <div class="form-field">
                    <input type="file" class="input-text" id="slike" value="'.$row['slika'].'" name="slike"/> <br><img src="' . UPLPATH . $row['slika'] . '" width=100px>
                </div> 
                </div> 
                <div class="form-item"> 
                    <label for="category">Kategorija vijesti:</label> 
                <div class="form-field"> 
                    <select name="category" id="" class="form-field-textual" value="'.$row['kategorija'].'"> 
                        <option value="ekonomija">Ekonomija</option> 
                        <option value="zabava">Zabava</option> 
                    </select> 
                </div> 
                </div> 
                <div class="form-item"> 
                    <label>Spremiti u arhivu: 
                <div class="form-field">'; 
                if($row['arhiva'] == 0) { 
                    echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?';
                 } else { 
                    echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?';
                 } echo '</div> 
                    </label> 
                </div> 
                </div> 
                <div class="form-item"> 
                    <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'"> 
                        <button type="reset" value="Poništi">Poništi</button> 
                        <button type="submit" name="update" value="Prihvati"> Izmjeni</button> 
                        <button type="submit" name="delete" value="Izbriši"> Izbriši</button> 
                </div> 
                </form>'; 
            }

            define('UPLPATH', 'img/'); 
            if(isset($_POST['update'])){ 
                $picture = $_FILES['slike']['name']; 
                $title=$_POST['naslov']; 
                $about=$_POST['sazetak']; 
                $content=$_POST['sadrzaj']; 
                $category=$_POST['teme']; 
                if(isset($_POST['prvi'])){ 
                    $archive=1; 
                }else{ 
                    $archive=0; 
                } 
                $target_dir = 'img/'.$picture;
                move_uploaded_file($_FILES["slike"]["tmp_name"], $target_dir); 
                $id=$_POST['id']; 
                $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', sadrzaj='$content', slike='$picture', teme='$category' WHERE id=$id "; 
                $result = mysqli_query($dbc, $query); 
            }

            if(isset($_POST['delete'])){
                 $id=$_POST['id']; 
                 $query = "DELETE FROM vijesti WHERE id=$id "; 
                 $result = mysqli_query($dbc, $query); 
                }


        if(isset($_POST['delete'])){
             $id=$_POST['id']; $query = "DELETE FROM vijesti WHERE id=$id "; $result = mysqli_query($dbc, $query); }

        ?>

        <footer>
            <p>france.tv</p>
        </footer>

    
    <!--É é ê  à, â, ù, û, ü, ô, î  ç-->
    
    </body>
    
    </html>