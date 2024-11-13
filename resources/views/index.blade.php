<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ricerca cap Comune</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        /* Stili per la lista dei suggerimenti */
        .suggestion-list {
            position: relative;
            z-index: 1000;
            background-color: white;
            border: 1px solid #ddd;
        }
        .suggestion-item {
            padding: 10px;
            cursor: pointer;
        }
        .suggestion-item:hover {
            background-color: #f0f0f0;
        }
        ul {
        list-style-type: none;
        }
        li {
        margin: 0px;
        padding: 10px;
        float:left;
        }
    </style>
</head>
<body>
<table><tr><td>
<div style="display:inline;">
    <h2 class="text-center">Ricerca il cap del Comune</h2>

    <!-- Campo di input per la ricerca -->
    <div>
        <input type="text" id="search-input" class="form-control" placeholder="Comune....">
        <!-- Contenitore per i suggerimenti -->
        <div id="suggestions" class="suggestion-list d-none"></div>
    </div>
</div>
<p id="risposta"></p>
</td></tr>
<tr><td>
<div style="display:inline;"><button onclick="scelta()">Verifica</button></div>
</td></tr>
</table>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Evento su input per rilevare il cambiamento nel campo di ricerca
        $('#search-input').on('input', function() {
            var inputVal = $(this).val(); // Testo digitato
            var suggestions = $('#suggestions'); // Contenitore suggerimenti

            if (inputVal.length > 0) {
                // Chiamata AJAX al file PHP per ottenere i suggerimenti
                $.getJSON('{{ '/cercacomuni' }}', { query: inputVal }, function(data) {
                    suggestions.empty(); // Svuota il contenitore dei suggerimenti

                    if (data.length > 0) {
                        suggestions.removeClass('d-none'); // Mostra il contenitore
                        // Aggiunge ogni suggerimento alla lista
                        data.forEach(function(item) {
                            const comune = item.split("|");
                            suggestions.append('<div onclick="caps(' + comune[1]+ ')" class="suggestion-item">' + comune[0] + '</div>');
                        });
                    } else {
                        suggestions.addClass('d-none'); // Nasconde se non ci sono suggerimenti
                    }
                });
            } else {
                suggestions.empty().addClass('d-none'); // Nasconde la lista se il campo è vuoto
            }
        });

        // Seleziona il suggerimento cliccato e riempie l'input
        $(document).on('click', '.suggestion-item', function() {
            $('#search-input').val($(this).text());
            $('#suggestions').empty().addClass('d-none'); // Nasconde la lista
        });

        // Nasconde i suggerimenti quando si clicca fuori dall'input
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#search-input').length) {
                $('#suggestions').empty().addClass('d-none');
            }
        });
    });

function caps(id_comune) {
$("#risposta").html("");
$.ajax({
url:"{{ '/caps' }}/" + id_comune,
type: "GET",
success:function(result){
if (result != "") $("#risposta").html(result);
},
error: function(richiesta,stato,errori){
$("#risposta").html("Errore:"+stato+" "+errori);
}
});
}

function scelta() {
    var selectedValue = $('input[name="listacap"]:checked').val();
    if (selectedValue === undefined) {
        alert('Scegli un CAP');
    } else {
        alert("Hai scelto il cap: " + selectedValue + " del Comune di " + $("#search-input").val());
    }
}
</script>

</body>
</html>
