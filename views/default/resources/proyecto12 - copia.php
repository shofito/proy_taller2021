<!DOCTYPE html>
<html>
   <head>
    <title>Proyecto</title>
		<meta charset="utf-8" />

    <script>

function allowDrop(ev) {
  ev.preventDefault();
}

function crear(ev){
  var texto = "Bloque de ejemplo";
  var t = document.getElementById("ea");
  var er = document.createElement("section");
  er.id = makeid(7); // NO ME DEJABA USAAR LOS BLOQUES SIN UN ID ASI QUE NO LO BORREN
  er.innerHTML = texto;
  er.setAttribute("draggable","true");
  er.setAttribute("ondragstart",'drag(event)');
  er.className = "we";
  if ( ev.keycode == 13 ){
        ev.preventDefault();
        er.innerHTML += "<br>";
    }
  t.appendChild(er);
  if(t.childNodes.length>4){
       t.removeChild(er);
  };
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}

function eliminar(ev) {
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
  var este = document.getElementById("elim");
  este.innerHTML = "<p id='el'><b>ELIMINAR BLOQUE</b><br>(Arrástralo aquí)</p>";

}

function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}


</script>

   </head>

   <body id="body">
        <br><p id="titop">OPCIONES</p>
        <div class="element" id="derecha">
         <br><p id="descargar"><b>DESCARGAR COMO:</b></p><br>
         <button class="boton"  onclick="dPDF()">PDF</button>
         <button class="boton" onclick="dJSON()">JSON</button>
         <button class="boton" onclick="dODT()">ODT</button>
        </div>


        <p id="docc">DOCUMENTO EDITABLE</p>
        <div class="element" id="documento" ondrop="drop(event)" ondragover="allowDrop(event)" contenteditable="true">
			     <header id="titulodoc" contenteditable="true" class="header">Escribe un título aquí</header> 
           <article contenteditable="true" class="content"><p>Escribe o arrastra bloques hasta aquí</p></article>
        </div>
    
        <section id="elim" ondragover="allowDrop(event)" ondrop="eliminar(event)"><p id='el'><b>ELIMINAR BLOQUE</b><br>(Arrástralo hasta aquí)</p></section>

        <p id="tit">HERRAMIENTAS</p>
        <div class="element" id="herramientas">
        	  <div id="bloques">
              <br><p><b>BLOQUES ARRASTRABLES:</b></p>
              <section id="ea" ondragstart="crear(event)">
              <section class="we" id="drag1" draggable="true" ondragstart="drag(event)"><p>Bloque de ejemplo</p></section> 
              </section>
              <br><br>
            </div>
        </div> 
  
<script>


function dPDF(){
 
 var options = {
  // por si se quiere agregar otras cosas
  };

  var pdf = new jsPDF('p', 'pt', 'letter');
  pdf.addHTML($("#documento"), 15, 15, options, function() {
    pdf.save('informe.pdf');
  });

 
}
function dJSON(){
   // aqui falta habilitar el boton de descargar en formato json
}
function dODT(){
  // aqui falta habilitar descarga en formato ODT
}

  </script>
<br>
</body>
</html>