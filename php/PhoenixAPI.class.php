<?php 

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
 
define('ENVIRONMENT', 'development');

/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

if ( defined('ENVIRONMENT') )
{
	switch ( ENVIRONMENT )
	{
		case 'development':
			error_reporting(E_ALL);
		break;
	
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}

/**
* Class written by Alex / Phoenix
* 
* Website: http://api.iamphoenix.me/
* GitHub: https://github.com/IAmPhoenix/Phoenix-API
*/

class PhoenixAPI
{
	// use your unique license key
	public $license = "";

	// define the server information
	private $server, $handle;

	/**
	* Save the server address for later use
	*
	* @var $server string Server Address
	* @return true boolean
 	*/

	public function setServer( $server )
	{
		if( !$server == null ) 
		{
	    	$this->server = $server;
	    }
	}

	public function getStatus( ) 
	{ 
		return $this->createUrl( 'status' );
	}

	public function getInfomation( ) 
	{
		return $this->createUrl( 'get' );
	}

	public function getPlayers( ) { }

	public function getPlayerList( ) { }

	public function getMotd( ) { }

	public function getVersion( ) { }

	public function getPlugins( ) { }

	public function getSoftware( ) { }

	public function executeCommand( ) { }

	public function voteTest( ) { }

	public function vote( ) { }

	protected function createUrl( $m, $c = true, $a = null ) 
	{ 
		$d = file_get_contents('http://api.iamphoenix.me/'.$m.'/?api_key='.$this->license.'&server_ip='.$this->server.(($c == true) ? '&clean=true' : null));
		if( $a == true )
		{
			if( $c == true )
			{
				// code
			}
			else
			{
				$d = explode( ',', $d );
			}
		}
			
		return ($d == 'Invalid license.') ? false : $d;
	}
}

?>