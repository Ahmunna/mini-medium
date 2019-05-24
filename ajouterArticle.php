<?php 
    require_once('header.php');
    require_once('connexion.php');
    require_once('handleDB.php');
    session_start();
    $message='';
    if(isset($_POST['submit']))
    {
        $title=$_POST['title'];
        $category=$_POST['category'];
        $content = $_POST['content'];
        $idUser = $_SESSION['user_id'];
        $conn = connectDB();
        $handle = new Handler($conn);
        if($handle->addBlog($title,$category,$content,$idUser))
        {
            $message .= "<div class='alert alert-success'>Blog added Successfully</div><a href='consulterArticle.php'>Consulter les articles</a>";
        }
        else
        {
            $message .= "<div class='alert alert-danger>Error adding the blog</div>";
        }
    }
?>
<div class="container ">
    <h1 class='margin-top'>Ajouter article</h1>
    <form method='post' action=<?php $_SERVER['PHP_SELF'];?>>
        <div class="form-group">
            <label form="title">Title</label>
            <input type="text" class="form-control" name="title" placeholder="entrer title" />
        </div>
        <div class="form-group">
            <label form="category">category</label>
            <input type="text"  class="form-control" name="category" placeholder="entrer category" />
        </div>
        <div class="form-group">
            <label form="content">content</label>
            <textarea type="text"  class="form-control" name="content" rows="6" ></textarea>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="ajouter article" />
    </form>
    <?php echo $message; ?>
</div>

<?php
    require_once('footer.php');
?>