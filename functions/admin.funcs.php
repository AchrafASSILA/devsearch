<?php


function isInputsEmpty($inputs)
{
    foreach ($inputs as $input) {
        if (empty($input)) {
            return true;
        }
    }
}
function getAdmin($username)
{
    require('../db/db.php');
    if (file_exists('../db/db.php')) {
        $admin = "";
        $sql = 'SELECT * FROM admin WHERE username = :username';
        $statement = $db->prepare($sql);
        $statement->execute([":username" => $username]);
        $admin = $statement->fetch(PDO::FETCH_OBJ);
        return $admin;
    } else {
        echo "file does not exists";
    }
}
