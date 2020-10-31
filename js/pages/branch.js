$(document).ready(function () {
  // Datatable
  var table = $('#dataTable').DataTable({
    ajax: {
      url: 'http://localhost/mapualibrary/api/Branch.php',
      contentType: 'application/json',
      type: 'POST',
      data: function (d) {
        return JSON.stringify({ Function: 'datatable' });
      }
    }
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
  $('#genricModal .modal-title').html('Branch Details');
  $('#genricModal .modal-footer').html(
    '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'
  );

  var data = {
    url: 'Branch.php',
    param: {
      Function: 'getbyid',
      Branch_Id: id
    }
  };

  u.SendData(data)
    .done(function (r) {
      var alert = {};
      if (r.Success) {
        $('#genricModal .modal-body').html(
          `
            <div class="row">
              <label for="txtName" class="col-4 col-form-label">Name</label>
              <div class="col-8">
                <input type="text" class="form-control-plaintext" id="txtName" value="` +
            r.Modal.Name +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtAddress" class="col-4 col-form-label">Address</label>
              <div class="col-8">
                <input type="text" class="form-control-plaintext" id="txtAddress" value="` +
            r.Modal.Address +
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
          message: 'Branch not found. Kindly refresh your browser.'
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
  $('#genricModal .modal-title').html('Add New Branch');

  $('#genricModal .modal-body').html(`
    <div class="row">
      <div class="col-12" id="notif"></div>
    </div>
    <div class="row">
      <label for="txtName" class="col-4 col-form-label">Name</label>
      <div class="col-8">
        <input type="text" class="form-control" style="text-transform: capitalize;" id="txtName" />
      </div>
    </div>
    <div class="row">
      <label for="txtAddress" class="col-4 col-form-label">Address</label>
      <div class="col-8">
        <input type="text" class="form-control" id="txtAddress" />
      </div>
    </div>
  `);

  $('#genricModal .modal-footer').html(`
      <button type="button" class="btn btn-primary" onclick="Add()">Add</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  `);
}

function Add() {
  u = new Utility();
  u.Loading();
  var err = false;
  if (u.IsEmpty('#txtName')) {
    var alert = {
      type: 'danger',
      message: 'Please complete all fields'
    };
    u.ShowAlert(alert);
  } else {
    var data = {
      url: 'Branch.php',
      param: {
        Function: 'add',
        Modal: {
          Name: $('#txtName').val(),
          Address: $('#txtAddress').val()
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
  $('#genricModal .modal-title').html('Edit Branch Details');

  var data = {
    url: 'Branch.php',
    param: {
      Function: 'getbyid',
      Branch_Id: id
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
            <label for="txtName" class="col-4 col-form-label">Name</label>
            <div class="col-8">
              <input type="text" class="form-control" style="text-transform: capitalize;" id="txtName" value="` +
            r.Modal.Name +
            `" />
            </div>
          </div>
          <div class="row">
            <label for="txtAddress" class="col-4 col-form-label">Address</label>
            <div class="col-8">
              <input type="text" class="form-control" id="txtAddress" value="` +
            r.Modal.Address +
            `" />
            </div>
          </div>
        `
        );

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
          message: 'Branch not found. Kindly refresh your browser.'
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
    url: 'Branch.php',
    param: {
      Function: 'update',
      Modal: {
        Branch_Id: id,
        Name: document.getElementById('txtName').value,
        Address: document.getElementById('txtAddress').value
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
  $('#genricModal .modal-title').html('Branch Details');
  $('#genricModal .modal-footer').html(
    `<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>`
  );

  var data = {
    url: 'Branch.php',
    param: {
      Function: 'getbyid',
      Branch_Id: id
    }
  };

  u.SendData(data)
    .done(function (r) {
      var alert = {};
      if (r.Success) {
        $('#genricModal .modal-body').html(
          `
            <div class="row">
              <div class="col-12" id="notif"></div>
            </div>
            <div class="row">
              <label for="txtName" class="col-4 col-form-label">Name</label>
              <div class="col-8">
                <input type="text" class="form-control-plaintext" id="txtName" value="` +
            r.Modal.Name +
            `">
              </div>
            </div>
            <div class="row">
              <label for="txtAddress" class="col-4 col-form-label">Address</label>
              <div class="col-8">
                <input type="text" class="form-control-plaintext" style="text-transform: capitalize;" id="txtAddress" value="` +
            r.Modal.Address +
            `">
              </div>
            </div>
        `
        );
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
          message: 'Branch not found. Kindly refresh your browser.'
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
    url: 'Branch.php',
    param: {
      Function: 'delete',
      Branch_Id: id
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
