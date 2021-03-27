<!-- Footer -->
<div class="wrapper row2">
  <div id="footer" class="clear">

    <div class="one_third first">
      <h2 class="footer_title">Footer Navigation</h2>
      <nav class="footer_nav">
        <ul class="nospace">
          <li><a href="index.php">Home Page</a></li>
          <li><a href="search.php?gamesbyletter=a">Browse by Letter</a></li>
          <li><a href="categories.php">Browse by Category</a></li>

        </ul>
      </nav>
    </div>
    <div class="one_third">
      <h2 class="footer_title">Latest Gallery</h2>
      <ul id="ft_gallery" class="nospace spacing clear">

	  <?php
				if ($result=$query->get_footer_pics()) {
					$countrow = 0;
					while ($row=mysqli_fetch_row($result)) {
							if ($countrow % 3) {
								echo "<li class='one_third'><a href='game.php?Game=" . $row[3] . "'><img src='" . $row[1] . "' alt='" . $row[3] . " image' style='max-width:80px;'></a></li>";

								} else {
								echo "<li class='one_third first'><a href='game.php?Game=" . $row[3] . "'><img src='" . $row[1] . "' alt='" . $row[3] . " image' style='max-width:80px;'></a></li>";

									}
							$countrow +=1;
					}

				}
				?>
		<!--
        <li class="one_third"><a href="#"><img src="images/demo/80x80.gif" alt=""></a></li>
        <li class="one_third"><a href="#"><img src="images/demo/80x80.gif" alt=""></a></li>
        <li class="one_third first"><a href="#"><img src="images/demo/80x80.gif" alt=""></a></li>
        <li class="one_third"><a href="#"><img src="images/demo/80x80.gif" alt=""></a></li>
        <li class="one_third"><a href="#"><img src="images/demo/80x80.gif" alt=""></a></li>
        <li class="one_third first"><a href="#"><img src="images/demo/80x80.gif" alt=""></a></li>
        <li class="one_third"><a href="#"><img src="images/demo/80x80.gif" alt=""></a></li>
        <li class="one_third"><a href="#"><img src="images/demo/80x80.gif" alt=""></a></li>
		-->

      </ul>
    </div>

    <div class="one_third">
      <h2 class="footer_title">From Twitter</h2>
      <div class="tweet-container">
        <!--<ul class="list none">
          <li><strong>@<a href="#">name</a></strong> <span class="tweet_text">RT <span class="at">@</span><a href="#">name</a> Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque.</span> <span class="tweet_time"><a href="#">about 9 hours ago</a></span></li>
          <li><strong>@<a href="#">name</a></strong> <span class="tweet_text">RT <span class="at">@</span><a href="#">name</a> Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque.</span> <span class="tweet_time"><a href="#">about 9 hours ago</a></span></li>
          <li><strong>@<a href="#">name</a></strong> <span class="tweet_text">RT <span class="at">@</span><a href="#">name</a> Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque.</span> <span class="tweet_time"><a href="#">about 9 hours ago</a></span></li>
          <li><strong>@<a href="#">name</a></strong> <span class="tweet_text">RT <span class="at">@</span><a href="#">name</a> Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque.</span> <span class="tweet_time"><a href="#">about 9 hours ago</a></span></li>
        </ul>-->
		<a class="twitter-timeline" data-height="400" href="https://twitter.com/greatoldgameson?ref_src=twsrc%5Etfw">Tweets by greatoldgameson</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
	<!--
    <div class="one_quarter">
      <h2 class="footer_title">Contact Us</h2>
      <form class="rnd5" action="#" method="post">
        <div class="form-input clear">
          <label for="ft_author">Name <span class="required">*</span><br>
            <input type="text" name="ft_author" id="ft_author" value="" size="22">
          </label>
          <label for="ft_email">Email <span class="required">*</span><br>
            <input type="text" name="ft_email" id="ft_email" value="" size="22">
          </label>
        </div>
        <div class="form-message">
          <textarea name="ft_message" id="ft_message" cols="25" rows="10"></textarea>
        </div>
        <p>
          <input type="submit" value="Submit" class="button small orange">
          &nbsp;
          <input type="reset" value="Reset" class="button small grey">
        </p>
      </form>
	</div>
		  -->

  </div>
</div>
<div class="wrapper row4">
  <div id="copyright" class="clear">
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Great Old Games</a></p>
  </div>
</div>
<!-- Scripts -->
<!--<script src="http://code.jquery.com/jquery-latest.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!--<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>window.jQuery || document.write('<script src="layout/scripts/jquery-latest.min.js"><\/script>\
<script src="layout/scripts/jquery-ui.min.js"><\/script>')</script>
<script>jQuery(document).ready(function($){ $('img').removeAttr('width height'); });</script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
<script src="layout/scripts/custom.js"></script>
</body>
</html>
