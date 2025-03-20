<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #000;
        }

        .card {
            width: 400px;
            border: none;
        }

        .btr {
            border-top-right-radius: 5px !important;
        }

        .btl {
            border-top-left-radius: 5px !important;
        }

        .btn-dark {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-dark:hover {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .nav-pills {
            display: table !important;
            width: 100%;
        }

        .nav-pills .nav-link {
            border-radius: 0px;
            border-bottom: 1px solid #0d6efd40;
        }

        .nav-item {
            display: table-cell;
            background: #0d6efd2e;
        }

        .form {
            padding: 25px;
            height: 400px;
        }

        .form input {
            margin-bottom: 12px;
            border-radius: 3px;
        }

        .form input:focus {
            box-shadow: none;
        }

        .form button {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item text-center">
                    <a class="nav-link active btl" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home"
                        role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form method="post" action="<?= base_url('P_Login/') ?>">
                        <div class="form px-4 pt-5">
                            <input type="text" class="form-control" placeholder="Email" name="email">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <button type="submit" class="btn btn-dark btn-block">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>