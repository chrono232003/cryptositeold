<?php
	require 'header.php';
?>
    <!-- ################################################################################################ -->
    <div id="homepage" class="clear">
      <!-- ################################################################################################ -->
      <div class="divider2"></div>
      <!-- ################################################################################################ -->

            <script>
          //edit title and meta tags

          var getQueryString = function ( field, url ) {
            var href = url ? url : window.location.href;
            var reg = new RegExp( '[?&]' + field + '=([^&#]*)', 'i' );
            var string = reg.exec(href);
            return string ? string[1] : null;
        };
              document.title = "Browse DOS Games By First Letter - " + getQueryString('gamesbyletter') + " - Great Old Games";
              document.querySelector('meta[name="description"]').setAttribute("content", "Browse all DOS Games starting with the letter " + getQueryString('gamesbyletter') + " - Great Old Games");
            </script>

      <section class="clear">
	  	  <center><h1>Search by First Letter</h1></center>
        <ul class="nospace center clear">
			<li class="one_third first">
				<p style = "font-size:20px;">
				<a href = 'search.php?gamesbyletter=[0-9]'>[0-9]</a><br />
				<a href = 'search.php?gamesbyletter=a'>A</a><br />
				<a href = 'search.php?gamesbyletter=b'>B</a><br />
				<a href = 'search.php?gamesbyletter=c'>C</a><br />
				<a href = 'search.php?gamesbyletter=d'>D</a><br />
				<a href = 'search.php?gamesbyletter=e'>E</a><br />
				<a href = 'search.php?gamesbyletter=f'>F</a><br />
				<a href = 'search.php?gamesbyletter=g'>G</a><br />
				<a href = 'search.php?gamesbyletter=h'>H</a><br />
				<a href = 'search.php?gamesbyletter=i'>I</a><br />
				<a href = 'search.php?gamesbyletter=j'>J</a><br />
				<a href = 'search.php?gamesbyletter=k'>K</a><br />
				<a href = 'search.php?gamesbyletter=l'>L</a><br />
				<a href = 'search.php?gamesbyletter=m'>M</a><br />
				<a href = 'search.php?gamesbyletter=n'>N</a><br />
				<a href = 'search.php?gamesbyletter=o'>O</a><br />
				<a href = 'search.php?gamesbyletter=p'>P</a><br />
				<a href = 'search.php?gamesbyletter=q'>Q</a><br />
				<a href = 'search.php?gamesbyletter=r'>R</a><br />
				<a href = 'search.php?gamesbyletter=s'>S</a><br />
				<a href = 'search.php?gamesbyletter=t'>T</a><br />
				<a href = 'search.php?gamesbyletter=u'>U</a><br />
				<a href = 'search.php?gamesbyletter=v'>V</a><br />
				<a href = 'search.php?gamesbyletter=w'>W</a><br />
				<a href = 'search.php?gamesbyletter=x'>X</a><br />
				<a href = 'search.php?gamesbyletter=y'>Y</a><br />
				<a href = 'search.php?gamesbyletter=z'>Z</a>
				</p>
			</li>
			<li class="one_third" style="text-align:left;">
				<?php
				if(!empty($_GET["gamesbyletter"])) {
					if(htmlspecialchars($_GET["gamesbyletter"]) == "[0-9]") {
						$sql="SELECT Title, PageName, Pic, Description, GameFile, ID FROM games_dos WHERE (LEFT(Title, 1) IN ('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'))";
					} else {

						$sql="SELECT Title, PageName, Pic, Description, GameFile, ID FROM games_dos WHERE Title LIKE '" . htmlspecialchars($_GET["gamesbyletter"]) . "%'";
					}
						if ($result=mysqli_query($conn,$sql)) {
								while ($row=mysqli_fetch_row($result)) {
									echo "<a href='game.php?Game=" . $row[1] . "'>" . $row[0] . "</a><br />";
								}
						} else {
							echo "Error: " . $sql . "<br>" . $conn->error;
						}

				}
			 ?>
			 </li>
			 <li>
			     <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- right side ad browse -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:300px;height:600px"
                         data-ad-client="ca-pub-7867777590859919"
                         data-ad-slot="2902299087"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
			 </li>
        </ul>
      </section>
      <!-- ################################################################################################ -->
      <div class="divider2"></div>
      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>
<?php
	require 'footer.php';
?>
