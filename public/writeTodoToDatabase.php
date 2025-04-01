<?php

/**
 * On this page, you will create a simple form that allows user to create todos (with a name and a date).
 * The form should be submitted to this PHP page.
 * Then get the inputs from the post request with `filter_input`.
 * Then, the PHP code should verify the user inputs (minimum length, valid date...)
 * If the user input is valid, insert the new todo information in the sqlite database
 * table `todos` columns `title` and `due_date`. Then redirect the user to the list of todos.
 * If the user input is invalid, display an error to the user
 */
$title = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$duedate = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);

$db = 'sqlite:../database.db';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $PDO = new PDO($db, '', '', $options);
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $title && $duedate) {
        $GETPDO = $PDO->prepare('INSERT INTO todos (title, due_date) VALUES(:title, :due_date)');
        $GETPDO->execute([
            'title' => $title,
            'due_date' => $duedate]);
        header('Location: displayAllTodosFromDatabase.php');
        exit();
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a new todo</title>
</head>
<body>

<h1>
    Create a new todo
</h1>
<!-- WRITE YOUR HTML AND PHP TEMPLATING HERE -->
<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" placeholder="Enter a name">
    <label for="date">Date</label>
    <input type="date" name="date" id="date">
    <button type="submit">Submit</button>
</form>
</body>
</html>