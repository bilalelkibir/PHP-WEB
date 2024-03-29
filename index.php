<?php


$operator = null;
$errorFirstNum = null;
$errorSecNum = null;
$selectedOperator = null;
$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_num = $_POST['first_num'];
    $second_num = $_POST['second_num'];
    $operator = $_POST['operator'];

    $valResult = true;
    if (!is_numeric($first_num)) {
        $errorFirstNum = "number 1 is not a number";
        $valResult = false;
    }

    if (!is_numeric($second_num)) {
        $errorSecNum = "number 2 is not a number";
        $valResult = false;
    }

    if (empty($errorSecNum) && $operator == '/' && $second_num == 0) {
        $errorSecNum = "division by zero not allowed";
        $valResult = false;
    }
    if (empty($errorSecNum) && $operator == '%' && $second_num == 0) {
        $errorSecNum = "division by zero not allowed";
        $valResult = false;
    }


    if ($valResult) {
        global $selectedOperator, $result;

        switch ($operator) {
            case "+":
                $result = "<b>Result:</b>" . $first_num + $second_num;
                $selectedOperator = "<b>Operator:</b> +";
                break;
            case "-":
                $result = "<b>Result:</b>" . $first_num - $second_num;
                $selectedOperator = "<b>Operator:</b> -";
                break;
            case "x":
                $result = "<b>Result:</b>" . $first_num * $second_num;
                $selectedOperator = "<b>Operator:</b> x";
                break;
            case "/":
                $result = "<b>Result:</b>" . $first_num / $second_num;
                $selectedOperator = "<b>Operator:</b> /";
                break;
            case "%":
                $result = "<b>Result:</b>" . fmod($first_num, $second_num);
                $selectedOperator = "<b>Operator:</b> %";
                break;
        }
    }
}


?>

<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">

<head>
    <title>Calculator</title>
</head>

<body>
    <div id="page-wrap">
        <h1>Calculator</h1>
        <form action="" method="post" id="quiz-form">
            <p>
                <b>number 1:</b> <input type="text" name="first_num" id="first_num" required="required" value="<?php echo isset($first_num) ? $first_num : ''; ?>">
                <span class="error">* <?php echo $errorFirstNum; ?></span>
            </p>
            <p>
                <b>number 2:</b> <input type="text" name="second_num" id="second_num" required="required" value="<?php echo isset($second_num) ? $second_num : ''; ?>">
                <span class="error">* <?php echo $errorSecNum; ?></span>
            </p>
            <p><?php echo $selectedOperator; ?></p>
            <p><?php echo $result; ?> </p>



            <input type="submit" name="operator" value="+">
            <input type="submit" name="operator" value="-">
            <input type="submit" name="operator" value="x">
            <input type="submit" name="operator" value="/">
            <input type="submit" name="operator" value="%">
        </form>
    </div>
</body>

</html>
