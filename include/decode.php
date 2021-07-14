<?php
$search = isset($_GET['search']) ? $_GET['search'] : die();
if (file_exists("include/ALL.json")) {
    $result = json_decode(file_get_contents("include/ALL.json"), true);
    $keys = array();

    if ($result > 0) {
        foreach ($result[0] as $key => $val) {
            array_push($keys, $key);
            if ($key == $_GET['search']) {
                $table = $result[0][$search];
            }
        }
        if ($table == null) {

            header('Location: index.php');
        }
    } else {
        $keys[] = 'No Record Found';
    }
} else {

    $keys[] = 'No Record Found';
}
return $table;
