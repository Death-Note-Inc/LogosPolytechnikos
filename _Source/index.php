<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//load dependeces
include_once("admin/parts/db-connect.php");

?>

<!DOCTYPE html>
<html lang="cs">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LOGOS POLYTECHNIKOS</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Custom fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles -->
  <link href="css/landing-page.css" rel="stylesheet">
  <link href="css/landing-page.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="#">LOGOS POLYTECHNIKOS</a>
      <a class="btn btn-primary" href="admin/index.php">Přihlásit se</a>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">LOGOS POLYTECHNIKOS</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-8 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Vložte Váš E-mail...">
              </div>
              <div class="col-12 col-md-4">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Odebírat vydání!</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  
  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
    <h2>Vydání za rok 2020/2021</h2></br>
      <div class="row">
        <?php $issue->getActualIssue("all"); ?>
      </div>
    </div>
<!--
    </br><h2>Starší vydání</h2></br>
    <?php $issue->getOldIssue("all"); ?>
!-->
  </section>



<div class="container features">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
      <h3 class="feature-title">O nás</h3>
      <p><b>LOGOS POLYTECHNIKOS je vysokoškolský odborný časopis.</b> </p>


       <button type="button" onclick="UkazInfo()" class="btn btn-primary">O nás</button>

    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
      <h3 class="feature-title">Kontakt</h3>

      <p><b>Informace pro kontaktování redakce našeho časopisu.</b></p>
        <button type="button" onclick="UkazKontakt()" class="btn btn-primary">Kontakty</button>

    </div>

  </div> 
</div>

    <div id="UkazInfo">
  
<div class="container features">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
<p class="text-justify">Slouží pro publikační aktivity akademických pracovníků Vysoké školy polytechnické Jihlava i jiných vysokých škol, univerzit a výzkumných organizací. Je veden na seznamu recenzovaných odborných a vědeckých časopisů s  <a href="https://dbh.nsd.uib.no/publiseringskanaler/erihplus/periodical/info?id=488187">ERIH PLUS - European Reference Index for the Humanities and the Social Science</a>.</p>
       <p class="text-justify">Od roku 2010 do roku 2018 byl časopis vydáván čtyřikrát ročně v elektronické a tištěné podobě. Od roku 2019 vychází třikrát ročně v elektronické verzi. Redakční rada časopisu sestává z interních i externích odborníků. Funkci šéfredaktora zastává prorektor pro tvůrčí a projektovou činnost Vysoké školy polytechnické Jihlava. Funkce odpovědných redaktorů jednotlivých čísel přísluší vedoucím kateder Vysoké školy polytechnické Jihlava. Veškeré vydávané příspěvky prochází recenzním řízením a jsou pečlivě redigovány. </p>  
          <p class="text-justify"><b>Tematické a obsahové zaměření časopisu</b> reflektuje potřeby oborových kateder Vysoké školy polytechnické Jihlava. Na základě souhlasu odpovědného redaktora mohou katedry poskytnout publikační prostor i odborníkům bez zaměstnanecké vazby k Vysoké škole polytechnické Jihlava.</p>
          <p class="text-justify"><b>V časopise je možné publikovat</b> odborné články, statě, přehledové studie, recenze a další typy odborných příspěvků v českém, slovenském a anglickém jazyce. Do recenzního řízení jsou přijímány příspěvky tematicky odpovídající zaměření časopisu a formálně upravené dle redakční šablony (viz níže).</p>

           <h2 class="text-center">Pro autory (přispěvatele)</h2>
          <p class="text-justify">
            <a href="http://www.vspj.cz/soubory/download/id/7344">Pokyny pro přispěvatele</a></br>
            <a href="https://www.vspj.cz/soubory/download/id/4186">Šablona</a></br>
            <a href="http://www.vspj.cz/soubory/download/id/7345">Recenzní řízení</a></br>
          </p>
          <p class="text-justify">Lze publikovat v jazycích: angličtina, čeština a slovenština </p>
          <p class="text-justify">Pokud rozsah doručených příspěvků překročí kapacitu příslušného vydání, bude přijímání příspěvků ukončeno před uvedeným termínem. </p>
          
          <h2 class="text-center">Termíny uzávěrek pro sběr příspěvků</h2>
          <p class="text-justify">
            <ul>
              <li>1/2020 - ošetřovatelství, porodní asistence a další zdravotnické obory (31. 12. 2019)</br>  </li>
              <li>2/2020 - ošetřovatelství, porodní asistence a další zdravotnické obory, sociologie, sport, psychologie, sociální práce (30. 4. 2020) </br> </li>
              <li>3/2020 - ekonomika, management, marketing, statistika, operační výzkum, finanční matematika, pojišťovniství, cestovní ruch, regionální rozvoj, veřejná správa (31. 8. 2020)</li>
            </ul> 
          </p>  
          
          <h2 class="text-center">Redakce</h2>
          <h3>Šéfrefaktor</h3>
          <ul>  
          <li>doc. Ing. Zdeněk Horák, Ph.D. (Vysoká škola polytechnická Jihlava)</li>
          </ul>
          <h3>Redakční rada</h3>
          <ul>
            <li>prof. PhDr. RNDr. Martin Boltižiar, PhD. (Univerzita Konštantína Filozofa v Nitre)</li>
            <li>prof. RNDr. Helena Brožová, CSc. (Česká zemědělská univerzita v Praze)</li>
            <li>doc. PhDr. Lada Cetlová, PhD. (Vysoká škola polytechnická Jihlava)</li>
            <li>prof. Mgr. Ing. Martin Dlouhý, Dr. MSc. (Vysoká škola ekonomická v Praze)</li>
            <li>prof. Ing. Tomáš Dostál, DrSc. (Vysoká škola polytechnická Jihlava)</li>
            <li>doc. Ing. Jiří Dušek, Ph.D. (Vysoká škola evropských a regionálních studií)</li>
            <li>doc. RNDr. Petr Gurka, CSc. (Vysoká škola polytechnická Jihlava)</li>
            <li>Ing. Veronika Hedija, Ph.D. (Vysoká škola polytechnická Jihlava)</li>
            <li>doc. Ing. Zdeněk Horák, Ph.D. (Vysoká škola polytechnická Jihlava)</li>
            <li>Ing. Ivica Linderová, PhD. (Vysoká škola polytechnická Jihlava)</li>
            <li>prof. MUDr. Aleš Roztočil, CSc. (Vysoká škola polytechnická Jihlava)</li>
            <li>doc. PhDr. David Urban, Ph.D. (Vysoká škola polytechnická Jihlava)</li>
            <li>doc. Dr. Ing. Jan Voráček, CSc. (Vysoká škola polytechnická Jihlava)</li>
            <li>RNDr. PaedDr. Ján Veselovský, PhD. (Univerzita Konštantína Filozofa v Nitre)</li>
            <li>doc. Ing. Libor Žídek, Ph.D. (Masarykova univerzita Brno)</li>
          </ul>

          <button type="button" onclick="UkazInfo()" class="btn btn-primary">Zpět</button>
    </div>
  </div> 
