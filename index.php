<?php
    include_once('sql/db.php'); // Llamado a la conexión
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat System (PHP)</title>

    <link rel="stylesheet" href="assets/css/style.css" media="all"/>
    <script>
        function ajax(){
            var $request = new XMLHttpRequest();

            $request.onreadystatechange = function(){
                if($request.readyState == 4 && $request.status == 200){
                    var $chat = document.getElementById('chat');
                    $chat.innerHTML = $request.responseText;
                }
            }

            $request.open('GET', 'Models/chat.php', true);
            $request.send();
        }
        setInterval(function(){
            ajax()
        }, 1000)
    </script>
</head>
<body onload="ajax()">
    <div id="container">
        <div id="chat_box">
            <div id="chat"></div>
        </div>

        <!-- ↓↓ POST ↓↓ -->
        <form method="POST" action="index.php">
            <input type="text" name="name" placeholder="enter name" />
            <textarea name="message" placeholder="enter message"></textarea>

            <input type="submit" name="submit" value="Send It" />
        </form>

        <?php
            // Si se ejecutó bn el "POST"
            if(isset($_POST['submit'])){

                if(!empty($_POST['message'])){
                    $name = $_POST['name'];
                    $message = $_POST['message'];
    
                    // Inserción de los mensajes a la BD
                    $insert_query = "INSERT INTO chat (name, message) VALUES ('$name', '$message')";
                    $result_insert = $connection->query($insert_query);
    
                    if($result_insert){
                        echo '<embed loop="false" src="chat.wav" hidden="true" autoplay="true" />';
                    }
                } else {
                    echo '<h1>MESAGGE EMPTY!!!</h1>';
                }
            }
        ?>
    </div>
</body>
</html>