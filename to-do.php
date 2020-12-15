
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/to-do.css">
    <title>TO-DO-LIST</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <div class="main-contaner">
            <h1>MY TO DO LIST</h1>
            <div class="header">
                <input type="text" name='input'  placeholder="Write something here....."><button id='addBtn'>ADD</button>
                <div class="to-dos" id='todoBox'></div>
            </div>
        </div>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {       
            function get_data() {  
                $file_name='word_box'. '.json'; 
                if(file_exists("$file_name")) {  
                    $current_data = file_get_contents("$file_name"); 
                    $array_data = json_decode($current_data, true);   
                    $array_data[]=$_POST ['input'];
                    return (json_encode($array_data));
                } 
                else {  
                    echo "file not exist<br/>";   
                } 
            } 
            $file_name='word_box'. '.json'; 
            if(file_put_contents("$file_name", get_data())) { 
                echo 'success'; 
            }                 
            else { 
                echo 'There is some error';                 
            } 
        }
        $current_data = file_get_contents("$file_name"); 
        $array_data = json_decode($current_data, true);
        foreach ($array_data as $index) {
            echo $index. "<br>";
        }   
    ?>
   
</body>
</html>











