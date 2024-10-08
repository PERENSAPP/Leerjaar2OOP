<!DOCTYPE html>
<html>
<head>
    <title>Book Archive</title>
    <link href="src/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
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
    <footer class="bg-dark text-center text-light">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Copyright:
            <a class="text-light" href="https://github.com/PERENSAPP/Leerjaar2OOP">Evan&KevinInc.</a>
        </div>
    </footer>
</body>
</html>

