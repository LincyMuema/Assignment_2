<?php
class dbConnect{
    private $connection;
    private $db_type;
    private $db_host;
    private $db_port;
    private $db_user;
    private $db_pass;
    private $db_name;

    public function __construct($db_type, $db_host, $db_port, $db_user, $db_pass, $db_name){
        $this->db_type = $db_type;
        $this->db_host = $db_host;
        $this->db_port = $db_port;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
        $this->connection($db_type, $db_host, $db_port, $db_user, $db_pass, $db_name);
    }
    public function connection($db_type, $db_host, $db_port, $db_user, $db_pass, $db_name){
        switch($db_type){
            case 'MySQLi':
                if($db_port<>Null){
                    $db_host .= ":" . $db_port;
                }
                $this->connection = new mysqli($db_host, $db_user, $db_pass, $db_name);
                if($this->connection->connect_error){
                    return "Connection Failed" . $this->connection->connect_error;
                }else{
                //print "Connected Successfully to MySQLi";
                }
                break;
            case 'PDO':
                if($db_port<>Null){
                    $db_host .= ":" . $db_port;
                }
                try {
                    $this->connection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
                    
                    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //echo "Connected successfully to PDO";
                  } catch(PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                  }
                break;
        }
    }

    public function insert($table, $data){
        ksort($data);
        $fieldDetails = NULL;
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = implode("', '", array_values($data));
        $sth = "INSERT INTO $table (`$fieldNames`) VALUES ('$fieldValues')";
        
        switch($this->db_type){
            case 'MySQLi' :
                if($this->connection->query($sth) === TRUE){
                    return TRUE;
                }else{
                    return "Error: " . $sth . "<br>" . $this->connection->error;
                }
                break;
            case 'PDO' :
                try{
                    $this->connection->exec($sth);
                    return TRUE;
                  } catch(PDOException $e) {
                    return $sth . "<br>" . $e->getMessage();
                  }
        }
    }
    public function select($table, $column = null, $value = null) {
        if ($column === null || $value === null) {
            $sth = "SELECT * FROM `$table`";
            $stmt = $this->connection->prepare($sth);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return all records
        } else {
            $sth = "SELECT * FROM `$table` WHERE `$column` = :value";
            $stmt = $this->connection->prepare($sth);
            $stmt->bindParam(':value', $value);
    
            if ($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return all matching records
            } else {
                return false; // Handle query failure
            }
        }
    }
    public function update($table, $data, $where) {
        $updateFields = [];
        foreach ($data as $column => $value) {
            $updateFields[] = "$column = '$value'";
        }
        $updateFieldsStr = implode(", ", $updateFields);
    
        $whereFields = [];
        foreach ($where as $column => $value) {
            $whereFields[] = "$column = '$value'";
        }
        $whereFieldsStr = implode(" AND ", $whereFields);
    
        $sql = "UPDATE $table SET $updateFieldsStr WHERE $whereFieldsStr";
    
        // Use $this->connection instead of $this->conn
        switch($this->db_type) {
            case 'MySQLi':
                if ($this->connection->query($sql) === TRUE) {
                    return TRUE;
                } else {
                    return "Error: " . $sql . "<br>" . $this->connection->error;
                }
                break;
            case 'PDO':
                try {
                    $stmt = $this->connection->prepare($sql);
                    $stmt->execute();
                    return TRUE;
                } catch (PDOException $e) {
                    return "Error: " . $sql . "<br>" . $e->getMessage();
                }
                break;
        }
    }
} 