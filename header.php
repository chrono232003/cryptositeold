<?php
session_start();
if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
	$username = $_SESSION['username'];
}

if(isset($_POST['logoutbutton'])) {
	session_destroy();
}
require_once("connect.php");
require "php-classes/query_class.php";
$query = new Query($conn)
?>

<!DOCTYPE html>
<html>
<head>
<title>Great Old Games - Play over a 1000 DOS games for free</title>
<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name = "description" content="Great Old Dos Games, play and download 1000's of old DOS games online for free!. Browse games by first letter and category.">
<base href="https://www.greatoldgames.com/">
<link href="layout/styles/main.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/mediaqueries.css" rel="stylesheet" type="text/css" media="all">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111417188-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111417188-1');
</script>

<script type='text/javascript' src='validation.js'></script>
<!--setup the dosbox frame-->
<style type="text/css">
	.dosbox-container { width: 600px; height: 400px; }
</style>
<!--[if lt IE 9]>
<link href="layout/styles/ie/ie8.css" rel="stylesheet" type="text/css" media="all">
<script src="layout/scripts/ie/css3-mediaqueries.min.js"></script>
<script src="layout/scripts/ie/html5shiv.min.js"></script>
<![endif]-->
</head>
<body class="">
<div class="wrapper row1">
  <header id="header" class="full_width clear">
    <div id="hgroup">
      <img src="images/logo.png" style="width:300px;"/>
      <!--<h1><a href="index.html">Great Old Games</a></h1>-->
      <!--<h2> Play and download over a 1000 DOS games for free!</h2>-->
    </div>
    <div id="header-contact">
      <ul class="list none">
	  		<li><span class="icon-envelope"></span> <a href="#">info@greatoldgames.com</a></li>
	  <?php
	  //check if the user is logged in.
		if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
			echo "<li><span></span>Welcome " . $_SESSION['username'];
			echo "<form id='logout' action='' method='post'>";
					echo "<fieldset>";
					echo "<input type='submit' name='logoutbutton' value='Logout' style='margin-top:5px;' class='button small orange rnd5' />";
					echo "</fieldset>";
					echo "</form>";
					echo "</li>";

		} else {
			echo "<li><span></span><a href='register.php'><b>Login/Register</b></a></li>";
		}
		?>
        <!--<li><span class="icon-phone"></span> +xx xxx xxxxxxxxxx</li> -->
      </ul>
    </div>
  </header>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <nav id="topnav">
    <ul class="clear">
      <li class="active"><a href="index.php" title="Homepage">Home</a></li>
      <li><a class="drop" href="categories.php" title="Categories">Games</a>
        <ul>
          <li><a href="search.php?gamesbyletter=a" title="Great Old Games - Browse By Letter">Browse By Letter</a></li>
          <li class="last-child"><a href="categories.php" title="Great Old Games - Categories">Categories</a></li>
        </ul>
      </li>



      <li><a class="drop" href="#" title="Elements">By First Letter</a>
        <ul>
			<li><a href = 'search.php?gamesbyletter=[0-9]'>First Letter [0-9]</a></li>
			<li><a href = 'search.php?gamesbyletter=a'>First Letter A</a></li>
			<li><a href = 'search.php?gamesbyletter=b'>First Letter B</a></li>
			<li><a href = 'search.php?gamesbyletter=c'>First Letter C</a></li>
			<li><a href = 'search.php?gamesbyletter=d'>First Letter D</a></li>
			<li><a href = 'search.php?gamesbyletter=e'>First Letter E</a></li>
			<li><a href = 'search.php?gamesbyletter=f'>First Letter F</a></li>
			<li><a href = 'search.php?gamesbyletter=g'>First Letter G</a></li>
			<li><a href = 'search.php?gamesbyletter=h'>First Letter H</a></li>
			<li><a href = 'search.php?gamesbyletter=i'>First Letter I</a></li>
			<li><a href = 'search.php?gamesbyletter=j'>First Letter J</a></li>
			<li><a href = 'search.php?gamesbyletter=k'>First Letter K</a></li>
			<li><a href = 'search.php?gamesbyletter=l'>First Letter L</a></li>
			<li><a href = 'search.php?gamesbyletter=m'>First Letter M</a></li>
			<li><a href = 'search.php?gamesbyletter=n'>First Letter N</a></li>
			<li><a href = 'search.php?gamesbyletter=o'>First Letter O</a></li>
			<li><a href = 'search.php?gamesbyletter=p'>First Letter P</a></li>
			<li><a href = 'search.php?gamesbyletter=q'>First Letter Q</a></li>
			<li><a href = 'search.php?gamesbyletter=r'>First Letter R</a></li>
			<li><a href = 'search.php?gamesbyletter=s'>First Letter S</a></li>
			<li><a href = 'search.php?gamesbyletter=t'>First Letter T</a></li>
			<li><a href = 'search.php?gamesbyletter=u'>First Letter U</a></li>
			<li><a href = 'search.php?gamesbyletter=v'>First Letter V</a></li>
			<li><a href = 'search.php?gamesbyletter=w'>First Letter W</a></li>
			<li><a href = 'search.php?gamesbyletter=x'>First Letter X</a></li>
			<li><a href = 'search.php?gamesbyletter=y'>First Letter Y</a></li>
			<li><a href = 'search.php?gamesbyletter=z'>First Letter Z</a></li>
        </ul>
      </li>
      <li><a class="drop" href="#" title="Portfolio Layouts">By Category</a>
        <ul>

		<?php

			$result = $query->grab_genres();
			if ($result) {
					while ($row=mysqli_fetch_row($result)) {
						echo "<li><a href = 'categories.php?cat=" . $row[0] . "'>" . $row[0] . "</a></li>";
					}
			}
		?>
		<!--
          <li><a href="portfolio-layouts/portfolio-overview-full-width-content.html" title="Full Width Portfolio">Full Width Portfolio</a></li>
          <li><a href="portfolio-layouts/portfolio-overview-2columns.html" title="2 Column Grid">2 Column Grid</a></li>
          <li><a href="portfolio-layouts/portfolio-overview-2columns-leftsidebar.html" title="2 Column Grid + Left Sidebar">2 Col. Grid + Left Sidebar</a></li>
          <li><a href="portfolio-layouts/portfolio-overview-2columns-rightsidebar.html" title="2 Column Grid + Right Sidebar">2 Col. Grid + Right Sidebar</a></li>
          <li><a href="portfolio-layouts/portfolio-overview-2columns-bothsidebars.html" title="2 Column Grid + Both Sidebars">2 Col. Grid + Both Sidebars</a></li>
          <li><a href="portfolio-layouts/portfolio-overview-3columns.html" title="3 Column Grid">3 Column Grid</a></li>
          <li><a href="portfolio-layouts/portfolio-overview-3columns-leftsidebar.html" title="3 Column Grid + Left Sidebar">3 Col. Grid + Left Sidebar</a></li>
          <li><a href="portfolio-layouts/portfolio-overview-3columns-rightsidebar.html" title="3 Column Grid + Right Sidebar">3 Col. Grid + Right Sidebar</a></li>
          <li><a href="portfolio-layouts/portfolio-overview-3columns-bothsidebars.html" title="3 Column Grid + Both Sidebars">3 Col. Grid + Both Sidebars</a></li>
          <li class="last-child"><a href="portfolio-layouts/portfolio-overview-4columns.html" title="4 Column Grid">4 Column Grid</a></li>
		  -->
        </ul>
      </li>
	  <!--
      <li><a class="drop" href="#" title="Gallery Layouts">Gallery Layouts</a>
        <ul>
          <li><a href="gallery-layouts/gallery-full-width-content.html" title="Full Width Gallery">Full Width Gallery</a></li>
          <li><a href="gallery-layouts/gallery-2columns.html" title="2 Column Grid">2 Column Grid</a></li>
          <li><a href="gallery-layouts/gallery-2columns-leftsidebar.html" title="2 Column Grid + Left Sidebar">2 Col. Grid + Left Sidebar</a></li>
          <li><a href="gallery-layouts/gallery-2columns-rightsidebar.html" title="2 Column Grid + Right Sidebar">2 Col. Grid + Right Sidebar</a></li>
          <li><a href="gallery-layouts/gallery-2columns-bothsidebars.html" title="2 Column Grid + Both Sidebars">2 Col. Grid + Both Sidebars</a></li>
          <li><a href="gallery-layouts/gallery-3columns.html" title="3 Column Grid">3 Column Grid</a></li>
          <li><a href="gallery-layouts/gallery-3columns-leftsidebar.html" title="3 Column Grid + Left Sidebar">3 Col. Grid + Left Sidebar</a></li>
          <li><a href="gallery-layouts/gallery-3columns-rightsidebar.html" title="3 Column Grid + Right Sidebar">3 Col. Grid + Right Sidebar</a></li>
          <li><a href="gallery-layouts/gallery-3columns-bothsidebars.html" title="3 Column Grid + Both Sidebars">3 Col. Grid + Both Sidebars</a></li>
          <li><a href="gallery-layouts/gallery-4columns.html" title="4 Column Grid">4 Column Grid</a></li>
          <li class="last-child"><a href="gallery-layouts/gallery-5columns.html" title="5 Column Grid">5 Column Grid</a></li>
        </ul>
      </li>
      <li><a href="#" title="Link Text">Link Text</a></li>
      <li class="last-child"><a href="#" title="A Very Long Link Text">A Very Long Link Text</a></li>
	  -->
		<li><a href="store.php" title="Great Old Games Store">Store!</a></li>
    </ul>
  </nav>
</div>
<!-- content -->
<div class="wrapper row3">
  <div id="container">
	<center>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Responsive header ad -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7867777590859919"
     data-ad-slot="8713986824"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	</center>
