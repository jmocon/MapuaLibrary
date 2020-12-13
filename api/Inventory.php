<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
session_start();
require_once("dataaccess/Database.php");
require_once("dataaccess/Inventory.php");

$data = json_decode(file_get_contents('php://input'));
// For output (JSON)
// Must have: Success(bool), Message(any)
$output = new stdClass;

switch ($data->Function) {
  case 'getbyid': {
      $mdl = $clsInventory->GetByInventory_Id($data->Inventory_Id);
      $output->Success = true;
      $output->Modal = $mdl;
      break;
    }
  case 'dropdown': {
      $output->Success = true;
      $output->Message = "Successfully retrieved inventory";
      $output->List = $clsInventory->GetDropdown();
      break;
    }
  case 'datatable': {
      $lst = $clsInventory->GetDataTable();
      $output->data = array();
      foreach ($lst as $mdl) {
        $action = '
              <button class="btn" title="View" data-toggle="modal" data-target="#genricModal" onclick="DisplayInfo(' . $mdl->Inventory_Id . ')">
                <i class="fas fa-eye fa-fw"></i>
              </button>
              <button class="btn" title="Edit" data-toggle="modal" data-target="#genricModal" onclick="DisplayEdit(' . $mdl->Inventory_Id . ')">
                <i class="fas fa-pencil-alt fa-fw"></i>
              </button>
              <button class="btn" title="Delete" data-toggle="modal" data-target="#genricModal" onclick="DisplayDelete(' . $mdl->Inventory_Id . ')">
                <i class="fas fa-trash fa-fw"></i>
              </button>';
        $arr = [
          $mdl->Inventory_Id,
          $mdl->Code,
          $mdl->Title,
          $mdl->Branch,
          $mdl->Status,
          $action
        ];
        array_push($output->data, $arr);
      }
      break;
    }
  case 'add': {
      $userid = $clsInventory->Add($data->Modal);
      if ($userid > 0) {
        $output->Success = true;
        $output->Message = "Successfully added inventory.";
      } else {
        $output->Success = false;
        $output->Message = "No inventory was added.";
      }
      break;
    }
  case 'update': {
      $rows_affected = $clsInventory->Update($data->Modal);
      if ($rows_affected > 0) {
        $output->Success = true;
        $output->Message = "Successfully updated inventory.";
      } else {
        if ($clsInventory->IsExistInventory_Id($data->Modal->Inventory_Id)) {
          $output->Success = true;
          $output->Message = "No changes were made.";
        } else {
          $output->Success = false;
          $output->Message = "No inventory was updated.";
        }
      }
      break;
    }
  case 'delete': {
      $rows_affected = $clsInventory->Delete($data->Inventory_Id);
      if ($rows_affected > 0) {
        $output->Success = true;
        $output->Message = "Successfully deleted inventory.";
      } else {
        $output->Success = false;
        $output->Message = "No inventory was deleted.";
      }
      break;
    }
  case 'statusperbranch': {
      $output->Success = true;
      $output->Message = "Successfully retrieved inventory.";
      $output->List = $clsInventory->GetStatusPerBranch($data->Book_Id);
      break;
    }

  default:
    $output->Success = false;
    $output->Message = "Error on function called.";
    break;
}

echo json_encode($output);
