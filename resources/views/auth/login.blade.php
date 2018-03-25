<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Myshop</title>
    <base href="/" />
    <link rel="icon" type="image/png" href="shop.png">
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
                            Admininstrator
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-info">
                            user: <ins>admin@demo.com</ins> <br>
                            pass: <ins>demo123</ins>
                        </div>
                        <form action="auth" class="form-horizontal" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Email</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="email" id="inputEmail" placeholder="Email" autofocus="on" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-3 control-label">Password</label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
                                    <button type="submit" class="btn btn-primary">Login</button>
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