var busqueda = document.getElementById('buscar');
var busquedaProd = document.getElementById('buscarProd');
var table = document.getElementById("categorias").tBodies[0];
var tableProd = document.getElementById("productos").tBodies[0];

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

buscaTablaProd = function () {
  textoD = busquedaProd.value.toLowerCase();
  var r = 0;
  while (row = tableProd.rows[r++]) {
    if (row.innerText.toLowerCase().indexOf(textoD) !== -1)
      row.style.display = null;
    else
      row.style.display = 'none';
  }
}

busqueda.addEventListener('keyup', buscaTabla);
busquedaProd.addEventListener('keyup', buscaTablaProd);

