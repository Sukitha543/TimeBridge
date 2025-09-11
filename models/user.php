<?php
require_once "../models/dbh_config.php";
abstract class User extends Dbh
{
    protected $username;
    protected $password;
    protected $role;


    public function __construct($username, $password, $role="none")
    {
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

   
    abstract protected function register();
    public function login(){
        
    }

}
