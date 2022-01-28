<?php
include("../controllers/todo_controller.php");

header('content-type:application/JSON');

switch($_SERVER["REQUEST_METHOD"]){
    case 'GET':
        $todos = array();

        if(isset($_GET["id"])){
            $result = getTodoById($_GET["id"]);

            while($row = mysqli_fetch_assoc($result)){
                $todos[] = $row;
            }
            echo json_encode($todos);
        }
        else{
            $result = getAllTodos();

            while($row = mysqli_fetch_assoc($result)){
                $todos[] = $row;
            }
            echo json_encode($todos);
        }
        break;
    case 'POST':
        createTodo();
        break;
    case 'PUT':
        updateTodo($_GET["id"]);
        break;
    case 'DELETE':
        deleteTodo($_GET["id"]);
        break;
    default: 
        echo("Invalid method/Method not allowed");
}
?>