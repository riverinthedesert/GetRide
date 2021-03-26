<html>

<h1 class="text-center">Mes notifications</h1>

<script>
    $(document).ready(function() {
        // Delete 
        $('.delete').click(function() {
            var el = this;

            var deleteid = $(this).data('id'); // Par quoi on identifie la notif
            var confirmalert = confirm("Etes vous sûr ?");
            if (confirmalert == true) {
                // AJAX Request
                $.ajax({
                    url: 'notification/delete',
                    type: 'GET',
                    data: {
                        message: deleteid
                    },
                    success: function(response) {

                        if (response == 1) { // Enleve le HTML
                            $(el).closest('div').fadeOut(200, function() {
                                $(this).remove();
                            });
                        } else {
                            alert('Invalid message.');
                        }

                    }
                });
            }

        });

    });
</script>

<div class="list-group">

    <?php

    foreach ($not as $item) {

        if ($item["estLue"] == "0") { // lu 
            echo '<div id="' . $item["message"] . '" class="list-group-item list-group-item-action ">';
            echo $item["message"];
        } else { // Pas encore lu
            echo '<div id="' . $item["message"] . '" class="list-group-item list-group-item-action list-group-item-info ">';
            echo $item["message"]."<p style='margin-left:1em;' class='glyphicon glyphicon-eye-open'></p>";
        }
        echo "<a data-id='" . $item["message"] . "'style='text-decoration:none;'class='glyphicon glyphicon-remove float-right delete'></a>";
        echo '</br>';

        if ($item["necessiteReponse"] == "1") { // A voir plus tard 
            echo '<a class="btn btn-primary" href="#" role="button">Accepter</a> ';
            echo '<a class="btn btn-danger" href="#" role="button">Refuser</a> ';
        }
        echo '</div>';
    }

    ?>

</div>

</html>