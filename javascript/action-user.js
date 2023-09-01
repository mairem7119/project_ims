function script() {
  this.initialize = function () {
    this.registerEvents();
  };
  this.registerEvents = function () {
    document.addEventListener("click", function (event) {
      targetElement = event.target;
      classList = targetElement.classList;

      if (classList.contains("deleteUser")) {
        event.preventDefault();
        userId = targetElement.dataset.userid;
        fname = targetElement.dataset.fname;
        lname = targetElement.dataset.lname;
        fullName = fname + " " + lname;

        BootstrapDialog.confirm({
          type: BootstrapDialog.TYPE_DANGER,
          message: "Are you sure you want to delete " + fullName + "?",
          callback: function (isDelete) {
            $.ajax({
              method: "POST",
              data: {
                user_id: userId,
                f_name: fname,
                l_name: lname,
              },
              url: "database/delete-user.php",
              dataType: "json",
              success: function (data) {
                if (data.status) {
                  BootstrapDialog.alert({
                    type: BootstrapDialog.TYPE_SUCCESS,
                    message: data.message,
                    callback: function () {
                      location.reload();
                    },
                  });
                } else {
                  BootstrapDialog.alert({
                    type: BootstrapDialog.TYPE_DANGER,
                    message: data.message,
                  });
                }
              },
            });
          },
        });
      }
      if (classList.contains("updateUser")) {
        event.preventDefault(); //prevent loading
        userId = targetElement.dataset.userid;
        firstName = targetElement
          .closest("tr")
          .querySelector("td.firstName").innerHTML;
        lastName = targetElement
          .closest("tr")
          .querySelector("td.lastName").innerHTML;
        email = targetElement.closest("tr").querySelector("td.email").innerHTML;

        BootstrapDialog.confirm({
          title: "Update " + firstName + " " + lastName,
          message:
            '<form>\
              <div class = "form-group">\
                <label for="firstName">First Name: </label>\
                <input type="text" class="form-control" id="firstName" value="' +
            firstName +
            '">\
              </div>\
              <div class = "form-group">\
                <label for="lastName">Last Name: </label>\
                <input type="text" class="form-control" id="lastName" value="' +
            lastName +
            '">\
              </div>\
              <div class = "form-group">\
                <label for="email">Email address: </label>\
                <input type="email" class="form-control" id="emailUpdate" value="' +
            email +
            '">\
              </div>\
            </form>',
          callback: function (isUpdate) {
            if (isUpdate) {
              //if user click 'ok'
              $.ajax({
                method: "POST",
                data: {
                  userId: userId,
                  f_name: document.getElementById("firstName").value,
                  l_name: document.getElementById("lastName").value,
                  email: document.getElementById("emailUpdate").value,
                },
                url: "database/update-user.php",
                dataType: "json",
                success: function (data) {
                  if (data.status) {
                    BootstrapDialog.alert({
                      type: BootstrapDialog.TYPE_SUCCESS,
                      message: data.message,
                      callback: function () {
                        location.reload();
                      },
                    });
                  } else {
                    BootstrapDialog.alert({
                      type: BootstrapDialog.TYPE_DANGER,
                      message: data.message,
                    });
                  }
                },
              });
            }
          },
        });
      }
    });
  };
}
var script = new script();
script.initialize();
