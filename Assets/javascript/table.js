let buttonsWithProviders = document.getElementById("button_provider");
let myTable = document.getElementById("table");
let tr = myTable.getElementsByTagName("tr");
let search = document.getElementById("search");

//adding event listeners to every delete button on the table
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

// handling searching for records by provider
search.addEventListener("input", function () {
  let filter = search.value;
  for (let i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      let txtValue = td.textContent || td.innerText;
      if (txtValue.indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
});

//adding event listeners to buttons to filter out records by theris providers
buttonsWithProviders.childNodes.forEach(function (value) {
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
