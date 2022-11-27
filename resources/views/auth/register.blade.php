<!DOCTYPE html>
<html lang="en">

<x-layout.partials.head/>

<body class="bg-gradient-primary d-flex flex-row align-items-center justify-content-center" style="min-height: 100vh">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col">
                        <div class="p-5">
                            <div class="text-center pb-4">
                                <h1 class="text-gray-900">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="{{route('do-register')}}">
                                @csrf
                                <div class="form-group">
                                    <div class=" mb-3 mb-sm-0" style="width: 100%">
                                        <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" style="width:100%">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                </div>
                                <button type="submit" style="font-size: 14px" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" style="font-size: 12px" href="{{route('login')}}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <x-layout.partials.script/>
</body>

</html>