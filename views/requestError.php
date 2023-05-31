<?php if ($_SESSION['userType'] =="Admin") {
    include('views/adminHeader.php');
    
} else {
    include('views/regularHeader.php');
    
}
 ?>
    <body>
        <h1>Request Error</h1>
    </body>
</html>
