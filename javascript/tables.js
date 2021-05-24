$(document).ready(function () {
  // Posición de las notificaciones
  alertify.set("notifier", "position", "top-right");

  // Inicicalización de la tabla
  table = $("#tabla_select").DataTable({
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json",
    },
  });

  // Funcionamiento de la selección de filas
  $("#tabla_select tbody").on("click", "tr", function () {
    if ($(this).hasClass("tr-selected")) {
      $(this).removeClass("tr-selected");
      // Desactiva los botones
      $("#btnEliminar").attr("disabled", true);
      $("#btnEditar").attr("disabled", true);
    } else {
      // Desenfoca la fila ya seleccionada
      table.$(".tr-selected").removeClass("tr-selected");
      // Fila seleccionada
      $(this).addClass("tr-selected");
      // Activa los botones
      $("#btnEliminar").removeAttr("disabled");
      $("#btnEditar").removeAttr("disabled");
    }
  });

  /* Envío de formulario del modal */
  $("#formModal").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      // url: 'bd/test.php',
      url: $(this).attr("action"),
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (res) {
        if (res["status"]) {
          location.reload();
        } else {
          alertify.error("Woopsie. Ha ocurrido un error.");
          console.log(res['msg']);
        }
      },
    });
  });

  /* Funcionalidad de botones */

  //   Agregar
  $("#btnNuevo").on("click", function () {
    $("#formModal").trigger("reset"); // limpia modal
    $("#staticModal").modal("show"); // muestra modal
    $("#inputAccion").attr("value", "nuevo"); // acción del formulario
    $("#modalTitle").html("Nuevo registro"); // título del modal

  });

  $("#btnPrueba").on("click", function () {
    alertify.success("prueba");
  });

  //   Editar
  $("#btnEditar").on("click", function () {
    $("#staticModal").modal("show"); // muestra modal
    $("#inputAccion").attr("value", "editar"); // acción del formulario
    $("#modalTitle").html("Editar registro"); // título del modal

    // id de la fila seleccionada
    id = $(".tr-selected").find("td:first").html();

    // Datos de salida
    var formData = new FormData();
    formData.append("id", id);
    formData.append("accion", "consultar");
    formData.append("tabla", $("#tablaNombre").val());

    // Petición asíncrona al servidor de bd
    $.ajax({
      type: "POST",
      url: "bd/acciones.php",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function (res) {
        $('#idReg').attr("value", id);
        // Rellena los inputs del formulario en el modal
        Object.keys(res["data"]).forEach((llave) => {
          $("#inp-" + llave).val(res["data"][llave]);
        });
      },
    });
  });

  //   Eliminar
  $("#btnEliminar").on("click", function () {
    // id de la fila seleccionada
    id = $(".tr-selected").find("td:first").html();

    // Datos de salida
    var formData = new FormData();
    formData.append("id", id);
    formData.append("accion", "eliminar");
    formData.append("tabla", $("#tablaNombre").val());

    // Petición asíncrona al servidor de bd
    $.ajax({
      type: "POST",
      url: "bd/acciones.php",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function (res) {
        console.log(res);
        if (res["status"]) {
          alertify.message("Registro eliminado correctamente");
          // Elimina la fila en interfaz gráfica
          table.row(".tr-selected").remove().draw(false);
          // Desactiva los botones
          $("#btnEliminar").attr("disabled", true);
          $("#btnEditar").attr("disabled", true);
        } else {
          alertify.error("No se pudo eliminar registro");
        }
      },
    });
  });
});
