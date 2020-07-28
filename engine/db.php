<?php
function insertDB($db_table, $db_attribute_name, $db_attribute_value) {
    $result = false;
    $db = mysqli_connect(HOST, USER_DB, PASS_DB, DB);
    $db_attribute_name_string = implode(', ', $db_attribute_name);
    $db_attribute_value_string = implode("', '", $db_attribute_value);
    $query = "insert into $db_table($db_attribute_name_string) values ('$db_attribute_value_string')";
    if(mysqli_query($db, $query)) {
        $result = true;
    }
    mysqli_close($db);
    return $result;
}

function selectDB($db_table, $db_attribute = ['*']) {
    $db = mysqli_connect(HOST, USER_DB, PASS_DB, DB);
    $db_attribute_string = implode(',', $db_attribute);

    $query = "select $db_attribute_string from $db_table";
    $result = mysqli_query($db, $query);
    $array_result = [];
    while($row = mysqli_fetch_assoc($result)) {
        $array_result[] = $row;
    }
    mysqli_close($db);
    return $array_result;
}

function updateDB($db_table, $name_column, $id_row, $value) {
    $result = false;
    $db = mysqli_connect(HOST, USER_DB, PASS_DB, DB);
    $query = "update $db_table set $name_column='$value' where id_$db_table=$id_row";
    mysqli_query($db, $query);
    mysqli_close($db);
    return $result;
}

function setGalleryTable() {
    $images = scandir("./img", true);
    $rel = "/^([a-zA-Z0-9]|\-|\_){0,50}\.(jp?g|svg|png)$/";
    $images = preg_grep($rel, $images);
    foreach($images as $value) {
        $size = filesize("./img/" . $value);
        insertDB("gallery",
            ['name_gallery', 'dir_gallery', 'views_gallery', 'size_gallery'],
            [$value, IMG_DIR, 0, $size]
        );
        echo $value . "<br>";
    }
}

function getAssocResult($sql){

	$db = mysqli_connect(HOST, USER_DB, PASS_DB, DB);

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

	$result = mysqli_query($db, $sql);

	$array_result = array();
	while($row = mysqli_fetch_assoc($result)) {
		$array_result[] = $row;
	}

	mysqli_close($db);

	return $array_result;
}

function executeQuery($sql){
    $db = mysqli_connect(HOST, USER_DB, PASS_DB, DB);
	$result = mysqli_query($db, $sql);
    mysqli_close($db);
	return $result;
}
?>
