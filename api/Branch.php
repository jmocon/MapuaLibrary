<?php
session_start();
require_once("dataaccess/Database.php");
require_once("dataaccess/Branch.php");

$data = json_decode(file_get_contents('php://input'));
// For output (JSON)
// Must have: Success(bool), Message(any)
$output = new stdClass;

switch ($data->Function) {
  case 'getbyid': {
      $mdl = $clsBranch->GetByBranch_Id($data->Branch_Id);
      $output->Success = true;
      $output->Modal = $mdl;
      break;
    }
  case 'datatable': {
      $lst = $clsBranch->GetDataTable();
      $output->data = array();
      foreach ($lst as $mdl) {
        $action = '
              <button class="btn" title="View" data-toggle="modal" data-target="#genricModal" onclick="DisplayInfo(' . $mdl->Branch_Id . ')">
                <i class="fas fa-eye fa-fw"></i>
              </button>
              <button class="btn" title="Edit" data-toggle="modal" data-target="#genricModal" onclick="DisplayEdit(' . $mdl->Branch_Id . ')">
                <i class="fas fa-pencil-alt fa-fw"></i>
              </button>
              <button class="btn" title="Delete" data-toggle="modal" data-target="#genricModal" onclick="DisplayDelete(' . $mdl->Branch_Id . ')">
                <i class="fas fa-trash fa-fw"></i>
              </button>';
        $arr = [
          $mdl->Name,
          $mdl->Address,
          $action
        ];
        array_push($output->data, $arr);
      }
      break;
    }
  case 'add': {
      if ($clsBranch->IsExistName($data->Modal->Name)) {
        $output->Success = false;
        $output->Message = "Name already exist";
      } else {
        $userid = $clsBranch->Add($data->Modal);
        if ($userid > 0) {
          $output->Success = true;
          $output->Message = "Successfully added branch.";
        } else {
          $output->Success = false;
          $output->Message = "No branch was added.";
        }
      }
      break;
    }
  case 'update': {
      if ($clsBranch->IsExistName($data->Modal->Name, $data->Modal->Branch_Id)) {
        $output->Success = false;
        $output->Message = "Name already exist";
      } else {
        $rows_affected = $clsBranch->Update($data->Modal);
        if ($rows_affected > 0) {
          $output->Success = true;
          $output->Message = "Successfully updated branch.";
        } else {
          if ($clsBranch->IsExistBranch_Id($data->Modal->Branch_Id)) {
            $output->Success = true;
            $output->Message = "No changes were made.";
          } else {
            $output->Success = false;
            $output->Message = "No branch was updated.";
          }
        }
      }
      break;
    }
  case 'delete': {
      $rows_affected = $clsBranch->Delete($data->Branch_Id);
      if ($rows_affected > 0) {
        $output->Success = true;
        $output->Message = "Successfully deleted branch.";
      } else {
        $output->Success = false;
        $output->Message = "No branch was deleted.";
      }
      break;
    }

  default:
    $output->Success = false;
    $output->Message = "Error on function called.";
    break;
}

echo json_encode($output);
