<?php 

/**
 * Created by PhpStorm.
 * User: Sherlock
 * Date: 23-01-2016
 * Time: 15:19
 */

require_once("include_classes.php");

class Users
{

    //private $regObject = new Register();
    private $db;


    function __construct()
    {
        $this->db = new Dbase();
    }

    function addNewLog($uid, $log, $date) {
        
        $this->db->prepareInsert(array(
            "user_id"=>$uid,
            "log_date"=>$date,
            "log"=>$log
        ));

        if($this->db->insert("logs")){
            return true;
        }

        return false;

    }

    function updateLog($uid, $newLog, $log_id){

        $this->db->prepareUpdate(array(
            "log"=>$newLog
        ),array(
            "user_id"=>$uid,
            "log_id"=>$log_id
        ));

        if($this->db->update("logs")){
            return true;
        }

        return false;

    }




    function fetchAllLogs($date,$uid){
        $sql="select * from logs where log_date='{$date}' and user_id='{$uid}'";
        $logs = $this->db->fetchAll($sql);

        //change logs to JSON
        return json_encode($logs);
    }


    function fetchLogsByDate($date){
        $sql="select * from logs where log_date='".$date."'";
        $logs =$this->db->fetchAll($sql);
        return json_encode($logs);
    }


    
    

}




?>