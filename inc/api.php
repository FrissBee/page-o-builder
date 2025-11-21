<?php

require_once __DIR__ . '/db_connection.inc.php';

$received_data = json_decode(file_get_contents("php://input"));

if ($received_data->action === 'get-content-editor') {
  $id = $received_data->id;

  $query = "SELECT id, contentEditor, `name` FROM contents WHERE id = :id;";
  $data = [ 'id' => $id ];
  $statement = $db->prepare($query);
  $statement->execute($data);
  $result = $statement->fetch();

  echo json_encode($result);
  $db = null;

}

else if ($received_data->action === 'insert-data-from-page-builder') {
  $data = [
    "contentEditor" => $received_data->contentEditor,
    "contentPage" => $received_data->contentPage,
    "name" => $received_data->name,
  ];

  $query = "INSERT INTO contents SET contentEditor = :contentEditor, contentPage = :contentPage, name = :name;";
  $statement = $db->prepare($query);
  $statement->execute($data);
  $statement->fetch();
  $id =  $db->lastInsertId();

  echo json_encode($id);
  $db = null;
}

else if ($received_data->action === 'save-data-from-page-builder') {
  $id = $received_data->id;
  $data = [
    "contentEditor" => $received_data->contentEditor,
    "contentPage" => $received_data->contentPage,
    "name" => $received_data->name,
  ];

  $query = "UPDATE contents SET contentEditor = :contentEditor, contentPage = :contentPage, name = :name WHERE id = $id;";
  $statement = $db->prepare($query);
  $statement->execute($data);
  $result = $statement->fetch();

  echo json_encode($result);
  $db = null;
}
