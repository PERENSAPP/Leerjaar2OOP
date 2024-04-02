<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="src/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <title>Boeken toevoegen</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="logged_in_user.php">
                <img src="Pictures/logo2.png" alt="" width="70" height="50" class="d-inline-block align-text-top">
            </a>
            <div class="collapse navbar-collapse " id="navbarNavDropdown">
                <ul class="navbar-nav text-light">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="bookArchive.php">Boeken</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="createBooks.php">Boeken toevoegen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="login.php">log uit</a>
                    </li>

                </ul>
            </div>
        </div>
        <form class="d-flex" role="search">

            <input class="form-control me-2" type="search" placeholder="Zoeken" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Zoek</button>

        </form>
    </nav>
    <div class="row spacer text-light">
        <div class="span4">...</div>


    </div>
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">

            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="createBooksLogic.php" method="post">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Titel</label>
                        <input type="text" id="form3Example3" name="bookName" class="form-control form-control-lg"
                            placeholder="Voer de naam van het boek in" />

                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example4">ISBN</label>
                        <input type="text" id="form3Example4" name="ISBN" class="form-control form-control-lg"
                            placeholder="Voer het ISBN nummer in" />

                    </div>
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example4">Auteur</label>
                        <input type="text" id="form3Example4" name="nameAuthor" class="form-control form-control-lg"
                            placeholder="Voer de auteur in" />

                    </div>
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example4">Voorraad</label>
                        <input type="number" id="form3Example4" name="stock" class="form-control form-control-lg"
                            placeholder="Voer het aantal boeken in" />

                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label"></label>
                        <input class="form-control" type="file" id="formFile" name="img">
                    </div>



                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <div class="row spacer text-light">
        <div class="span4">...</div>


    </div>
    <footer class="bg-dark text-center text-light">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Copyright:
            <a class="text-light" href="https://github.com/PERENSAPP/Leerjaar2OOP">Evan&KevinInc.</a>
        </div>
    </footer>
</body>

</html>