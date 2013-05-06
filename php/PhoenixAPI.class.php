<?php 

/**
* Class written by Alex / Phoenix
*
* @author Alex / Phoenix <IAmPhoenix.me@gmail.com>
* @link Website: http://api.iamphoenix.me/
* @link GitHub: https://github.com/IAmPhoenix/Phoenix-API
* @version v0.9
* @license Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.
* @link @license http://creativecommons.org/licenses/by-nc-sa/3.0/
*/

class PhoenixAPI
{
	/** 
	* use your unique license key
	* 
	* @link http://api.iamphoenix.me/profile.php See your license key
	* @link http://api.iamphoenix.me/sign_up.php Signup to create a key
	*/
	public $license = "";

	// define the server information
	private $server;

	/**
	* Save the server address for later use
	*
	* @param string $server
 	*/
	public function setServer( $server )
	{
		if( !$server == null ) 
		{
			$this->server = $server;
		}
	}

	/**
	* Check is a server is online / offline
	* 
	* @link http://api.iamphoenix.me/#server-status
	* @return boolean
	*/
	public function getStatus( ) 
	{ 
		return ($this->createUrl( 'status' ) == 'true') ? true : false;
	}

	/**
	* Get information about the server if its online
	* 
	* @link http://api.iamphoenix.me/#server-info
	* @return array (status, players, players_max, motd, version)
	*/
	public function getInfomation( ) 
	{
		return $this->createUrl( 'get', false, true );
	}

	/**
	* Get the amount of players online
	* 
	* @link http://api.iamphoenix.me/#players
	* @return array (players, players_max)
	*/
	public function getPlayers( ) 
	{
		return $this->createUrl( 'players', false, true );
	}

	/**
	* Get a list of playernames that are on the server
	* 
	* @link http://api.iamphoenix.me/#player-list
	* @return array (playersNames)
	*/
	public function getPlayerList( ) 
	{
		return $this->createUrl( 'list', true, true );
	}

	/**
	* Get the servers Message of The Day
	* 
	* @link http://api.iamphoenix.me/#motd
	* @param boolean $color
	* @return string
	*/
	public function getMotd( $color = null ) 
	{
		return $this->createUrl( 'motd', true, null, (($color == true) ? '&color=true' : null) );
	}

	/**
	* Get the servers Message of The Day
	* 
	* @link http://api.iamphoenix.me/#server-version
	* @return string
	*/
	public function getVersion( ) 
	{
		return $this->createUrl( 'version' );
	}

	/**
	* Get a list of Plugins on the server
	* This require query to be enabled to work
	* 
	* @link http://api.iamphoenix.me/#query-plugins
	* @return array (plugins)
	*/
	public function getPlugins( ) 
	{
		return $this->createUrl( 'plugins', true, true );
	}

	/**
	* Get the software version the server is running on
	* This require query to be enabled to work
	* 
	* @link http://api.iamphoenix.me/#query-software
	* @return string
	*/
	public function getSoftware( ) 
	{
		return $this->createUrl( 'software' );
	}

	/**
	* Execute commands on a server
	* This require rcon to be enabled
	* 
	* @link http://api.iamphoenix.me/index.php#rcon-commands
	* @param string $password rcon password for the server
	* @param string $command
	* @return boolean
	*/
	public function executeCommand( $password, $command ) 
	{
		if( $password != null && $command != null )
			$e = '&pass='.$password.'&cmd='.$command;
		else
			return 'Missing arguments';
		return ($this->createUrl( 'rcon', false, false, $e ) == 'sent') ? true : false;
	}

	/**
	* Check the votifier port on a server
	* This require votifier
	* 
	* @link http://api.iamphoenix.me/#votifier-test
	* @return boolean
	*/
	public function voteTest( $port = null ) 
	{
		return ($this->createUrl( 'votifier', true, null, ':'.(($port != null) ? $port : 8192) ) == 'true') ? true : false;
	}

	/**
	* Check the votifier port on a server
	* This require votifier
	* 
	* @link http://api.iamphoenix.me/index.php#votifier-vote
	* @param int $port Votifier port
	* @param string $player Player name
	* @param string $key Public votifier key
	* @return boolean
	*/
	public function vote( $port, $player, $key ) 
	{
		if( $port != null && $player != null && $key != null )
			$e = ':'.$port.'&player='.$players.'&key='.$key;
		else
			return 'Missing arguments';
		return ($this->createUrl( 'votifiervote', true, null, $e ) == 'sent') ? true : false;
	}

	/**
	* Generate the URL and fetch the data from the API
	* 
	* @param string $m Method
	* @param boolean $c Clearn output
	* @param boolean $a Create array
	* @param string $e Extra url fuctions
	* @return boolean|string|array
	* @access private
	*/
	protected function createUrl( $m, $c = true, $a = null, $e = null ) 
	{ 
		$d = file_get_contents('http://api.iamphoenix.me/'.$m.'/?api_key='.$this->license.'&server_ip='.$this->server.(($e != null) ? $e : null).(($c == true) ? '&clean=true' : null));

		if( $a == true )
		{
			if( $c == false )
			{
				$t = str_replace( array('{','}','"'), null, $d );
				$ar = explode( ',', $t );

				$d = array();
				for($i=0;$i<(count($ar));$i++){
					$ta = explode( ':', $ar[$i] );
					$d[$ta[0]] = $ta[1];
				}
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