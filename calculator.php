<html>
    <body>
        <form action="calculator.php" method="GET">
            <input type="number" size="5" name=numA> 
            <input type="submit" value="Add" name="btn">
            <input type="submit" value="Multiply" name="btn">
            <input type="number" size="5" name=numB>
        </form>

        <?php
                
            // isset checks the parameters of the link in the Browser
            if(isset($_GET['btn'])) {

                // check validity
                if(!empty($_GET['numA']) and !empty($_GET['numB'])) {

                    // switch case
                    switch($_GET['btn']) {
                        case 'Multiply';
                            echo "answerer = " . $_GET['numA'] * $_GET['numB'];
                            break;
                        case 'Add';
                            echo "answerer = " . $_GET['numA'] + $_GET['numB'];
                            break;
                    }
                    
                } else {
                    echo "Form not Valid.";
                }
            } 
        ?>
    </body>
</html>
