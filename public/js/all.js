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
$(".model-add").select2();
$(".tipo-add").select2();

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

async function getVehiclesApi(dataId, dataIdNext) {
  let url = `https://parallelum.com.br/fipe/api/v1/caminhoes/marcas`;

  if (dataId) {
    url += "/" + dataId + "/modelos";
  }

  const response = await fetch(url, {
    method: "GET",
    contentType: "application/json",
  });
  const data = await response.json();
  return data;
}

getVehiclesApi().then(data => {
  const statesSelect = document.getElementById("vehicle-make");
  data.forEach(value => {
    const valueFormatted =
      value.nome.charAt(0).toUpperCase() + value.nome.slice(1).toLowerCase();
    const option = new Option(valueFormatted, value.nome.toLowerCase(), false);
    console.log(option);
    option.setAttribute("data-id", `${value.codigo}`);
    statesSelect.add(option);
  });

  const dataOp = dataOptions();
  if (dataOp.datamarca != "") {
    $("#vehicle-make").val(dataOp.datamarca).trigger("change");
  }
});

$(".select2").on("select2:selecting", function (e) {
  const makeId = e.params.args.data.element.dataset.id;
  getVehiclesApi(makeId).then(data => {
    const statesSelect = document.getElementById("vehicle-model");
    statesSelect.removeAttribute("disabled");
    $("#modelo").html("");
    $("#modelo").html(
      "<option disabled selected hidden> Selecione...</option>"
    );
    data.modelos.forEach(value => {
      const valueFormatted =
        value.nome.charAt(0).toUpperCase() + value.nome.slice(1).toLowerCase();
      const option = new Option(
        valueFormatted,
        value.nome.toLowerCase(),
        false
      );
      option.setAttribute("data-id", `${value.codigo}`);
      statesSelect.add(option);
    });
  });
});

function dataFormatada(data) {
  (dia = data.getDate().toString()),
    (diaF = dia.length == 1 ? "0" + dia : dia),
    (mes = (data.getMonth() + 1).toString()), //+1 pois no getMonth Janeiro começa com zero.
    (mesF = mes.length == 1 ? "0" + mes : mes),
    (anoF = data.getFullYear());
  return diaF + "/" + mesF + "/" + anoF;
}
