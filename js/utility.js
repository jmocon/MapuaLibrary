class Utility {
  constructor() {}

  SendData(data) {
    // $.ajaxSetup({
    //   headers: {
    //     Authorization: 'Basic ' + btoa('dotNet4:try123')
    //   }
    // });

    var a = $.ajax({
      type: 'POST',
      url: 'http://localhost/mapualibrary/api/' + data.url,
      data: JSON.stringify(data.param),
      contentType: 'application/json;charset=utf-8',
      dataType: 'json',
      processdata: true
    });

    return a;
  }

  ShowAlert(data) {
    var obj = {
      container: data.container ? data.container : '#notif',
      close: data ? data.close : false,
      type: data ? data.type : 'info',
      title: data ? data.title : '',
      message: data ? data.message : '',
      helper: data ? data.helper : ''
    };

    //obj = {...obj,...data};

    var output = `<div class="alert alert-` + obj.type + `" role="alert">`;
    if (obj.close) {
      output += `<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>`;
    }
    if (obj.title) {
      output += `<h5 class="alert-heading">` + obj.title + `</h5>`;
    }
    if (obj.message) {
      output += obj.message;
    }
    if (obj.helper) {
      output += `<hr /><p class="mb-0">` + obj.helper + `</p>`;
    }
    output += `</div>`;

    $(obj.container).html(output);
  }

  Loading(element = '#notif') {
    $(element).html(`
      <div class="row">
        <div class="col-12 text-center p-2">
          <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
      </div>

      `);
  }

  IsEmpty(element, type = 'input') {
    switch (type) {
      case 'input': {
        if ($(element).val() == '') {
          $(element).addClass('is-invalid');
          return true;
        } else {
          $(element).removeClass('is-invalid');
          return false;
        }
        break;
      }

      default:
        break;
    }
    return false;
  }

  GetDateInput(date) {
    function pad(n) {
      return n < 10 ? '0' + n : n;
    }
    var d = new Date(date);
    return d.getFullYear() + '-' + pad(d.getMonth()) + '-' + pad(d.getDate());
  }

  GetTimeInput(date) {
    function pad(n) {
      return n < 10 ? '0' + n : n;
    }
    var d = new Date(date);
    return (
      pad(d.getHours()) + ':' + pad(d.getMinutes()) + ':' + pad(d.getSeconds())
    );
  }
}
