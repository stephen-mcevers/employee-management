<?php

class empDatabase {

    public static function addEmployee($e) {
        $db = Database::getDB();
        $query = 'INSERT INTO users(Email, FirstName, LastName, Password, Address, DOB, SSN, EmpType, Salary, StartDate, Supervisor, SectionCode)
              VALUES (:email, :firstName, :lastName, :password, :address, :DOB, :SSN, :empType, :salary, :startDate, :supervisor, :sectionCode)';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $e->getEmail());
        $statement->bindValue(':firstName', $e->getFirstName());
        $statement->bindValue(':lastName', $e->getLastName());
        $statement->bindValue(':password', $e->getPassword());
        $statement->bindValue(':address', $e->getAddress());
        $statement->bindValue(':DOB', $e->getDOB());
        $statement->bindValue(':SSN', $e->getSSN());
        $statement->bindValue(':empType', $e->getEmpType());
        $statement->bindValue(':salary', $e->getSalary());
        $statement->bindValue(':startDate', $e->getStartDate());
        $statement->bindValue(':supervisor', $e->getSupervisor());
        $statement->bindValue(':sectionCode', $e->getSectionCode());
        $statement->execute();
        $statement->closeCursor();
    }

    public static function updateEmployee($clean_email, $firstName, $lastName, $address, $DOB, $empType, $sectionCode, $empID) {
        $db = Database::getDB();
        $query = 'UPDATE users SET Email = :email, FirstName = :firstName, LastName = :lastName, Address = :address, DOB = :DOB, EmpType = :empType, SectionCode = :sectionCode WHERE EmpID = :empID';
        $statement = $db->prepare($query);
        $statement->bindValue(':empID', $empID);
        $statement->bindValue(':email', $clean_email);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':address', $address);
        $statement->bindValue(':DOB', $DOB);
        $statement->bindValue(':empType', $empType);
        $statement->bindValue(':sectionCode', $sectionCode);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function deleteEmployee($empID) {
        $db = Database::getDB();
        $query = 'DELETE FROM users WHERE EmpID = :empID';
        $statement = $db->prepare($query);
        $statement->bindValue(':empID', $empID);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function getAllEmployees() {
        $db = Database::getDB();

        $query = 'SELECT * FROM users';
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();

        $employees = array();
        foreach ($rows as $row) {
            $e = new employee(
                    $row['Email'], $row['FirstName'], $row['LastName'],
                    $row['Password'], $row['Address'], $row['DOB'], $row['SSN'], $row['EmpType'], $row['Salary'], $row['StartDate'], $row['Supervisor'], $row['SectionCode']);
            $e->setEmpID($row['EmpId']);
            $employees[] = $e;
        }
        return $employees;
    }

    public static function getEmpByID($empID) {
        $db = Database::getDB();
        $query = 'SELECT * FROM users WHERE EmpID = :empID';
        $statement = $db->prepare($query);
        $statement->bindValue(':empID', $empID);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }

    public static function authenticateUser($userEmail) {
        $db = Database::getDB();
        $query = 'SELECT Password FROM users WHERE Email = :userEmail';
        $statement = $db->prepare($query);
        $statement->bindValue(':userEmail', $userEmail);
        $statement->execute();
        $hashed_password = $statement->fetchColumn();
        $statement->closeCursor();
        return $hashed_password;
    }

    public static function getUserID($userEmail) {
        $db = Database::getDB();
        $query = 'SELECT EmpID FROM users WHERE Email = :userEmail';
        $statement = $db->prepare($query);
        $statement->bindValue(':userEmail', $userEmail);
        $statement->execute();
        $loggedInID = $statement->fetchColumn();
        $statement->closeCursor();
        return $loggedInID;
    }

    public static function getEmpType($userEmail) {
        $db = Database::getDB();
        $query = 'SELECT EmpType FROM users WHERE Email = :userEmail';
        $statement = $db->prepare($query);
        $statement->bindValue(':userEmail', $userEmail);
        $statement->execute();
        $userType = $statement->fetchColumn();
        $statement->closeCursor();
        return $userType;
    }

    public static function itSalary() {
        $db = Database::getDB();
        $query = "SELECT SUM(Salary) FROM users WHERE SectionCode = 'IT'";
        $statement = $db->prepare($query);
        $statement->execute();
        $itSalary = $statement->fetchColumn();
        $statement->closeCursor();
        return $itSalary;
    }

    public static function hrSalary() {
        $db = Database::getDB();
        $query = "SELECT SUM(Salary) FROM users WHERE SectionCode = 'HR'";
        $statement = $db->prepare($query);
        $statement->execute();
        $hrSalary = $statement->fetchColumn();
        $statement->closeCursor();
        return $hrSalary;
    }

    public static function salesSalary() {
        $db = Database::getDB();
        $query = "SELECT SUM(Salary) FROM users WHERE SectionCode = 'Sales'";
        $statement = $db->prepare($query);
        $statement->execute();
        $salesSalary = $statement->fetchColumn();
        $statement->closeCursor();
        return $salesSalary;
    }

    public static function totalSalary() {
        $db = Database::getDB();
        $query = "SELECT SUM(Salary) FROM users";
        $statement = $db->prepare($query);
        $statement->execute();
        $totalSalary = $statement->fetchColumn();
        $statement->closeCursor();
        return $totalSalary;
    }
    
    public static function itCount() {
        $db = Database::getDB();
        $query = "SELECT COUNT(*) FROM users WHERE SectionCode = 'IT'";
        $statement = $db->prepare($query);
        $statement->execute();
        $itCount = $statement->fetchColumn();
        $statement->closeCursor();
        return $itCount;
    }
    
    public static function hrCount() {
        $db = Database::getDB();
        $query = "SELECT COUNT(*) FROM users WHERE SectionCode = 'HR'";
        $statement = $db->prepare($query);
        $statement->execute();
        $hrCount = $statement->fetchColumn();
        $statement->closeCursor();
        return $hrCount;
    }
        public static function salesCount() {
        $db = Database::getDB();
        $query = "SELECT COUNT(*) FROM users WHERE SectionCode = 'Sales'";
        $statement = $db->prepare($query);
        $statement->execute();
        $salesCount = $statement->fetchColumn();
        $statement->closeCursor();
        return $salesCount;
    }

}
