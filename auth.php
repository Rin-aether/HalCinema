<?php
class connec
{
    public $username="root";
    public $password="";
    public $server_name="localhost";
    public $db_name="hal_cinema";

    public $conn;

    function __construct()
    {
        $this->conn=new mysqli($this->server_name,$this->username,$this->password,$this->db_name);
        if($this->conn->connect_error)
        {
            die("Connection Failed");
        } else {
            // echo "Database: connected";
        }
    }

    function select($table_name,$id)
    {
        $sql = "SELECT * FROM $table_name where id=$id";
        $result=$this->conn->query($sql);
        return $result;
    }

    function select_login($table_name,$email)
    {
        $sql = "SELECT * FROM $table_name where email='$email'";
        $result=$this->conn->query($sql);
        return $result;
    }

    function insert($query,$msg)
    {
        if($this->conn->query($query)===TRUE)
        {
            echo'<script> alert("'.$msg.'")</script>';
        } else {
            echo'<script> alert("'.$this->conn->error.'")</script>';
        }
    }

    function insert_lastid($query)
    {   
        $last_id;

        if($this->conn->query($query)===TRUE)
        {
            $last_id=$this->conn->insert_id;
        } else {
            echo'<script> alert("'.$this->conn->error.'")</script>';
        }
        return $last_id;
    }
}
?>

