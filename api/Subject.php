<?php
session_start();
require_once("dataaccess/Database.php");
require_once("dataaccess/Subject.php");

$data = json_decode(file_get_contents('php://input'));
// For output (JSON)
// Must have: Success(bool), Message(any)
$output = new stdClass;

switch ($data->Function) {
  case 'getbyid': {
      $mdl = $clsSubject->GetBySubject_Id($data->Subject_Id);
      $output->Success = true;
      $output->Modal = $mdl;
      break;
    }
  case 'dropdown': {

      $output->Success = true;
      $output->Message = "Successfully retrieved subjects";
      $output->List = $clsSubject->Get();
      break;
    }
  case 'datatable': {
      $lst = $clsSubject->Get();
      $output->data = array();
      foreach ($lst as $mdl) {
        $action = '<button class="btn" title="Edit" data-toggle="modal" data-target="#genricModal" onclick="DisplayEdit(' . $mdl->Subject_Id . ')">
                    <i class="fas fa-pencil-alt fa-fw"></i>
                  </button>
                  <button class="btn" title="Delete" data-toggle="modal" data-target="#genricModal" onclick="DisplayDelete(' . $mdl->Subject_Id . ')">
                    <i class="fas fa-trash fa-fw"></i>
                  </button>';
        $arr = [
          $mdl->Name,
          $action
        ];
        array_push($output->data, $arr);
      }
      break;
    }
  case 'add': {
      if ($clsSubject->IsExistName($data->Modal->Name)) {
        $output->Success = false;
        $output->Message = "Name already exist";
      } else {
        $userid = $clsSubject->Add($data->Modal);
        if ($userid > 0) {
          $output->Success = true;
          $output->Message = "Successfully added subject.";
        } else {
          $output->Success = false;
          $output->Message = "No subject was added.";
        }
      }
      break;
    }
  case 'update': {
      if ($clsSubject->IsExistName($data->Modal->Name, $data->Modal->Subject_Id)) {
        $output->Success = false;
        $output->Message = "Name already exist";
      } else {
        $rows_affected = $clsSubject->Update($data->Modal);
        if ($rows_affected > 0) {
          $output->Success = true;
          $output->Message = "Successfully updated subject.";
        } else {
          if ($clsSubject->IsExistSubject_Id($data->Modal->Subject_Id)) {
            $output->Success = true;
            $output->Message = "No changes were made.";
          } else {
            $output->Success = false;
            $output->Message = "No subject was updated.";
          }
        }
      }
      break;
    }
  case 'delete': {
      $rows_affected = $clsSubject->Delete($data->Subject_Id);
      if ($rows_affected > 0) {
        $output->Success = true;
        $output->Message = "Successfully deleted subject.";
      } else {
        $output->Success = false;
        $output->Message = "No subject was deleted.";
      }
      break;
    }

  default:
    $output->Success = false;
    $output->Message = "Error on function called.";
    break;
}

echo json_encode($output);
