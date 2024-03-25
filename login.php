<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="src/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="Pictures/logo2.png" alt="" width="70" height="50" class="d-inline-block align-text-top"
                    href="index.php">
            </a>
        </div>
    </nav>
    <div class="row spacer text-light">
        <div class="span4">...</div>
        <div class="span4">...</div>
        <div class="span4">...</div>
    </div>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="Pictures/school1.png" width="400" height="400" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Email</label>
                            <input type="email" id="form3Example3" class="form-control form-control-lg"
                                placeholder="Voer je studenten mail in" />

                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Wachtwoord</label>
                            <input type="password" id="form3Example4" class="form-control form-control-lg"
                                placeholder="Voer je wachtwoord in" />

                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Onthoud mij
                                </label>
                            </div>

                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="button" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Heb je geen account? <a href="register.php"
                                    class="link-primary">Registreren</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="row spacer text-light">
            <div class="span4">...</div>
            <div class="span4">...</div>
            <div class="span4">...</div>
            <div class="span4">...</div>
            <div class="span4">...</div>
            <div class="span4">...</div>
        </div>
        <footer class="bg-dark text-center text-light">
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2024 Copyright:
                <a class="text-light" href="https://github.com/PERENSAPP/Leerjaar2OOP">Evan&KevinInc.</a>
            </div>
        </footer>
    </section>

</body>

</html>