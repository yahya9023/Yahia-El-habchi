<?php
include_once('database.php');

//selectionner les message dans la base de donnée
$query = "SELECT * FROM messages";
$results = mysqli_query($link, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat box</title>
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
</head>

<body>
    <main>

        <div class="titleBar container">
            <h1>Welcome Yahia</h1>
        </div>
        <form action="../index.php" method="POST">
            <button name="logout" value="logout" type="submit" class="btn btn-primary">
                <i class="fa fa-sign-out">sign-out</i>
            </button>
        </form>
        <div class="messages container">
            <ul>
                <?php foreach ($results as $row) : ?>

                <li class="message"><span> <?php echo $row["temps"];  ?> - </span><?php echo $row["utilisateur"];  ?> :
                    <?php echo $row["contenu_message"];  ?> </li>
                <?php endforeach ?>
            </ul>
        </div>
        <div class=" container">
            <form class="comment" action="traitement.php" method="post">
                <input type="text" name="utilisateur" id="utilisateur" placeholder="Saisir votre username">
                <input type="text" name="message" id="message" placeholder="Saisir votre message">
                <input type="submit" id="submit" name="envoyer" value="Envoyer" class="btn btn-primary">
            </form>
        </div>

        <?php
        if (isset($_POST['logout'])) {
            session_unset();
            session_destroy();
            header("location: ../index.php ");
        }

        ?>



    </main>






</body>

</html>