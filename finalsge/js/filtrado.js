var busqueda = document.getElementById('buscar');
var busquedaDetalle = document.getElementById('buscarDetalle');
var table = document.getElementById("tabla").tBodies[0];
var tableDetalle = document.getElementById("tablaDetalle").tBodies[0];

buscaTabla = function () {
  texto = busqueda.value.toLowerCase();
  var r = 0;
  while (row = table.rows[r++]) {
    if (row.innerText.toLowerCase().indexOf(texto) !== -1)
      row.style.display = null;
    else
      row.style.display = 'none';
  }
}

buscaTablaDetalle = function () {
  textoD = busquedaDetalle.value.toLowerCase();
  var r = 0;
  while (row = tableDetalle.rows[r++]) {
    if (row.innerText.toLowerCase().indexOf(textoD) !== -1)
      row.style.display = null;
    else
      row.style.display = 'none';
  }
}

busqueda.addEventListener('keyup', buscaTabla);
busquedaDetalle.addEventListener('keyup', buscaTablaDetalle);

