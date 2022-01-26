<?php


function getDevelopers($db)
{

    $developers = "";
    $sql = 'SELECT * FROM developers';
    $statement = $db->prepare($sql);
    $statement->execute([]);
    $developers = $statement->fetchAll(PDO::FETCH_OBJ);
    return $developers;
}


function getDeveloper($db, $id)
{
    $developer = "";
    $sql = 'SELECT * FROM developers WHERE id = :id';
    $statement = $db->prepare($sql);
    $statement->execute([":id" => $id]);
    $developer = $statement->fetch(PDO::FETCH_OBJ);
    return $developer;
}


function getDeveloperSession($db, $username)
{
    $developer = "";
    $sql = 'SELECT * FROM developers WHERE username = :username';
    $statement = $db->prepare($sql);
    $statement->execute([":username" => $username]);
    $developer = $statement->fetch(PDO::FETCH_OBJ);
    return $developer;
}
function isInputsEmpty($inputs)
{
    foreach ($inputs as $input) {
        if (empty($input)) {
            return true;
        }
    }
}


function updateProfile($db, $first_name, $last_name, $email, $bio, $description, $github, $linkedin, $location, $image_name, $image_tmp, $image_size, $image_error)
{
    $username = $_SESSION["username"];
    $image_location = "./static/images/profiles/" . $image_name;
    if ($image_name) {
        if ($image_error === 0) {
            if ($image_size < 500000) {
                if (move_uploaded_file($image_tmp, $image_location)) {
                    $sql = "UPDATE developers SET first_name = :first_name , last_name = :last_name, email = :email,  image = :image ,github=:github,linkedin=:linkedin ,  bio = :bio, description = :description  WHERE username =:username ";
                    $statement = $db->prepare($sql);
                    $statement->execute([
                        ":first_name" => $first_name,
                        ":last_name" => $last_name,
                        ":email" => $email,
                        ":github" => $github,
                        ":linkedin" => $linkedin,
                        ":bio" => $bio,
                        ":image" => $image_location,
                        ":description" => $description,
                        ":username" => $username
                    ]);
                }
            }
        }
    }
    $sql = "UPDATE developers SET first_name = :first_name , last_name = :last_name, email = :email,  github=:github,linkedin=:linkedin ,  bio = :bio, description = :description  WHERE username =:username ";
    $statement = $db->prepare($sql);
    $statement->execute([
        ":first_name" => $first_name,
        ":last_name" => $last_name,
        ":email" => $email,
        ":github" => $github,
        ":linkedin" => $linkedin,
        ":bio" => $bio,
        ":description" => $description,
        ":username" => $username
    ]);
}


function getDeveloperSkills($db, $owner)
{
    $skills  = "";
    $sql = "SELECT * FROM skills WHERE owner = :owner ";
    $statmenet = $db->prepare($sql);
    $statmenet->execute([":owner" => $owner]);
    $skills = $statmenet->fetchAll(PDO::FETCH_OBJ);
    return $skills;
}
