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
         
        <div class="container">
            <h1>Slanje</h1>
            <form name="forma" action="skripta.php" method="POST">
                <div class="form-group">
                     <label for="naslov">Naslov:</label>
                     <input type="text" class="form-control" id="naslov" name="naslov" />
                </div>
                <div class="form-group">
                     <label for="sazetak">Sazetak:</label><br>
                     <textarea rows="4" cols="50" name=sazetak></textarea>
                </div>
                     <label for="sadrzaj">Vijesti:</label><br>
                     <textarea type="text" rows="4" cols="50" name="sadrzaj"></textarea><br>
                     <input list="id" name="teme">
                     <select name="teme" id="id" size="1">
                        <option value="Politika">Politika</option>
                        <option value="Ekonomija">Ekonomija</option>
                        <option value="Sport">Sport</option>
                        <option value="Vrijeme">Vrijeme</option>
                        <option value="Zabava">Zabava</option>
                     </select>
                    
                     <div class="form-item"> 
                        <label for="slika">Slika: </label> 
                        <div class="form-field"> 
                            <input type="file" accept="image/*" name="slika"/> 
                        </div> 
                    </div>

                <div class="form-group">
                    <label for="vijesti">Želite li da se prikazuju novosti?</label><br>
                    <input type="checkbox" id="prvi" name="prvi" value="DA">
                    <label for="prvi"> DA </label><br>
                    <input type="checkbox" id="drugi" name="drugi" value="NE">
                    <label for="drugi"> NE </label><br>
               </div>
                
               <div class="form-item"> 
                <button type="reset" value="Poništi">Poništi</button> 
                <button type="submit" value="Prihvati">Prihvati</button> 
               </div>
             </form>
        </div>

        <script type="text/javascript"> 
        document.getElementById("slanje").onclick = function(event) { 
            var slanjeForme = true;
            var poljeTitle = document.getElementById("naslov");
            var title = document.getElementById("naslov").value;
            if (title.length < 5 || title.length > 30) {
                slanjeForme = false;
                poljeTitle.style.border="1px dashed red";
                document.getElementById("porukaTitle").innerHTML="Naslov vjesti mora imati između 5 i 30 znakova!<br>";
            } else {
                poljeTitle.style.border="1px solid green";
                document.getElementById("porukaTitle").innerHTML="";
            }
            var poljeAbout = document.getElementById("sazetak"); 
            var about = document.getElementById("sazetak").value; 
            if (about.length < 10 || about.length > 100) { 
                slanjeForme = false; 
                poljeAbout.style.border="1px dashed red"; 
                document.getElementById("porukaAbout").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>"; 
            } else { 
                poljeAbout.style.border="1px solid green"; 
                document.getElementById("porukaAbout").innerHTML=""; 
            }
            var poljeContent = document.getElementById("sadrzaj"); 
            var content = document.getElementById("sadrzaj").value; 
            if (content.length == 0) { 
                slanjeForme = false; 
                poljeContent.style.border="1px dashed red"; 
                document.getElementById("porukaContent").innerHTML="Sadržaj mora biti unesen!<br>"; 
            } else { 
                poljeContent.style.border="1px solid green";
                document.getElementById("porukaContent").innerHTML=""; 
            }
            var poljeSlika = document.getElementById("slika"); 
            var pphoto = document.getElementById("slika").value; 
            if (pphoto.length == 0) { 
                slanjeForme = false; 
                poljeSlika.style.border="1px dashed red"; 
                document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>"; 
            } else { 
                poljeSlika.style.border="1px solid green"; 
                document.getElementById("porukaSlika").innerHTML=""; 
            }
            var poljeCategory = document.getElementById("teme"); 
            if(document.getElementById("teme").selectedIndex == 0) { 
                slanjeForme = false; 
                poljeCategory.style.border="1px dashed red"; 
                document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>"; 
            } else { 
                poljeCategory.style.border="1px solid green"; 
                document.getElementById("porukaKategorija").innerHTML=""; 
                } if (slanjeForme != true) { 
                    event.preventDefault(); 
                    } 
                }; 
         </script>

        <?php 
        include 'connect.php'; 

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
        $query = "INSERT INTO vijesti (slike, naslov, sazetak, sadrzaj, teme, slike, prvi) VALUES ('$picture', '$title', '$about', '$content', '$category',
        '$archive')"; 
         $result = mysqli_query($dbc, $query) or die('Error querying databese.');
         mysqli_close($dbc); 
         ?>

        <footer>
            <p>france.tv</p>
        </footer>

    
    <!--É é ê  à, â, ù, û, ü, ô, î  ç-->
    
    </body>
    
    </html>