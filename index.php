<?php

date_default_timezone_set("America/Chicago");

require "models/empDatabase.php";
require "models/employee.php";
require "models/vacationDatabase.php";
require "models/vacation.php";
require "models/database.php";
require "models/PDF.php";

session_start();
$_SESSION['empID'] = "";
$action = filter_input(INPUT_POST, "action");
if ($action === null) {
    $action = filter_input(INPUT_GET, "action");
    if ($action === null) {
        $action = "userLoginForm";
    }
}

$successMessage = '';
$failedMessage = '';

switch ($action) {


    case "userLoginForm":



        include "views/userLoginForm.php";

        break;

    case "login":
        $isValid = false;

        $userEmail = trim(filter_input(INPUT_POST, 'loginEmail'));
        $userPassword = trim(filter_input(INPUT_POST, 'loginPassword'));

        $hashed_password = empDatabase::authenticateUser($userEmail);
        if (isset($hashed_password)) {
            $hash = $hashed_password;
            trim($hash);
        }
        if (password_verify($userPassword, $hash)) {
            $isValid = true;
        } else {
            $isValid = false;
            $error = "Login Failed";
        }

        if ($isValid == true) {
            $_SESSION['loggedInID'] = empDatabase::getUserID($userEmail);
            $_SESSION['loggedInEmail'] = $userEmail;
            $_SESSION['userType'] = empDatabase::getEmpType($userEmail);
            include "views/adminHomePage.php";
            break;
        } else {
            include "views/userLoginForm.php";
            break;
        }

        //include "views/adminHomePage.php";
        //break;

    case "registerEmployeeForm":
        $errors = array();
        include "views/registerForm.php";
        break;

    case "register":
        $errors = array();
        $isValid = false;
        $email = FILTER_INPUT(INPUT_POST, 'email');
        $clean_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = FILTER_INPUT(INPUT_POST, 'password');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $firstName = FILTER_INPUT(INPUT_POST, 'firstName');
        $lastName = FILTER_INPUT(INPUT_POST, 'lastName');
        $address = FILTER_INPUT(INPUT_POST, 'address');
        $DOB = FILTER_INPUT(INPUT_POST, 'DOB');
        $SSN = FILTER_INPUT(INPUT_POST, 'SSN');
        $empType = FILTER_INPUT(INPUT_POST, 'empType');
        $salary = FILTER_INPUT(INPUT_POST, 'salary');
        $clean_salary = (double) $salary;
        $startDate = FILTER_INPUT(INPUT_POST, 'startDate');
        $supervisor = FILTER_INPUT(INPUT_POST, 'supervisor');
        $sectionCode = FILTER_INPUT(INPUT_POST, 'sectionCode');

        if ($firstName == "" || $lastName == "") {
            array_push($errors, "First and last name must be filled out");
        } else {
            $isValid = true;
        }

        if ($email == "") {
            array_push($errors, "Email must be filled out");
        } else {
            $isValid = true;
        }

        if (!filter_var($clean_email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Must be valid email");
            $isValid = false;
        } else {
            $isValid = true;
        }

        if ($address == "") {
            array_push($errors, "Must fill out address");
            $isValid = false;
        } else {
            $isValid = true;
        }

        if ($password == "") {
            array_push($errors, "Password must not be blank");
            $isValid = false;
        } else {
            $isValid = true;
        }

        if ($isValid == true) {
            try {
                $e = new employee($clean_email, $firstName, $lastName, $hashed_password, $address, $DOB, $SSN, $empType, $clean_salary, $startDate, $supervisor, $sectionCode);
                empDatabase::addEmployee($e);
                include 'views/registerConfirm.php';
                break;
            } catch (Exception $ex) {
                include 'views/registerError.php';
                break;
            }
        } else {
            include 'views/registerForm.php';
            break;
        }

    case "viewAllEmployees":


        $employees = empDatabase::getAllEmployees();
        include 'views/viewAllEmployees.php';
        break;

    case "adminHome":

        include 'views/adminHomePage.php';
        break;

    case "viewPayroll":
        $employees = empDatabase::getAllEmployees();
        include 'views/viewPayroll.php';
        break;

    case "viewReports":

        include 'views/viewReports.php';
        break;

    case "logout":

        include 'views/userLoginForm.php';
        break;

    case "viewEmp":

        $empID = FILTER_INPUT(INPUT_POST, 'empID');
        $_SESSION['empID'] = $empID;
        $emp = empDatabase::getEmpByID($empID);
        include 'views/viewFullEmp.php';
        break;

    case "editEmpPage":

        $errors = array();
        $empID = FILTER_INPUT(INPUT_POST, 'empID');
        $_SESSION['empID'] = $empID;
        $emp = empDatabase::getEmpByID($empID);
        include 'views/editEmployee.php';
        break;

    case "edit":
        $errors = array();
        $isValid = false;
        $empID = FILTER_INPUT(INPUT_POST, 'empID');
        $_SESSION['empID'] = $empID;
        $email = FILTER_INPUT(INPUT_POST, 'email');
        $clean_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $firstName = FILTER_INPUT(INPUT_POST, 'firstName');
        $lastName = FILTER_INPUT(INPUT_POST, 'lastName');
        $address = FILTER_INPUT(INPUT_POST, 'address');
        $DOB = FILTER_INPUT(INPUT_POST, 'DOB');
        $empType = FILTER_INPUT(INPUT_POST, 'empType');
        $sectionCode = FILTER_INPUT(INPUT_POST, 'sectionCode');

        if ($firstName == "" || $lastName == "") {
            array_push($errors, "First and last name must be filled out");
        }
        if ($email == "") {
            array_push($errors, "Email must be filled out");
        }


        if (!filter_var($clean_email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Must be valid email");
        }

        if ($address == "") {
            array_push($errors, "Must fill out address");
        }

        if (sizeof($errors) == 0) {
            $isValid = true;
        } else {
            $isValid = false;
        }


        if ($isValid == true) {


            try {

                empDatabase::updateEmployee($clean_email, $firstName, $lastName, $address, $DOB, $empType, $sectionCode, $empID);
                $successMessage = "Update Success";
                $emp = empDatabase::getEmpByID($empID);
                include 'views/viewFullEmp.php';
                break;
            } catch (Exception $ex) {

                include 'views/registerError.php';
                break;
            }
        } else {
            $emp = empDatabase::getEmpByID($empID);
            include 'views/editEmployee.php';
            break;
        }



    case 'deleteEmp';

        if (isset($_GET['deleteCheck'])) {

            $empID = FILTER_INPUT(INPUT_POST, 'empID');

            try {
                empDatabase::deleteEmployee($empID);
                $employees = empDatabase::getAllEmployees();
                include 'views/viewAllEmployees.php';
                break;
            } catch (Exception $ex) {
                include 'views/registerError.php';
                break;
            }
        }

    case "viewPersonalInfo":
        $empID = $_SESSION['loggedInID'];
        $emp = empDatabase::getEmpByID($empID);
        include 'views/viewPersonalInfo.php';
        break;

    case "viewVacationRequests":
        include 'views/vacationRequests.php';
        break;

    case "makeRequest":

        include 'views/requestTimeOff.php';
        break;

    case "submitRequest":
        $empID = $_SESSION['loggedInID'];
        $days = FILTER_INPUT(INPUT_POST, 'days');
        $startDate = FILTER_INPUT(INPUT_POST, 'startDate');
        $reason = FILTER_INPUT(INPUT_POST, 'reason');
        $approved = "Pending";

        try {
            $r = new vacation($days, $startDate, $reason, $approved, $empID);
            vacationDatabase::addRequest($r);
            include 'views/requestSuccess.php';
            break;
        } catch (Exception $ex) {
            include 'views/requestError.php';
            break;
        }

    case "viewOutstandingRequests":
        $errors = '';
        $pending = "Pending";
        $empty = '';
        $vacation = vacationDatabase::getPendingRequests($pending);
        if (sizeof($vacation) == 0) {
            $empty = 'There are currently no pending requests';
        } else {
            $empty = '';
        }
        include 'views/viewPendingRequests.php';
        break;

    case "requestAction":
        $approval = FILTER_INPUT(INPUT_POST, 'requestApproval');
        $id = filter_input(INPUT_POST, 'requestID');
        $pending = "Pending";
        $errors = '';
        $empty = '';
        try {
            vacationDatabase::updateVacationRequests($approval, $id);
            $vacation = vacationDatabase::getPendingRequests($pending);
            if (sizeof($vacation) == 0) {
                $empty = 'There are currently no pending requests';
            } else {
                $empty = '';
            }
        } catch (Exception $ex) {
            $errors = 'Error updating approval';
            $vacation = vacationDatabase::getPendingRequests($pending);
        }
        include 'views/viewPendingRequests.php';
        break;

    case "viewAllRequests":
        $errors = '';
        $empty = '';
        $pending = "Pending";

        try {
            $vacation = vacationDatabase::getAllRequests($pending);
            if (sizeof($vacation) == 0) {
                $empty = 'There are currently no pending requests';
            } else {
                $empty = '';
            }
        } catch (Exception $ex) {
            $errors = 'There was an error';
        }


        include 'views/viewAllRequests.php';
        break;
        
    case "forgotPassword":
        include 'views/forgotPasswordForm.php';
        break;
        
    case "payrollPDF": 
        
        $employees = empDatabase::getAllEmployees();
        
        $title = "Total Payroll";
        $_SESSION['title'] = $title;
        $pdf = new PDF();

        $pdf->SetFont('Times', 'B', 12);
        $pdf->AddPage();
        $pdf->Ln();
        $pdf->SetFillColor(217,217,214);
        $pdf->Cell(30, 10, 'First Name', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Last Name', 1, 0, 'C', true);
        $pdf->Cell(70, 10, 'SSN', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Salary', 1, 0, 'C', true);
        $pdf->Ln();
        foreach ($employees as $e) {
            $firstName = $e->getFirstName();
            $lastName = $e->getLastName();
            $SSN = $e->getSSN();
            $salary = $e->getSalary();
            $pdf->Cell(30, 10, $firstName, 1);
            $pdf->Cell(40, 10, $lastName, 1);
            $pdf->Cell(70, 10, $SSN, 1);
            $pdf->Cell(40, 10, $salary, 1);

            $pdf->Ln();
        }
        
        
        $pdf->Output();
        
        break;
        
    case "employeePDF":
        $employees = empDatabase::getAllEmployees();
        
        $title = "Employee Manifest";
        $_SESSION['title'] = $title;
        $pdf = new PDF();
        $pdf->SetFont('Times', 'B', 12);
        $pdf->AddPage();
        $pdf->Ln();
        $pdf->SetFillColor(217,217,214);
        $pdf->Cell(30, 10, 'First Name', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Last Name', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Address', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Supervisor', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Section Code', 1, 0, 'C', true);
        $pdf->Ln();
        
        foreach ($employees as $e) {
            $firstName = $e->getFirstName();
            $lastName = $e->getLastName();
            $address = $e->getAddress();
            $supervisor = $e->getSupervisor();
            $sectionCode = $e->getSectionCode();
            $pdf->Cell(30, 10, $firstName, 1);
            $pdf->Cell(40, 10, $lastName, 1);
            $pdf->Cell(40, 10, $address, 1);
            $pdf->Cell(40, 10, $supervisor, 1);
            $pdf->Cell(40, 10, $sectionCode, 1);

            $pdf->Ln();
        }
        
        
        $pdf->Output();
        
        break;
        
    case 'viewPayrollGraph':
        
        
        $totalSalary = empDatabase::totalSalary();
        $itSalary = empDatabase::itSalary();
        $hrSalary = empDatabase::hrSalary();
        $salesSalary = empDatabase::salesSalary();
        
        
        $itPercent = number_format(($itSalary / $totalSalary) * 100, 2);
        $hrPercent = number_format(($hrSalary / $totalSalary) * 100, 2);
        $salesPercent = number_format(($salesSalary / $totalSalary) * 100, 2);
        
        include 'views/payrollGraph.php';
        break;
    
    
    case 'viewSectionsChart':
        
        $itCount = empDatabase::itCount();
        $hrCount = empDatabase::hrCount();
        $salesCount = empDatabase::salesCount();
        $totalCount = $itCount + $hrCount + $salesCount;
        
        
        include 'views/sectionsChart.php';
        break;
        
        
        
}