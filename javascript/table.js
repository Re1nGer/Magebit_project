let receivedData = [];
let providers = new Set();
let buttons = document.getElementById("button_provider");
let myTable = document.getElementById("table");
let tr = myTable.getElementsByTagName("tr");
let search = document.getElementById("search");

function get_records() {
  let get_all_records_request = new XMLHttpRequest();
  get_all_records_request.open("GET", "get_data.php?provider_data", true);
  get_all_records_request.setRequestHeader(
    "Content-type",
    "application/x-www-form-urlencoded"
  );
  get_all_records_request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let response = JSON.parse(this.responseText);
      receivedData = response;
      response.forEach((element) => {
        providers.add(element.provider);
      });
      sortByProvider();
    }
  };
  get_all_records_request.send();
}
get_records();

for (let j = 1; j < tr.length; j++) {
  let deleteButton = tr[j].getElementsByTagName("td")[3];
  deleteButton.addEventListener("click", function () {
    let deleteId = this.childNodes[0].getAttribute("data-id");
    let idToSend = `id=${deleteId}`;
    let deleteRequest = new XMLHttpRequest();
    deleteRequest.open("POST", "delete_process.php", true);
    deleteRequest.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    deleteRequest.send(idToSend);
    this.parentElement.style.display = "none";
  });
}

search.addEventListener("input", function () {
  let filter = search.value;
  for (let i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
});

function sortByProvider() {
  providers.forEach(function (value) {
    let newButton = document.createElement("BUTTON");
    newButton.textContent = value;
    newButton.addEventListener("click", function () {
      for (let i = 0; i < tr.length; i++) {
        let td = tr[i].getElementsByTagName("td")[2];
        if (td) {
          let txtValue = td.textContent || td.innerText;
          if (txtValue.indexOf(value) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    });

    buttons.appendChild(newButton);
  });
}
