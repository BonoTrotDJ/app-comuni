<?php
$suggestions = [];
//echo "<ul>";
    foreach($comuni as $comune) {
    array_push($suggestions, $comune->comune. "|" . $comune->id);
  //  echo "<li>" .$comune->comune. "</li>";
}
//echo "</ul>";
//print_r($suggestions);
// Array di suggerimenti (questo potrebbe essere sostituito da una query al database)
//$suggestions = ["Apple|1", "Banana|2", "Orange|3", "Mango|4", "Pineapple|5", "Grapes|6","Peach|7", "Strawberry|8", "Blueberry|9", "Watermelon|10"];
// Ottiene il parametro di ricerca inviato tramite AJAX
$query = isset($_GET['query']) ? strtolower(trim($_GET['query'])) : '';

// Filtra i suggerimenti in base al parametro di ricerca
$result = [];
if ($query !== '') {
    foreach ($suggestions as $suggestion) {
        if (strpos(strtolower($suggestion), $query) === 0) {
            $result[] = $suggestion;
        }
    }
}

// Restituisce i risultati come JSON
header('Content-Type: application/json');
echo json_encode($result);

