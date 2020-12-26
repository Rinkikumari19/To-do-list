
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/to-do.css" type="text/css">
    <title>TO-DO-LIST</title>
</head>
<body>
    
        <div class="main-contaner">
            <h1>MY TO DO LIST</h1>
            <div class="header">
            <form method="post" action="index.php" class="input_form">
                <input type="text" name="task" class='task_input' placeholder="Write something here.....">
                <button type="submit" name='addToDo' id="addBtn">ADD</button> 
            </form>
        </div>
    </div>


<?php
    $fileName ="data.json";
    function readJson(){
        global $fileName;
        $data = file_get_contents($fileName);
        $json = json_decode($data,true);
        return $json;
    }
  
  
    function writeJson()
    { 
        if (isset($_POST['addToDo'])) {
            if (empty($_POST['task'])) {
                $errors = "You must fill in the task";
            }else{
                $task = $_POST['task'];
                $array = readJson();
                $array[] = $task;
                return $array;
                }
        } 
    }


    function normal()
    {
        $fileName = "data.json";
        if (file_put_contents($fileName, json_encode(writeJson()))) { 
            // echo("success"); 
        } 
    }
    if (isset($_POST['task'])){
        normal();
    }


    function delFunc()
    {
        $data = readJson();
        $del = $_GET["del_word"];
        if (isset($del)) {
            $fileName = "data.json"; 
            unset($data[$del]);
            $json_data = json_encode($data);
            file_put_contents($fileName, $json_data);
        }
    }
    delFunc();


    $num=0;
    $data = readJson();
    if (gettype($data)=="array"){
        foreach($data as $index){
            echo($index) ." "; ?>
            <a class="delFunc" href="index.php?del_word=<?php echo $num?>"><button>del</button></a>
        <?php
            echo("<br>");
            $num++;
        }
    }
    else{
        echo($errors);
    }

?>
</body>
</html>

