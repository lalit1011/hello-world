<?php 
include('navbar_layout.php');
 ?>
<!DOCTYPE HTML>
<html>
<head>

<script>
function allowDrop(ev){
    
    ev.preventDefault();
}

function drag(ev){
    console.log(ev);
    ev.dataTransfer.setData("text", ev.target.id);
}
function drop(ev){
    ev.preventDefault();
    var data = ev.dataTransfer.getData('text');
    ev.target.appendChild(document.getElementById(data));
}
</script>
</head>
<body>
<div class="container">
 
   <div id='div1' class="well" ondrop="drop(event)" ondragover="allowDrop(event)">
       
   </div>
    <p id="drag2" draggable="true" ondragstart="drag(event)">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
</div>
</body>
</html>

