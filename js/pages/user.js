$(document).ready(function () {
  // Datatable
  var table = $('#dataTable').DataTable({
    ajax: {
      url: 'http://localhost/mapualibrary/api/User.php',
      contentType: 'application/json',
      type: 'POST',
      data: function (d) {
        return JSON.stringify({ Function: 'getdatatable' });
      }
    }
  });

  setInterval(function () {
    table.ajax.reload(null, false); // user paging is not reset on reload
  }, 50000);
  //Datatable End
});

function DisplayInfo(userid) {
  //Set the modal
  u = new Utility();
  u.Loading('#genricModal .modal-body');
  $('#genricModal .modal-title').html('User Details');
  $('#genricModal .modal-footer').html(
    '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'
  );

  var data = {
    url: 'user.php',
    param: {
      Function: 'getuser',
      User_Id: userid
    }
  };

  u.SendData(data)
    .done(function (r) {
      var alert = {};
      if (r.Success) {
        switch (r.Modal.UserType) {
          case '0':
            r.Modal.UserType = '<span class="badge badge-warning">Admin</span>';
            break;
          case '1':
            r.Modal.UserType =
              '<span class="badge badge-primary">Employee</span>';
            break;
          case '2':
            r.Modal.UserType =
              '<span class="badge badge-success">Student</span>';
            break;
          default:
            r.Modal.UserType =
              '<span class="badge badge-secondary">Unknown</span>';
            break;
        }

        if (r.Modal.Status != '0') {
          r.Modal.Status =
            '<span class="badge badge-secondary">Inactive</span>';
        } else {
          r.Modal.Status = '';
        }

        $('#genricModal .modal-body').html(
          `
            <div class="row">
              <label for="txtStatus" class="col-4 col-form-label">Type</label>
              <div class="col-8">` +
            r.Modal.UserType +
            ` ` +
            r.Modal.Status +
            `
              </div>
            </div>
            <div class="row">
              <label for="txtIDNumber" class="col-4 col-form-label">ID Number</label>
              <div class="col-8">
                <input type="text" class="form-control-plaintext" id="txtIDNumber" value="` +
            r.Modal.IDNumber +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtName" class="col-4 col-form-label">Name</label>
              <div class="col-8">
                <input type="text" class="form-control-plaintext" style="text-transform: capitalize;" id="txtName" value="` +
            r.Modal.FirstName +
            ` (` +
            r.Modal.MiddleName +
            `) ` +
            r.Modal.LastName +
            ` ` +
            r.Modal.SuffixName +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtHomeAddress" class="col-4 col-form-label">Home Address</label>
              <div class="col-8">
                <input type="text" class="form-control-plaintext" id="txtHomeAddress" value="` +
            r.Modal.HomeAddress +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtContactNumber" class="col-4 col-form-label">Contact Number</label>
              <div class="col-8">
                <input type="text" class="form-control-plaintext" id="txtContactNumber" value="` +
            r.Modal.ContactNumber +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtEmailAddress" class="col-4 col-form-label">Email Address</label>
              <div class="col-8">
                <input type="text" class="form-control-plaintext" id="txtEmailAddress" value="` +
            r.Modal.EmailAddress +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtCardExpiration" class="col-4 col-form-label">Card Expiration</label>
              <div class="col-8">
                <input type="text" class="form-control-plaintext" id="txtCardExpiration" value="` +
            r.Modal.CardExpiration +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtX_DateCreated" class="col-4 col-form-label">Date Created</label>
              <div class="col-8">
                <input type="text" class="form-control-plaintext" id="txtX_DateCreated" value="` +
            r.Modal.X_DateCreated +
            `">
              </div>
            </div>
        `
        );
      } else {
        alert = {
          container: '#genricModal .modal-body',
          type: 'danger',
          message: 'User not found. Kindly refresh your browser.'
        };
        u.ShowAlert(alert);
      }
    })
    .fail(function (j, t, e) {
      var alert = {
        container: '#genricModal .modal-body',
        type: 'danger',
        title: 'Failed to connect to Server',
        message: 'Kindly refresh your browser. - ' + t + e
      };
      u.ShowAlert(alert);
    });
}

