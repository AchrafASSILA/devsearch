<?php



function getProjects($db)
{
    $projects = "";
    $sql = 'SELECT * FROM projects';
    $statement = $db->prepare($sql);
    $statement->execute([]);
    $projects = $statement->fetchAll(PDO::FETCH_OBJ);
    return $projects;
}


function getDeveloperName($db, $id)
{
    $developer = "";
    $sql = 'SELECT first_name , last_name FROM developers WHERE id = :id';
    $statement = $db->prepare($sql);
    $statement->execute([":id" => $id]);
    $developer = $statement->fetch(PDO::FETCH_OBJ);
    return $developer;
}


function getProject($db, $id)
{
    $project = "";
    $sql = 'SELECT * FROM projects WHERE id = :id';
    $statement = $db->prepare($sql);
    $statement->execute([":id" => $id]);
    $project = $statement->fetch(PDO::FETCH_OBJ);
    return $project;
}
