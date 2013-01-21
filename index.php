<?php
/**
 * Delete Arena Team for WoW
 *
 * Copyright (c) 2013 cornernote, Brett O'Donnell <cornernote@gmail.com>
 */

// the user posted data
if ($_POST) {
    // build the query then run it
    $query = "DELETE FROM some_table WHERE some_condition_is_true";
    if ($_ENV['DB']->Query($_ENV['config']['dbconn'], $query)) {
        // success!
        header('Location: ./?success=' . $_POST['team']);
    }
    else {
        // error!
        header('Location: ./?error=' . $_POST['team']);
    }
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Arena Team</title>
    <meta charset="utf-8">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
</head>

<body>
<div class="container">

    <h1>Delete Arena Team</h1>

    <?php
    if (!empty($_GET['success'])) {
        ?>
        <div class="alert alert-success">
            <strong>Success!</strong> Arena Team '<?php echo $_GET['success'] ?>' has been deleted!
        </div>
    <?php
    }
    if (!empty($_GET['error'])) {
        ?>
        <div class="alert alert-error">
            <strong>Error!</strong> Arena Team '<?php echo $_GET['success'] ?>' could not be deleted!
        </div>
    <?php
    }
    ?>

    <form method="POST" class="form-horizontal">

        <div class="control-group">
            <label class="control-label">Realm</label>

            <div class="controls">
                <select name="realm">
                    <option></option>
                    <?php
                    $select = isset($_POST['realm']) ? $_POST['realm'] : '';
                    foreach (array('Realm1', 'Realm2', 'Realm3') as $option) {
                        $selected = $select == $option ? ' selected="selected"' : '';
                        echo '<option value="' . $option . '"' . $selected . '>' . $option . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Bracket</label>

            <div class="controls">
                <select name="bracket">
                    <option></option>
                    <?php
                    $select = isset($_POST['bracket']) ? $_POST['bracket'] : '';
                    foreach (array('2v2', '3v3', '5v5') as $option) {
                        $selected = ($select == $option) ? ' selected="selected"' : '';
                        echo '<option value="' . $option . '"' . $selected . '>' . $option . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Team</label>

            <div class="controls">
                <input type="text" name="team" value="<?php echo isset($_POST['team']) ? $_POST['team'] : ''; ?>">
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn">Proceed</button>
        </div>

    </form>


</div>

</body>
</html>
