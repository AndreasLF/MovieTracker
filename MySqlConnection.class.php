<?php


class MySqlConnection{
    
    
    private $mysqli;
    private $table;
    
    /** @var boolean $isError */
    public $isError;
    
    /** @var string $error */
    public $error;
    
    
    /*
    * This constructs the MySqlConnection object
    *
    * param string $ip is the ip of the server  
    * param string $username is the username which allows access to the database
    * param string $password is the password which allows access to the database
    * param string $database is the name of the database to modify
    * param string $table is the table in the database to modify
    */
    function __construct($ip,$username,$password,$database,$table){
        //No errors by default
        $this->isError = false;
        
        $this->mysqli = new mysqli("localhost","MovieTrackerDB","password","movietracker"); //This creates a new mysqli object
    
        //If there is an error whith the mysqli connection the error message will be saved
        if($this->mysqli->connect_error) {
            $this->error = "Mysqli connection error: " . $this->mysqli->connect_error;
            $this->isError = true;
        }
        
        $this->table = $table;   
    }
    
    
    /*
    * Checks if a movie is in the database
    *
    * param string|int is the primary key you want to check for in the database table
    * return boolean
    */
    public function inDatabase($imdbId){
  
            //Prepares a statement for the database
            $stmt = $this->mysqli->prepare("SELECT * FROM ".$this->table." WHERE imdbId = ?");

            //If the prepared statement fails to be defined an error message is set
            if(!($stmt)){
                //Pushes error message to the error parameter
                //htmlspecialchars converts the characters into html enitities
                $this->error = "mysqli_prepare failed: " . htmlspecialchars($this->mysqli->error);
                $this->isError = true;
                
                //Escapes this method
                return;
            }


            $result = $stmt->bind_param("s",$imdbId); 

            if(!($result)){
                //Exits with an error message
                $this->error = "mysqli bind_param failed: " . htmlspecialchars($stmt->error);
                $this->isError = true;
                return;
            }


            $result = $stmt->execute();

            //If execute was unsuccesful the script will exit with an error message
            if(!($result)){
                //Exits with an error message
                $this->error = "mysqli execute failed: " . htmlspecialchars($stmt->error);
                $this->isError = true;
                return;
            }


            //Stores the result. Returns true upon succes and false upon failure
            $result = $stmt->store_result();

            //If store_result was unsuccesful the script will exit with an error message
            if(!($result)){
                //Exits with an error message
                $this->error = "mysqli store_result failed: " . htmlspecialchars($stmt->error);
                $this->isError = true;
                return;
            }

            //Gets the number of rows from the database results
            $numRows = $stmt->num_rows;       

            //If more than 0 rows are returned from the database true is returned
            if($numRows > 0){
                return true;
            }
            else{
                return false;
            }  
    }
    
