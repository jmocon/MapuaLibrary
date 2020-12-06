$(document).ready(function () {
  $('form').submit(function (event) {
    Login();
    event.preventDefault();
  });
});

function Login() {
  u = new Utility();
  u.Loading('#notif');
  const idnumber = $('#txtIDNumber').val();
  const password = $('#txtPassword').val();
  var err = false;

  if (u.IsEmpty('#txtIDNumber')) {
    err = true;
  }
  if (u.IsEmpty('#txtPassword')) {
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
      url: 'User.php',
      param: {
        Function: 'login',
        IDNumber: idnumber,
        Password: password,
        Admin: true
      }
    };

    u.SendData(data)
      .done(function (r) {
        var alert = {};
        if (r.Success) {
          alert = {
            type: 'success',
            message: 'Hi, Please wait while we redirect you.'
          };
          sessionStorage.setItem('UserId', r.User_Id);
          window.location.replace('./index.php');
        } else {
          $('#txtPassword').val('');
          alert = {
            type: 'danger',
            message: r.Message
          };
        }
        u.ShowAlert(alert);
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
