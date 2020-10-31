$(document).ready(function () {
  // Datatable
  var table = $('#dataTable').DataTable({
    ajax: {
      url: 'http://localhost/mapualibrary/api/Book.php',
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
  $('#genricModal .modal-title').html('Book Details');
  $('#genricModal .modal-footer').html(
    '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'
  );

  var data = {
    url: 'Book.php',
    param: {
      Function: 'getbyid',
      Book_Id: id
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
          message: 'Book not found. Kindly refresh your browser.'
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
  $('#genricModal .modal-title').html('Add New Book');
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
  if (u.IsEmpty('#txtCode')) {
    err = true;
  }
  if (u.IsEmpty('#txtTitle')) {
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
      url: 'Book.php',
      param: {
        Function: 'add',
        Modal: {
          Code: $('#txtCode').val(),
          Keyword: $('#txtKeyword').val(),
          Title: $('#txtTitle').val(),
          Author: $('#txtAuthor').val(),
          Subject_Id: $('#selSubject_Id').val(),
          Synopsis: $('#txtSynopsis').val(),
          DatePublished: $('#txtDatePublished').val()
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
  $('#genricModal .modal-title').html('Edit Book Details');

  var data = {
    url: 'Book.php',
    param: {
      Function: 'getbyid',
      Book_Id: id
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
          message: 'Book not found. Kindly refresh your browser.'
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
    url: 'Book.php',
    param: {
      Function: 'update',
      Modal: {
        Book_Id: id,
        Code: $('#txtCode').val(),
        Keyword: $('#txtKeyword').val(),
        Title: $('#txtTitle').val(),
        Author: $('#txtAuthor').val(),
        Subject_Id: $('#selSubject_Id').val(),
        Synopsis: $('#txtSynopsis').val(),
        DatePublished: $('#txtDatePublished').val()
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
  $('#genricModal .modal-title').html('Book Details');
  $('#genricModal .modal-footer').html(
    `<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>`
  );

  var data = {
    url: 'Book.php',
    param: {
      Function: 'getbyid',
      Book_Id: id
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
          message: 'Book not found. Kindly refresh your browser.'
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
    url: 'Book.php',
    param: {
      Function: 'delete',
      Book_Id: id
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
        <label for="txtCode" class="col-4 col-form-label">Code</label>
        <div class="col-8">
          <input type="text" class="form-control" id="txtCode" />
        </div>
      </div>
      <div class="row">
        <label for="txtKeyword" class="col-4 col-form-label">Keyword</label>
        <div class="col-8">
          <input type="text" class="form-control" id="txtKeyword" />
        </div>
      </div>
      <div class="row">
        <label for="txtTitle" class="col-4 col-form-label">Title</label>
        <div class="col-8">
          <input type="text" class="form-control" id="txtTitle" />
        </div>
      </div>
      <div class="row">
        <label for="txtAuthor" class="col-4 col-form-label">Author</label>
        <div class="col-8">
          <input type="text" class="form-control" id="txtAuthor" />
        </div>
      </div>
      <div class="row">
        <label for="selSubject_Id" class="col-4 col-form-label">Subject</label>
        <div class="col-8">
          <select class="form-control" id="selSubject_Id"></select>
        </div>
      </div>
      <div class="row">
        <label for="txtSynopsis" class="col-4 col-form-label">Synopsis</label>
        <div class="col-8">
          <textarea type="text" class="form-control" id="txtSynopsis"></textarea>
        </div>
      </div>
      <div class="row">
        <label for="txtDatePublished" class="col-4 col-form-label">DatePublished</label>
        <div class="col-8">
          <input type="date" class="form-control" id="txtDatePublished" />
        </div>
      </div>
  `;
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

  var data = {
    url: 'Subject.php',
    param: {
      Function: 'dropdown'
    }
  };
  u.SendData(data)
    .done(function (r) {
      if (r.Success) {
        r.List.map(function (item) {
          $('#selSubject_Id').append(new Option(item.Name, item.Subject_Id));
        });

        if (value) {
          $('#txtCode').val(value.Code);
          $('#txtKeyword').val(value.Keyword);
          $('#txtTitle').val(value.Title);
          $('#txtAuthor').val(value.Author);
          $('#selSubject_Id').val(value.Subject_Id);
          $('#txtSynopsis').val(value.Synopsis);
          $('#txtDatePublished').val(value.DatePublished);
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
