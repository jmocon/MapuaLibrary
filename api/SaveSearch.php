<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
session_start();
require_once("dataaccess/Database.php");
require_once("dataaccess/SaveSearch.php");

$data = json_decode(file_get_contents('php://input'));
// For output (JSON)
// Must have: Success(bool), Message(any)
$output = new stdClass;

switch ($data->Function) {
  case 'add': {
      $isexist = $clsSaveSearch->IsExistBook_Id($data->Modal->Book_Id, $data->Modal->User_Id);
      if ($isexist) {
        $output->Success = false;
        $output->Message = "Already Saved";
      } else {
        $id = $clsSaveSearch->Add($data->Modal);
        if ($id > 0) {
          $output->Success = true;
          $output->Message = "Successfully added book.";
        } else {
          $output->Success = false;
          $output->Message = "No book was added.";
        }
      }
      break;
    }
  case 'delete': {
      $rows_affected = $clsSaveSearch->Delete($data->Book_Id, $data->User_Id);
      if ($rows_affected > 0) {
        $output->Success = true;
        $output->Message = "Successfully removed book.";
      } else {
        $output->Success = false;
        $output->Message = "No saved book was removed.";
      }
      break;
    }
  case 'issaved': {
      $isexist = $clsSaveSearch->IsExistBook_Id($data->Book_Id, $data->User_Id);
      $output->Success = true;
      if ($isexist) {
        $output->Saved = true;
        $output->Message = "Book already saved.";
      } else {
        $output->Saved = false;
        $output->Message = "Book is not yet saved.";
      }
      break;
    }
  case 'getbookbyuserid': {
      $output->Success = true;
      $output->Message = "Successfully retrieved books";
      $userId = isset($data->User_Id) ? $data->User_Id : '';
      $output->List = $clsSaveSearch->GetBookByUser_Id($userId);
      break;
    }

  default:
    $output->Success = false;
    $output->Message = "Error on function called.";
    break;
}

echo json_encode($output);
