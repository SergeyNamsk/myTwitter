<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Twitter OAuth in PHP</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <style type="text/css">
      img {border-width: 0}
      * {font-family:'Lucida Grande', sans-serif;}
    </style>
  </head>
  <body>
    <div>
      <h2>Welcome to a Twitter</h2>
              <h2>Your Profile</h2>
              <p><a href="http://twitter.com/<?php echo $info->screen_name; ?>"><img src="<?php echo $info->profile_image_url; ?>" /></a>
              <p><?php echo $info->name; ?></p>
              <p><?php echo $info->location; ?></p>
              <p><a href="<?php echo $info->url; ?>"><?php echo $info->url; ?></a></p>
              <p><?php echo $info->description; ?></p>
              <p><?php echo $info -> followers_count; $info = $status -> count;?></p>
              <p><?php echo $info = $status -> user -> count; ?></p>
 <?php if (isset($menu)) { ?>
        <?php echo $menu; ?>
      <?php } ?>
    </div>
    <?php if (isset($status_text)) { ?>
      <?php echo '<h3>'.$status_text.'</h3>'; ?>
    <?php } ?>
      <p>___________________</p>
      <p> Log Out: <a href='./clearsessions.php'>Exit</a>.</p>
    
    </div>
      <hr />
      
 <?php
 
echo "<h2> My Top Tweets: </h2>";
//---------------------------------------------------------------------------------------
//
//                              MAIN FUNCTION LIST
//
//---------------------------------------------------------------------------------------
 foreach ($content as $status)
{
$Tweet = $status-> text; // text tweets
$Author = $status-> user-> screen_name; // author tweets
$RetweetCount = $status -> retweet_count; //retweet count
$favorited = $status -> favorited_count;
$Profile_image_url = $status -> user -> profile_image_url;
$Tweet = mb_convert_case($status-> text, MB_CASE_TITLE, "UTF-8");
$Velocity = $RetweetCount/1;
// for sort



  if ($Velocity > 1)
  {
    echo
    "<p><img src='
    $Profile_image_url'/><h3>
    $Author:</h3>
    $Tweet <b>
    RT:     $RetweetCount
    FAV:    $favorited
    </b></p><hr />" ;
  }
  
  //for ($i >0; i <= $count; $i++)
 // {
    $RetweetCount = $RetweetCount[$i+1];
 // }

// SEE USERS IN TEXT !!!
$Words_Array = explode(" ", $Tweet);
$Words_Array_All = array_merge((array)$Words_Array_All, $Words_Array);
$Words_Array_All = array_count_values($Words_Array);
ArSort($Words_Array_All);

foreach ($Words_Array_All as $key => $value)
{
    if ((strpos ($key ,"@") !== false))
    {
        echo "<b>|</b>";
        echo $key, $value;
        $Pop_Words[$j] = $key;
        $j++;
    }
}
echo $PopularTags;
}
?>
    
  </body>
</html>
