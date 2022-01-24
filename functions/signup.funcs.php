<?php



function isInputsEmpty($inputs)
{
    foreach ($inputs as $input) {
        if (empty($input)) {
            return true;
        }
    }
}

function invalidUsername($username)
{
    if (!(preg_match("/^[a-zA-Z0-9_-]*$/", $username))) {
        return true;
    }
}
function invalidEmail($email)
{
    if ((filter_var($email, FILTER_VALIDATE_EMAIL))) {
        return false;
    } else {
        return true;
    }
}
function passwrodNotMatch($password, $confirm_password)
{
    if ($password !== $confirm_password) {
        return true;
    }
}


function usernameExists($db, $username)
{
    $admin = "";
    $sql = 'SELECT username FROM developers WHERE username = :username';
    $statement = $db->prepare($sql);
    $statement->execute([":username" => $username]);
    $admin = $statement->fetch(PDO::FETCH_OBJ);
    if ($admin) {
        return $admin;
    }
}


function createUser($db, $username, $first_name, $email, $password)
{
    $sql = 'INSERT INTO developers(username,first_name,email,password) VALUES(:username,:first_name,:email,:password)';
    $statement = $db->prepare($sql);
    $statement->execute([":username" => $username, ":email" => $email, ":first_name" => $first_name, ":password" => password_hash($password, PASSWORD_DEFAULT)]);
    header("Location: /php_devsearch/login.php");
}
