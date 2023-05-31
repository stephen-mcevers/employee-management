<?php include ('views/regularHeader.php'); ?>

<body>
    <div>
        <div class='headings'><h1>Personal Details</h1></div>
        
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Date of Birth</th>
                        <th>SSN</th>
                        <th>Employee Type</th>
                        <th>Salary</th>
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
                        <td><?php echo $e['SSN']; ?></td>
                        <td><?php echo $e['EmpType']; ?></td>
                        <td><?php echo $e['Salary']; ?></td>
                        <td><?php echo $e['StartDate']; ?></td>
                        <td><?php echo $e['Supervisor']; ?></td>
                        <td><?php echo $e['SectionCode']; ?></td>

                    </tr>
                    
                    <?php endforeach; ?>

                </tbody>


            </table>

        
    </div>
</body>
</html>