<?php
session_start();
require_once("dataaccess/Database.php");
require_once("dataaccess/User.php");

$data = json_decode(file_get_contents('php://input'));

switch ($data->Function) {
  case 'login': {
      $idnumber = $data->IDNumber;
      $password = $data->Password;
      $admin = $data->Admin;
      $user_Id = $clsUser->Login($idnumber, $password, $admin);
      if (!empty($user_Id)) {
        $output = new stdClass;
        $output->Success = true;
        $output->User_Id = $user_Id;
        $_SESSION["User_Id"] = $user_Id;
        echo json_encode($output);
      } else {
        $output = new stdClass;
        $output->Success = false;
        $output->Message = "Authentication Failed.";
        echo json_encode($output);
      }
      break;
    }
  case 'getuser': {
      $mdlUser = $clsUser->GetByUser_Id($data->User_Id);
      $output = new stdClass;
      $output->Success = true;
      $output->Modal = $mdlUser;
      echo json_encode($output);
      break;
    }
  case 'getdatatable': {
      $lstUser = $clsUser->GetTable();

      $output = new stdClass;
      $output->data = array();

      foreach ($lstUser as $mdlUser) {
        $type = '';

        switch ($mdlUser->UserType) {
          case '0':
            $type = '<span class="badge badge-warning">Admin</span>';
            break;
          case '1':
            $type = '<span class="badge badge-primary">Employee</span>';
            break;
          case '2':
            $type = '<span class="badge badge-success">Student</span>';
            break;
          default:
            $type = '<span class="badge badge-secondary">Unknown</span>';
            break;
        }
        if ($mdlUser->Status == 1) {
          $type .= ' <span class="badge badge-secondary">Inactive</span>';
        }
        $action = '
              <button class="btn" title="View" data-toggle="modal" data-target="#genricModal" onclick="DisplayInfo(' . $mdlUser->User_Id . ')">
                <i class="fas fa-eye fa-fw"></i>
              </button>
              <button class="btn" title="Edit" data-toggle="modal" data-target="#genricModal" onclick="DisplayEdit(' . $mdlUser->User_Id . ')">
                <i class="fas fa-pencil-alt fa-fw"></i>
              </button>
              <button class="btn" title="Delete" data-toggle="modal" data-target="#genricModal" onclick="DisplayDelete(' . $mdlUser->User_Id . ')">
                <i class="fas fa-trash fa-fw"></i>
              </button>
              <button class="btn" title="Reset Password" data-toggle="modal" data-target="#genricModal" onclick="DisplayPasswordReset(' . $mdlUser->User_Id . ',\'' . $mdlUser->IDNumber . '\')">
                <i class="fas fa-key fa-fw"></i>
              </button>';
        $arr = [
          $mdlUser->IDNumber,
          $type,
          $clsUser->FormatName($mdlUser),
          $mdlUser->EmailAddress,
          $action
        ];
        array_push($output->data, $arr);
      }
      echo json_encode($output);
      break;
    }
  case 'adduser': {
      $output = new stdClass;
      if ($clsUser->IsExistIDNumber($data->Modal->IDNumber)) {
        $output->Success = false;
        $output->Message = "ID Number already exist";
      } else {
        $userid = $clsUser->Add($data->Modal);
        if ($userid > 0) {
          $output->Success = true;
          $output->Message = "Successfully added user.";
        } else {
          $output->Success = false;
          $output->Message = "No user was added.";
        }
      }
      echo json_encode($output);
      break;
    }
  case 'saveuser': {
      $rows_affected = $clsUser->Update($data->Modal);
      $output = new stdClass;
      if ($rows_affected > 0) {
        $output->Success = true;
        $output->Message = "Successfully Updated User.";
      } else {
        if ($clsUser->IsExistUser_Id($data->Modal->User_Id)) {
          $output->Success = true;
          $output->Message = "No changes were made.";
        } else {
          $output->Success = false;
          $output->Message = "No user was updated.";
        }
      }
      echo json_encode($output);
      break;
    }
  case 'deleteuser': {
      $rows_affected = $clsUser->Delete($data->User_Id);
      $output = new stdClass;
      if ($rows_affected > 0) {
        $output->Success = true;
        $output->Message = "Successfully Deleted User.";
      } else {
        $output->Success = false;
        $output->Message = "No user was deleted.";
      }
      echo json_encode($output);
      break;
    }
  case 'resetpassword': {
      $rows_affected = $clsUser->Delete($data->User_Id);
      $output = new stdClass;
      if ($rows_affected > 0) {
        $output->Success = true;
        $output->Message = "Successfully Deleted User.";
      } else {
        $output->Success = false;
        $output->Message = "No user was deleted.";
      }
      echo json_encode($output);
      break;
    }
  case 'isexistidnumber': {
      $output = new stdClass;
      $output->Success = true;
      $output->Message = $clsUser->IsExistIDNumber($data->IDNumber);
      echo json_encode($output);
      break;
    }

  default:
    # code...
    break;
}
