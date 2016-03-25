<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin::Login</title>
    <base href="/" />
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/css/bb.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="panel panel-default lP">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Admin Login
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="auth/secure-login" class="form-horizontal">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="email" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                                <div class="col-lg-10">
                                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="submit" class="btn btn-primary">Admin Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>