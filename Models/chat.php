<?php
    include_once('../sql/db.php');
    
    // Consulta de la tabla "Chat" ↓↓↓
    $query_display_order = "SELECT * FROM chat ORDER BY id DESC"; // Creación consulta
    $order_result = $connection->query($query_display_order); // Ejecución

    // $jsonInfo = json_encode($order_result->fetch_array());
    // echo ($jsonInfo);
    
    while($row = $order_result->fetch_array()) : // ------ Inicio de Bucle "While" ↓↓↓
?>
<!-- Este contenido se itera por el bucle "While sobre él" -->
<div id="chat_data">
    <p class="user_name"><?php echo $row['name'];?> : </p>
    <p class="user_text"><?php echo $row['message'];?></p>
    <p class="send_time">
        <small><?php echo formatDate($row['date']);?></small>
    </p>
</div>

<?php endwhile; // ------ Cierre de Bucle "While" ↑↑↑ ?>