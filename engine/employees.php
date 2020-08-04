<?php
function activeEmployees()
{
    return ["title" => "Список сотрудников","userlist" => getEmployees()];
}

function getEmployees()
{
//    $sql = 'SELECT * FROM employee';
//    $list = getAssocResult($sql);
    $list = selectDB('employees');
    return $list;
}