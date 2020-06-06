let submit = document.getElementById("primary_contact");

submit.addEventListener("click", function () {
  var check = document.getElementsByTagName("input");
  var len = check.length;
  for (var i = 0; i < len; i++) {
    if (check[i].id == "email") {
      //alert(validateEmail(check[i].value));
      if (validateEmail(check[i].value)) {
        emptyField(check[i].id, false);
      } else {
        emptyField(check[i].id, true);
      }
    } else {
      if (check[i].value === "") {
        emptyField(check[i].id, true);
      } else {
        emptyField(check[i].id, false);
      }
    }
  }

  var msg = document.getElementById("message");
  if (msg.value) {
    emptyField(msg.id, false);
  } else {
    emptyField(msg.id, true);
  }
});

function emptyField(id, marker) {
  if (marker == true) {
    document.getElementById(id).style.border = "2px solid red";
  } else {
    document.getElementById(id).style.border = "1px solid gray";
  }
}

function validateEmail(email) {
  const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
