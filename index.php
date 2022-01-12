<?php
header('Content-type: text/html; charset=utf-8');
require_once("components/db.php");

$userQ = $mysqli->query('SELECT name, phone, SUM(subtotal), AVG(subtotal), MAX(orders.created) FROM users, orders WHERE orders.user_id=users.id GROUP BY  name, phone  ORDER BY name');

    $user = $userQ->fetch_all();
    echo '
    <table class="table">
    <thead>
        <th class="col-2">Имя</th>
        <th class="col-2">Телефон</th>
        <th class="col-2">Сумма всех заказов</th>
        <th class="col-2">Средний чек</th>
        <th class="col-2">Дата последнего заказа</th>
    </thead>
    ';

    foreach($user as $row){
        echo "<tr>";
        foreach($row as $cell){
            echo   "<td>{$cell}</td>";
        }
        echo "</tr>" ;
    };
    echo "</table>";
	$userQ->free();
    
    
