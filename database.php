<?php 

class Database{

    public $dsn,$user,$pass,$option,$con;

    public function __construct($dsn,$user,$pass,$option)
    {
        $this->dsn=$dsn;
        $this->user=$user;
        $this->pass=$pass;
        $this->option=$option;
        try{
            $this->con = new PDO($dsn,$user,$pass,$option);
            $this->con-> setAttribute(PDO:: ATTR_ERRMODE , PDO:: ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo 'failed to connect' . $e->getMessage();
        }
        return $this->con;
    }
    public function close(){
        $this->con = null;
    }
    public function selectAll($table)
    {
        $stmt=$this->con->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function selectColumns($table,$columns)
    {
        $stmt=$this->con->prepare("SELECT $columns FROM $table");
        $stmt->execute();
        return $stmt->fetchAll();
    }

}

?>