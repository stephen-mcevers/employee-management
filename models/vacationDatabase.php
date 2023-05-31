<?php

class vacationDatabase {

    public static function addRequest($r) {
        $db = Database::getDB();
        $query = 'INSERT INTO vacation(Days, Reason, StartingDate, Approved, EmployeeID)
              VALUES (:days, :reason, :startDate, :approved, :empID)';
        $statement = $db->prepare($query);
        $statement->bindValue(':days', $r->getDays());
        $statement->bindValue(':startDate', $r->getStartDate());
        $statement->bindValue(':reason', $r->getReason());
        $statement->bindValue(':approved', $r->getApproved());
        $statement->bindValue(':empID', $r->getEmpID());
        $statement->execute();
        $statement->closeCursor();
    }

    public static function getPendingRequests($pending) {
        $db = Database::getDB();

        $query = 'SELECT users.FirstName, users.LastName, vacation.RequestID, vacation.Days, vacation.Reason, vacation.StartingDate FROM users JOIN vacation on users.EmpID = vacation.EmployeeID WHERE Approved = :pending';
        $statement = $db->prepare($query);
        $statement->bindValue(':pending', $pending);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        $vacation = array();
        foreach ($results as $r) {
            $array = array_push($vacation, $r);
        }
        return $vacation;
    }

    public static function updateVacationRequests($approval, $id) {
        $db = Database::getDB();
        $query = 'UPDATE vacation SET Approved = :approval WHERE RequestID = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':approval', $approval);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function getAllRequests($pending) {
        $db = Database::getDB();
        $query = 'SELECT users.FirstName, users.LastName, vacation.RequestID, vacation.Days, vacation.Reason, vacation.StartingDate, vacation.Approved FROM users JOIN vacation on users.EmpID = vacation.EmployeeID WHERE vacation.Approved != :pending';
        $statement = $db->prepare($query);
        $statement->bindValue(':pending', $pending);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        $vacation = array();
        foreach ($results as $r) {
            $array = array_push($vacation, $r);
        }
        return $vacation;
    }

}
