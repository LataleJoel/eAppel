<!DOCTYPE html>

<?php
/* redirection */
function rediriger($url) {
    if (!headers_sent()) {
        header('Location:' . $url);
    } else {
        ?>
        <script type = "text/javascript">
            window.location = '<?php echo $url; ?>';
        </script>
        <?php
    }
}
?>

<?php
$login = "";
$motdepasse = "";
$erreur = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $motdepasse = $_POST['motdepasse'];
    $login = $_POST['login'];
    if ($motdepasse == "") {
        $erreur = '<p> mot de passe manquant </p>';
        echo $erreur;
    }
    if ($login == "") {
        $erreur = '<p> login manquant </p>';
        echo $erreur;
    }
    if ($login != "" && $motdepasse != "") {
        rediriger('destinataire.php');
    }
}
?>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="e-appel.css" type="text/css"/>
    </head>

    <body>	
        <form method="post" action="login.php" name="formulaire_login">
            <label for="login">Login :</label>
            <input type="text" name="login" id="login" value=<?php echo $login; ?>>
            <label for="motdepasse">Mot de passe :</label>
            <input type="password" name="motdepasse" id="motdepasse" value=<?php echo $motdepasse; ?>>
            <input type="submit" value="Se Connecter">
        </form>
    </body>
</html>
