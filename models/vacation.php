<?php



class vacation {
    private $requestID, $days, $startDate, $reason, $approved, $empID;
    
    public function __construct($days, $startDate, $reason, $approved, $empID) {
        $this->days = $days;
        $this->startDate = $startDate;
        $this->reason = $reason;
        $this->approved = $approved;
        $this->empID = $empID;
        
        
    }
    
    public function getRequestID() {
        return $this->requestID;
    }

    public function getDays() {
        return $this->days;
    }

    public function getStartDate() {
        return $this->startDate;
    }

    public function getReason() {
        return $this->reason;
    }

    public function getApproved() {
        return $this->approved;
    }

    public function getEmpID() {
        return $this->empID;
    }

    public function setRequestID($requestID) {
        $this->requestID = $requestID;
    }

    public function setDays($days) {
        $this->days = $days;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function setReason($reason) {
        $this->reason = $reason;
    }

    public function setApproved($approved) {
        $this->approved = $approved;
    }

    public function setEmpID($empID) {
        $this->empID = $empID;
    }


    
}
