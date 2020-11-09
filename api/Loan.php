<?php
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
        $arr = [
          $mdl->User,
          $mdl->Book,
          $mdl->Branch,
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
      if (empty($data->Modal->Date_Due)) {
        require_once("dataaccess/Subject.php");
        $hours = $clsSubject->GetLoanPeriodByInventory_Id($data->Modal->Inventory_Id);
        $date = new DateTime($data->Modal->Date_Loan);
        $date->add(new DateInterval('PT' . $hours . 'H'));
        $data->Modal->Date_Due = $date->format('Y-m-d H:i:s');
      }
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
  case 'update': {
      if (empty($data->Modal->Date_Due)) {
        require_once("dataaccess/Subject.php");
        $hours = $clsSubject->GetLoanPeriodByInventory_Id($data->Modal->Inventory_Id);
        $date = new DateTime($data->Modal->Date_Loan);
        $date->add(new DateInterval('PT' . $hours . 'H'));
        $data->Modal->Date_Due = $date->format('Y-m-d H:i:s');
      }
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

  default:
    $output->Success = false;
    $output->Message = "Error on function called.";
    break;
}

echo json_encode($output);
