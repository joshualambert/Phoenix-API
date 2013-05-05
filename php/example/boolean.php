<?php 

// Load the class file
include ('../PhoenixAPI.class.php');

// Create the class object
$api = new PhoenixAPI();

// Set the server
$api->setServer( 'your.server.com' );

// Get the server version
$version = $api->getVersion();

// Example 1
echo '<p>The server is currently running version '.$version.'</p>';

// Example 2
echo ($version == '1.5.2') ? '<p>The server is up to date</p>' : '<p>We\'re currently working on updating the server</p>';
?>