<?php include ('views/adminHeader.php'); ?>


<body>

    <div class="form-container">
        <h1>Register New Employee</h1>

        <?php foreach ($errors as $e) : ?>

            <h4><?php echo $e; ?></h4>

        <?php endforeach; ?>
        <form action="." method="post">
            <input type="hidden" name="action" value="register">


            <div class="form-outline">
                <input type="text" id="email" name="email" class="form-control form-control-sm" />
                <label class="form-label" for="email">Email</label>
            </div>
            <div class="form-outline">
                <input type="password" id="password" name="password" class="form-control form-control-sm" />
                <label class="form-label" for="password">Password</label>
            </div>

            <div class="form-outline">
                <input type="text" id="firstName" name="firstName" class="form-control form-control-sm" />
                <label class="form-label" for="firstName">First Name</label>
            </div>


            <div class="form-outline">
                <input type="text" id="lastName" name="lastName" class="form-control form-control-sm" />
                <label class="form-label" for="lastName">Last Name</label>
            </div>

            <div class="form-outline">
                <input type="text" id="address" name="address" class="form-control form-control-sm" />
                <label class="form-label" for="address">Address</label>
            </div>

            <div class="form-outline">
                <input type="date" id="DOB" name="DOB" class="form-control form-control-sm" />
                <label class="form-label" for="DOB">Date of Birth</label>
            </div>
            <div class="form-outline">
                <input type="text" id="SSN" name="SSN" class="form-control form-control-sm" />
                <label class="form-label" for="SSN">SSN</label>
            </div>
            <div class="form-outline">
                <input type="text" id="empType" name="empType" class="form-control form-control-sm" />
                <label class="form-label" for="empType">Employee Type</label>
            </div>
            <div class="form-outline">
                <input type="text" id="salary" name="salary" class="form-control form-control-sm" />
                <label class="form-label" for="salary">Salary</label>
            </div>
            <div class="form-outline">
                <input type="date" id="startDate" name="startDate" class="form-control form-control-sm" />
                <label class="form-label" for="startDate">Start Date</label>
            </div>
            <div class="form-outline">
                <input type="text" id="supervisor" name="supervisor" class="form-control form-control-sm" />
                <label class="form-label" for="supervisor">Supervisor</label>
            </div>
            <div class="form-outline">
                <input type="text" id="sectionCode" name="sectionCode" class="form-control form-control-sm" />
                <label class="form-label" for="sectionCode">Section Code</label>
            </div>



            <input type="submit" value="Register">
        </form>

    </div>
</body>
