//BUSCAR CLIENTE POR SU DNI
function buscaCliente() {
  var dni = $("#dniCliente").val();
  var nombre = $("#escribeCliente").val();
  // alert(dni);
  $.ajax({
    url: "buscaCliente.php",
    type: "POST",
    data: { id: dni, nombre: nombre },
    success: function(data) {
      // $('#nombrCliente').html(data);
      alert("Bienvenido al sistema de reservas Sr. " + data);
      // window.location.reload('index.php');
    }
  });
}

//REGISTRAR RESERVA
function regReserva() {
  var cliente = $("#dniCliente").val();
  var salida = $("#salida").val();
  var llegada = $("#llegada").val();
  var fecha = $("#fecha").val();
  var hora = $("#hora").val();
  alert(cliente);
  $.ajax({
    url: "insertar.php",
    type: "POST",
    data: JSON.stringify({
      id: cliente,
      salida: salida,
      llegada: llegada,
      fecha: fecha,
      hora: hora
    }),
    dataType: "JSON",
    success: function(data) {
      // $('#nombrCliente').html(data);
      alert(data);
      // window.location.reload('index.php');
    }
  });
}

document.getElementById("automatico").click();
function buscarReserva() {
  var id = $("#buscaReserva").val();

  // alert(id);
  $.ajax({
    url: "buscaReserva.php",
    type: "POST",
    data: { dni: id },
    success: function(data) {
      // alert(data)
      $("#recibir").html(data);
      // window.location.reload('index.php');
    }
  });
}

function Eliminar(id, nombre) {
  var nombre = nombre;
  if (
    confirm(
      "Seguro que desea Eliminar la Reserva de " +
        " " +
        "[" +
        " " +
        nombre +
        " " +
        "]" +
        "?"
    )
  ) {
    var codigoCont = id;

    // alert(nombre);
    $.ajax({
      url: "elimina.php",
      type: "POST",
      data: JSON.stringify({ id: codigoCont }),
      dataType: "JSON",
      success: function(data) {
        window.location.reload("index.php");
        // alert("Seguro");
      }
    });
  }
}

//modal editar
function modal(id, nombre, salida, llegada, fecha, hora) {
  document.formu.codigoReserva.value = id;
  document.formu.salida2.value = salida;
  document.formu.llegada2.value = llegada;
  document.formu.fecha2.value = fecha;
  document.formu.hora2.value = hora;
  // $("#modalEditar").modal("show");
}
