<?php include ('views/adminHeader.php'); ?>


<body>
    <div class='container'> 

        <div class='headings'><h2>All Employees</h2></div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Account Type</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $e) : ?>

                    <tr>
                        <td><?php echo $e->getFirstName(); ?></td>
                        <td><?php echo $e->getLastName(); ?></td>
                        <td><?php echo $e->getAddress(); ?></td>
                        <td><?php echo $e->getEmpType(); ?></td>
                        <td><div class="btn-group">
                                <form method="POST">
                                    <input type="hidden" name="empID" value="<?php echo $e->getEmpID() ?>">
                                    <input type="hidden" name="action" value="viewEmp">
                                    <input type="submit" class="btn btn-primary" value="View">
                                </form>&nbsp;

                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="btn-group d-flex justify-content-center text-center">
            <form method="POST">
                <input type ='hidden' name='action' value='employeePDF'>
                <input type='submit' class='btn btn-secondary' value='Export PDF'>
            </form>
        </div>

    </div>
</body>
</html>
