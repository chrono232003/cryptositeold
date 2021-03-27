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

          if (getQueryString('cat')) {
              document.title = "Categories - " + getQueryString('cat') + " - Great Old Games";
              document.querySelector('meta[name="description"]').setAttribute("content", "Choose a DOS game to play in the " + getQueryString('cat') + " category");
          } else {
            document.title = "Categories - Great Old Games";
            document.querySelector('meta[name="description"]').setAttribute("content", "Choose a DOS game to play or download by category");
          }
      </script>

      <section class="clear">
        <ul class="nospace center clear">
			<center><h1>Categories</h1></center>
			 <ul class="nospace center clear">
				<li class="one_third first" style="text-align:left; font-size:20px;">
					<?php
						$result = $query->grab_genres();
						if ($result) {
								while ($row=mysqli_fetch_row($result)) {
									echo "<a href = 'categories.php?cat=" . $row[0] . "'>" . $row[0] . "</a><br />";
								}
						}
					?>
			    </li>
				<li class="one_third" style="text-align:left;">

					<?php
						if(!empty($_GET["cat"])) {
								$result = $query->get_games_by_category();
							if ($result) {
										while ($row=mysqli_fetch_row($result)) {
											echo "<a href='game.php?Game=" . $row[5] . "'>" . $row[0] . "</a><br />";
										}
							}
						}
					?>

				</li>
				<li>
				    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- right side ad categories -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:300px;height:600px"
                         data-ad-client="ca-pub-7867777590859919"
                         data-ad-slot="6930131867"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
				</li>
			</ul>
    </div>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>
<?php
	require 'footer.php';
?>
