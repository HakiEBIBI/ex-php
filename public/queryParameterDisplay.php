<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>URL query parameters</title>
</head>
<body>
<h1><?php
    /**
     * Get the values from the GET parameters with filter_input function
     */
    $input = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $input2 = filter_input(INPUT_GET, 'age', FILTER_SANITIZE_SPECIAL_CHARS);
    echo $input . ' is ', $input2, ' years old';
    ?></h1>

<!-- Display parameters here in a h1 tag -->

<!-- Display message in list element in case of missing parameters -->

</body>
</html>