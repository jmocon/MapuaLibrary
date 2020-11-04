$(document).ready(function () {
  // Datatable
  var table = $('#dataTable').DataTable({
    ajax: {
      url: 'http://localhost/mapualibrary/api/Inventory.php',
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
  $('#genricModal .modal-title').html('Inventory Details');
  $('#genricModal .modal-footer').html(
    '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'
  );

  var data = {
    url: 'Inventory.php',
    param: {
      Function: 'getbyid',
      Inventory_Id: id
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
          message: 'Inventory not found. Kindly refresh your browser.'
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
  $('#genricModal .modal-title').html('Add New Inventory');
  $('#genricModal .modal-footer').html(`
      <button type="button" class="btn btn-primary" onclick="Add()">Add</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  `);
  Form();
}

function Add() {
  u = new Utility();
  u.Loading();
  if (u.IsEmpty('#selBranch_Id')) {
    err = true;
  }
  if (u.IsEmpty('#selBook_Id')) {
    err = true;
  }
  var err = false;
  if (u.IsEmpty('#txtDateAcquired')) {
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
      url: 'Inventory.php',
      param: {
        Function: 'add',
        Modal: {
          Branch_Id: $('#selBranch_Id').val(),
          Book_Id: $('#selBook_Id').val(),
          DateAcquired: $('#txtDateAcquired').val()
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
  $('#genricModal .modal-title').html('Edit Inventory Details');

  var data = {
    url: 'Inventory.php',
    param: {
      Function: 'getbyid',
      Inventory_Id: id
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
          message: 'Inventory not found. Kindly refresh your browser.'
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
  var data = {
    url: 'Inventory.php',
    param: {
      Function: 'update',
      Modal: {
        Inventory_Id: id,
        Branch_Id: $('#selBranch_Id').val(),
        Book_Id: $('#selBook_Id').val(),
        DateAcquired: $('#txtDateAcquired').val()
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

function DisplayDelete(id) {
  u = new Utility();
  u.Loading('#genricModal .modal-body');
  $('#genricModal .modal-title').html('Inventory Details');
  $('#genricModal .modal-footer').html(
    `<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>`
  );

  var data = {
    url: 'Inventory.php',
    param: {
      Function: 'getbyid',
      Inventory_Id: id
    }
  };

  u.SendData(data)
    .done(function (r) {
      var alert = {};
      if (r.Success) {
        Form(r.Modal);
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
          message: 'Inventory not found. Kindly refresh your browser.'
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
    url: 'Inventory.php',
    param: {
      Function: 'delete',
      Inventory_Id: id
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
      <div class="row">
        <label for="selBranch_Id" class="col-4 col-form-label">Branch</label>
        <div class="col-8">
          <select class="form-control" id="selBranch_Id"></select>
        </div>
      </div>
      <div class="row">
        <label for="selBook_Id" class="col-4 col-form-label">Book</label>
        <div class="col-8">
          <select class="form-control" id="selBook_Id"></select>
        </div>
      </div>
      <div class="row">
        <label for="txtDateAcquired" class="col-4 col-form-label">Date Acquired</label>
        <div class="col-8">
          <input type="date" class="form-control" id="txtDateAcquired" />
        </div>
      </div>
  `;

  if (viewing) {
    output += `
    <div class="row">
      <label for="txtStatus" class="col-4 col-form-label">Status</label>
      <div class="col-8">
        <input type="date" class="form-control" id="txtStatus" />
      </div>
    </div>
    <div class="row">
      <label for="txtX_DateCreated" class="col-4 col-form-label">Date Created</label>
      <div class="col-8">
        <input type="date" class="form-control" id="txtX_DateCreated" />
      </div>
    </div>
  `;
  }
  $('#genricModal .modal-body').html(output);

  if (viewing) {
    $('#genricModal input').addClass('form-control-plaintext');
    $('#genricModal input').removeClass('form-control');
    $('#genricModal input').attr('readonly', true);

    $('#genricModal textarea').addClass('form-control-plaintext');
    $('#genricModal textarea').removeClass('form-control');
    $('#genricModal textarea').attr('readonly', true);

    $('#genricModal select').addClass('form-control-plaintext');
    $('#genricModal select').removeClass('form-control');
    $('#genricModal select').attr('disabled', true);
  }

  if (value) {
    if (viewing) {
      $('#txtStatus').val(value.Status);
      $('#txtX_DateCreated').val(value.X_DateCreated);
    }
    $('#txtDateAcquired').val(value.DateAcquired);
    SetDropdownBranch(value.Branch_Id);
    SetDropdownBook(value.Book_Id);
  } else {
    SetDropdownBranch();
    SetDropdownBook();
  }
}

function SetDropdownBranch(value = '') {
  var data = {
    url: 'Branch.php',
    param: {
      Function: 'dropdown'
    }
  };
  u.SendData(data)
    .done(function (r) {
      if (r.Success) {
        r.List.map(function (item) {
          $('#selBranch_Id').append(new Option(item.Name, item.Branch_Id));
        });

        if (value) {
          $('#selBranch_Id').val(value);
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

function SetDropdownBook(value = '') {
  var data = {
    url: 'Book.php',
    param: {
      Function: 'dropdown'
    }
  };
  u.SendData(data)
    .done(function (r) {
      if (r.Success) {
        r.List.map(function (item) {
          $('#selBook_Id').append(new Option(item.Text, item.Value));
        });

        if (value) {
          $('#selBook_Id').val(value);
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
