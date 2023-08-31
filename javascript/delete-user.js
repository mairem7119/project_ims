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
        if (
          window.confirm("Are you sure you want to delete " + fullName + "?")
        ) {
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
                if (window.confirm(data.message)) {
                  location.reload();
                }
              } else {
                window.alert(data.message);
              }
            },
          });
        } else {
          console.log("Will not delete");
        }
      }
    });
  };
}
var script = new script();
script.initialize();