</div>

</div>

<div id="UkazKontakt">
  
<div class="container features">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">


     <p class="text-justify">Adresa pro odesílání příspěvků: logos@vspj.cz</p>
          <p class="text-justify">Kontaktní osoba: Bc. Zuzana Mafková: zuzana.mafkova@vspj.cz</p>

          <p class="text-justify">Adresa nakladatele: Vysoká škola polytechnická Jihlava, redakce LOGOS POLYTECHNIKOS, Tolstého 1556/16, 586 01 Jihlava</p>


          <p class="text-justify"><b>ISSN 2464-7551 (Online)</b></p>
          <p class="text-justify">Registrace MK ČR E 19390 – pro čísla z let 2010 až 2018 (vydávání tištěné verze časopisu bylo ukončeno).</p>
          <p class="text-justify">ISSN 1804-3682 (Print) – pro čísla z let 2010 až 2018 (vydávání tištěné verze časopisu bylo ukončeno). </p>
 <button type="button" onclick="UkazKontakt()" class="btn btn-primary">Zpět</button>
    </div>
  </div> 
</div>

</div>

  <!-- Call to Action -->
  <section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">Jste připraveni odebírat náš časopis?</h2>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-8 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Vložte Váš E-mail...">
              </div>
              <div class="col-12 col-md-4">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Odebírat vydání!</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

 


  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
        <div class="text-center">
          &copy; LOGOS POLYTECHNIKOS 2020. Created by Death Note.
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript">
    
    function UkazInfo() {
  var x = document.getElementById("UkazInfo");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
    var x = document.getElementById("UkazKontakt");
  if (x.style.display === "block") {
    x.style.display = "none";
  }
} 

    function UkazKontakt() {
  var x = document.getElementById("UkazKontakt");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
    var x = document.getElementById("UkazInfo");
  if (x.style.display === "block") {
    x.style.display = "none";
  } 
} 

  </script>
  <style type="text/css">
  #UkazInfo {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: white;
  margin-top: 20px;
  display:none;
}

#UkazKontakt {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: white;
  margin-top: 20px;
  display:none;
}
  </style>


</body>

</html>