function DisplayAdd() {
  $('#genricModal .modal-title').html('Add New User');

  $('#genricModal .modal-body').html(`
    <div class="row">
      <div class="col-12" id="notif"></div>
    </div>
    <div class="row">
      <label for="selUserType" class="col-4 col-form-label">Type</label>
      <div class="col-8">
        <select class="form-control" id="selUserType">
          <option value="0">Admin</option>
          <option value="1">Employee</option>
          <option value="2" selected>Student</option>
        </select>
      </div>
    </div>
    <div class="row">
      <label for="txtIDNumber" class="col-4 col-form-label">ID Number</label>
      <div class="col-8">
        <input type="text" class="form-control" id="txtIDNumber" />
      </div>
    </div>
    <div class="row">
      <label for="txtFirstName" class="col-4 col-form-label">First Name</label>
      <div class="col-8">
        <input type="text" class="form-control" style="text-transform: capitalize;" id="txtFirstName" />
      </div>
    </div>
    <div class="row">
      <label for="txtMiddleName" class="col-4 col-form-label">Middle Name</label>
      <div class="col-8">
        <input type="text" class="form-control" style="text-transform: capitalize;" id="txtMiddleName" />
      </div>
    </div>
    <div class="row">
      <label for="txtLastName" class="col-4 col-form-label">Last Name</label>
      <div class="col-8">
        <input type="text" class="form-control" style="text-transform: capitalize;" id="txtLastName" />
      </div>
    </div>
    <div class="row">
      <label for="txtSuffixName" class="col-4 col-form-label">Suffix Name</label>
      <div class="col-8">
        <input type="text" class="form-control" style="text-transform: capitalize;" id="txtSuffixName" />
      </div>
    </div>
    <div class="row">
      <label for="txtHomeAddress" class="col-4 col-form-label">Home Address</label>
      <div class="col-8">
        <input type="text" class="form-control" id="txtHomeAddress" />
      </div>
    </div>
    <div class="row">
      <label for="txtContactNumber" class="col-4 col-form-label">Contact Number</label>
      <div class="col-8">
        <input type="text" class="form-control" id="txtContactNumber" />
      </div>
    </div>
    <div class="row">
      <label for="txtEmailAddress" class="col-4 col-form-label">Email Address</label>
      <div class="col-8">
        <input type="email" class="form-control" id="txtEmailAddress" />
      </div>
    </div>
    <div class="row">
      <label for="txtCardExpiration" class="col-4 col-form-label">Card Expiration</label>
      <div class="col-8">
        <input type="date" class="form-control" id="txtCardExpiration" />
      </div>
    </div>
    <div class="row">
      <label for="selStatus" class="col-4 col-form-label">Status</label>
      <div class="col-8">
        <select class="form-control" id="selStatus">
          <option value="0">Active</option>
          <option value="1">Inactive</option>
        </select>
      </div>
    </div>
  `);

  $('#genricModal .modal-footer').html(`
      <button type="button" class="btn btn-primary" onclick="AddUser()">Add</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  `);
}

