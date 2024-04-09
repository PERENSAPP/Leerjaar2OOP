<?php
session_start();
require_once "conn.php";
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pagina - Uitgeleende Boeken</title>
    <link href="src/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="logged_in_user.php">
                <img src="Pictures/logo2.png" alt="" width="70" height="50" class="d-inline-block align-text-top">
            </a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="bookArchive.php">Bibliotheek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="createBooks.php">Boeken toevoegen</a>
                    </li>
                    <?php
                    // Check if the user is an admin
                    if ($_SESSION["roleId"] === 1) {
                        echo '<li class="nav-item">
                                <a class="nav-link text-light" href="adminOverview.php">Admin Pagina</a>
                            </li>';
                    }
                    ?>
                    <?php
                    // Check if the user is an admin
                    if ($_SESSION["roleId"] === 3) {
                        echo '<li class="nav-item">
                                <a class="nav-link text-light" href="adminOverview.php">Admin Pagina</a>
                            </li>';
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="logOut.php">log uit</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="searchBar.php" method="POST">
                    <input class="form-control me-2" type="search" name="keyword" placeholder="Zoeken"
                        aria-label="Search">
                    <button class="btn btn-outline-light" type="submit" name="search">Zoek</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-3">Overzicht van Uitgeleende Boeken</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Boek ID</th>
                    <th scope="col">Titel</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Lener</th>
                    <th scope="col">Uitgeleend Sinds</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query om uitgeleende boeken op te halen
                $sql = "SELECT
                            boek.boek_id,
                            boek.titel,
                            boek.auteur,
                            gebruiker.naam AS lener_naam,
                            uitlening.uitgeleend_sinds
                        FROM
                            uitlening
                        INNER JOIN
                            boek ON uitlening.boek_id = boek.boek_id
                        INNER JOIN
                            gebruiker ON uitlening.lener_id = gebruiker.gebruiker_id";
                $result = $conn->query($sql);
                if ($result->rowCount() > 0) {
                    // Output data van elke rij
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                            <td>" . $row["boek_id"] . "</td>
                            <td>" . $row["titel"] . "</td>
                            <td>" . $row["auteur"] . "</td>
                            <td>" . $row["lener_naam"] . "</td>
                            <td>" . $row["uitgeleend_sinds"] . "</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Geen uitgeleende boeken gevonden</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer class="bg-dark text-center text-light fixed-bottom">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Copyright:
            <a class="text-light" href="https://github.com/PERENSAPP/Leerjaar2OOP">Evan&KevinInc.</a>
        </div>
    </footer>

</body>

</html>