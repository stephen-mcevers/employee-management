<?php include ('views/noUserHeader.php'); ?>

<body>
    <form method="post">
        <input type="hidden" name="action" value="login">
        <section class="vh-100 gradient-custom">
<div class="login-container">
        <div class="body d-md-flex align-items-center justify-content-between">
            <div class="box-1 mt-md-0 mt-5">
                <img src="./images/software-engineer.png" class="" alt="">
            </div>
            <div class=" box-2 d-flex flex-column h-100">
                <div class="mt-5">
                    <p class="mb-1 h-1">Login</p>
                    
                    <div class="d-flex flex-column ">
                        <input type="text" id="loginEmail" name="loginEmail" class=" form-control form-control-lg" />
                                        <label class="mb-1 form-label" for="loginEmail">Email</label>
                        
                            <input type="password" id="loginPassword" name="loginPassword" class="form-control form-control-lg" />
                                        <label class="mb-1 form-label" for="loginPassword">Password</label>
                            
                        <input class="login btn btn-light btn-lg px-5" type="submit" value="Login">
                        <div class="mt-3">
                            
                        </div>
                    </div>
                </div>
                <div class="mt-auto">
                    <p class="footer text-muted mb-0 mt-md-0 mt-4"><a href="https://iconscout.com/illustrations/software-engineer" target="_blank">Software engineer Illustration</a> on <a href="https://iconscout.com">IconScout</a>

                    </p>
                </div>
            </div>
            
        </div>
    </div>
            <a class="headings" href="?action=forgotPassword" >Forgot your password?</a>
        </section>
    </form>

</body>
</html>
