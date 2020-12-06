$(document).ready(function () {
  // Datatable
  var table = $('#dataTable').DataTable({
    ajax: {
      url: 'http://localhost/mapualibrary/api/Loan.php',
      contentType: 'application/json',
      type: 'POST',
      data: function (d) {
        return JSON.stringify({ Function: 'datatable' });
      }
    }
  });

  $('#dataTable tfoot th').each(function () {
    var title = $(this).text();
    $(this).html(
      '<input type="text" class="form-control" placeholder="Search ' +
        title +
        '" />'
    );
  });

  setInterval(function () {
    table.ajax.reload(null, false);
  }, 50000);
  //Datatable End
});

function DisplayInfo(id) {
  //Set the modal
  u = new Utility();
  u.Loading('#genricModal .modal-body');
  $('#genricModal .modal-title').html('Loan Details');
  $('#genricModal .modal-footer').html(
    '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'
  );

  var data = {
    url: 'Loan.php',
    param: {
      Function: 'getbyid',
      Loan_Id: id
    }
  };

  u.SendData(data)
    .done(function (r) {
      var alert = {};
      if (r.Success) {
        Form(r.Modal, true);
      } else {
        alert = {
          container: '#genricModal .modal-body',
          type: 'danger',
          message: 'Loan not found. Kindly refresh your browser.'
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
  $('#genricModal .modal-title').html('Add New Loan');
  $('#genricModal .modal-footer').html(`
      <button type="button" class="btn btn-primary" onclick="Add()">Add</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  `);
  Form();
}

function Add() {
  u = new Utility();
  u.Loading();
  var err = false;
  if (u.IsEmpty('#selInventory_Id')) {
    err = true;
  }
  if (u.IsEmpty('#selUser_Id')) {
    err = true;
  }
  if (u.IsEmpty('#txtDateLoan')) {
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
      url: 'Loan.php',
      param: {
        Function: 'add',
        Modal: {
          User_Id: $('#selUser_Id').val(),
          Inventory_Id: $('#selInventory_Id').val(),
          Date_Loan:
            $('#txtDateLoan_Date').val() + ' ' + $('#txtDateLoan_Time').val(),
          Date_Return:
            $('#txtDateReturn_Date').val() +
            ' ' +
            $('#txtDateReturn_Time').val(),
          Date_Due:
            $('#txtDateDue_Date').val() + ' ' + $('#txtDateDue_Time').val(),
          PenaltyFee: $('#txtPenaltyFee').val()
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

function DisplayEdit(id) {
  u = new Utility();
  u.Loading('#genricModal .modal-body');
  $('#genricModal .modal-title').html('Edit Loan Details');

  var data = {
    url: 'Loan.php',
    param: {
      Function: 'getbyid',
      Loan_Id: id
    }
  };

  u.SendData(data)
    .done(function (r) {
      if (r.Success) {
        Form(r.Modal);
        $('#genricModal .modal-footer').html(
          `
            <button type="button" class="btn btn-primary" onclick="Update(` +
            id +
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
          message: 'Loan not found. Kindly refresh your browser.'
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

function Update(id) {
  u = new Utility();
  u.Loading();
  var err = false;
  if (u.IsEmpty('#selInventory_Id')) {
    err = true;
  }
  if (u.IsEmpty('#selUser_Id')) {
    err = true;
  }
  if (u.IsEmpty('#txtDateLoan')) {
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
      url: 'Loan.php',
      param: {
        Function: 'update',
        Modal: {
          Loan_Id: id,
          User_Id: $('#selUser_Id').val(),
          Inventory_Id: $('#selInventory_Id').val(),
          Date_Loan:
            $('#txtDateLoan_Date').val() + ' ' + $('#txtDateLoan_Time').val(),
          Date_Return:
            $('#txtDateReturn_Date').val() +
            ' ' +
            $('#txtDateReturn_Time').val(),
          Date_Due:
            $('#txtDateDue_Date').val() + ' ' + $('#txtDateDue_Time').val(),
          PenaltyFee: $('#txtPenaltyFee').val()
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
}

function DisplayDelete(id) {
  u = new Utility();
  u.Loading('#genricModal .modal-body');
  $('#genricModal .modal-title').html('Loan Details');
  $('#genricModal .modal-footer').html(
    `<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>`
  );

  var data = {
    url: 'Loan.php',
    param: {
      Function: 'getbyid',
      Loan_Id: id
    }
  };

  u.SendData(data)
    .done(function (r) {
      var alert = {};
      if (r.Success) {
        Form(r.Modal, true);
        $('#genricModal .modal-footer').html(
          `
        <button type="button" class="btn btn-danger" onclick="Delete(` +
            id +
            `)">Confirm Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        `
        );
      } else {
        alert = {
          type: 'danger',
          message: 'Loan not found. Kindly refresh your browser.'
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

function Delete(id) {
  u = new Utility();
  u.Loading('#genricModal .modal-body');
  var data = {
    url: 'Loan.php',
    param: {
      Function: 'delete',
      Loan_Id: id
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

function Form(value = '', viewing = false) {
  u = new Utility();
  u.Loading('#genricModal .modal-body');

  var output = `
    <div class="row">
        <div class="col-12" id="notif"></div>
      </div>
      <div class="form-group row">
        <label for="selUser_Id" class="col-3 col-form-label">User</label>
        <div class="col-9">
          <select class="form-control" id="selUser_Id"></select>
        </div>
      </div>
      <div class="form-group row">
        <label for="selInventory_Id" class="col-3 col-form-label">Inventory</label>
        <div class="col-9">
          <select class="js-example-basic-single form-control" id="selInventory_Id"></select>
        </div>
      </div>
      <div class="form-group row">
        <label for="txtDateLoan" class="col-3 col-form-label">Date Loaned</label>
        <div class="col-5">
          <input type="date" class="form-control" id="txtDateLoan_Date" />
        </div>
        <div class="col-4">
          <input type="time" class="form-control" id="txtDateLoan_Time" />
        </div>
      </div>
      <div class="form-group row">
        <label for="txtDateDue" class="col-3 col-form-label">Date Due</label>
        <div class="col-5">
          <input type="date" class="form-control" id="txtDateDue_Date" />`;
  if (!viewing) {
    output += `<small id="DateDueHelp" class="form-text text-muted">Leave blank for default.</small>`;
  }
  output += ` </div>
        <div class="col-4">
          <input type="time" class="form-control" id="txtDateDue_Time" />
        </div>
      </div>
      <div class="form-group row">
        <label for="txtDateReturn_Date" class="col-3 col-form-label">Date Returned</label>
        <div class="col-5">
          <input type="date" class="form-control" id="txtDateReturn_Date" />
        </div>
        <div class="col-4">
          <input type="time" class="form-control" id="txtDateReturn_Time" />
        </div>
      </div>
      <div class="form-group row">
        <label for="txtPenaltyFee" class="col-3 col-form-label">Penalty Fee</label>
        <div class="col-9">
          <input type="number" class="form-control" id="txtPenaltyFee" />
        </div>
      </div>
  `;

  if (viewing) {
    output += `
    <div class="form-group row">
      <label for="txtX_DateCreated" class="col-3 col-form-label">Date Created</label>
      <div class="col-5">
          <input type="date" class="form-control" id="txtX_DateCreated_Date" />
        </div>
        <div class="col-4">
          <input type="time" class="form-control" id="txtX_DateCreated_Time" />
        </div>
    </div>
  `;
  }
  $('#genricModal .modal-body').html(output);

  $('select').select2({ theme: 'bootstrap4' });

  if (viewing) {
    $('#genricModal input').addClass('form-control-plaintext');
    $('#genricModal input').removeClass('form-control');
    $('#genricModal input').attr('readonly', true);

    $('#genricModal select').addClass('form-control-plaintext');
    $('#genricModal select').removeClass('form-control');
    $('#genricModal select').attr('disabled', true);
  }

  if (value) {
    if (viewing) {
      $('#txtX_DateCreated_Date').val(u.GetDateInput(value.X_DateCreated));
      $('#txtX_DateCreated_Time').val(u.GetTimeInput(value.X_DateCreated));
    }
    $('#selUser_Id').val(value.User_Id);
    $('#selInventory_Id').val(value.Inventory_Id);
    $('#txtDateLoan_Date').val(u.GetDateInput(value.Date_Loan));
    $('#txtDateLoan_Time').val(u.GetTimeInput(value.Date_Loan));
    $('#txtDateDue_Date').val(u.GetDateInput(value.Date_Due));
    $('#txtDateDue_Time').val(u.GetTimeInput(value.Date_Due));
    $('#txtDateReturn_Date').val(u.GetDateInput(value.Date_Return));
    $('#txtDateReturn_Time').val(u.GetTimeInput(value.Date_Return));
    $('#txtPenaltyFee').val(value.PenaltyFee);
    SetDropdownUser(value.User_Id);
    SetDropdownInventory(value.Inventory_Id);
  } else {
    SetDropdownUser();
    SetDropdownInventory();
  }
}

function SetDropdownUser(value = '') {
  var data = {
    url: 'User.php',
    param: {
      Function: 'dropdown'
    }
  };
  u.SendData(data)
    .done(function (r) {
      if (r.Success) {
        r.List.map(function (item) {
          $('#selUser_Id').append(new Option(item.Text, item.Value));
        });

        if (value) {
          $('#selUser_Id').val(value);
        }
      } else {
        alert = {
          container: '#genricModal .modal-body',
          type: 'danger',
          message: r.Message
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

function SetDropdownInventory(value = '') {
  var data = {
    url: 'Inventory.php',
    param: {
      Function: 'dropdown'
    }
  };
  u.SendData(data)
    .done(function (r) {
      if (r.Success) {
        r.List.map(function (item) {
          $('#selInventory_Id').append(new Option(item.Text, item.Value));
        });

        if (value) {
          $('#selInventory_Id').val(value);
        }
      } else {
        alert = {
          container: '#genricModal .modal-body',
          type: 'danger',
          message: r.Message
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
