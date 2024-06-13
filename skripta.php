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
            <article>
                <h1>
                <?php echo $_POST["naslov"]; ?>
                </h1>
                <br>
                <h3>
                <?php echo $_POST["sazetak"]; ?>
                </h3>
                <br>
            </article>
            <article>
                <p>
                <?php echo $_POST["sadrzaj"]; ?>
                </p>
                <br>
                <p>
                Tema: <?php echo $_POST["teme"]; ?>
                </p>
            </article>
            <article>
            <br>
            <img src="<?php echo $_POST["slika"]; ?>" alt="Uploaded Image">
            <br>
            </article>
        </section>
            
        

        <footer>
            <p>france.tv</p>
        </footer>

    
    <!--É é ê  à, â, ù, û, ü, ô, î  ç-->
    
    </body>
    
</html>
