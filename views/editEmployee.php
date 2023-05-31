<?php include ('views/adminHeader.php'); ?>

    <body>
        <div class="form-container">
        <h1>Edit Employee Details</h1>

            <?php foreach ($errors as $err) : ?>

            <h4 style='color:red;'><?php echo $err; ?></h4>

        <?php endforeach; ?>
            
            
            <?php foreach ($emp as $e): ?>
        <form action="." method="post">
            <input type='hidden' name='empID' value='<?php echo $empID; ?>' />
            <input type="hidden" name="action" value="edit">

            
            <div class="form-outline">
                <input type="text" id="email" name="email" class="form-control form-control-sm" value='<?php echo $e['Email']; ?>' />
                <label class="form-label" for="email">Email</label>
            </div>


            <div class="form-outline">
                <input type="text" id="firstName" name="firstName" class="form-control form-control-sm" value='<?php echo $e['FirstName']; ?>' />
                <label class="form-label" for="firstName">First Name</label>
            </div>


            <div class="form-outline">
                <input type="text" id="lastName" name="lastName" class="form-control form-control-sm" value='<?php echo $e['LastName']; ?>' />
                <label class="form-label" for="lastName">Last Name</label>
            </div>

            <div class="form-outline">
                <input type="text" id="address" name="address" class="form-control form-control-sm" value='<?php echo $e['Address']; ?>' />
                <label class="form-label" for="address">Address</label>
            </div>

            <div class="form-outline">
                <input type="text" id="DOB" name="DOB" class="form-control form-control-sm" value='<?php echo $e['DOB']; ?>' />
                <label class="form-label" for="DOB">Date of Birth</label>
            </div>

            <div class="form-outline">
                <input type="text" id="empType" name="empType" class="form-control form-control-sm" value='<?php echo $e['EmpType']; ?>' />
                <label class="form-label" for="empType">Employee Type</label>
            </div>

            <div class="form-outline">
                <input type="text" id="sectionCode" name="sectionCode" class="form-control form-control-sm" value='<?php echo $e['SectionCode']; ?>' />
                <label class="form-label" for="sectionCode">Section Code</label>
            </div>
            <?php endforeach; ?>



            <div class='btn-group d-flex justify-content-center text-center'><input class='btn btn-secondary' type="submit" value="Update"></div>
        </form>

    </div>
    </body>
</html>
