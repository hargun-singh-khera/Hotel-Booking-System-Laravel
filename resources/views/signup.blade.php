<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Heritage | Create an Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container d-flex align-items-center justify-content-center mt-5 ">
        <div class="row g-0">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <img src="images/register.gif" class="img-fluid rounded-start" alt="..." />
            </div>
            <div class="col">
                <div class="card shadow-lg p-4 mb-5 border-0 rounded" >
                    <div class="col my-auto">
                        <img src="./images/logo.png" class="img-fluid mx-auto d-block" alt="image" width="60" height="60" />
                        <div class="card-body">
                        <h5 style="font-size:30px; font-family:"'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif'" class="card-title mb-3">Create an Account</h5>
                        <form class="w-auto m-auto" action="{{url('/')}}/signup" method="POST">
                            @csrf
                            <div class="mb-1">
                                <label for="name" class="form-label">Your name</label>
                                <input type="name" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}" />
                                <span class="text-danger">
                                    @error('name')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label mt-1">E-mail address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}"/>
                                <span class="text-danger">
                                    @error('email')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-1">
                                <label for="password" class="form-label mt-1">Password</label>
                                <input type="password" maxlength="23" class="form-control" id="password" name="password" placeholder="Password" />
                                <span class="text-danger">
                                    @error('password')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-1">
                                <label for="cpassword" class="form-label mt-1">Confirm Password</label>
                                <input type="password" maxlength="23" class="form-control" id="cpassword" name="password_confirmation" placeholder="Confirm Password" />
                                <span class="text-danger">
                                    @error('password_confirmation')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 mb-4 mt-2">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="checkbox" id="invalidCheck" required />
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary text-center corner-radius" id="signup-btn" style="background-color:#ff6537ff; border:none; min-width:400px;">Create account</button>
                            </div>
                            <div class="text-center mt-2">
                                Have an account?<a style="color:#ff6537ff;text-decoration:none;" href="{{url('/')}}/login"> Sign In</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>