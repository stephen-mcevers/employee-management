<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php 
    if(isset($_SESSION['accountType']) && $_SESSION['accountType'] === "admin") {
        include('views/adminNav.php');
    }
    else if(isset($_SESSION['accountType']) && $_SESSION['accountType'] === "employee") {
        include('views/empNav.php');
    }
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.j">
        <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/81c46df450.js" crossorigin="anonymous"></script>
</head>
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3 style="font-weight: bold">EMS</h3>
            </div>

            <ul class="list-unstyled components">
                <p style="font-weight: bold">Options</p>
                <li>
                    
                    <a href="?action=adminHome"><i class="fa fa-home">&nbsp;</i>Home</a>

                </li>
                <li>
                    
                    <a href="?action=viewAllEmployees"><i class="fa-solid fa-people-group">&nbsp;</i>View Employees</a>
                </li>
                <li>
                    <a href="?action=viewVacationRequests"><i class="fa-solid fa-plane-departure"></i>&nbsp;</i>Vacation Requests</a>
                </li>
                <li>
                    
                    <a href="?action=viewPayroll"><i class="fa-solid fa-money-bill-wave">&nbsp;</i>Payroll</a>
                </li>
                <li>
                    <a href="?action=viewReports"><i class="fa-solid fa-chart-line">&nbsp;</i>View Reports</a>
                </li>
                <li>
                    <a href="?action=registerEmployeeForm"><i class="fa-solid fa-user-plus">&nbsp;</i>Register New Employee</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">

                <li>
                    <a href="?action=logout" class="article">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn ">
                        <i class="fa fa-bars"></i>
                        
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>


                </div>
            </nav>
            <script>
                $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
            </script>