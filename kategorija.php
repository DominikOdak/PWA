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

        <section>

            <article>
                <h1>Grand Soir 3 du jeudi 16 mai 2019</h1>
                <h4>Le Grand Soir 3, du jeudi 16 mai 2019 présenté par Francis Letellier sur France 3 est consultable en ligne à la fois en direct et en replay pour voir et revoir ce journal télé qui décrypte l'actualité d'une journée.</h4>
                <img src="slike/mijauuuuuu.jpg" alt="covek">
            </article>
            <article>
                <p>Le Grand Soir 3, du jeudi 16 mai 2019 présenté par Francis Letellier sur France 3 est consultable en ligne à la fois en direct et en replay pour voir et revoir ce journal télé qui décrypte l'actualité d'une journée. 
                    Retrouvez les résultats de la question du jour, l'Eurozapping, la revue de presse, ainsi que les grands reportages, les interviews et les explications de la rédaction sur toute l’actualité régionale, d'outre-mer, 
                    nationale et internationale. Pour réagir à l'information sur les réseaux sociaux : #grandsoir3 ou sur le compte @LeGrandSoir3
                </p>
            </article>
        </section>

        <article>
                <h1>80 km/h, PMA, chôomage, européennes... Ce qu'il faut retenir de l'interview d'Édouard Philippe sur franceinfo</h1>
                <h4>Le Premier ministre était l'invité du "8h30 Fauvelle-Dély", jeudi 16 mai. Voici ce qu'il fallait en retenir. </h4>
                <img src="slike/plavi.jpg" alt="covek">
            </article>
            <article>
                <p>Invité de franceinfo jeudi 16 mai, Edouard Philippe a estimé que "les conditions"  étaient réunies pour qu'il reste à Matignon, bien que la décision ne 
                    lui appartienne "pas complètement". "Un Premier ministre, il est à Matignon quand, au fond, trois conditions sont réunies, a-t-il détaillé. 
                    La confiance du président, le soutien de la majorité parlementaire et puis des éléments qui lui sont propres : est-ce qu'il est à l’aise avec ce qu'il 
                    fait, est-ce qu'il a envie de le faire. Aujourd'hui, il me semble que ces trois conditions sont réunies." Mais "la décision ne m'appartient pas complètement",
                     a-t-il ajouté. "Le président de la République a son mot à dire (…) et je respecte évidemment son analyse et ses choix en la matière", explique le Premier 
                     ministre. Voici ce qu'il fallait retenir de cet entretien sur franceinfo.
                </p>
                <h3>
                Emmanuel Macron en campagne pour les européennes : "C'est très bien ainsi"
                </h3>
                <p>
                Le président de la République qui pèse dans la campagne et son portrait sur des affiches de la liste Renaissance : "C'est très bien ainsi", estime le Premier ministre. 
                Pour Édouard Philippe, Emmanuel Macron assume de cette manière "son engagement pro-européen". Pour autant, en cas de score inférieur à la liste du Rassemblement national 
                le soir du 26 mai, Édouard Philippe l'affirme, "la logique d'ensemble de l'action gouvernementale" ne sera pas modifiée. Même si l'on peut s'attendre à une éventuelle inflexion 
                de la politique gouvernemental.  
                </p>
            </article>
        </section>

        <?php 
        include 'connect.php'; 
        define('UPLPATH', 'img/');
        ?> 
        <section class="ekonomija"> 
        <?php 
        $kategorija=$_GET[teme];
        $query = "SELECT * FROM vijesti WHERE kategorija=$kategorija";
        $result = mysqli_query($dbc, $query);
            $i=0; 
            while($row = mysqli_fetch_array($result)) {
                 echo '<article>'; 
                 echo'<div class="article">'; 
                 echo '<div class="flags_img">'; 
                 echo '<img src="' . UPLPATH . $row['slika'] . '"'; 
                 echo '</div>'; 
                 echo '<div class="flags">'; 
                 echo '<h4 class="title">'; 
                 echo '<a href="clanak.php?id='.$row['id'].'">'; 
                 echo $row['naslov']; 
                 echo '</a></h4>'; 
                 echo '</div></div>'; 
                 echo '</article>'; 
            }
        ?> 
        </section>

        <footer>
            <p>france.tv</p>
        </footer>

    
    <!--É é ê  à, â, ù, û, ü, ô, î  ç-->
    
    </body>
    
    </html>