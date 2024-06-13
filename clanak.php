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

        <section role="main"> 
            <div class="row"> 
                <h2 class="category"><?php 
                    echo "<span>".$row['teme']."</span>";
                     ?></h2> 
                <h1 class="title"><?php 
                    echo $row['naslov'];
                     ?></h1> 
                <p>AUTOR:</p> 
                <p>Sazetak: <?php 
                    echo "<span>".$row['sazetak']."</span>";
                     ?></p> 
                </div> 
                <section class="slika"> <?php 
                    echo '<img src="' . UPLPATH . $row['slika'] . '">';
                     ?> 
                </section> 
                <section class="sadrzaj"> 
                    <p> <?php echo "<i>".$row['sadrzaj']."</i>";
                     ?> </p>   
                </section> 
        </section>

        <footer>
            <p>france.tv</p>
        </footer>

    
    <!--É é ê  à, â, ù, û, ü, ô, î  ç-->
    
    </body>
    
    </html>