function AddUser() {
  u = new Utility();
  u.Loading();
  var err = false;
  if (u.IsEmpty('#txtIDNumber')) {
    err = true;
  }
  if (u.IsEmpty('#txtFirstName')) {
    err = true;
  }
  if (u.IsEmpty('#txtLastName')) {
    err = true;
  }
  if (err) {
    var alert = {
      type: 'danger',
      message: 'Please complete all fields'
    };
    u.ShowAlert(alert);
  } else {
    var data = {
      url: 'user.php',
      param: {
        Function: 'adduser',
        Modal: {
          IDNumber: $('#txtIDNumber').val(),
          FirstName: $('#txtFirstName').val(),
          MiddleName: $('#txtMiddleName').val(),
          LastName: $('#txtLastName').val(),
          SuffixName: $('#txtSuffixName').val(),
          HomeAddress: $('#txtHomeAddress').val(),
          ContactNumber: $('#txtContactNumber').val(),
          EmailAddress: $('#txtEmailAddress').val(),
          CardExpiration: $('#txtCardExpiration').val(),
          Status: $('#selStatus').val(),
          UserType: $('#selUserType').val()
        }
      }
    };

    u.SendData(data)
      .done(function (r) {
        if (r.Success) {
          alert = {
            container: '#genricModal .modal-body',
            type: 'success',
            message: r.Message
          };
          $('#genricModal .modal-footer').html(`
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          `);
        } else {
          alert = {
            type: 'danger',
            message: r.Message
          };
        }
        u.ShowAlert(alert);

        var table = $('#dataTable').DataTable();
        table.ajax.reload(null, false);
      })
      .fail(function (j, t, e) {
        var alert = {
          type: 'danger',
          title: 'Failed to connect to Server',
          message: 'Kindly refresh your browser. - ' + t + e
        };
        u.ShowAlert(alert);
      });
  }
}

function DisplayEdit(userid) {
  u = new Utility();
  u.Loading('#genricModal .modal-body');
  $('#genricModal .modal-title').html('Edit User Details');

  var data = {
    url: 'user.php',
    param: {
      Function: 'getuser',
      User_Id: userid
    }
  };

  u.SendData(data)
    .done(function (r) {
      if (r.Success) {
        $('#genricModal .modal-body').html(
          `
            <div class="row">
              <div class="col-12" id="notif"></div>
            </div>
            <div class="row">
              <label for="selUserType" class="col-4 col-form-label">Type</label>
              <div class="col-8">
                <select class="form-control" id="selUserType">
                  <option value="0">Admin</option>
                  <option value="1">Employee</option>
                  <option value="2">Student</option>
                </select>
              </div>
            </div>
            <div class="row">
              <label for="txtIDNumber" class="col-4 col-form-label">ID Number</label>
              <div class="col-8">
                <input type="text" class="form-control" id="txtIDNumber" value="` +
            r.Modal.IDNumber +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtFirstName" class="col-4 col-form-label">First Name</label>
              <div class="col-8">
                <input type="text" class="form-control" style="text-transform: capitalize;" id="txtFirstName" value="` +
            r.Modal.FirstName +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtMiddleName" class="col-4 col-form-label">Middle Name</label>
              <div class="col-8">
                <input type="text" class="form-control" style="text-transform: capitalize;" id="txtMiddleName" value="` +
            r.Modal.MiddleName +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtLastName" class="col-4 col-form-label">Last Name</label>
              <div class="col-8">
                <input type="text" class="form-control" style="text-transform: capitalize;" id="txtLastName" value="` +
            r.Modal.LastName +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtSuffixName" class="col-4 col-form-label">Suffix Name</label>
              <div class="col-8">
                <input type="text" class="form-control" style="text-transform: capitalize;" id="txtSuffixName" value="` +
            r.Modal.SuffixName +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtHomeAddress" class="col-4 col-form-label">Home Address</label>
              <div class="col-8">
                <input type="text" class="form-control" id="txtHomeAddress" value="` +
            r.Modal.HomeAddress +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtContactNumber" class="col-4 col-form-label">Contact Number</label>
              <div class="col-8">
                <input type="text" class="form-control" id="txtContactNumber" value="` +
            r.Modal.ContactNumber +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtEmailAddress" class="col-4 col-form-label">Email Address</label>
              <div class="col-8">
                <input type="email" class="form-control" id="txtEmailAddress" value="` +
            r.Modal.EmailAddress +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtCardExpiration" class="col-4 col-form-label">Card Expiration</label>
              <div class="col-8">
                <input type="date" class="form-control" id="txtCardExpiration" value="` +
            r.Modal.CardExpiration +
            `">
              </div>
            </div>
            <div class="row">
              <label for="selStatus" class="col-4 col-form-label">Status</label>
              <div class="col-8">
                <select class="form-control" id="selStatus">
                  <option value="0">Active</option>
                  <option value="1">Inactive</option>
                </select>
              </div>
            </div>
        `
        );
        document.getElementById('selUserType').value = r.Modal.UserType;
        document.getElementById('selStatus').value = r.Modal.Status;

        $('#genricModal .modal-footer').html(
          `
            <button type="button" class="btn btn-primary" onclick="SaveEdit(` +
            userid +
            `)">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            `
        );
      } else {
        $('#genricModal .modal-footer').html(
          `<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>`
        );
        alert = {
          container: '#genricModal .modal-body',
          type: 'danger',
          message: 'User not found. Kindly refresh your browser.'
        };
        u.ShowAlert(alert);
      }
    })
    .fail(function (j, t, e) {
      var alert = {
        container: '#genricModal .modal-body',
        type: 'danger',
        title: 'Failed to connect to Server',
        message: 'Kindly refresh your browser. - ' + t + e
      };
      u.ShowAlert(alert);
    });
}

