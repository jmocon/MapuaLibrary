<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
session_start();
require_once("dataaccess/Database.php");
require_once("dataaccess/Loan.php");

$data = json_decode(file_get_contents('php://input'));
// For output (JSON)
// Must have: Success(bool), Message(any)
$output = new stdClass;

switch ($data->Function) {
  case 'getbyid': {
      $mdl = $clsLoan->GetByLoan_Id($data->Loan_Id);
      $output->Success = true;
      $output->Modal = $mdl;
      break;
    }
  case 'datatable': {
      $lst = $clsLoan->GetDataTable();
      $output->data = array();
      foreach ($lst as $mdl) {
        $action = '
              <button class="btn" title="View" data-toggle="modal" data-target="#genricModal" onclick="DisplayInfo(' . $mdl->Loan_Id . ')">
                <i class="fas fa-eye fa-fw"></i>
              </button>
              <button class="btn" title="Edit" data-toggle="modal" data-target="#genricModal" onclick="DisplayEdit(' . $mdl->Loan_Id . ')">
                <i class="fas fa-pencil-alt fa-fw"></i>
              </button>
              <button class="btn" title="Delete" data-toggle="modal" data-target="#genricModal" onclick="DisplayDelete(' . $mdl->Loan_Id . ')">
                <i class="fas fa-trash fa-fw"></i>
              </button>';
        if ($mdl->Status == 0) {
          $mdl->Status = '<span class="badge badge-secondary">For Approval</span>';
        } else if ($mdl->Status == 1) {
          $mdl->Status = '<span class="badge badge-warning">For Claiming</span>';
        } else if ($mdl->Status == 2) {
          $mdl->Status = '<span class="badge badge-info">On Hand</span>';
        } else if ($mdl->Status == 3) {
          $mdl->Status = '<span class="badge badge-success">Returned</span>';
        } else {
          $mdl->Status = '<span class="badge badge-dark">Unknown</span>';
        }
        $arr = [
          $mdl->User,
          $mdl->Book,
          $mdl->Branch,
          $mdl->Status,
          $mdl->Date_Loan,
          $mdl->Date_Due,
          $mdl->Date_Return,
          $action
        ];
        array_push($output->data, $arr);
      }
      break;
    }
  case 'add': {

      $id = $clsLoan->Add($data->Modal);
      if ($id > 0) {
        $output->Success = true;
        $output->Message = "Successfully added loan.";
      } else {
        $output->Success = false;
        $output->Message = "No loan was added.";
      }
      break;
    }
  case 'addbybranch': {
      require_once("dataaccess/Inventory.php");
      $lstInventory = $clsInventory->GetAvailableBook($data->Book_Id, $data->Branch_Id);

      if (count($lstInventory) > 0) {
        $mdlInventory = $lstInventory[0];

        $mdlLoan = new stdClass;
        $mdlLoan->User_Id = $data->User_Id;
        $mdlLoan->Inventory_Id = $mdlInventory->Inventory_Id;
        $mdlLoan->Date_Loan = '';
        $mdlLoan->Date_Due = '';
        $mdlLoan->Date_Return = '';
        $mdlLoan->PenaltyFee = 0;
        $mdlLoan->Status = 0;

        $id = $clsLoan->Add($mdlLoan);
        if ($id > 0) {
          $output->Success = true;
          $output->Message = "Successfully added loan.";
        } else {
          $output->Success = false;
          $output->Message = "No loan was added.";
        }
      } else {
        $output->Success = false;
        $output->Message = "No book was available on this branch.";
      }
      break;
    }
  case 'update': {
      $rows_affected = $clsLoan->Update($data->Modal);
      if ($rows_affected > 0) {
        $output->Success = true;
        $output->Message = "Successfully updated loan.";
      } else {
        if ($clsLoan->IsExistLoan_Id($data->Modal->Loan_Id)) {
          $output->Success = true;
          $output->Message = "No changes were made.";
        } else {
          $output->Success = false;
          $output->Message = "No loan was updated.";
        }
      }
      break;
    }
  case 'delete': {
      $rows_affected = $clsLoan->Delete($data->Loan_Id);
      if ($rows_affected > 0) {
        $output->Success = true;
        $output->Message = "Successfully deleted loan.";
      } else {
        $output->Success = false;
        $output->Message = "No loan was deleted.";
      }
      break;
    }
  case 'isloaned': {
      if ($clsLoan->IsLoaned($data->User_Id, $data->Book_Id)) {
        $output->Success = true;
        $output->Status = true;
        $output->Message = "Book is Loaned.";
      } else {
        $output->Success = true;
        $output->Status = false;
        $output->Message = "Book is not Loaned.";
      }
      break;
    }
  case 'isloanedwstatus': {
      if ($clsLoan->IsLoaned($data->User_Id, $data->Book_Id)) {
        $status = $clsLoan->GetLoanStatus($data->User_Id, $data->Book_Id);
        $output->Success = true;
        $output->IsLoaned = true;
        switch ($status) {
          case '0':
            $output->Status = 'For Approval';
            break;
          case '1':
            $output->Status = 'For Claiming';
            break;
          case '2':
            $output->Status = 'On Hand';
            break;
          case '3':
            $output->Status = 'Returned';
            break;
          default:
            $output->Status = 'Unknown';
            break;
        }
        $output->Message = "Book is Loaned.";
      } else {
        $output->Success = true;
        $output->IsLoaned = false;
        $output->Message = "Book is not Loaned.";
      }
      break;
    }
  case 'getbookbystatus': {
      $output->Success = true;
      $output->Message = "Successfully retrieved books";
      $l = isset($data->Limit) ? $data->Limit : 5;
      $o = isset($data->Offset) ? $data->Offset : 0;
      $output->List = $clsLoan->GetBookByStatus($data->User_Id, $data->Status, $l, $o);
      break;
    }

  default:
    $output->Success = false;
    $output->Message = "Error on function called.";
    break;
}

echo json_encode($output);
