
<?php

// save note to user
if(isset($_POST['submit']) && $_POST['submit'] === 'Add' && !empty($_POST['note'])) {

    $userid = $_SESSION['userid'];
    $note = $_POST['note'];

    $stmt = $con->prepare("INSERT INTO notes(userid,note) VALUES(:userid, :note)");
    $stmt->bindParam(":userid", $userid);
    $stmt->bindParam(":note", $note);
    $stmt->execute();
}

if(isset($_POST['delete'])) {
    $noteid = $_POST['delete'];

    $stmt = $con->prepare("DELETE FROM notes WHERE id=:note_id");
    $stmt->bindParam(":note_id", $noteid);
    $stmt->execute();
}
?>

<form action="index.php" method="POST">
    <?php
        $stmt = $con->prepare("SELECT * FROM notes WHERE userid=:userid");
        $stmt->bindParam(":userid", $_SESSION['userid']);
        $stmt->execute();

        $notes = $stmt->fetchALL();

        foreach($notes as $note) {
            ?>
                <label for="delete" >
                    <?php echo $note['note'] ?>
                </label>

                <button 
                    name="delete" 
                    value="<?php echo $note['id'] ?>"
                >
                    Delete
                </button>

                <br> 
            <?php
        }
    ?>

    <input name="note" type="text" placeholder="Notitz">
    <input name="submit" type="submit" value="Add">

    <br>

    <input name="submit" type="submit" value="Logout">
</form>