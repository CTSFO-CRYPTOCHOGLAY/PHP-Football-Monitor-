<?php
class news{
    protected $_Fixture, $_Comments;

    public function __construct($dbRow) {
        $this->_Fixture = $dbRow['Fixture'];
        $this->_Comments = $dbRow['Comments'];
    }

    public function getFixture()
    {
        return $this->_Fixture;
    }

    public function getComments()
    {
        return $this->_Comments;
    }

}