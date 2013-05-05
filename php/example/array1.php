<?php 

// Load the class file
include ('../PhoenixAPI.class.php');

// Create the class object
$api = new PhoenixAPI();

// Set the server
$api->setServer( 'your.server.com' );

// Get the list of players on a server
$players = $api->getPlayerList( );

// Print out a list of players
foreach ($players as $key => $player) {
	echo $player . '<br>';
}

?>