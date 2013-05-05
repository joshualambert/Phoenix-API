<?php 

// Load the class file
include ('../PhoenixAPI.class.php');

// Create the class object
$api = new PhoenixAPI();

// Set the server
$api->setServer( 'your.server.com' );

// Get the list of players on a server
$data = $api->getInfomation( );

// Check if the server is online
if( $data['status'] == 'true' )
{
	// Prints out
	// The server is online with (xx/xx) online!
	echo 'The server is online with ('.$data['players'].'/'.$data['players_max'].') online!';
}
else
{	
	// Print out the message below if the server is offline
	echo 'The server is offline, please check back later.';
}

?>