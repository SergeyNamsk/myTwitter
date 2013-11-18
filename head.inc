
<div class='container-profile' >
      <?php echo "<hr>"; ?>
      <h3><center>
              <a href="http://twitter.com/<?php echo $info->screen_name; ?>"><img src="<?php echo $info->profile_image_url; ?>" /></a>
<hr>
<!-- -------------------profile information---------------------------- -->                                                                  
                <p><?php echo $info -> name; ?></p>
                <p><?php echo $info -> location; ?> </p>
          <a href="<?php echo $info -> url; ?>">
      <a <img src="<?php echo $info -> image; ?>"/>
                   <?php echo $info -> url; ?></a>
                <p><?php echo $info -> description; ?></p>
             <p><b><?php echo $info -> followers_count;?>
                   <?php echo $info -> favourites_count; ?>
                   <?php echo $info -> friends_count; ?>
                   <?php echo $info -> listed_count; ?>
             </b></p>
<!-- ------------------------profile log out---------------------------- -->    
             
    <a href='./clearsessions.php'>Log Out</a>
    </center>
     </h3>
    <p>
      <pre>
        <?php print_r($login); ?>
      </pre>
    </p>
    </div>



