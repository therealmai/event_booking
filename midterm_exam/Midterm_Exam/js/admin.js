function showEventC(){
    var x = document.getElementById("admin_2ndSection");
    var y = document.getElementById("admin_3rdSection");
    if (y.style.display === "block") {
      y.style.display = "none";
    }
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
}

function showUserC(){
    var x = document.getElementById("admin_3rdSection");
    var y = document.getElementById("admin_2ndSection");
    if (y.style.display === "block") {
      y.style.display = "none";
    }
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function showEventDA(){
  var x = document.getElementById("admin-event-container");
  if (x.style.display === "block") {
      x.style.display = "none";
  } else {
      x.style.display = "block";
  }
}

function showEventD(){
  var x = document.getElementById("event-container");
  var y = document.getElementById("eventb-container");
  if (y.style.display === "block") {
    y.style.display = "none";
  }
  if (x.style.display === "block") {
      x.style.display = "none";
  } else {
      x.style.display = "block";
  }
}

function showBookD(){
  var x = document.getElementById("eventb-container");
  var y = document.getElementById("event-container");
  if (y.style.display === "block") {
    y.style.display = "none";
  }
  if (x.style.display === "block") {
      x.style.display = "none";
  } else {
      x.style.display = "block";
  }
}

function showEdit(id){
  var x = document.getElementById("modal-event-edit");

  if (x.style.display === "block") {

    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  document.getElementById("editEventId").value = id;
}