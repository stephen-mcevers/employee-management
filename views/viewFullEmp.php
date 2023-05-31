<?php include ('views/adminHeader.php'); ?>



<body>

    <div>
        <div class='headings'><h1>Employee Details</h1></div>
        <div class='heading'><h3><?php echo $successMessage; ?></h3></div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Date of Birth</th>
                        <th>Employee Type</th>
                        <th>Start Date</th>
                        <th>Supervisor</th>
                        <th>Section Code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($emp as $e) : ?>
                    <tr>
                        <td><?php echo $e['Email']; ?></td>
                        <td><?php echo $e['FirstName']; ?></td>
                        <td><?php echo $e['LastName']; ?></td>
                        <td><?php echo $e['Address']; ?></td>
                        <td><?php echo $e['DOB']; ?></td>
                        <td><?php echo $e['EmpType']; ?></td>
                        <td><?php echo $e['StartDate']; ?></td>
                        <td><?php echo $e['Supervisor']; ?></td>
                        <td><?php echo $e['SectionCode']; ?></td>

                    </tr>
                    
                    <?php endforeach; ?>

                </tbody>


            </table>


            <div class="btn-group d-flex justify-content-center text-center">
                <form method="POST">
                    <input type="hidden" name="empID" value="<?php echo $_SESSION['empID'] ?>">
                    <input type="hidden" name="action" value="editEmpPage">
                    <input type="submit" class="btn btn-warning" value="Edit">
                </form>&nbsp;
                <form method="POST" action='?deleteCheck' onsubmit="return confirm('Are You Sure?');">
                    <input type="hidden" name="empID" value="<?php echo $_SESSION['empID'] ?>">
                    <input type="hidden" name="action" value="deleteEmp">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>

            </div>

      
    </div>
</body>
</html>
