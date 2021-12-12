let cantidad = document.getElementsByName("cantidad");
let total = document.getElementById("total");

garrafon.addEventListener("click", function () {
  valor();
});

function valor() {
  let garrafon = document.getElementById("garrafon");
  let textoG = garrafon.options[garrafon.selectedIndex];
  let valor = textoG.text;
  let precio = valor.slice(8);
  total.value = Number(precio) * Number(cantidad[0].value);
}
