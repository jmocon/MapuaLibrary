$(document).ready(function () {
  // Datatable
  var table = $('#dataTable').DataTable({
    ajax: {
      url: 'http://localhost/mapualibrary/api/Subject.php',
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

function DisplayAdd() {
  $('#genricModal .modal-title').html('Add New Subject');

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
      url: 'Subject.php',
      param: {
        Function: 'add',
        Modal: {
          Name: $('#txtName').val()
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
  $('#genricModal .modal-title').html('Edit Subject Details');

  var data = {
    url: 'Subject.php',
    param: {
      Function: 'getbyid',
      Subject_Id: id
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
          message: 'Subject not found. Kindly refresh your browser.'
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
    url: 'Subject.php',
    param: {
      Function: 'update',
      Modal: {
        Subject_Id: id,
        Name: document.getElementById('txtName').value
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
  $('#genricModal .modal-title').html('Subject Details');
  $('#genricModal .modal-footer').html(
    `<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>`
  );

  var data = {
    url: 'Subject.php',
    param: {
      Function: 'getbyid',
      Subject_Id: id
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
          message: 'Subject not found. Kindly refresh your browser.'
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
    url: 'Subject.php',
    param: {
      Function: 'delete',
      Subject_Id: id
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
