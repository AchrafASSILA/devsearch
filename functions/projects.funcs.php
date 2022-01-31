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
function getLastProjectId($db)
{
    $project = "";
    $sql = 'SELECT id FROM projects ORDER BY id DESC LIMIT 1;';
    $statement = $db->prepare($sql);
    $statement->execute([]);
    $project = $statement->fetch(PDO::FETCH_OBJ);
    return $project->id;
}
function getDeveloperProjects($db, $owner)
{
    $projects = "";
    $sql = "SELECT * FROM projects WHERE owner = :owner";
    $statement = $db->prepare($sql);
    $statement->execute([":owner" => $owner]);
    $projects = $statement->fetchAll(PDO::FETCH_OBJ);
    return $projects;
}


function createProject($db, $owner, $username, $title, $description, $demo_link, $source_link, $image_name, $image_tmp, $image_size, $image_error, $image_location)
{

    if ($image_name) {
        if ($image_error === 0) {
            if ($image_size < 5000000) {
                if (move_uploaded_file($image_tmp, $image_location)) {
                    $sql = 'INSERT INTO projects(title,description,image,demo_link,source_code,created,owner) VALUES(:title,:description,:image,:demo_link,:source_code,:created,:owner)';
                    $statement = $db->prepare($sql);
                    $statement->execute([":title" => $title, ":description" => $description, ":image" => $image_location, ":demo_link" => $demo_link, ":source_code" => $source_link, ":created" => date('y-m-d'), ":owner" => $owner]);
                }
            }
        }
    } else {

        $sql = 'INSERT INTO projects(title,description,demo_link,source_code,created,owner) VALUES(:title,:description,:demo_link,:source_code,:created,:owner)';
        $statement = $db->prepare($sql);
        $statement->execute([":title" => $title, ":description" => $description, ":demo_link" => $demo_link, ":source_code" => $source_link, ":created" => date('y-m-d'), ":owner" => $owner]);
    }
}
function createProjectTags($db, $username, $owner, $tags)
{
    if ($username) {
        foreach ($tags as $tag) {
            $sql = 'INSERT INTO projecttags(project,tag) VALUES(:project,:tag)';
            $statement = $db->prepare($sql);
            $statement->execute([":project" => $owner, ":tag" => $tag]);
        }
    }
}
function updateProject($db, $owner, $id, $username, $title, $description, $demo_link, $source_link, $image_name, $image_tmp, $image_size, $image_error, $image_location)
{
    if ($image_name) {
        if ($image_error === 0) {
            if ($image_size < 5000000) {
                if (move_uploaded_file($image_tmp, $image_location)) {
                    $sql = 'UPDATE projects SET title = :title,description =:description  ,image =:image ,demo_link =:demo_link ,source_code =:source_code WHERE id = :id and owner = :owner';
                    $statement = $db->prepare($sql);
                    $statement->execute([":title" => $title, ":description" => $description, ":image" => $image_location, ":demo_link" => $demo_link, ":source_code" => $source_link, ":id" => $id, ":owner" => $owner]);
                }
            }
        }
    } else {

        $sql = 'UPDATE projects SET title = :title,description =:description   ,demo_link =:demo_link ,source_code =:source_code WHERE id = :id and owner = :owner';
        $statement = $db->prepare($sql);
        $statement->execute([":title" => $title, ":description" => $description, ":demo_link" => $demo_link, ":source_code" => $source_link, ":id" => $id, ":owner" => $owner]);
    }
}


function getProjectTags($db, $id)
{

    $tags = "";
    $sql = "SELECT name FROM tags inner join projecttags on tag = tags.id WHERE project = :project";
    $statement = $db->prepare($sql);
    $statement->execute([":project" => $id]);
    $tags = $statement->fetchAll(PDO::FETCH_OBJ);
    return $tags;
}


function getTags($db)
{

    $tags = "";
    $sql = "SELECT * FROM tags";
    $statement = $db->prepare($sql);
    $statement->execute([]);
    $tags = $statement->fetchAll(PDO::FETCH_OBJ);
    return $tags;
}

function updateProjectTags($db, $username, $owner, $tags)
{
    if ($username) {
        foreach ($tags as $tag) {
            $sql = 'INSERT INTO projecttags(project,tag) VALUES(:project,:tag)';
            $statement = $db->prepare($sql);
            $statement->execute([":project" => $owner, ":tag" => $tag]);
        }
    }
}
