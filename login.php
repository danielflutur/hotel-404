
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="login.css" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row" id="loginForm">
            <div class="col-md-7"></div>
            <div class="col-md-4">
                <h3>Login Form</h3>
                <br>
                <form action="authentication.php" method="POST">
                    <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                    <div class="form-group">
                        <label for="text">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Username" name="username" />
                    </div>
                    <div class="form-group">
                        <label for="email">Your email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" />
                    </div>
                    <div class="form-group">
                        <label for="password">Your password</label>
                        <input type="password" class="form-control" id="password" placeholder="******" name="password" />
                    </div>
                    <button type="submit" name="btnLogin" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row motto" >
          <div class="col-md-12">
            <h1 class="display-4 text-center my-3">"Your home is where your <span class="pulse">heart</span> is"</h1>
          </div>
        </div>
      </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>