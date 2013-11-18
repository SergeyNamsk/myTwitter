<?php

  echo "<h2> My Timeline:</h2>";
  echo "<hr>";
  #include mysql configuration
  include 'config.php';

#---------------------------------------------------------------------------------------
#
#                              MAIN FUNCTION LIST
#
#---------------------------------------------------------------------------------------
                            
                            
  function SetTimeline($content)
  {
      foreach ($content as $status)
      {
        $i++; // tweet number
        $Tweet = $status-> text; // text tweets
        $Author = $status-> user-> screen_name; // author tweets
        $RetweetCount = $status -> retweet_count; //retweet count
        $favorited = $status -> user -> favourites_count; //favirited
        $tweet_id = $status -> id_str; // tweet id
        $user_id = $status -> user -> id; // useer id
        $Profile_image_url = $status -> user -> profile_image_url; // avatar 
        $Tweet = mb_convert_case($status-> text, MB_CASE_TITLE, "UTF-8"); // message case
        //
        //$Velocity = $RetweetCount + $favorited; // set velocity formula (see function)
        
        if ($RetweetCount >= 5 && $favorited >= 1) // number limit of user tweets and favorites
        {
            echo
            // view Timeline structure
                 "[$i] USER:($user_id) TWEET:($tweet_id) <p><img src='
                  $Profile_image_url'/>
                  <h4>$Author:</h4>
                  <h5>$Tweet</h5> <b>
                  <p>
                      RT:     $RetweetCount
                      FAV:    $favorited
                  </p>
                  </b></p><hr />" ;
        }else{
            //error
                  echo "<h4>NO MATCHES FOUND IN YOUR TIMELINE</h4>"; 
        }

          // SEE @ USERS IN TEXT
          $Words_Array = explode(" ", $Tweet);
          $Words_Array_All = array_merge((array)$Words_Array_All, $Words_Array);
          $Words_Array_All = array_count_values($Words_Array);
          //sort
          ArSort($Words_Array_All);
          //view @user
          foreach ($Words_Array_All as $key => $value)
          {
            if ((strpos ($key ,"@") !== false))
            {
            //echo "<p><b>|</b></p>";
              echo "<b>$key</b>";
              echo "<hr>";
              $Pop_Words[$j] = $key;
              $j++;
            }
          }
  }
  
      function openTimeline($mysql_host, $mysql_username, $mysql_password,$mysql_database)
      {
          # DB CONNECT
          $db = mysql_connect($mysql_host, $mysql_username, $mysql_password); 
          mysql_select_db($mysql_database, $db);
          // table grid
          echo "<table border=\"4\" width=\"100%\" bgcolor=\"cyan\">";
          echo "<tr>
          <td>user_id</td>
          <td>tweet_id</td>
          <td>fav</td>
          <td>rt</td>
          <td>velocity</td>
          </tr>";
          //sql for SELECT

          $query = mysql_query(" SELECT * FROM userdata WHERE user_id ORDER BY velocity DESC", $db);

          for ($c=0; $c<mysql_num_rows($query); $c++)
          {
            $f = mysql_fetch_array($query);
            //table view
            echo "<br>";
            echo "<tr>
            <td>$f[user_id]</td>
            <td>$f[tweet_id]</td>
            <td>$f[fav_count]</td>
            <td>$f[rt_count]</td>
            <td>$f[velocity]</td>";
          }
        }
//--------------------------------------------------------------------
// insert data into database (PRIMARY KEY:user_id)
//--------------------------------------------------------------------
     function insertTimeline($content,$mysql_host, $mysql_username, $mysql_password,$mysql_database)
        {
          foreach ($content as $status)           //data loop
          {
          $i++;
        
        # CONTENT Vars        
        $RetweetCount = $status -> retweet_count; //retweet count
        $favorited = $status -> user -> favourites_count;
        $tweet_id = $status -> id_str;
        $user_id = $status -> user -> id;
        
        #-----------------------------------------------------------------------
        # Velocity = RT + FAV
        #-----------------------------------------------------------------------
        $Velocity = $RetweetCount + $favorited;
    
        $db = mysql_connect($mysql_host, $mysql_username, $mysql_password); 
        mysql_select_db($mysql_database, $db);
        echo "<table border=\"4\" width=\"100%\" bgcolor=\"cyan\">";
        
        # INSERT
        $query1 = "INSERT INTO `userdata`
        (user_id,tweet_id,fav_count,rt_count)
                   VALUES
        ('$user_id','$tweet_id','$favorited','$RetweetCount','$Velocity')";
        
        # RESULT
        $result = mysql_query($query1) || die (mysql_error());
        $g = mysql_fetch_array($result,$db);
        
        # View how it works
        //echo $query1;
        //echo $g;
        }
      }
      
  #------------------------------------------------------------------------------
  # GET VELOCITY LIST
  #------------------------------------------------------------------------------
  function getVelocityList ($content, $Velocity)
  {
    # DB CONNECT
          $db = mysql_connect($mysql_host, $mysql_username, $mysql_password); 
          mysql_select_db($mysql_database, $db);
          // table grid
          echo "<table border=\"4\" width=\"100%\" bgcolor=\"cyan\">";
          echo "<tr>
          <td>user_id</td>
          <td>tweet_id</td>
          <td>fav</td>
          <td>rt</td>
          <td>velocity</td>
          </tr>";
          //sql for SELECT

          $query = mysql_query(" SELECT * FROM userdata WHERE user_id ORDER BY velocity DESC", $db);

          for ($c=0; $c<mysql_num_rows($query); $c++)
          {
            $f = mysql_fetch_array($query);
          }
  }
}
?>