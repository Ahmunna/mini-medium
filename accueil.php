<?php  
    require_once('header.php');
    if(isset($_GET['redirection']))
    {
        switch($_GET['redirection'])
        {
            case 'ajouterArticle' :
                header('Location: ajouterArticle.php');
            break;
            case 'ConsulterArticles' :
                header('Location: consulterArticle.php');
            break;
            case  'logout' : 
                unset($_SESSION['user_id']);
                header('Location: authentification.php');
            break;
        }
    }
?>

<div class="container">
    <h1 class="margin-top">Accueil</h1>
    <form action="accueil.php" method="get">
        <input type="submit" class="btn btn-dark"  name="redirection" value="ajouterArticle">
        <input type="submit" class="btn btn-dark" name="redirection" value="ConsulterArticles">
        <input type="submit" class="btn btn-dark" name="redirection" value="logout">
    </form>
</div>

<?php  require_once('footer.php');?>