$(document).ready(function () {
  // Datatable
  var table = $('#dataTable').DataTable({
    ajax: {
      url: 'http://localhost/mapualibrary/api/EJournal.php',
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
  $('#genricModal .modal-title').html('E-Journal Details');
  $('#genricModal .modal-footer').html(
    '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'
  );

  var data = {
    url: 'EJournal.php',
    param: {
      Function: 'getbyid',
      EJournal_Id: id
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
          message: 'EJournal not found. Kindly refresh your browser.'
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
  $('#genricModal .modal-title').html('Add New EJournal');
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
  if (u.IsEmpty('#txtLink')) {
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
      url: 'EJournal.php',
      param: {
        Function: 'add',
        Modal: {
          Name: $('#txtName').val(),
          Link: $('#txtLink').val(),
          Description: $('#txtDescription').val()
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
  $('#genricModal .modal-title').html('Edit E-Journal Details');

  var data = {
    url: 'EJournal.php',
    param: {
      Function: 'getbyid',
      EJournal_Id: id
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
          message: 'EJournal not found. Kindly refresh your browser.'
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
    url: 'EJournal.php',
    param: {
      Function: 'update',
      Modal: {
        EJournal_Id: id,
        Name: $('#txtName').val(),
        Link: $('#txtLink').val(),
        Description: $('#txtDescription').val()
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
  $('#genricModal .modal-title').html('E-Journal Details');
  $('#genricModal .modal-footer').html(
    `<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>`
  );

  var data = {
    url: 'EJournal.php',
    param: {
      Function: 'getbyid',
      EJournal_Id: id
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
          message: 'E-Journal not found. Kindly refresh your browser.'
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
    url: 'EJournal.php',
    param: {
      Function: 'delete',
      EJournal_Id: id
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
        <label for="txtName" class="col-4 col-form-label">Name</label>
        <div class="col-8">
          <input type="text" class="form-control" id="txtName" />
        </div>
      </div>
      <div class="row">
        <label for="txtLink" class="col-4 col-form-label">Link</label>
        <div class="col-8">
          <input type="text" class="form-control" id="txtLink" />
        </div>
      </div>
      <div class="row">
        <label for="txtDescription" class="col-4 col-form-label">Description</label>
        <div class="col-8">
          <input type="text" class="form-control" id="txtDescription" />
        </div>
      </div>
  `;
  if (viewing) {
    output += `
    <div class="row">
      <label for="X_DateCreated" class="col-4 col-form-label">Date Created</label>
      <div class="col-8">
        <input type="text" class="form-control" id="txtX_DateCreated" />
      </div>
    </div>`;
  }

  $('#genricModal .modal-body').html(output);

  if (value) {
    $('#txtName').val(value.Name);
    $('#txtLink').val(value.Link);
    $('#txtDescription').val(value.Description);
  }

  if (viewing) {
    $('#txtX_DateCreated').val(value.X_DateCreated);

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
}
