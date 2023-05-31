<?php if ($_SESSION['userType'] =="Admin") {
    include('views/adminHeader.php');
    
} else {
    include('views/regularHeader.php');
    
}
 ?>


    <body>
        
        <div class="form-container">
        <h1>Request Time Off</h1>
        
        <form action="." method="post">
            <input type="hidden" name="action" value="submitRequest">


            <div class="form-outline">
                <input type="text" id="days" name="days" class="form-control form-control-sm" />
                <label class="form-label" for="days">Number of days</label>
            </div>
            <div class="form-outline">
                <input type="date" id="startDate" name="startDate" class="form-control form-control-sm" />
                <label class="form-label" for="startDate">Starting Date</label>
            </div>

            <div class="form-outline">
                <textarea type="text" id="reason" name="reason" class="form-control form-control-sm"> </textarea>
                <label class="form-label" for="reason">Reason</label>
            </div>



            <input type="submit" value="Submit Request">
        </form>
        
        </div>
    </body>
</html>
