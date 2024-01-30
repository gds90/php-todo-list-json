<?php
// recupero il contenuto del file json
$todoList = file_get_contents('todo-list.json');

// decodifico la lista recuperata dal file json (che è una stringa) in array associativo per lavorarci
$list = json_decode($todoList, true);

// verifico se tramite chiamata POST è stato inviato un nuovo Todo da salvare nella lista
if (isset($_POST['name'])) {
    $todoName = $_POST['name'];

    // aggiungo l'elemento alla lista
    $todo = [
        "name" => $todoName,
        "done" => false
    ];
    $list[] = $todo;

    // salvo il nuovo todo nel file todo-list.json
    file_put_contents('todo-list.json', json_encode($list));
}

// verifico se tramite chiamate DELETE è stata chiesta la cancellazione di un Todo dalla lista
if (isset($_POST['index'])) {
    // elimino il todo con l'indice passato da chiamata POST
    unset($list[$_POST['index']]);

    // salvo la modifica nel file todo-list.json
    file_put_contents('todo-list.json', json_encode($list));
}

// verifico se è presente todoIndex nella variabile POST per cambiare lo stato del todo
if (isset($_POST['todoIndex'])) {
    // recupero l'elemento dell'array che ha come indice $_POST e ne cambio lo stato['todoIndex]

    $list[$_POST['todoIndex']]['done'] = !$list[$_POST['todoIndex']]['done'];
    // $index = $_POST['todoIndex'];

    // salvo la modifica nel file todo-list.json
    file_put_contents('todo-list.json', json_encode($list));
}

// aggiungo all'header della risposta che sto passando un dato JSON
header('Content-Type: application/json');

//invio l'informazione in formato json
echo json_encode($list);
