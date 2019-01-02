<?php 

/**
 * Created by PhpStorm.
 * User: Sherlock
 * Date: 23-01-2016
 * Time: 15:19
 */

require_once("include_classes.php");

class users
{
   private $db;


   function __construct()
   {
    $this->db = new Dbase();
}
function addUser($uname,$pass)
{
    $this->$db->prepareInsert(array(
        "username"=>$uname;
        "password"=>$pass;
        "usertype"=>"normal user";
    ));
    if($this->$db->insert("users"))
    {
        return true;
    }  
    return false;
}

function editUser($uid,$pwd)
{
    $this->$db->prepareUpdate(array(
        "password"=>$pwd
    ),array(
        "user_id"=>$uid
    ));
    if($this->$db->update("users"))
    {
        return true;
    }
    return false;
}
function fetchAllUsers()
{
    $sql="select * from users";
    $logs=$this->$db->fetchAll($sql);
    return json_encode($logs);
}


}
}
}



?>