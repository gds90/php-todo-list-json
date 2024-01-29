<?php
// recupero il contenuto del file json
$todoList = file_get_contents('todo-list.json');

// decodifico la lista recuperata dal file json in array associativo
$list = json_decode($todoList, true);

// verifico se tramite chiamata POST è stato inviato un nuovo Todo da salvare nella lista
if (isset($_POST['name'])) {
    $todoName = $_POST['name'];
    $todoDone = false;

    // aggiungo l'elemento alla lista
    $todo = [
        "name" => $todoName,
        "done" => $todoDone,
    ];
    $list[] = $todo;

    // salvo il nuovo todo nel file todo-list.json
    file_put_contents('todo-list.json', json_encode($list));
}

// verifico se tramite chiamate DELETE è stata chiesta la cancellazione di un Todo dalla lista
if (isset($_POST['index'])) {
    unset($list[$_POST['index']]);

    // salvo la modifica nel file todo-list.json
    file_put_contents('todo-list.json', json_encode($list));
}

// aggiungo all'header della risposta che sto passando un dato JSON
header('Content-Type: application/json');

//invio l'informazione in formato json
echo json_encode($list);
