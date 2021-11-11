<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/welcome.css">
        <title> Boombox City | Inscription </title>
    </head>
    <body class="d-flex flex-column align-items-center">

        <h1 class="text-white m-5">Inscription</h1>

        <div class="card col-8 inscription-box">
            <form class="form" method="POST">
                <div class="m-3">
                    <label for="pseudo" class="form-label text-white">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" class="form-control" required>
                </div>

                <div class="m-3">
                    <label class="mb-3 form-label text-white" for ="email">Email</label>
                    <input name="email" id="email" class="form-control" required></input>
                </div>

                <div class="m-3">
                    <label class="mb-3 form-label text-white" for ="email_again">Saisir l'email de nouveau</label>
                    <input name="email_again" id="email_again" class="form-control" required></input>
                </div>

                <div class="m-3">
                    <label class="mb-3 form-label text-white" for ="email">Présentation</label>
                    <input name="presentation" id="presentation" class="form-control"></input>
                </div>

                <div class="d-flex justify-content-center my-4">
                    <button class="btn btn-box text-white" type="submit" name="submit">Enregistrer</button>
                </div>
            </form>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
                  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
                  crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" 
                  integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" 
                  crossorigin="anonymous">
        </script>
    </body>
</html>