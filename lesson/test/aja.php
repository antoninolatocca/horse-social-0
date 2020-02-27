$( document ).ready(function() { /*definisce l'elenco delle funzioni attive dal caricamento della pagina*/
        $('select').on('change', function (e) { /*definisce l'evento change su un oggetto select, puoi definire l'oggetto anche tramite id o classe*/
                $.ajax({ /*inizio chiamata ajax*/
                        url:"index.php",  /*url al php*/
                        type: "GET", /*tipo di chiamata*/
                        data: { name:value}, /*parametri da inviare a php --> nome:valore, nome1:valore1, etc*/
                        success:function(result){
                                /* qui metti quel che deve fare in base al risultato result*/
                        },
                        error: function(request,status,error){
                             /* qui metti quel che deve fare in caso di errore*/
                        }
                });
        });
});