function SaveEdit(userid) {
  var data = {
    url: 'user.php',
    param: {
      Function: 'saveuser',
      Modal: {
        User_Id: userid,
        IDNumber: document.getElementById('txtIDNumber').value,
        FirstName: document.getElementById('txtFirstName').value,
        MiddleName: document.getElementById('txtMiddleName').value,
        LastName: document.getElementById('txtLastName').value,
        SuffixName: document.getElementById('txtSuffixName').value,
        HomeAddress: document.getElementById('txtHomeAddress').value,
        ContactNumber: document.getElementById('txtContactNumber').value,
        EmailAddress: document.getElementById('txtEmailAddress').value,
        CardExpiration: document.getElementById('txtCardExpiration').value,
        Status: document.getElementById('selStatus').value,
        UserType: document.getElementById('selUserType').value
      }
    }
  };

  u.SendData(data)
    .done(function (r) {
      if (r.Success) {
        alert = {
          type: 'success',
          message: r.Message
        };
      } else {
        alert = {
          type: 'danger',
          message: r.Message
        };
      }
      u.ShowAlert(alert);

      var table = $('#dataTable').DataTable();

      table.ajax.reload(null, false);
    })
    .fail(function (j, t, e) {
      var alert = {
        type: 'danger',
        title: 'Failed to connect to Server',
        message: 'Kindly refresh your browser. - ' + t + e
      };
      u.ShowAlert(alert);
    });
}

