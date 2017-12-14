//previene default
document.getElementById("formLogin").addEventListener("click", function(event){
    event.preventDefault();
});

//imprimir elementos del form, util para debuguear
//console.log(document.getElementById("formLogin").elements);

//le asigna una funcion al boton para validar los datos, si estan ok envia el formulario 
document.getElementById("formLogin").elements[4].addEventListener("click", function(){

  var form = document.getElementById("formLogin");
  var elementos = form.elements;
  var regexCampoVacio = /^[a-z0-9]+$/i;
  var regexMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

  if(regexMail.test(elementos[1].value) && regexCampoVacio.test(elementos[2].value)){
    document.getElementById("formLogin").submit();
    }
  });
