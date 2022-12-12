<?php
include('connection.php');



class Tasks {

    public $conn;
    
    public  function __construct(){
        $this->conn = new connection();
    }


    public function createTable(){
        $query = "CREATE TABLE IF NOT EXISTS task (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title TEXT(50),
            description TEXT(250),
            created_at TIMESTAMP
        )";

        $result = mysqli_query($this->conn->con, $query);
    }


    public function saveTasks(){
        if (isset($_POST['save_task'])){
            $title = $_POST['title'];
            $description = $_POST['description'];
            
            $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
            $result = mysqli_query($this->conn->con, $query);
            if (!$result){
                die("Query Failed");
            }
        
            $_SESSION['message'] = 'Task Saved succesfully';
            $_SESSION['message_type'] = 'success';
        
            header("Location: ../index.php");
        }
    }


    public function deleteTasks(){
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "DELETE FROM task WHERE id = $id";
            $result = mysqli_query($this->conn->con, $query);
            if (!$result){
                die("Query Failed");
            }
    
            $_SESSION['message'] = 'Task Removed Successfully';
            $_SESSION['message_type'] = 'danger';
            header("Location: ../index.php");
        }
    }


    public $title;
    public $description;

    public function editTasks(){
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "SELECT * FROM task WHERE id = $id";
            $result = mysqli_query($this->conn->con, $query);
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result);
                $this->title = $row['title'];
                $this->description = $row['description'];
            }
        }
    
        if(isset($_POST['update'])){
            $id = $_GET['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
    
            $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
            mysqli_query($this->conn->con, $query);
            $_SESSION['message'] = 'Task Update Successfully';
            $_SESSION['message_type'] = 'warning';
            header("Location: ../index.php");
        }
    }
}


?>