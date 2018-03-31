<?php


$mySqlConnection = new MySqlConnection("localhost","MovieTrackerDB","password","movietracker","andreas");

$batch = array(
0=>"tt2250912",
1=>"12",
2=>"tt1375666"
);
var_dump($mySqlConnection->inDatabaseBatch($batch));


if(null===$mySqlConnection->inDatabase("tt2250912")){
    echo "null";
}
else if($mySqlConnection->inDatabase("tt2250912")){
    echo "true";  
}
else{
    echo "false";
}

echo "<br>";

if($mySqlConnection->isError){
    echo "true";
}
else{
    echo "false";
}





class MySqlConnection{
    
    
    private $mysqli;
    private $table;
    
    /** @var boolean $isError */
    public $isError;
    
    /** @var string $error */
    public $error;
    
    
    
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
    * Checks if an item is in the database
    *
    * param string|int is the primary key you want to check for in the database table
    * return boolean
    */
    public function inDatabase($primaryKey){
  
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


            $result = $stmt->bind_param("s",$primaryKey); 

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
    * Checks for multiple items if they exist in database
    *
    * param array $primaryKeys is an array of primary keys to check for
    * return array containing primary keys and corresponding boolean
    */
    public function inDatabaseBatch($primaryKeys){
        
        $inDatabaseArray = array();
        
        foreach($primaryKeys as $key=>$primaryKey){
            
            if($this->inDatabase($primaryKey)){
                $inDatabaseArray[$primaryKey]=true;
            } else{
                $inDatabaseArray[$primaryKey]=false;
            } 
        }
         
        return $inDatabaseArray;
    }
    
    
    
    
}


?>