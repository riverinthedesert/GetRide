<html>

<div class="list-group">

    <?php
    
        foreach($not as $item){
            echo '<a id="'.$item["message"].'" href="#" class="list-group-item list-group-item-action">'.$item["message"].'</a>';
        }

    ?>

</div>

</html>