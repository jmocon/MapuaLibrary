<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
session_start();
require_once("dataaccess/Database.php");
require_once("dataaccess/EJournal.php");

$data = json_decode(file_get_contents('php://input'));
// For output (JSON)
// Must have: Success(bool), Message(any)
$output = new stdClass;

switch ($data->Function) {
  case 'getbyid': {
      $mdl = $clsEJournal->GetByEJournal_Id($data->EJournal_Id);
      $output->Success = true;
      $output->Modal = $mdl;
      break;
    }
  case 'datatable': {
      $lst = $clsEJournal->GetDataTable();
      $output->data = array();
      foreach ($lst as $mdl) {
        $action = '
              <button class="btn" title="View" data-toggle="modal" data-target="#genricModal" onclick="DisplayInfo(' . $mdl->EJournal_Id . ')">
                <i class="fas fa-eye fa-fw"></i>
              </button>
              <button class="btn" title="Edit" data-toggle="modal" data-target="#genricModal" onclick="DisplayEdit(' . $mdl->EJournal_Id . ')">
                <i class="fas fa-pencil-alt fa-fw"></i>
              </button>
              <button class="btn" title="Delete" data-toggle="modal" data-target="#genricModal" onclick="DisplayDelete(' . $mdl->EJournal_Id . ')">
                <i class="fas fa-trash fa-fw"></i>
              </button>';
        $arr = [
          $mdl->Name,
          $mdl->Link,
          $action
        ];
        array_push($output->data, $arr);
      }
      break;
    }
  case 'add': {
      if ($clsEJournal->IsExistLink($data->Modal->Link)) {
        $output->Success = false;
        $output->Message = "Link already exist";
      } else {
        $userid = $clsEJournal->Add($data->Modal);
        if ($userid > 0) {
          $output->Success = true;
          $output->Message = "Successfully added e-journal.";
        } else {
          $output->Success = false;
          $output->Message = "No e-journal was added.";
        }
      }
      break;
    }
  case 'update': {
      if ($clsEJournal->IsExistLink($data->Modal->Link, $data->Modal->EJournal_Id)) {
        $output->Success = false;
        $output->Message = "Link already exist";
      } else {
        $rows_affected = $clsEJournal->Update($data->Modal);
        if ($rows_affected > 0) {
          $output->Success = true;
          $output->Message = "Successfully updated e-journal.";
        } else {
          if ($clsEJournal->IsExistEJournal_Id($data->Modal->EJournal_Id)) {
            $output->Success = true;
            $output->Message = "No changes were made.";
          } else {
            $output->Success = false;
            $output->Message = "No e-journal was updated.";
          }
        }
      }
      break;
    }
  case 'delete': {
      $rows_affected = $clsEJournal->Delete($data->EJournal_Id);
      if ($rows_affected > 0) {
        $output->Success = true;
        $output->Message = "Successfully deleted e-journal.";
      } else {
        $output->Success = false;
        $output->Message = "No e-journal was deleted.";
      }
      break;
    }
  case 'search': {
      $output->Success = true;
      $output->Message = "Successfully retrieved ejournals";
      $k = isset($data->Keyword) ? $data->Keyword : '';
      $l = isset($data->Limit) ? $data->Limit : 5;
      $o = isset($data->Offset) ? $data->Offset : 0;
      if ($k == "") {
        $output->List = $clsEJournal->Search($k, $l, $o);
      } else {
        $output->List = $clsEJournal->Search($k, $l, $o);
      }
      break;
    }

  default:
    $output->Success = false;
    $output->Message = "Error on function called.";
    break;
}

echo json_encode($output);