function DisplayDelete(userid) {
  u = new Utility();
  u.Loading('#genricModal .modal-body');
  $('#genricModal .modal-title').html('User Details');
  $('#genricModal .modal-footer').html(
    `<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>`
  );

  var data = {
    url: 'user.php',
    param: {
      Function: 'getuser',
      User_Id: userid
    }
  };

  u.SendData(data)
    .done(function (r) {
      var alert = {};
      if (r.Success) {
        switch (r.Modal.UserType) {
          case '0':
            r.Modal.UserType = '<span class="badge badge-warning">Admin</span>';
            break;
          case '1':
            r.Modal.UserType =
              '<span class="badge badge-primary">Employee</span>';
            break;
          case '2':
            r.Modal.UserType =
              '<span class="badge badge-success">Student</span>';
            break;
          default:
            r.Modal.UserType =
              '<span class="badge badge-secondary">Unknown</span>';
            break;
        }

        if (r.Modal.Status != '0') {
          r.Modal.Status =
            '<span class="badge badge-secondary">Inactive</span>';
        } else {
          r.Modal.Status = '';
        }

        $('#genricModal .modal-body').html(
          `
            <div class="row">
              <div class="col-12" id="notif"></div>
            </div>
            <div class="row">
              <label for="txtStatus" class="col-4 col-form-label">Type</label>
              <div class="col-8">` +
            r.Modal.UserType +
            ` ` +
            r.Modal.Status +
            `
              </div>
            </div>
            <div class="row">
              <label for="txtIDNumber" class="col-4 col-form-label">ID Number</label>
              <div class="col-8">
                <input type="text" class="form-control-plaintext" id="txtIDNumber" value="` +
            r.Modal.IDNumber +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtName" class="col-4 col-form-label">Name</label>
              <div class="col-8">
                <input type="text" class="form-control-plaintext" style="text-transform: capitalize;" id="txtName" value="` +
            r.Modal.FirstName +
            ` (` +
            r.Modal.MiddleName +
            `) ` +
            r.Modal.LastName +
            ` ` +
            r.Modal.SuffixName +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtCardExpiration" class="col-4 col-form-label">Card Expiration</label>
              <div class="col-8">
                <input type="text" class="form-control-plaintext" id="txtCardExpiration" value="` +
            r.Modal.CardExpiration +
            `">
              </div>
            </div>
        `
        );
        $('#genricModal .modal-footer').html(
          `
        <button type="button" class="btn btn-danger" onclick="DeleteUser(` +
            userid +
            `)">Confirm Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        `
        );
      } else {
        alert = {
          type: 'danger',
          message: 'User not found. Kindly refresh your browser.'
        };
        u.ShowAlert(alert);
      }
    })
    .fail(function (j, t, e) {
      var alert = {
        container: '#genricModal .modal-body',
        type: 'danger',
        title: 'Failed to connect to Server',
        message: 'Kindly refresh your browser. - ' + t + e
      };
      u.ShowAlert(alert);
    });
}

function DeleteUser(userid) {
  u = new Utility();
  u.Loading('#genricModal .modal-body');
  var data = {
    url: 'user.php',
    param: {
      Function: 'deleteuser',
      User_Id: userid
    }
  };

  u.SendData(data)
    .done(function (r) {
      if (r.Success) {
        alert = {
          container: '#genricModal .modal-body',
          type: 'success',
          message: r.Message
        };
      } else {
        alert = {
          container: '#genricModal .modal-body',
          type: 'danger',
          message: r.Message
        };
      }
      u.ShowAlert(alert);

      var table = $('#dataTable').DataTable();
      table.ajax.reload(null, false);
    })
    .fail(function (j, t, e) {
      var alert = {
        container: '#genricModal .modal-body',
        type: 'danger',
        title: 'Failed to connect to Server',
        message: 'Kindly refresh your browser. - ' + t + e
      };
      u.ShowAlert(alert);
    });

  $('#genricModal .modal-footer').html(
    `<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>`
  );
}

function DisplayPasswordReset(userid, idnumber) {
  u = new Utility();
  u.Loading('#genricModal .modal-body');
  $('#genricModal .modal-title').html('User Details');
  $('#genricModal .modal-footer').html(
    `<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>`
  );
  $('#genricModal .modal-body').html(
    'Reset password of user with ID Number: ' + idnumber + '?'
  );
  $('#genricModal .modal-footer').html(
    `
  <button type="button" class="btn btn-danger" onclick="PasswordReset(` +
      userid +
      `)">Reset Password</button>
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  `
  );
}

function PasswordReset(userid) {
  u = new Utility();
  u.Loading('#genricModal .modal-body');
  var data = {
    url: 'user.php',
    param: {
      Function: 'resetpassword',
      User_Id: userid
    }
  };

  u.SendData(data)
    .done(function (r) {
      if (r.Success) {
        alert = {
          container: '#genricModal .modal-body',
          type: 'success',
          message: r.Message
        };
      } else {
        alert = {
          container: '#genricModal .modal-body',
          type: 'danger',
          message: r.Message
        };
      }
      u.ShowAlert(alert);
    })
    .fail(function (j, t, e) {
      var alert = {
        container: '#genricModal .modal-body',
        type: 'danger',
        title: 'Failed to connect to Server',
        message: 'Kindly refresh your browser. - ' + t + e
      };
      u.ShowAlert(alert);
    });

  $('#genricModal .modal-footer').html(
    `<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>`
  );
}
