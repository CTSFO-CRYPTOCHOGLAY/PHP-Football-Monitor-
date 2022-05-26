<?php
require_once('Database.php');
require_once('TableData.php');
class UpdatingTable{

    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    function getTable(){
        $sqlQuery = "SELECT * FROM brotherleague";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute();

        /*
         Data is run through while loop produce each line of data.
        */
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new TableData($row);
        }
        return $dataSet;
    }

    function getNews(){
        $sqlQuery = "SELECT * FROM tbfl_news";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute();

        /*
         Data is run through while loop produce each line of data.
        */
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new News($row);
        }
        return $dataSet;
    }


    function ZTSFCWins(){
        $sqlQuery0 = "update brotherleague set MP = MP + 1, W = w + 1 where Club = 'ZTS FC'";
        $sqlQuery1 = "update brotherleague set MP = MP + 1, L = L + 1 where Club = 'MAC FC'";

        $statement0 = $this->_dbHandle->prepare($sqlQuery0); // prepare a PDO statement
        $statement0->execute();

        $statement1 = $this->_dbHandle->prepare($sqlQuery1); // prepare a PDO statement
        $statement1->execute();
    }

    function MACFCWins(){
        $sqlQuery0 = "update brotherleague set MP = MP + 1, W = w + 1 where Club = 'MAC FC'";
        $sqlQuery1 = "update brotherleague set MP = MP + 1, L = L + 1 where Club = 'ZTS FC'";

        $statement0 = $this->_dbHandle->prepare($sqlQuery0); // prepare a PDO statement
        $statement0->execute();

        $statement1 = $this->_dbHandle->prepare($sqlQuery1); // prepare a PDO statement
        $statement1->execute();
    }

    function Commentary($dataEntry){
        $sqlQuery = $this->_dbHandle->prepare("INSERT INTO tbfl_news (Comments) value (?)");
        $sqlQuery->bindParam (1, $dataEntry, PDO::PARAM_STR, 50); // 1 blind param
        $sqlQuery->execute(); // / execution for data information
    }
}