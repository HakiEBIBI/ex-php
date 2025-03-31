<?php

/**
 * On this page, you should display a form with two fields, one for the Name and one for the Age.
 * The server should respond to the form submission by displaying the same page with the name and age in a h1 "Toto is 20 years old".
 * If there is no submission or only one of the two fields, the h1 should display "Submit the form".
 * If the user have a name with more than 6 characters, the name must be displayed in red (only the name, not all h1).
 * If the user is more than 18 years old, you should display a list with one line per year of the age of the user.
 * The data submitted should remain displayed in the form after the submission.
 * (Your form should be semantically correct, use a label and name your fields)
 */
$age = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);
$prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_SPECIAL_CHARS);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form management</title>
</head>
<body>

<?php if (mb_strlen($prenom) > 6): ?>
    <h1><?= " <span style='color:red'>$prenom </span> is $age years old " ?></h1>
<?php elseif ($prenom && $age !== false): ?>
    <h1><?= "$prenom is $age years old"; ?></h1>
<?php else: ?>
    <h1>Submit the form</h1>
<?php endif ?>

<form action="formManagement.php" method="POST">
    <label>Name<input type="text" name="prenom" placeholder="Prenom"
                      value="<?= htmlspecialchars($prenom ?? '') ?>"></label>
    <label>Age<input type="number" name="age" placeholder="Age" value="<?= htmlspecialchars($age ?? '') ?>"></label>
    <button type="submit">submit</button>
</form>
<!-- WRITE YOUR HTML AND PHP TEMPLATING HERE -->
<?php if ($age > 18): ?>
    <ul>
        <?php for ($i = 1; $i <= $age; $i++): ?>
            <li><?= $i ?></li>
        <?php endfor; ?>
    </ul>
<?php endif; ?>
</body>
</html>