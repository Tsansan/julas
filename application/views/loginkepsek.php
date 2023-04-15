<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/') ?>mystyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid c-primary m-0 p-0 position-relative" style="height: 100vh;">
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="card" style="width: 20rem;">
                <form action="<?php echo site_url("loginkepsek") ?>" method="post">
                    <div class="card-body">
                        <h5 class="card-title fs-2">Login Kepsek</h5>
                        <?php
                        if (!$this->session->flashdata('failedlogin')) {
                            echo "<h6 class='card-subtitle mb-2 text-muted mb-2 fw-danger'>Masukan username & password </h6>";
                        } else {
                            echo "<h6 class='card-subtitle mb-2 text-muted mb-2'>" . $this->session->flashdata('failedlogin') . "</h6>";
                        }

                        ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" autofocus>
                            <div class="text-danger">
                                <?php echo form_error('username'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <div class="text-danger">
                                <?php echo form_error('password'); ?>
                            </div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>