    /*
    * Checks for multiple movies if they exist in database
    *
    * param array $primaryKeys is an array of primary keys to check for
    * return array containing primary keys and corresponding boolean
    */
    public function inDatabaseBatch($primaryKeys){
        
        $inDatabaseArray = array();
        
        foreach($primaryKeys as $key=>$primaryKey){
            
            if($this->inDatabase($primaryKey)===null){
                return;
            }
            else if($this->inDatabase($primaryKey)){
                $inDatabaseArray[$primaryKey]=true;
            } 
            else{
                $inDatabaseArray[$primaryKey]=false;
            } 
        }
         
        return $inDatabaseArray;
    }
    
    
    /*
    * Gets content of every cell from a specified column in the database
    * 
    * param string $columnName name of the column to retrieve
    * return array listing every cell from the column
    */
    public function getColumnAsArray($columnName){
        
        $query = "SELECT * FROM ".$this->table;
        $result = $this->mysqli->query($query);
        
        if(!($result)){
            //Sets the error 
            $this->error = "mysqli query failed: " . htmlspecialchars($this->mysqli->error);
            $this->isError = true;
            return;
        }
        
        //Creates an 
        $columnList = array();

        //Fetches every row in the column
         while($row=$result->fetch_assoc()){
             //pushes the content of the column to the column list
             array_push($columnList,$row[$columnName]);
         }

        return $columnList;            
    }
    
    
    /*
    * This deletes a movie from the database by providing the imdbId
    *
    * param string|int is the primary key you want to check for in the database table
    */
    public function deleteFromDatabase($imdbId){
        
        $stmt = $this->mysqli->prepare("DELETE FROM ".$this->table." WHERE imdbId = ?");
        
        //If the prepared statement fails an error message will be assigned and this method will be escaped
        if(!($stmt)){
                $this->error = "mysqli_prepare failed: " . htmlspecialchars($this->mysqli->error);
                $this->isError = true;
                
                //Escapes this method
                return;
        }
        
        //Binds parameters to the prepared statement. Every parameter is of type String
        $result = $stmt->bind_param("s",$imdbId); 

        if(!($result)){
                $this->error = "mysqli bind_param failed: " . htmlspecialchars($stmt->error);
                $this->isError = true;
                return;
        }
        
        //Executes the prepared statement. Returns a boolean - true on succes and false on failure.
        $result = $stmt->execute(); 
        
        if(!($result)){
                $this->error = "mysqli execute failed: " . htmlspecialchars($stmt->error);
                $this->isError = true;
                return;
        }
      
    }
    
    
    /*
    * This inserts a row into the database. Every cell is of type string and the table is expected to have two columns
    *
    * param string $columnName1 is the name of the first column in the table
    * param string $columnName2 is the name of the second column in the table
    * param string $data1 is the data to insert into the first column
    * param string $data2 is the data to insert into the first column
    */
    public function insertToDatabase2Str($columnName1,$columnName2,$data1,$data2){
        //Creates a prepared statement for the database
        $prepStatement = "INSERT INTO ".$this->table." (".$columnName1.",".$columnName2.") VALUES (?,?)";
        
        //prepares the statement
        $stmt = $this->mysqli->prepare($prepStatement);
        if(!($stmt)){
                $this->error = "mysqli_prepare failed: " . htmlspecialchars($this->mysqli->error);
                $this->isError = true;
                
                return;
        }
        
        
                
        //Binds parameters to the prepared statement. Every parameter is of type String
        $result = $stmt->bind_param("ss",$data1,$data2); 

        
        if(!($result)){
                $this->error = "mysqli bind_param failed: " . htmlspecialchars($stmt->error);
                $this->isError = true;
                return;
        }
        
        
        //Executes the prepared statement. Returns a boolean - true on succes and false on failure.
        $result = $stmt->execute(); 

        
        if(!($result)){
                $this->error = "mysqli execute failed: " . htmlspecialchars($stmt->error);
                $this->isError = true;
                return;
        }
   
    }
    
    
    /*
    * This gets the password from the login table
    *
    * return string hashed password
    */
    public function getPassword(){
            
         //Creates a prepared statement for the database
        $stmt = $this->mysqli->prepare("SELECT Password FROM `login` WHERE Username=?");
            
        if(!($stmt)){
            $this->error = "mysqli_prepare failed: " . htmlspecialchars($this->mysqli->error);
            $this->isError = true;
                
            return;
        }
        

        //Binds parameters to the prepared statement. Every parameter is of type String
        $result = $stmt->bind_param("s",$this->table); 
        
           if(!($result)){
                $this->error = "mysqli bind_param failed: " . htmlspecialchars($stmt->error);
                $this->isError = true;
                return;
        }

        //Executes the prepared statement. Returns a boolean - true upon succes and false upon failure.
        $result = $stmt->execute();
        
         if(!($result)){
                $this->error = "mysqli execute failed: " . htmlspecialchars($stmt->error);
                $this->isError = true;
                return;
        }
        
        
        //Binds the result to a variable
        $result = $stmt->bind_result($passwordHash);
        
        //If bind_result was unsuccesful
        if(!($result)){
            $this->error = "mysqli bind_result failed: " . htmlspecialchars($stmt->error);
            $this->isError = true;
            return;
        }
       
        
        //fetches the result
        $result = $stmt->fetch(); 
        
        //If fetch was unsuccesful
        if(!($result)){
            $this->error = "mysqli fetch failed: " . htmlspecialchars($stmt->error);
            $this->isError = true;
            return;
        }
    
        return $passwordHash;   
    }
}


?>