<?php
// recupero il contenuto del file json
$todoList = file_get_contents('todo-list.json');

// decodifico la lista recuperata dal file json in array associativo
$list = json_decode($todoList, true);

// aggiungo all'header della risposta che sto passando un dato JSON
header('Content-Type: application/json');

//invio l'informazione in formato json
echo json_encode($list);
