<?php

namespace App\Libraries;


use App\ThirdParty\OAuth2\src\OAuth2\Server;
use App\ThirdParty\OAuth2\src\OAuth2\GrantType\UserCredentials;
use App\ThirdParty\OAuth2\src\OAuth2\GrantType\RefreshToken;
use App\ThirdParty\OAuth2\src\OAuth2\Storage\Pdo;

class OAuth
{
    public $server;
    protected $storage;
    protected $dsn;
    protected $db_username;
    protected $db_password;
    
    public function __construct(){
        
        $this->dsn         = 'mysql:dbname='.getenv("database.default.database").';host='.getenv("database.default.hostname");
        
        $this->db_username = getenv("database.default.username");
        
        $this->db_password = getenv("database.default.password");
        
        $this->options = getenv("database.default.DBDriver");
        
        $this->initialize();
        
    }
    
    public function initialize()
    {
        
        $this->storage = new Pdo([
            'dsn' =>   $this->dsn,
            'username' =>   $this->db_username,
            'password' =>   $this->db_password,
        ]);
        
        $this->server = new Server($this->storage);
        
        $this->server->addGrantType(new UserCredentials($this->storage));
        
    }
    
}
