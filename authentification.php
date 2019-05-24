<?php 
    require_once('header.php');
    require_once('connexion.php');
    require_once('handleDB.php');
    session_start();
    $message='';
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $conn = connectDB();
        $handler = new Handler($conn);
        $result = $handler->authentification($email,$password);
        if($result != null)
        {
            
            $_SESSION['user_id'] = $result;
            header('Location: accueil.php');
        }
        else
        {
            $message .="<div class='alert alert-danger'>Email ou Mot de passe incorrect.</div>";
        }
    }
?>

<div class="container">
    <h1 class="margin-top">Authentification</h1>
    <form method='post' action='authentification.php'>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <button type="submit" name="submit"class="btn btn-primary">Submit</button>
    </form>
    <?php echo $message ; ?>
</div>

<?php require_once('footer.php') ;?>