<?php 
    require_once('header.php'); 
    if(isset($_GET['redirection']))
    {
        switch($_GET['redirection'])
        {
            case 'inscription' :
                header('Location: inscription.php');
            break;
            case 'authentification' :
                header('Location: authentification.php');
            break;
        }
    }
?>


<div class="container">
    <h1 class="margin-top"> Blog multi utilisateurs </h1> 
    <form action="index.php" method="get">
        <input type="submit" class="btn btn-dark"  name="redirection" value="inscription">
        <input type="submit" class="btn btn-dark" name="redirection" value="authentification">
    </form>
</div>


<?php require_once('footer.php'); ?>