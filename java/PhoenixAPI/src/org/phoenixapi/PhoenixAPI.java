package org.phoenixapi;

/**
* Class written by Alex / Phoenix
*
* @author Alex / Phoenix <IAmPhoenix.me@gmail.com>
* @link Website: http://api.iamphoenix.me/
* @link GitHub: https://github.com/IAmPhoenix/Phoenix-API
* @version v0.1
*/

public class PhoenixAPI {
    
    /** 
    * use your unique license key
    * 
    * @link http://api.iamphoenix.me/profile.php See your license key
    * @link http://api.iamphoenix.me/sign_up.php Signup to create a key
    */
    public String license = "";
    
    // define the server information
    public String server;
    
    /**
    * Save the server address for later use
    *
    * @param string $server
    */
    public void setServer( String address )
    {
        server = address;
    }
    
    /**
    * Check is a server is online / offline
    * 
    * @link http://api.iamphoenix.me/#server-status
    * @return boolean
    */
    public boolean getStatus( ) {return false;}
    
    /**
    * Get information about the server if its online
    * 
    * @link http://api.iamphoenix.me/#server-info
    * @return array (status, players, players_max, motd, version)
    */
    public String[] getInfomation( ) {return null;}
    
    /**
    * Get the amount of players online
    * 
    * @link http://api.iamphoenix.me/#players
    * @return array (players, players_max)
    */
    public String[] getPlayers( ) {return null;}
    
    /**
    * Get a list of playernames that are on the server
    * 
    * @link http://api.iamphoenix.me/#player-list
    * @return array (playersNames)
    */
    public String[] getPlayerList( ) {return null;}
    
    /**
    * Get the servers Message of The Day
    * 
    * @link http://api.iamphoenix.me/#motd
    * @param boolean color
    * @return string
    */
    public String getMotd( boolean color ) {return null;}
    
    /**
    * Get the servers Message of The Day
    * 
    * @link http://api.iamphoenix.me/#server-version
    * @return string
    */
    public String getVersion( ) {return null;}
    
    /**
    * Get a list of Plugins on the server
    * This require query to be enabled to work
    * 
    * @link http://api.iamphoenix.me/#query-plugins
    * @return array (plugins)
    */
    public String[] getPlugins( ) {return null;}
    
    /**
    * Get the software version the server is running on
    * This require query to be enabled to work
    * 
    * @link http://api.iamphoenix.me/#query-software
    * @return string
    */
    public String getSoftware( ) {return null;}
    
    /**
    * Execute commands on a server
    * This require rcon to be enabled
    * 
    * @link http://api.iamphoenix.me/index.php#rcon-commands
    * @param string $password rcon password for the server
    * @param string $command
    * @return boolean
    */
    public boolean executeCommand( String password, String command ) {return false;}
    
    /**
    * Check the votifier port on a server
    * This require votifier
    * 
    * @link http://api.iamphoenix.me/#votifier-test
    * @return boolean
    */
    public boolean voteTest( int port ) {return false;}
    
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
    public boolean vote( int port, String player, String key ) {return false;}
    
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
    protected void createUrl( String m, boolean c, boolean a , String e ) { }
    
}
