$(function () {
  // usuario();
  fetchTasks();

  //------------- Busqueda con ajax Listado Empleados ----------------//
  let botn = document.querySelector("#boton");

  botn.addEventListener("click", (e) => {
    e.preventDefault();
    const accion = "buscarempleado";
    var searchInicio = $("#fecha_inicio").val();
    var searchFin = $("#fecha_fin").val();
    var empleadosLista = $("#vroficina").val();
    var codPersonal = $("#vrcodpersonal").val();

    $.ajax({
      url: "./c_almacen.php",
      data: {
        accion: accion,
        searchinicio: searchInicio,
        searchfin: searchFin,
        empleadosLista: empleadosLista,
        codPersonal: codPersonal,
      },
      type: "POST",
      success: function (response, textStatus, jqXHR) {
        try {
          let tasks = JSON.parse(response);

          if (tasks.length === 0) {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "No se encontraron datos",
            });
            return;
          } else {
            let template = ``;
            tasks.forEach((task) => {
              template += `<tr taskId="${task.CODIGO}">
                            <td data-titulo="FECHA">${task.FECHA}</td>
                            <td data-titulo="CODIGO PERSONAL">${task.COD_PERSONAL}</td>
                            <td data-titulo="NOMBRE">${task.NOM_PERSONAL1}</td>
                            <td data-titulo="HORA INGRESO">${task.HORA_INGRESO}</td>
                            <td data-titulo="HORA SALIDA">${task.HORA_SALIDA}</td>
                            <td data-titulo="INGRESO MARCADO">${task.ING_PROGRAMADO}</td>
                            <td data-titulo="SALIDA MARCADA">${task.SAL_PROGRAMADO}</td>
                          </tr>`;
            });
            $("#tablaEmpleadoLista").html(template);
            $("#fecha_inicio").val("");
            $("#fecha_fin").val("");
          }
        } catch (error) {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Se inserto mal los datos",
          });
          $("#fecha_inicio").val("");
          $("#fecha_fin").val("");
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Error en la consulta: " + textStatus + " - " + errorThrown,
        });
      },
    });
  });

  function fetchTasks() {
    const accion = "buscarempleado";
    var searchInicio = "";
    var searchFin = "";
    var empleadosLista = $("#vroficina").val();
    var codPersonal = $("#vrcodpersonal").val();

    $.ajax({
      url: "./c_almacen.php",
      data: {
        accion: accion,
        searchinicio: searchInicio,
        searchfin: searchFin,
        empleadosLista: empleadosLista,
        codPersonal: codPersonal,
      },
      type: "POST",
      success: function (response) {
        if (!response.error) {
          let tasks = JSON.parse(response);

          let template = ``;
          tasks.forEach((task) => {
            template += `<tr taskId="${task.CODIGO}">

            <td data-titulo="FECHA">${task.FECHA}</td>
            <td data-titulo="CODIGO PERSONAL">${task.COD_PERSONAL}</td>
            <td data-titulo="NOMBRE" >${task.NOM_PERSONAL1}</td>
            <td data-titulo="HORA INGRESO">${task.HORA_INGRESO}</td>
            <td data-titulo="HORA SALIDA">${task.HORA_SALIDA}</td>
            <td data-titulo="INGRESO MARCADO">${task.ING_PROGRAMADO}</td>
            <td data-titulo="SALIDA MARCADA">${task.SAL_PROGRAMADO}</td>

            </tr>`;
          });

          $("#tablaEmpleadoLista").html(template);
        }
        // console.log(JSON.parse(response));
      },
    });
  }
});
