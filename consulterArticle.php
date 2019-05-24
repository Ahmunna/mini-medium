<?php 
    require_once('header.php');
    require_once('connexion.php');
    require_once('handleDB.php');
    session_start();
    $conn = connectDB();
    $handle = new Handler($conn);
    $result = $handle->getAllBlogs($_SESSION['user_id']);
    echo "
    <div class='container'>
        <h1 class='margin-top'>Liste des articles</h1>
    ";
    foreach($result as $row)
    {
        $title=$row['title'];
        $category = $row['category'];
        $content = $row['content'];
        echo "
            <div class='card margin-top'>
                <h5 class='card-header'>Title : $title</h5>
                <div class='card-body'>
                    <h5 class='card-title'>Category : $category</h5>
                    <p class='card-text'>$content</p>
                </div>
            </div>
        ";
    }
    echo "<div class='margin-top'><a href='accueil.php' >Retourner a l'acceuil</a></div>";
    echo "</div>";
    
    require_once('footer.php');
?>