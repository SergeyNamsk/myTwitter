<?php
/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */

/* Load required lib files. */
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

/* If method is set change API call made. Test is called by default. */
//$content = $connection->get('account/verify_credentials');
//$content = $connection->get('statuses/home_timeline');
//$content = $connection->get('users/lookup');
//$user_timeline = $connection->get('statuses/user_timeline');
//$info = $connection->get('account/verify_credentials');
//$status = $connection->get('statuses/friends_timeline');
//$follows = $connection->get('friends/ids');
//$content_userline=$connection->get('statuses/user_timeline', array('id' => $user_id,'count'=>200));


//-----------------------------------------------------------------------------------------------
// Twitter query picker (test)                                array('since_id'=>1, 'count' => 10)
// $Object = $ Class -> get ('Method', 'Parameter');
//-----------------------------------------------------------------------------------------------
$info = $connection->get('account/verify_credentials');
$backimage = $connection->get('account/update_profile_background_image');
$content = $connection-> get ('statuses/home_timeline');
$contents = $connection-> get ('statuses/show');

// Get it in a format JSON – treat each tweet

/*
// Now calculate how frequent a particular item (word) and sort
$Words_Array_All = array_count_values($Words_Array);
ArSort($Words_Array_All);


// Loop through the total array of words, find words with heshtegom (#) and write the new array
foreach ((array)$Words_Array_All as $key => $value)
{
    if ((strpos ($key ,"#") !== false))
    {
        echo "=>";
        echo $key, $value;
        $Pop_Words[$j] = $key;
        $j++;
    }
}

// Display the first 5 elements of the array (the most popular tags)
$PopularTags = "Most popular tags in my timeline: 1) $Pop_Words[1] 2) $Pop_Words[2] 3) “.$Pop_Words[3].” 4) “.$Pop_Words[4].” 5) “.$Pop_Words[5]. " ;

echo $PopularTags;

// Duplicate a message to our twitter
$TheTweet = $connection-> post('statuses/update', array('status' => $Message));

*/


/* Some example calls */
//$connection->get('users/show', array('screen_name' => 'abraham'));
//$connection->post('statuses/update', array('status' => date(DATE_RFC822)));
//$connection->post('statuses/destroy', array('id' => 5437877770));
//$connection->post('friendships/create', array('id' => 9436992));
//$connection->post('friendships/destroy', array('id' => 9436992));

/* Include HTML to display on the page */
include('html.inc');
