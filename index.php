<?php include "connection.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Koning validatie app</title>
</head>
<body>
    <div class="container">
        <h1>De Koning komt naar T2-Campus</h1>
        <h5>Vul hier je gegevens voor je meet & greet met Filip</h5>
    <form action="submitted.php" method="post">
        <div class="mb-3">
            <label class="form-label">Voornaam</label>
            <input type="text" class="form-control" name="firstName">
        </div>
        <div class="mb-3">
            <label class="form-label">Achternaam</label>
            <input type="text" class="form-control" name="lastName">
        </div>
        <div class="mb-3">
            <label class="form-label">Geboortedatum</label>
            <input type="date" class="form-control" name="birthDate">
        </div>
        <button type="submit" class="btn btn-secondary" name="submitted">Verzenden</button>
    </form>
    </div>
</body>
</html>