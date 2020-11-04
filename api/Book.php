<?php
session_start();
require_once("dataaccess/Database.php");
require_once("dataaccess/Book.php");

$data = json_decode(file_get_contents('php://input'));
// For output (JSON)
// Must have: Success(bool), Message(any)
$output = new stdClass;

switch ($data->Function) {
  case 'getbyid': {
      $mdl = $clsBook->GetByBook_Id($data->Book_Id);
      $output->Success = true;
      $output->Modal = $mdl;
      break;
    }
  case 'dropdown': {

      $output->Success = true;
      $output->Message = "Successfully retrieved book";
      $output->List = $clsBook->GetDropdown();
      break;
    }
  case 'datatable': {
      $lst = $clsBook->GetDataTable();
      $output->data = array();
      foreach ($lst as $mdl) {
        $action = '
              <button class="btn" title="View" data-toggle="modal" data-target="#genricModal" onclick="DisplayInfo(' . $mdl->Book_Id . ')">
                <i class="fas fa-eye fa-fw"></i>
              </button>
              <button class="btn" title="Edit" data-toggle="modal" data-target="#genricModal" onclick="DisplayEdit(' . $mdl->Book_Id . ')">
                <i class="fas fa-pencil-alt fa-fw"></i>
              </button>
              <button class="btn" title="Delete" data-toggle="modal" data-target="#genricModal" onclick="DisplayDelete(' . $mdl->Book_Id . ')">
                <i class="fas fa-trash fa-fw"></i>
              </button>';
        $arr = [
          $mdl->Code,
          $mdl->Title,
          $mdl->Author,
          $mdl->DatePublished,
          $action
        ];
        array_push($output->data, $arr);
      }
      break;
    }
  case 'add': {
      if ($clsBook->IsExistCode($data->Modal->Code)) {
        $output->Success = false;
        $output->Message = "Code already exist";
      } else {
        $userid = $clsBook->Add($data->Modal);
        if ($userid > 0) {
          $output->Success = true;
          $output->Message = "Successfully added book.";
        } else {
          $output->Success = false;
          $output->Message = "No book was added.";
        }
      }
      break;
    }
  case 'update': {
      if ($clsBook->IsExistCode($data->Modal->Code, $data->Modal->Book_Id)) {
        $output->Success = false;
        $output->Message = "Code already exist";
      } else {
        $rows_affected = $clsBook->Update($data->Modal);
        if ($rows_affected > 0) {
          $output->Success = true;
          $output->Message = "Successfully updated book.";
        } else {
          if ($clsBook->IsExistBook_Id($data->Modal->Book_Id)) {
            $output->Success = true;
            $output->Message = "No changes were made.";
          } else {
            $output->Success = false;
            $output->Message = "No book was updated.";
          }
        }
      }
      break;
    }
  case 'delete': {
      $rows_affected = $clsBook->Delete($data->Book_Id);
      if ($rows_affected > 0) {
        $output->Success = true;
        $output->Message = "Successfully deleted book.";
      } else {
        $output->Success = false;
        $output->Message = "No book was deleted.";
      }
      break;
    }

  default:
    $output->Success = false;
    $output->Message = "Error on function called.";
    break;
}

echo json_encode($output);
