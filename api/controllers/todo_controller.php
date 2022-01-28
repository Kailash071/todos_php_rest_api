<?php
require("../config/db.php");
?>

<?php
    header('content-type:application/JSON');

//fetch all todo
function getAllTodos()
{

    $conn = connectDB();
    $sql = "SELECT * FROM `todos`";

    $result = mysqli_query($conn, $sql);

    return $result;
}

//fetch todo by id
function getTodoById($id)
{

    $conn = connectDB();
    $sql = "SELECT * FROM `todos` WHERE `id` ='$id'";

    $result = mysqli_query($conn, $sql);

    return $result;
}

//create new todo
function createTodo()
{
    $data = json_decode(file_get_contents("php://input"),true);

    $conn = connectDB();

    $sql = "INSERT INTO `todos` (title,description) VALUES ('".$data["title"]."','".$data["description"]."')";
     $result = mysqli_query($conn, $sql);

    if($result){
        $mssg = array("Message"=>"Todo created successfully");
        echo json_encode($mssg);
    }
    else{
        $mssg = array("Message"=>"Error while creating.");
        echo json_encode($mssg);
    }
    
}

//update a todo
function updateTodo($id)
{
    $data = json_decode(file_get_contents("php://input"),true);

    $conn = connectDB();

    $sql = "UPDATE `todos` SET `title`='".$data["title"]."' , 
    `description`='".$data ["description"]."' WHERE `id`=$id";

    $result = mysqli_query($conn, $sql);

    if($result){
        $mssg = array("Message"=>"Todo updated successfully");
        echo json_encode($mssg);
    }
    else{
        $mssg = array("Message"=>"Error while updating.");
        echo json_encode($mssg);
    }
}

//delete a todo
function deleteTodo($id)
{

    $conn = connectDB();

    $sql = "DELETE FROM `todos` WHERE `id`='$id'";

    $result = mysqli_query($conn, $sql);

    if($result){
        $mssg = array("Message"=>"Todo deleted successfully");
        echo json_encode($mssg);
    }
    else{
        $mssg = array("Message"=>"Error while deleting.");
        echo json_encode($mssg);
    }
}

?>