<?php

Class Handler
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function setConn($conn)
    {
        $this->conn = $conn;
    }

    public function getAllBlogs($idUser)
    {
        $result= array();
        $statement = $this->conn->query("SELECT * FROM article WHERE id_user=$idUser");
        foreach($statement as $row)
        {
            array_push($result,$row);
        }
        return $result;
    }

    public function inscription($adresse,$password)
    {
        try
        {
            $sql = "INSERT INTO user (adresse,password) VALUES ('$adresse','$password')";
            $this->conn->exec($sql);  
            return true;
        } 
        catch(Exception $e)
        {
            return false;
        }
    }

    public function authentification($adresse,$password)
    {
        $statement = $this->conn->prepare("SELECT * FROM user WHERE adresse = ?");
        $statement->execute([$adresse]);
        $user = $statement->fetch();
        if($user['password'] === $password)
        {
           return $user['id'];
        }
        else
        {
            return null;
        }
    }

    public function addBlog($title,$category,$content,$idUser)
    {
        try
        {
            $sql = "INSERT INTO article (content,title,category,id_user) VALUES ('$content','$title','$category','$idUser')";
            $this->conn->exec($sql);
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
    }


}
?>