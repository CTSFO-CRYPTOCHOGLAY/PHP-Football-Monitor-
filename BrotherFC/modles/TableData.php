<?php
class TableData{
    protected $_club, $_MP, $_W, $_L;

    public function __construct($dbRow) {
        $this->_club = $dbRow['Club'];
        $this->_MP = $dbRow['MP'];
        $this->_W = $dbRow['W'];
        $this->_L = $dbRow['L'];
    }

    public function getClub() {
        return $this->_club;
    }
    public function getMP() {
        return $this->_MP;
    }
    public function getW() {
        return $this->_W;
    }
    public function getL() {
        return $this->_L;
    }
}
