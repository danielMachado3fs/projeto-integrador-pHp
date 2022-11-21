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
    sessionStorage.setItem(key, valueAfter);
  }
}

// if (sessionStorage.getItem("isdeleted") !== "false") {
//   const Toast = Swal.mixin({
//     toast: true,
//     position: "top-end",
//     showConfirmButton: false,
//     timer: 2500,
//     timerProgressBar: true,
//     didOpen: toast => {
//       toast.addEventListener("mouseenter", Swal.stopTimer);
//       toast.addEventListener("mouseleave", Swal.resumeTimer);
//     },
//   });
//   Toast.fire({
//     icon: "success",
//     title: "Veículo Excluido Com Sucesso!",
//   });
//   sessionStorage.setItem("isdeleted", "false");
// }
