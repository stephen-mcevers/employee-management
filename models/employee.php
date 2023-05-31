<?php


class employee {
    private $empID, $email, $firstName, $lastName, $password, $address, $DOB, $SSN, $empType, $salary, $startDate, $supervisor, $sectionCode;
    
    public function __construct($email, $firstName, $lastName, $password, $address, $DOB, $SSN, $empType, $salary, $startDate, $supervisor, $sectionCode) {
        
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->password = $password;
        $this->address = $address;
        $this->DOB = $DOB;
        $this->SSN = $SSN;
        $this->empType = $empType;
        $this->salary = $salary;
        $this->startDate = $startDate;
        $this->supervisor = $supervisor;
        $this->sectionCode = $sectionCode;

    }
    
    public function getEmpID() {
        return $this->empID;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getPassword() {
        return $this->password;
    }
    
    public function getAddress() {
        return $this->address;
    }

    public function getDOB() {
        return $this->DOB;
    }

    public function getSSN() {
        return $this->SSN;
    }

    public function getEmpType() {
        return $this->empType;
    }

    public function getSalary() {
        return $this->salary;
    }

    public function getStartDate() {
        return $this->startDate;
    }
    
    public function getSupervisor() {
        return $this->supervisor;
    }

    public function getSectionCode() {
        return $this->sectionCode;
    }

    public function setEmpID($empID){
        $this->empID = $empID;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName){
        $this->lastName = $lastName;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function setAddress($address) {
        $this->address = $address;
    }

    public function setDOB($DOB) {
        $this->DOB = $DOB;
    }

    public function setSSN($SSN) {
        $this->SSN = $SSN;
    }

    public function setEmpType($empType) {
        $this->empType = $empType;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }
    public function setSupervisor($supervisor) {
        $this->supervisor = $supervisor;
    }

    public function setSectionCode($sectionCode) {
        $this->sectionCode = $sectionCode;
    }



}
