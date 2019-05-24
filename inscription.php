<?php 
    require_once('header.php');
    require_once('connexion.php');
    require_once('handleDB.php');
    $message='';
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $conn = connectDB();
        $handler = new Handler($conn);
        if($handler->inscription($email,$password))
        {
            $message .= "<div class='alert alert-success'>Inscription Successfull</div><a href='authentification.php'>Se connecter</a>";
        } 
        else
        {
            $message .= "<div class='alert alert-danger'>Error Inscription</div>";
        }
    }
?>

<div class="container">
    <h1 class="margin-top">Inscription</h1>
    <form method="post" action="inscription.php">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <button type="submit" name="submit"class="btn btn-primary">Inscription</button>
    </form>
    <?php echo $message; ?>
</div>

<?php require_once('footer.php') ;?>