<?php include ('views/adminHeader.php'); ?>


<body>
    <div class='container'>
        <div class='headings'><h1>Payroll</h1></div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>SSN</th>
                    <th>Salary</th>
                    <th>Section Code</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $e) : ?>

                    <tr>
                        <td><?php echo $e->getFirstName(); ?></td>
                        <td><?php echo $e->getLastName(); ?></td>
                        <td><?php echo $e->getSSN(); ?></td>
                        <td><?php echo $e->getSalary(); ?></td>
                        <td><?php echo $e->getSectionCode(); ?></td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="btn-group d-flex justify-content-center text-center">
            <form method="POST">
                <input type ='hidden' name='action' value='payrollPDF'>
                <input type='submit' class='btn btn-secondary' value='Export PDF'>
            </form>
        </div>

    </div>
</body>
</html>
