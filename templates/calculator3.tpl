<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculator</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<main>
    <form method="post" class="form">
        <input type="number" name="operand1">
        <input type="number" name="operand2">
        <div class="buttons">
            <input type="submit" name="operation" value="+">
            <input type="submit" name="operation" value="-">
            <input type="submit" name="operation" value="/">
            <input type="submit" name="operation" value="*">
        </div>
    </form>
    <p>{{ANSWER}}</p>
</main>
</body>
</html>