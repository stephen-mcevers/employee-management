<?php include ('views/adminHeader.php'); ?>
<body>
    <div class="container">
        <div class='headings'><h2>All Requests</h2></div>
        <?php echo $errors; ?>
        <?php echo $empty; ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Days Requested</th>
                    <th>Reason</th>
                    <th>Starting Date</th>
                    <th>Approval</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vacation as $v) : ?>

                    <tr>
                        <td><?php echo $v['FirstName']; ?></td>
                        <td><?php echo $v['LastName']; ?></td>
                        <td><?php echo $v['Days']; ?></td>
                        <td><?php echo $v['Reason']; ?></td>
                        <td><?php echo $v['StartingDate']; ?></td>
                        <td><?php echo $v['Approved']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</body>
</html>
