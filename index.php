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
            <nav class="navbar main_nav " role="navigation"> 
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
        include 'connect.php'; 
        define('UPLPATH', 'img/');
        ?> 
        <section class="ekonomija"> 
        <?php 
        $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='ekonomija' LIMIT 4";
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

        <section>

        <article>
            <h1>Le candidat RN aux élections européennes était l'invité du 19h20 politique de franceinfo jeudi.</h1>
            <img src="slike/mijauuuuuu.jpg" alt="covek">
        </article>
        <article>
            <p>
            "Incontestablement, nous avons une capacité à nous adresser à des Français qui viennent d’horizons politiques et sociologiques très différents", a déclaré jeudi 16 mai sur franceinfo Nicolas Bay, candidat RN aux élections européennes. Dans un sondage Odoxa-Dentsu Consulting pour franceinfo et Le Figaro, le Rassemblement national recueille 36% de bonnes opinions, son plus haut niveau de popularité de la décennie.
            Selon ce même sondage, 40% des électeurs de La France insoumise considèrent que le Rassemblement national défend bien les classes populaires. "Il y a à droite de l’échiquier, et sans doute chez les électeurs de Jean-Luc Mélenchon à l’élection présidentielle, des Français qui veulent défendre la souveraineté nationale et dans le cadre des élections européennes, nous leur disons : il y a un vote utile pour défendre l’Europe des nations et pour battre Macron, c’est le vote Rassemblement national", a déclaré le député européen sortant.
            Selon l’étude, 60% des Français considèrent que le RN est un parti comme un autre. Nicolas Bay y voit une "bonne nouvelle" "Le Rassemblement national apparait aux yeux des Français pour ce qu’il est vraiment, loin des caricatures qui ont longtemps été colportées et entretenues contre nous", a-t-il expliqué.
            Sur franceinfo, le candidat aux élections européennes a également défendu la stratégie d’alliance du Rassemblement national avec d’autres partis populistes européens. "Matteo Salvini a été très critiqué dans les médias français sans la possibilité de se défendre puisqu’il est homme politique en Italie. Par conséquent, beaucoup ont subi un flot ininterrompu de propagande anti-Salvini depuis des mois et des mois parce qu’il avait le courage de s’attaquer à l’immigration, de prendre des mesures qui se révèlent efficaces", a-t-il estimé.
            "Nous avons une capacité à avoir des alliés qui sont partout en croissance en Europe alors que la plupart de nos adversaires, à commencer par Emmanuel Macron, ont finalement assez peu d’alliés et souvent des forces supplétives dans leur pays en Europe", a poursuivi Nicolas Bay.
            </p>
        </article>
        </section>

        <article>
            <h1>JT se 20h du jeudi 16 mai 2019</h1>
            <h4>Le JT de 20 Heures du jeudi 16 mai 2019 est présenté par Anne-Sophie Lapix sur France 2. Retrouvez dans le journal télévisé du soir : la sélection des 
                faits marquants, les interviews et témoignages, les invités politiques et de la vie publique et l'essentiel de tout ce qu'il faut savoir de la journée. 
                A noter : chaque sujet vidéo du journal est consultable indépendamment avec des informations à lire pour rappeler le contexte de l'actualité. Poursuivez 
                l'expérience avec les titres de la rédaction de Franceinfo.</h4>
            <img src="slike/nemuskarac.jpg" alt="covek">
        </article>
        <article>
            <p>
            Le JT de 20 Heures du jeudi 16 mai 2019 est présenté par Anne-Sophie Lapix sur France 2. Retrouvez dans le journal télévisé du soir : 
            la sélection des faits marquants, les interviews et témoignages, les invités politiques et de la vie publique et l'essentiel de tout ce 
            qu'il faut savoir de la journée. A noter : chaque sujet vidéo du journal est consultable indépendamment avec des informations à lire pour 
            rappeler le contexte de l'actualité. Poursuivez l'expérience avec les titres de la rédaction de Franceinfo.
            </p>
        </article>
        </section>

        <footer>
            <p>france.tv</p>
        </footer>

    
    <!--É é ê  à, â, ù, û, ü, ô, î  ç-->
    
    </body>
    
    </html>