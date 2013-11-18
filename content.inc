
<div class='container-content' >
      <?php echo "<hr>";
      #update page (using refresh crash server!)
      /*$page = $_SERVER['PHP_SELF'];
      $sec = "20";
      header("Refresh: $sec; url=$page");*/            
      ?>
      <?php
      
      #iclude start
      include 'function.php';
      include 'config.php';
      #include end
      // set Timline messages
      SetTimeline($content);
      // view user data
      openTimeline($mysql_host, $mysql_username, $mysql_password,$mysql_database);
      // insert usr data
      insertTimeline($content, $mysql_host, $mysql_username, $mysql_password,$mysql_database);
      echo "<hr>";
      // view user access token
      print_r($access_token);
      ?>
</div>