$(document).on("blur", ".buscaCep", function () {
  let zipcode = $(this).val().replace("-", "");
  if (zipcode.length == 8) {
    var url = "https://viacep.com.br/ws/" + zipcode + "/json/";
    $("#estado").val("...");
    $("#cidade").val("...");
    $("#logradouro").val("...");
    $("#bairro").val("...");
    $.ajax({
      url: url,
      dataType: "jsonp",
      crossDomain: true,
      contentType: "application/json",
    }).done(function (json, textStatus, jqXHR) {
      console.log(json);
      if (json["erro"] == true) {
        zip_invalide();
      } else {
        $("#estado").val(json["uf"]);
        $("#cidade").val(json["localidade"]);
        $("#logradouro").val(json["logradouro"]);
        $("#bairro").val(json["bairro"]);
      }
    });
  } else {
    zip_invalide();
  }
});

function zip_invalide() {
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "CEP inválido!",
    footer: "Por favor informe o CEP novamente",
    confirmButtonColor: "var(--primary-color)",
  });
  $("#estado").val("");
  $("#cidade").val("");
  $("#logradouro").val("");
  $("#bairro").val("");
}

$(".select2").select2();
function showToastAlert(icon, title, key, value, valueAfter = false) {
  if (sessionStorage.getItem(key) !== value) {
    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 2500,
      timerProgressBar: true,
      didOpen: toast => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
      },
    });
    Toast.fire({
      icon: icon,
      title: title,
    });
    sessionStorage.removeItem(key);
  }
}

async function getCarsApi() {
  const response = await fetch(
    "https://private-anon-96d0acf58c-carsapi1.apiary-mock.com/cars",
    {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    }
  );
  const data = await response.json();
  return data;
}

// Usar os dados da retornados da funcao getCarsApi()

const statesSelect = document.getElementById("vehicle-brand");

getCarsApi().then(data => {
  data
    .map(value => value.make)
    .filter((value, index, _arr) => _arr.indexOf(value) == index)
    .forEach(make => {
      const makeFormatted = make.charAt(0).toUpperCase() + make.slice(1);
      const option = new Option(makeFormatted, make, false);
      console.log(option);
      statesSelect.add(option);
    });

  const dataOp = dataOptions();
  $("#vehicle-brand").val(dataOp.datamarca).trigger("change");
});
