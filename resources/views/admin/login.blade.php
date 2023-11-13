<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
    <div class="container d-flex align-items-center justify-content-center " style="margin-top:5rem;">
        <div class="card mb-3 border-0  ">
            <div class="row g-0">
                <div class="col my-auto">
                <div class="card shadow-lg mb-5 p-4 border-0 rounded">
                    <div class="card-body">
                        <img src="../images/logo.png" class="img-fluid  mx-auto d-block" alt="image" width="80" />
                        <div class="card-body">
                        <h5 style="font-size:30px; font-family:"'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif'" class="card-title mt-2">Admin Login</h5>
                        <small class="text-body-secondary" >Log in with your admin credentials.</small>
        
                        <form class="w-auto m-auto mt-3" action="{{ url('/') }}/admin/login" method="POST">
                            @csrf
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label">Name or Username</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"/>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary text-center" id="login-btn" name="form_login" style="background-color:#ff6537ff; border:none; min-width:390px;">Login</button>
                            </div>
                            <div class="text-center mt-2">
                                <a href="../index.php" style="color:#ff6537ff;text-decoration:none;">Back to Home</Link>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>