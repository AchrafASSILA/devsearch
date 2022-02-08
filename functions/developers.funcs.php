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
    $sql = "UPDATE developers SET first_name = :first_name , last_name = :last_name, email = :email,  github=:github,linkedin=:linkedin , location=:location, bio = :bio, description = :description  WHERE username =:username ";
    $statement = $db->prepare($sql);
    $statement->execute([
        ":first_name" => $first_name,
        ":last_name" => $last_name,
        ":email" => $email,
        ":github" => $github,
        ":linkedin" => $linkedin,
        ":location" => $location,
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


function createSkill($db, $username, $id, $skill_name, $skill_desc)
{
    if ($username) {
        $sql = 'INSERT skills(name,description,owner) VALUES(:name,:description,:owner)';
        $statement = $db->prepare($sql);
        $statement->execute([":name" => $skill_name, ":description" => $skill_desc, ":owner" => $id]);
    }
}


function updateSkill($db, $username, $skill_id, $id, $skill_name, $skill_desc)
{
    if ($username) {
        $sql = 'UPDATE skills set name = :name , description=:description  WHERE owner = :owner and id=:skill_id';
        $statement = $db->prepare($sql);
        $statement->execute([":name" => $skill_name, ":description" => $skill_desc, ":owner" => $id, ":skill_id" => $skill_id]);
    }
}


function  getSkill($db, $username, $id)
{
    if ($username) {
        $skill = "";
        $sql = 'SELECT name , description FROM skills WHERE id = :id ';
        $statement = $db->prepare($sql);
        $statement->execute([":id" => $id]);
        $skill = $statement->fetch(PDO::FETCH_OBJ);
        return $skill;
    }
}

function getMessages($db, $recipient)
{
    $messages = '';
    $sql = 'SELECT * FROM messages WHERE recipient = :recipient';
    $statement = $db->prepare($sql);
    $statement->execute([":recipient" => $recipient]);
    $messages = $statement->fetchAll(PDO::FETCH_OBJ);
    return $messages;
}
function getMessage($db, $id)
{
    $message = '';
    $sql = 'SELECT * FROM messages WHERE id = :id';
    $statement = $db->prepare($sql);
    $statement->execute([":id" => $id]);
    $message = $statement->fetch(PDO::FETCH_OBJ);
    return $message;
}




function updateMessage($db, $id)
{

    $sql = 'UPDATE messages SET is_read = ? WHERE id = ?';
    $statement = $db->prepare($sql);
    $statement->execute([true, $id]);
}

function getCountUnreadMessages($db, $recipient)
{
    $count = '';
    $sql = 'SELECT count(*) cam FROM messages WHERE is_read = ? AND recipient = ?';
    $statement = $db->prepare($sql);
    $statement->execute([0, $recipient]);
    $count = $statement->fetch(PDO::FETCH_OBJ);
    return $count;
}

function createMessage($db, $sender, $recipient, $subject, $message, $name, $email)
{
    $created = date('y/m/d');
    $sql = 'INSERT INTO messages(name,email,subject,body,sender,recipient,created,is_read) VALUES(?,?,?,?,?,?,?,?)';
    $statement = $db->prepare($sql);
    $statement->execute([$name, $email, $subject, $message, $sender, $recipient, $created, 0]);
}
