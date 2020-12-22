let receivedData = [];
let providers = new Set();
let buttons = document.getElementById("button_provider");
let myTable = document.getElementById("table");
let tr = myTable.getElementsByTagName("tr");
let search = document.getElementById("search");

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

buttons.childNodes.forEach(function (value) {
  value.addEventListener("click", function () {
    for (let i = 0; i < tr.length; i++) {
      let td = tr[i].getElementsByTagName("td")[2];
      if (td) {
        let txtValue = td.textContent || td.innerText;
        if (txtValue.indexOf(value.textContent) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  });
});
