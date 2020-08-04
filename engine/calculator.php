<?php
function activeCalculator1() {
    $vars = [];
    if (isset($_POST["operand1"]) && isset($_POST["operand2"]) && ($_POST["operand1"] !== "" || $_POST["operand2"] !== "")) {
        $vars["answer"] = getAnswer($_POST["operand1"], $_POST["operand2"], $_POST["operation"]);
    } else {
        $vars["answer"] = "Произведите операцию";
    }
    return $vars;
}

function activeCalculator2() {
    $vars = [];
    if (isset($_POST["operand1"]) && isset($_POST["operand2"]) && ($_POST["operand1"] !== "" || $_POST["operand2"] !== "")) {
        $vars["answer"] = getAnswer($_POST["operand1"], $_POST["operand2"], $_POST["operation"]);
    } else {
        $vars["answer"] = "Произведите операцию";
    }
    return $vars;
}

function getAnswer($operand1, $operand2, $operation)
{
    if ($operand1 == "") {
        $operand1 = 0.0;
    } else {
        $operand1 = (float)$operand1;
    }

    if ($operand2 == "") {
        $operand2 = 0.0;
    } else {
        $operand2 = (float)$operand2;
    }

    $result = 0.0;
    switch ($operation) {
        case '+':
            $result = $operand1 + $operand2;
            break;
        case '-':
            $result = $operand1 - $operand2;
            break;
        case '/':
            if ($operand2 === 0.0) {
                $result = "Ой-ой-ой, на нуль делить нельзя!";
            } else {
                $result = $operand1 / $operand2;
            }
            break;
        case '*':
            $result = $operand1 * $operand2;
            break;
    }

    return $result;
}