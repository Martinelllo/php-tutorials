<!-- ling is http://localhost/tutorials/empedded_php.php?color=blue -->

<html>
    <body>

        <?php
            $color = $_GET['color'];
        ?>

        <b><font color="<?php echo $color ?>"> Welcome </font></b> <br>

    </body>
</html>