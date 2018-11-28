<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<!-- <link href="<?php echo base_url ();?>assets/dist/css/estiloprueba.css" rel="stylesheet"> -->
<link href="<?php echo base_url ();?>assets/dist/css/estilotest.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/dist/js/jquery-3.1.1.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bower_components/font-awesome/css/font-awesome.min.css">

<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>



</head>
<body style="background-image: url('<?php echo base_url();?>assets/dist/img/p.pn')">
	<div class="container-fluid">

	<div class="row">

		<div class="col-md-4">
			<br>
			<p>
				<span class="im"><img class="img" src="<?php echo base_url();?>assets/dist/img/p.png"/></span>
 			 </p>
			 	<!-- <div id="timer" class="temporizador"></div> -->
		</div>



	<h6 id="text"></h6>

	<div class="contenedor">

			<div id="media" class="encabezado">
					<h4 id="encabezado" class="textencabezado"></h4>
			</div>
			<div  class="enca" style="margin-left:280px; margin-top:-30px">
						<audio style="left:50px; top:-100px" id="player" controls=""></audio>
			</div>
			<br><br>
			<!-- <hr> -->
			<br>
			<div>
				<strong><h3 id="tex"></h3></strong><br><br>

  <div id="pregunta" class="question encabezado">
    <h2 id="preg" class="texto"><br></h2>
  </div>


	<br><br>
<a id="regresar" href="<?php echo base_url();?>welcome/prueba" class='btn btn-default btn-flat' style="background:#4DB6AC;  width:300px;height:50px; display:none; margin-left:300px;">Go Back</a>


	<br>
	<br>

</div>


			<div id="answer"  class="answer">

			</div>
			<div id="data" ></div>
			<div id="text">
				<input type="hidden" id="dato">
			</div>

			<div class="boton">
				<button id="boton" class="envia">Next</button>
				<br>
				<p id="resolucion"></p>
			</div>

		</div>

		<div id="timer" class="temporizador"></div>
		<div class="col-md-4">
				<div id="limit" class="tempo"><b>Limit Time</b></div>
			<h6 id="text"></h6>
		</div>
	</div>
</div>


<div style="min-height: 400px">

	<table width="100%" class="table">

	</table>
</div>
<input type="hidden" name="" id="url" value="<?php echo base_url(); ?>">
<input type="hidden" name="" id="code">


<script>
vecacertadas=[];
var	vecfallidas=[];
var codigop=0;
var codigoq=[];
var elemento;
var value;
var dar;
var code =[];
 respues = [];
  respues1 = [];
	 respues2 = [];
	  respues3 = [];
		 respues4 = [];
 correc=[];
 correc1=[];
 correc2=[];
 correc3=[];
 correc4=[];
 	var nuevo = [];
	var nuevo1 = [];
	var preguntas = [];
	var objeto = [];
	var objetos = [];
	var temafallidas = [];
	var temacorrectas = [];
	var temfailed=[];
	var recargadas = [];
	var objetor = [];
	var titulos=[];
	var titulos1=[];
	var titulosA=[];
	var titulosB1=[];
	var titulosAB1=[];
	var a1=[];
	var coderead=[];
    pregunta="",
    respuesta="",
	extra="";
	item="";

    //answe,
			contador=0;
			formuladas = 0,
			limitepreguntas=0;
			nivel="";
			acertadas = 0;
			fallidas = 0;
			var value;
			var answertext="";
			var correct;
		//hazPregunta();
		for(i=1; i<=4; i++){
			titulos[i]=i;
		}
		for(i=1; i<=2; i++){
			titulos1[i]=i+4;
		}
		for(i=1; i<=2; i++){
			titulosA[i]=i+6;
		}
		for(i=1; i<=3; i++){
			titulosB1[i]=i+10;
		}
		for(i=1; i<=2; i++){
			titulosAB1[i]=i+8;
		}
		consentimiento();
		preguntas1();
		objects();
		setup();
		function preguntas1(){

			valor=numAleat(1,titulos.length-1);
			element=valor;
			tit = titulos.splice( valor, 1 );

			var ata="A1";
			title=tit.toString();
			//alert(title);

			if(title!=""){
			$.ajax({
				url:$("#url").val()+"inicio/preguntastodo",
				type:"post",
				data:{xnivel:ata,title:title},
				beforeSend:function(){
					$("#resultados").html("espere un momento ......");
				},
				success:function(datos){
					//console.log(datos);
					var obj = JSON.parse(datos);
					//console.log("preguntas nivel A1"+obj);
					//console.log('tamano'+obj.length);
					console.log(obj);


					encabezado=obj[0]['contenido'];
					// document.getElementById('encabezad').innerHTML = encabezado;

					///
						document.getElementById('mensaje1').innerHTML=encabezado;

							$(document).ready(function()
							{
								$("#modal-message").modal("show");
							});

					///



					text=obj[0]['content'];
					console.log('este es mi texto'+text);
					if(text=='Questions' || text=='Question'){
						ocultaMedia();
					}else{
						document.getElementById('encabezado').innerHTML = text;
						mostrarMedia();
					}


					//console.log('este es el texto'+encabezado);
					for(var i=0; i<obj.length; i++){
					nuevo1[i]=obj[i]['question'];
					}
					console.log('criollo'+nuevo1);
					for(var i=0; i<obj.length; i++){
						objeto[i]=obj[i];
					}

					console.log("tenemos las preguntas"+nuevo1);
					console.log("tenemos los objetos con atributo"+objeto);
					llenarPreguntas(nuevo1,objeto);

				},

				error:function(){
					$("#resultados").html("No se ha encontrado nada");
				},

			});
		}

		}

		function objects(){
			$.ajax({
				url:$("#url").val()+"inicio/objects",
				type:"post",
				data:{},
				beforeSend:function(){
					$("#resultados").html("espere un momento ......");
				},
				success:function(datos){
					//console.log(datos);
					var obj = JSON.parse(datos);
					//console.log("preguntas nivel A1"+obj);
					//console.log('tamano'+obj.length);
					console.log(obj);

					for(var i=0; i<obj.length; i++){
						a1[i]=obj[i];
					}
					//alert('objects'+a1);
				},
				error:function(){
					$("#resultados").html("No se ha encontrado nada");
				},

			});
		}

		function llenarPreguntas(nuev,objec){
			//nuevo.length=0;
			//objetos.length=0;
			//vecacertadas.length=0;
			//vecfallidas.length=0;
			//temafallidas.length=0;
			//temacorrectas.length=0;
			acertadas=0;
			fallidas=0;

			for(var i=0; i<nuev.length; i++){
					nuevo[i]=nuev[i];
			}
			//alert("cual es el tamaño de el vector"+nuevo.length);
			for(var i=0; i<objec.length; i++){
					objetos[i]=objec[i];
			}

			console.log("datos nuevos"+nuevo);
			console.log("objetos nuevos saber nivel"+objetos[0]['level']);
			nivel=objetos[0]['level'];

			//alert('nivel en el que estamos : '+nivel);
			item=objetos[0]['item_eval'];
			//alert('item de evaluacion'+item);
			if(item=='Grammar' || item=='Reading' || item=='reading'){
				muestraTextos();
				//muestraAudios();
			}
			if(item=='Listening'){
				muestraAudios();
			}
			console.log("esta contiene la variable de nivel dario"+nivel+'oveja');

			if(nivel=='A1'){

				if(item=='Reading' || item=='reading'){
					limitepreguntas=5;
					hazpreguntaRB();

				}else{
					limitepreguntas=5;
				hazPregunta();
				}

			}
			if(nivel=='A2' && extra=='6'){
				formuladas=0;
				limitepreguntas=15;
				hazPregunta();
			}
			if(nivel=='A2' && extra=='5'){
				formuladas=0;
				limitepreguntas=5;
				//hazPregunta();
				hazpreguntaRB();
			}
			if(nivel=='2A' && extra=='7'){
				formuladas=0;
				limitepreguntas=5;
				hazPregunta();
			}
			if(nivel=='2A' && extra=='8'){
				formuladas=0;
				limitepreguntas=4;
				hazPregunta();
			}

			if (nivel=='B1' && extra=='11') {
				formuladas=0;
				limitepreguntas=5;
				hazPregunta();
			}
			if (nivel=='B1' && extra=='12') {
				formuladas=0;
				limitepreguntas=5;
				hazpreguntaRB();
			}
			if (nivel=='B1' && extra=='13') {
				formuladas=0;
				limitepreguntas=5;
				hazPregunta();
			}
			if(nivel=='1B' && extra=='9'){
				formuladas=0;
				limitepreguntas=4;
				hazPregunta();
			}
			if(nivel=='1B' && extra=='10'){
				formuladas=0;
				limitepreguntas=4;
				hazPregunta();
			}

			//hazPregunta();

		}

		/*
			Formula una pregunta al usuario...
		*/
		function hazPregunta(){
			console.log('entro');
			var val;
			var e,a;			// simple variable auxiliar
			console.log('Que tenemos de nuevo : '+nuevo);

			value=numAleat(0,nuevo.length-1);
			elemento=value;
			//alert("esto me retorna : "+value);

			// se extrae una pregunta/respuesta al azar del array...
			e = nuevo.splice( value, 1 );

			var pregunta = e;			// se guardan la pregunta y la respuesta
			console.log("pregunta elegida"+pregunta);
			//alert('pregunta elegida'+pregunta);
			//alert("pregunta elegida"+pregunta);
			// comparamos pregunta y traemos el codigo de ella para segun eso traer las
			//respuestas
			mostrarPreg();
			$.ajax({
				url:$("#url").val()+"inicio/pregunta",
				type:"post",
				data:{xpregunta:pregunta},
				beforeSend:function(){
					$("#resultados").html("espere un momento ......");
				},
				success:function(datos){

					var obj = JSON.parse(datos);


					document.getElementById('preg').innerHTML = pregunta;
					formuladas++;
					//alert("hemos formulado hasta el momento : "+formuladas);
					for(i=0;i<obj.length;i++){
					dar=(obj[i]['code_question']);
					}
					console.log("listo"+dar);
					respuestas(dar);

				},

				error:function(){
					$("#resultados").html("No se ha encontrado nada");
				},

			});

		}

		///cambio
		var countr=0;
		function hazpreguntaR(){
			console.log('entro');
			var countr=0;
			var val;
			var e,a;			// simple variable auxiliar
			console.log('Que tenemos de nuevo : '+nuevo);

			// value=numAleat(0,nuevo.length-1);
			value=countr;
			elemento=value;
			//alert("esto me retorna : "+value);

			// se extrae una pregunta/respuesta al azar del array...
			e = nuevo.splice( value, 1 );
			var pregunta = e;			// se guardan la pregunta y la respuesta
			console.log("pregunta elegida"+pregunta);
			//alert('pregunta elegida'+pregunta);
			//alert("pregunta elegida"+pregunta);
			// comparamos pregunta y traemos el codigo de ella para segun eso traer las
			//respuestas

			$.ajax({
				url:$("#url").val()+"inicio/pregunta",
				type:"post",
				data:{xpregunta:pregunta},
				beforeSend:function(){
					$("#resultados").html("espere un momento ......");
				},
				success:function(datos){

					var obj = JSON.parse(datos);


					document.getElementById('preg').innerHTML = pregunta;
					formuladas++;
					//alert("hemos formulado hasta el momento : "+formuladas);
					for(i=0;i<obj.length;i++){
					dar=(obj[i]['code_question']);
					}
					console.log("listo"+dar);
					respuestas(dar);

				},

				error:function(){
					$("#resultados").html("No se ha encontrado nada");
				},

			});

		}

		var countr=0;
		function hazpreguntaRB(){
			console.log('entro');
			var countr=0;
			var val;
			var e,a;			// simple variable auxiliar
			console.log('Que tenemos de nuevo : '+nuevo);

			// value=numAleat(0,nuevo.length-1);
			value=countr;
			elemento=value;
			//alert("esto me retorna : "+value);

			// se extrae una pregunta/respuesta al azar del array...
			// e = nuevo.splice( value, 1 );
			// var pregunta = e;			// se guardan la pregunta y la respuesta
			// console.log("pregunta elegida"+pregunta);
			//alert(nuevo.toString());

			//document.getElementById('preg').innerHTML = 'Question';
				ocultarPreg();


			//alert('pregunta elegida'+pregunta);
			//alert("pregunta elegida"+pregunta);
			// comparamos pregunta y traemos el codigo de ella para segun eso traer las
			//respuestas

			$.ajax({
				url:$("#url").val()+"inicio/lectura",
				type:"post",
				data:{xpregunta:nuevo},
				beforeSend:function(){
					$("#resultados").html("espere un momento ......");
				},
				success:function(datos){
					 console.log('ojoooooo');
					console.log(datos);
					var obj = JSON.parse(datos);
					// pre="";
					// console.log(obj);
					document.getElementById('preg').innerHTML = pregunta;
					formuladas+=5;
					//alert('hasta ahora'+formuladas);
					// //alert("hemos formulado hasta el momento : "+formuladas);
					var dari =[];
					for(i=0;i<obj.length;i++){
					dari[i]=(obj[i]['code_question']);
					}
					// console.log("listo"+dar);
				//	alert(dari);
					respuestasR(dari);

				},

				error:function(){
					$("#resultados").html("No se ha encontrado nada");
				},

			});


		}

		function respuestasR(dari){

			// alert("codigo para traer respuestas : "+dari);
			// alert('mijojoooo'+dari);

			for(i=0; i<dari.length; i++){
				codigoq[i]=dari[i];
			}

			$.ajax({
				url:$("#url").val()+"inicio/codesread",
				type:"post",
				data:{xdato:dari},
				beforeSend:function(){
					$("#resultados").html("espere un momento ......");
				},
				success:function(dat){
					console.log('vivosssssss');
					console.log(dat);
					var obj = JSON.parse(dat);
					console.log('darito'+obj.length);
					answertext="";

					respues[0]=(obj[0]['option_one']);
					respues[1]=(obj[0]['option_two']);
					respues[2]=(obj[0]['option_tree']);
					respues[3]=(obj[0]['option_four']);
					respues[4]=(obj[0]['option_five']);
					respues[5]=(obj[0]['option_six']);
					respues[6]=(obj[0]['option_seven']);
					respues[7]=(obj[0]['option_eight']);
					respues[8]=(obj[0]['correct']);

					respues1[0]=(obj[1]['option_one']);
					respues1[1]=(obj[1]['option_two']);
					respues1[2]=(obj[1]['option_tree']);
					respues1[3]=(obj[1]['option_four']);
					respues1[4]=(obj[1]['option_five']);
					respues1[5]=(obj[1]['option_six']);
					respues1[6]=(obj[1]['option_seven']);
					respues1[7]=(obj[1]['option_eight']);
					respues1[8]=(obj[1]['correct']);

					respues2[0]=(obj[2]['option_one']);
					respues2[1]=(obj[2]['option_two']);
					respues2[2]=(obj[2]['option_tree']);
					respues2[3]=(obj[2]['option_four']);
					respues2[4]=(obj[2]['option_five']);
					respues2[5]=(obj[2]['option_six']);
					respues2[6]=(obj[2]['option_seven']);
					respues2[7]=(obj[2]['option_eight']);
					respues2[8]=(obj[2]['correct']);

					respues3[0]=(obj[3]['option_one']);
					respues3[1]=(obj[3]['option_two']);
					respues3[2]=(obj[3]['option_tree']);
					respues3[3]=(obj[3]['option_four']);
					respues3[4]=(obj[3]['option_five']);
					respues3[5]=(obj[3]['option_six']);
					respues3[6]=(obj[3]['option_seven']);
					respues3[7]=(obj[3]['option_eight']);
					respues3[8]=(obj[3]['correct']);

					respues4[0]=(obj[4]['option_one']);
					respues4[1]=(obj[4]['option_two']);
					respues4[2]=(obj[4]['option_tree']);
					respues4[3]=(obj[4]['option_four']);
					respues4[4]=(obj[4]['option_five']);
					respues4[5]=(obj[4]['option_six']);
					respues4[6]=(obj[4]['option_seven']);
					respues4[7]=(obj[4]['option_eight']);
					respues4[8]=(obj[4]['correct']);


					correctaR(respues,respues1,respues2,respues3,respues4);
					//alert('tamaño de las options : '+respues.length);
									answertext +='<b>I)&nbsp;&nbsp;&nbsp;</b>';
					for (var i=0; i<respues.length-1; i++) {
							if(respues[i] != undefined){
									answertext +='<input   id="test1" type="radio" value="'+i+'" name="radio-group" > <label>'+respues[i]+'</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								}

					}
						answertext +='<br>';
							answertext +='<b>II)&nbsp;&nbsp;</b>';
					for (var i=0; i<respues1.length-1; i++) {
							if(respues1[i] != undefined){
									answertext +='<input   id="test2" type="radio" value="'+i+'" name="radio-group2" > <label>'+respues1[i]+'</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								}
					}
						answertext +='<br>';
							answertext +='<b>III)&nbsp;</b>';
					for (var i=0; i<respues2.length-1; i++) {
							if(respues2[i] != undefined){
									answertext +='<input   id="test3" type="radio" value="'+i+'" name="radio-group3" > <label>'+respues2[i]+'</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								}
					}
							answertext +='<br>';
								answertext +='<b>IV)&nbsp;</b>';
					for (var i=0; i<respues3.length-1; i++) {
							if(respues3[i] != undefined){
									answertext +='<input   id="test4" type="radio" value="'+i+'" name="radio-group4" > <label>'+respues3[i]+'</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								}
					}
						answertext +='<br>';
							answertext +='<b>V)&nbsp;&nbsp;</b>';
					for (var i=0; i<respues4.length-1; i++) {
							if(respues4[i] != undefined){
									answertext +='<input   id="test5" type="radio" value="'+i+'" name="radio-group5" > <label>'+respues4[i]+'</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								}
					}
					console.log(answertext);

					if (code==100 || code==110) {
						text = document.getElementById('text');
									text.style.display = '';

						div = document.getElementById('answer');
									div.style.display = 'none';
					}else{
						div = document.getElementById('answer');
									div.style.display = '';

						document.getElementById('answer').innerHTML = answertext;
						text = document.getElementById('text');
									text.style.display = 'none';
					}
				},
				error:function(){
					$("#resultados").html("No se ha encontrado nada");
				},
			});
		}

		function respuestas(code){
			codigop=code;
			//alert("codigo para traer respuestas : "+code);
			$.ajax({
				url:$("#url").val()+"inicio/busca",
				type:"post",
				data:{xdato:code},
				beforeSend:function(){
					$("#resultados").html("espere un momento ......");
				},
				success:function(dat){
					var obj = JSON.parse(dat);

					answertext="";
					for(i=0;i<obj.length;i++){
					respues[0]=(obj[i]['option_one']);
					respues[1]=(obj[i]['option_two']);
					respues[2]=(obj[i]['option_tree']);
					respues[3]=(obj[i]['option_four']);
					respues[4]=(obj[i]['option_five']);
					respues[5]=(obj[i]['option_six']);
					respues[6]=(obj[i]['option_seven']);
					respues[7]=(obj[i]['option_eight']);
					respues[8]=(obj[i]['correct']);
					}

					correcta(respues);
					//alert('tamaño de las options : '+respues.length);

					for (var i=0; i<respues.length-1; i++) {
						if(respues[i] != undefined){
							if(extra=='11'){
									answertext +='<input   id="test1" type="radio" value="'+i+'" name="radio-group" > <label>'+respues[i]+'</label>&nbsp;&nbsp;&nbsp;';
							}else{
								//alert('tamaño option answers : '+respues.length);
									answertext +='<input   id="test1" type="radio" value="'+i+'" name="radio-group" > <label>'+respues[i]+'</label><br>';
							}

						}

					}
					console.log(answertext);

					if (code==100 || code==110) {
						text = document.getElementById('text');
            			text.style.display = '';

						div = document.getElementById('answer');
            			div.style.display = 'none';
					}else{
						div = document.getElementById('answer');
            			div.style.display = '';

						document.getElementById('answer').innerHTML = answertext;
						text = document.getElementById('text');
            			text.style.display = 'none';
					}
				},
				error:function(){
					$("#resultados").html("No se ha encontrado nada");
				},
			});
		}

		function correcta(correct){
			//alert("esta es la respuesta correcta"+correct[8]);
			for (var i =0; i <= correct.length; i++) {
				correc[i]=correct[i];
			};

			//alert("tenemos las respuestas : "+correc);
		}
		function correctaR(correct,correct1,correct2,correct3,correct4){
			// alert("esta es la respuesta correcta"+correct[8]);
			// 	alert("esta es la respuesta correcta"+correct1[8]);
			// 		alert("esta es la respuesta correcta"+correct2[8]);
			// 			alert("esta es la respuesta correcta"+correct3[8]);
			// 				alert("esta es la respuesta correcta"+correct4[8]);
			for (var i =0; i <= correct.length; i++) {
				correc[i]=correct[i];
			};
			for (var i =0; i <= correct1.length; i++) {
				correc1[i]=correct1[i];
			};
			for (var i =0; i <= correct2.length; i++) {
				correc2[i]=correct2[i];
			};
			for (var i =0; i <= correct3.length; i++) {
				correc3[i]=correct3[i];
			};
			for (var i =0; i <= correct4.length; i++) {
				correc4[i]=correct4[i];
			};

			//alert("tenemos las respuestas : "+correc);
		}

		fallid=0;
		acert=0;
		cont=0;



	//	alert('se traba');
		document.getElementById('boton').addEventListener('click', function(){
			var miAudio=document.getElementById("player");
			miAudio.pause();
			console.log('el conteo es : '+contador);


			var entradatext = document.getElementById("dato").value;
			//var entrada = document.getElementById("answer").value;

			// var entrada= $("input[type=radio]:checked").val();

			var entrada=$('input[name=radio-group]:checked').val();
			//
			var entrada2=$('input[name=radio-group2]:checked').val();
			var entrada3=$('input[name=radio-group3]:checked').val();
			var entrada4=$('input[name=radio-group4]:checked').val();
			var entrada5=$('input[name=radio-group5]:checked').val();

			// var tamaño=$("input[type=radio]:checked").length;
			var tamaño=$('input[name=radio-group]:checked').length;
			//
			var tamaño2=$('input[name=radio-group2]:checked').length;
			var tamaño3=$('input[name=radio-group3]:checked').length;
			var tamaño4=$('input[name=radio-group4]:checked').length;
			var tamaño5=$('input[name=radio-group5]:checked').length;

			var tot=tamaño+tamaño2+tamaño3+tamaño4+tamaño5;
			//alert('tamaño total : '+tot);
			//alert("tenemos lo escrito por usuario"+entradatext);

			if (tamaño==0 && entradatext !== "") {
				tamaño=1;
			}else{
				//alert("llenar texto");
			}
			//tamaño texto y opcion multiple

			elegida=correc[entrada];

			elegida1=correc1[entrada2];
			elegida2=correc2[entrada3];
			elegida3=correc3[entrada4];
			elegida4=correc4[entrada5];

			verdadera=correc[8];

				verdadera1=correc1[8];
				verdadera2=correc2[8];
				verdadera3=correc3[8];
				verdadera4=correc4[8];

			console.log("entrada radio"+entrada+"tamaño elegido"+tamaño);
			console.log('verdadera : '+verdadera+'elegida : '+elegida);
			//if (elegida==verdadera) {
			//	console.log("ok acertaste viejo");
			//}else{
			//	console.log("fallaste");
			//}
//var fallid=0;
			if(item!='Reading'){
			switch(tamaño){
				case 0:
				var result='You have to choose one option';
					document.getElementById('messa').innerHTML=result;
				$(document).ready(function()
				{
					$("#alert").modal("show");
				});
				break;

				case 1:
					contador++;
					if (verdadera==elegida) {
						console.log('este es el codigop : '+codigop);
						vecacertadas[acert]=codigop;
						console.log('acertadas : '+vecacertadas.length+'todo'+vecacertadas[0]);
						acert++;
						//alert("codigos de acertadas"+vecacertadas);
						console.log("ok acertaste viejo");

					}else{
							vecfallidas[fallid]=codigop;
							fallid++;
					}

					//aqui

					if(formuladas<limitepreguntas){
						console.log('que pasa'+formuladas);
						if(item=='Reading'){
							hazpreguntaR();
						}else{
							hazPregunta();
						}

						break;
					}else{
						if(formuladas==limitepreguntas && nivel=='A1'){
							preguntas1();
							// preguntasRB();
							formuladas=0;
							//moco
						}

						if(formuladas==limitepreguntas && nivel=='A2' && (item=='Grammar' || item=='Reading')){
							preguntas2();
							formuladas=0;
						}
						if(formuladas==limitepreguntas && nivel=='2A' && item=='Listening'){
							preguntasAudios();
							formuladas=0;
						}
						if(formuladas==limitepreguntas && nivel=='B1' && (item=='Grammar' || item=='Reading')){
							preguntasB1();
							formuladas=0;
						}
						if(formuladas==limitepreguntas && nivel=='1B' && item=='Listening'){
							preguntasAudiosB1();
							formuladas=0;
						}

					}
				break;
			}
		}
			//fin swith

			// inicio otro
			if(item=='Reading'){
			switch(tot){
				case 0:
				var result='You have to answer all the questions.';
					document.getElementById('messa').innerHTML=result;
				$(document).ready(function()
				{
					$("#alert").modal("show");
				});
				break;
				case 1:
				var result='You have to answer all the questions.';
					document.getElementById('messa').innerHTML=result;
				$(document).ready(function()
				{
					$("#alert").modal("show");
				});
				break;
				case 2:
				var result='You have to answer all the questions.';
					document.getElementById('messa').innerHTML=result;
				$(document).ready(function()
				{
					$("#alert").modal("show");
				});
				break;
				case 3:
				var result='You have to answer all the questions.';
					document.getElementById('messa').innerHTML=result;
				$(document).ready(function()
				{
					$("#alert").modal("show");
				});
				break;
				case 4:
				var result='You have to answer all the questions.';
					document.getElementById('messa').innerHTML=result;
				$(document).ready(function()
				{
					$("#alert").modal("show");
				});
				break;

				case 5:
				//alert('exelente');
					contador+=5;
					if (verdadera==elegida) {
						console.log('este es el codigop : '+codigoq[0]);
						vecacertadas[acert]=codigoq[0];
						console.log('acertadas : '+vecacertadas.length+'todo'+vecacertadas[0]);
						acert++;
						//alert("codigos de acertadas"+vecacertadas);
						console.log("ok acertaste viejo");
					}else{
							vecfallidas[fallid]=codigoq[0];
							fallid++;
					}
					if (verdadera1==elegida1) {
						console.log('este es el codigop : '+codigoq[1]);
						vecacertadas[acert]=codigoq[1];
						console.log('acertadas : '+vecacertadas.length+'todo'+vecacertadas[0]);
						acert++;
						//alert("codigos de acertadas"+vecacertadas);
						console.log("ok acertaste viejo");
					}else{
							vecfallidas[fallid]=codigoq[1];
							fallid++;
					}
					if (verdadera2==elegida2) {
						console.log('este es el codigop : '+codigoq[2]);
						vecacertadas[acert]=codigoq[2];
						console.log('acertadas : '+vecacertadas.length+'todo'+vecacertadas[0]);
						acert++;
						//alert("codigos de acertadas"+vecacertadas);
						console.log("ok acertaste viejo");
					}else{
							vecfallidas[fallid]=codigoq[2];
							fallid++;
					}
					if (verdadera3==elegida3) {
						console.log('este es el codigop : '+codigoq[3]);
						vecacertadas[acert]=codigoq[3];
						console.log('acertadas : '+vecacertadas.length+'todo'+vecacertadas[0]);
						acert++;
						//alert("codigos de acertadas"+vecacertadas);
						console.log("ok acertaste viejo");
					}else{
							vecfallidas[fallid]=codigoq[3];
							fallid++;
					}
					if (verdadera4==elegida4) {
						console.log('este es el codigop : '+codigoq[4]);
						vecacertadas[acert]=codigoq[4];
						console.log('acertadas : '+vecacertadas.length+'todo'+vecacertadas[0]);
						acert++;
						//alert("codigos de acertadas"+vecacertadas);
						console.log("ok acertaste viejo");
					}else{
							vecfallidas[fallid]=codigoq[4];
							fallid++;
					}

					//aqui

					if(formuladas<limitepreguntas){
						console.log('que pasa'+formuladas);
						if(item=='Reading'){
							hazpreguntaR();
						}else{
							hazPregunta();
						}

						break;
					}else{
						if(formuladas==limitepreguntas && nivel=='A1'){
							preguntas1();
							// preguntasRB();
							formuladas=0;
							//moco
						}

						if(formuladas==limitepreguntas && nivel=='A2' && (item=='Grammar' || item=='Reading')){
							preguntas2();
							formuladas=0;
						}
						if(formuladas==limitepreguntas && nivel=='2A' && item=='Listening'){
							preguntasAudios();
							formuladas=0;
						}
						if(formuladas==limitepreguntas && nivel=='B1' && (item=='Grammar' || item=='Reading')){
							preguntasB1();
							formuladas=0;
						}
						if(formuladas==limitepreguntas && nivel=='1B' && item=='Listening'){
							preguntasAudiosB1();
							formuladas=0;
						}

					}
				break;
			}
		}



			if(contador==20 && nivel=='A1'){
				//alert('finaliza nivel1');
					muestraResultado();
			}
			if(contador==20 && nivel=='A2' && (item=='Reading' || item=='Grammar')){
				//alert('finaliza nivel1');
					muestraResultado();
			}
			if(contador==9 && nivel=='2A' && item=='Listening'){
			//	alert('finaliza nivel2 audios');
					muestraResultado();
			}
			if(contador==15 && nivel=='B1' && (item=='Reading' || item=='Grammar')){
			//	alert('finaliza nivelB1');
					muestraResultado();
			}
			if(contador==8 && nivel=='1B' && item=='Listening'){
			//	alert('finaliza nivel B1 audios');
					muestraResultado();
			}
		});

		function muestraResultado(){
					//alert('objetos : '+objetos);
					//document.write(vecfallidas);
          console.log("estes son los elementos para analizar  correctas"+vecacertadas);
          console.log("estes son los elementos para analizar  fallidas"+vecfallidas);
          for(var i=0; i<vecfallidas.length; i++){
							console.log("veamos que tiene fallidas"+vecfallidas[i]);
          	for(var j=0; j<a1.length; j++){
							console.log("veamos que tiene objeto"+a1[j]['code_question']);
          		if (vecfallidas[i]==a1[j]['code_question']) {
								//alert('son iguales'+a1[j]['code_question']+'mas'+vecfallidas[i]);
          			//console.log("tenemos el objeto"+objetos[i]['id_preg']+"con el"+vecfallidas[j]);
          			temfailed[i]=a1[j]['item_eval'];
								//alert('Numero fallidas : '+temfailed.length);
          		}
          	}
          }
					for(var i=0; i<vecacertadas.length; i++){
							console.log("veamos que tiene fallidas"+vecacertadas[i]);
						for(var j=0; j<a1.length; j++){
							console.log("veamos que tiene objeto"+a1[j]['code_question']);
							if (vecacertadas[i]==a1[j]['code_question']) {
								//alert('son iguales'+a1[j]['code_question']+'mas'+vecacertadas[i]);
								//console.log("tenemos el objeto"+objetos[i]['id_preg']+"con el"+vecfallidas[j]);
								temacorrectas[i]=a1[j]['item_eval'];
								//alert('Numero Correctas'+temacorrectas.length);

							}
						}
					}
					//alert('fallidas'+temfailed);
					//alert('correctas'+temacorrectas);
					console.log('correct'+temacorrectas);


				//	alert("como se envia las fallidas"+temafallidas);
				//	alert("como se envia las correctas"+temacorrectas);
          console.log("tenemos los temas de las fallidas"+temfailed);
          //tenemos que hacer coincidir que la pregunta acerta con el objeto de objetos
          //para comparar los atributos de igual manera para la fallidas
					//veamos
					if (nivel=='A1' && (vecfallidas.length==0)) {
						console.log('se me tio a qui');
						enviaResultado();
					}
					if (nivel=='A1' && (vecfallidas.length>0 && vecfallidas.length<=4)) {
					//	alert('opcion 2 ');
						enviaResultado();
					}
					if (nivel=='A1' && (vecfallidas.length>4 && vecfallidas.length<=20)) {
						enviaResultado();
					}
					if(nivel=='2A' && vecfallidas.length==0){
					//	alert('fin de audio');
						enviaResultado();
					}
					if (nivel=='2A' && (vecfallidas.length>0 && vecfallidas.length<=2)) {
						//alert('opcion 2 ');
						enviaResultado();
					}
					if (nivel=='2A' && vecfallidas.length>2 ) {
						enviaResultado();
					}
					if (nivel=='A2' && (vecfallidas.length==0)) {
						enviaResultado();
					}
					if (nivel=='A2' && (vecfallidas.length>0 && vecfallidas.length<=4)) {
						enviaResultado();
					}
					if (nivel=='A2' && (vecfallidas.length>4 && vecfallidas.length<=20)) {
						enviaResultado();
					}
					if (nivel=='B1' && (vecfallidas.length==0)) {
						//var result='TU NIVEL ES B1 :)';
					 //	document.getElementById('resolucion').innerHTML=result;
						enviaResultado();
					}
					if (nivel=='B1' && (vecfallidas.length>0 && vecfallidas.length<=2)) {
						// var result='TU NIVEL ES B1 :)';
					 	// document.getElementById('resolucion').innerHTML=result;
						enviaResultado();
					}
					if (nivel=='B1' && (vecfallidas.length>2 && vecfallidas.length<=15)) {
						// var result='TU NIVEL ES A2 NO CONSEGUISTE PASAR EL NIVEL B1 :)';
					 	// document.getElementById('resolucion').innerHTML=result;
						enviaResultado();
					}
					if (nivel=='1B' && (vecfallidas.length==0)) {
						// var result='TU NIVEL ES A2 NO CONSEGUISTE PASAR EL NIVEL B1 :)';
					 	// document.getElementById('resolucion').innerHTML=result;
						enviaResultado();
					}
					if (nivel=='1B' && (vecfallidas.length>0 && vecfallidas.length<=2)) {
						// var result='TU NIVEL ES B1 :)';
						// document.getElementById('resolucion').innerHTML=result;
						enviaResultado();
					}
					if (nivel=='1B' && (vecfallidas.length>2 && vecfallidas.length<=8)) {

						enviaResultado();
					}

		}

		function enviaResultado(){
			console.log('acertadas'+vecacertadas);
			console.log('fallidas'+vecfallidas);

			tamanoacertadas=vecacertadas.length;
			tamanofallidas=temafallidas.length;
			fall=vecfallidas.length;
			nivelactual=nivel;
			//FERNANDO
		//	alert("acertadas"+tamanoacertadas+"fallidas"+vecfallidas.length+"nivel actual"+nivelactual);

			console.log('tamano de las fallidas'+vecfallidas.length+'nivel actual : '+nivelactual);

			$.ajax({
				url:$("#url").val()+"inicio/respuesta",
				type:"post",
				data:{fallidas:fall,nivel:nivelactual,correct:temacorrectas,failed:temfailed},
				beforeSend:function(){
					$("#resultados").html("espere un momento ......");
				},
				success:function(dat){
					nuevo.length=0;
					objetos.length=0;
					vecacertadas.length=0;
					acert=0;
					fallid=0;
					vecfallidas.length=0;
					temafallidas.length=0;
					temacorrectas.length=0;
					temfailed.length=0;
					contador=0;

					console.log("como se envian"+dat);

					var obj = JSON.parse(dat);
					console.log("preguntas nivel A2"+obj);
					if(obj=='true'){
					//	alert('vamos a nivel A2');
						preguntas2();
					}
					if(obj=='falseA1'){
						ocultarTodo();
						var result='<p>Your Level is A1, Keep Working</p><br><p>you must improve in vocabulary, grammar and reading</p>';
							document.getElementById('mensaje').innerHTML=result;
							document.getElementById("imagen").innerHTML='<img src="../assets/dist/img/sad.png" />';
						$(document).ready(function()
						{
		 					$("#modal-default").modal("show");
						});

					}
					if(obj=='trueA2'){
						preguntasAudios();
					}
					if(obj=='falseA2'){
						ocultarTodo();
						var result='<p>Your Level A2</p><br><p>you must improve in grammar and reading Level A2</p>';
						document.getElementById('mensaje').innerHTML=result;
						document.getElementById("imagen").innerHTML='<img src="../assets/dist/img/medio.png" />';
					$(document).ready(function()
					{
						$("#modal-default").modal("show");
					});
					}
					if(obj=='trueB1'){
						preguntasB1();
					}
					if(obj=='falseB1'){
						ocultarTodo();
						var result='<p>Your Level A2 + </p><br><p>you must improve in Listening level A2</p>';
						document.getElementById('mensaje').innerHTML=result;
							document.getElementById("imagen").innerHTML='<img src="../assets/dist/img/medio.png" />';
 				 		$(document).ready(function()
 				 		{
 					 		$("#modal-default").modal("show");
 				 		});
					}
					if(obj=='true1B'){
						preguntasAudiosB1();
					}
					if(obj=='false1B'){
						ocultarTodo();
						var result='<p>Your Level B1<p><br><p>you must improve in Listening level B1</p>';
						document.getElementById('mensaje').innerHTML=result;
							document.getElementById("imagen").innerHTML='<img src="../assets/dist/img/medio.png" />';
						$(document).ready(function()
						{
							$("#modal-default").modal("show");
						});
					}
					if(obj=='trueB1F'){
						ocultarTodo();
						var result='Your Level B1 +';
						document.getElementById('mensaje').innerHTML=result;
						document.getElementById("imagen").innerHTML='<img src="../assets/dist/img/happy.png" />';
						$(document).ready(function()
						{
							$("#modal-default").modal("show");
						});
					}
					if(obj=='falseB1F'){
						ocultarTodo();
						var result='Your Level B1';
						document.getElementById('mensaje').innerHTML=result;
						document.getElementById("imagen").innerHTML='<img src="../assets/dist/img/happy.png" />';
					$(document).ready(function()
					{
						$("#modal-default").modal("show");
					});
					}


					//llenarPreguntas(recargadas,objetor);
					//vamos a ejecutar la misma fucion preguntas1
					//preguntas2();

				},
				error:function(){
					$("#resultados").html("No se ha encontrado nada");
				},
			});

		}

		function preguntas2(){
			nuevo.length=0;
			objetos.length=0;
			nuevo1.length=0;
			//alert('contenido'+titulos1);
			valor=numAleat(1,titulos1.length-1);
			element=valor;
			tit = titulos1.splice( valor, 1 );

			var ata="A2";
			title=tit.toString();
			extra=title;
			//alert(title);
			if(title!=""){
			$.ajax({
				url:$("#url").val()+"inicio/preguntastodo",
				type:"post",
				data:{xnivel:ata,title:title},
				beforeSend:function(){
					$("#resultados").html("espere un momento ......");
				},
				success:function(datos){
					//console.log(datos);
					var obj = JSON.parse(datos);
					//console.log("preguntas nivel A1"+obj);
					//console.log('tamano'+obj.length);
					console.log(obj);


					encabezado=obj[0]['contenido'];
					// document.getElementById('encabezad').innerHTML = encabezado;
					///
						document.getElementById('mensaje1').innerHTML=encabezado;

							$(document).ready(function()
							{
								$("#modal-message").modal("show");
							});

					///
					text=obj[0]['content'];
						console.log('este es mi texto'+text);
						if(text=='Questions' || text=='Question'){
							ocultaMedia();
						}else{
							document.getElementById('encabezado').innerHTML = text;
							mostrarMedia();
						}

					//console.log('este es el texto'+encabezado);
					for(var i=0; i<obj.length; i++){
					nuevo1[i]=obj[i]['question'];
					}
					console.log('criollo'+nuevo1);
					for(var i=0; i<obj.length; i++){
						objeto[i]=obj[i];
					}

					console.log("tenemos las preguntas"+nuevo1);
					console.log("tenemos los objetos con atributo"+objeto);
					llenarPreguntas(nuevo1,objeto);

				},

				error:function(){
					$("#resultados").html("No se ha encontrado nada");
				},

			});
		}

		}
		function preguntasAudios(){
			nuevo.length=0;
			objetos.length=0;
			nuevo1.length=0;
			//alert('contenido audios vector'+titulosA);
			valor=numAleat(1,titulosA.length-1);
			element=valor;
			tit = titulosA.splice( valor, 1 );

			var ata="2A";
			title=tit.toString();
			extra=title;
			//alert(title);
			if(title!=""){
			$.ajax({
				url:$("#url").val()+"inicio/preguntastodo",
				type:"post",
				data:{xnivel:ata,title:title},
				beforeSend:function(){
					$("#resultados").html("espere un momento ......");
				},
				success:function(datos){
					//console.log(datos);
					var obj = JSON.parse(datos);
					//console.log("preguntas nivel A1"+obj);
					//console.log('tamano'+obj.length);
					console.log(obj);


					encabezado=obj[0]['contenido'];
					// document.getElementById('encabezad').innerHTML = encabezado;
					////
					document.getElementById('mensaje1').innerHTML=encabezado;

				$(document).ready(function()
				{
					$("#modal-message").modal("show");
				});


					////


					text=obj[0]['content'];
						console.log('este es mi texto'+text);
						//document.getElementById('encabezado').innerHTML = text;

							$('#player').attr('src',text);

					//console.log('este es el texto'+encabezado);
					for(var i=0; i<obj.length; i++){
					nuevo1[i]=obj[i]['question'];
					}
					console.log('criollo'+nuevo1);
					for(var i=0; i<obj.length; i++){
						objeto[i]=obj[i];
					}

					console.log("tenemos las preguntas"+nuevo1);
					console.log("tenemos los objetos con atributo"+objeto);
					llenarPreguntas(nuevo1,objeto);

				},

				error:function(){
					$("#resultados").html("No se ha encontrado nada");
				},

			});
		}

		}
		 function preguntasB1(){
			 nuevo.length=0;
			 objetos.length=0;
			 nuevo1.length=0;
			// alert('contenido'+titulosB1);
			 valor=numAleat(1,titulosB1.length-1);
			 element=valor;
			 tit = titulosB1.splice( valor, 1 );

			 var ata="B1";
			 title=tit.toString();
			 extra=title;
			 //alert(title);
			 if(title!=""){
			 $.ajax({
				 url:$("#url").val()+"inicio/preguntastodo",
				 type:"post",
				 data:{xnivel:ata,title:title},
				 beforeSend:function(){
					 $("#resultados").html("espere un momento ......");
				 },
				 success:function(datos){
					 //console.log(datos);
					 var obj = JSON.parse(datos);
					 //console.log("preguntas nivel A1"+obj);
					 //console.log('tamano'+obj.length);
					 console.log(obj);


					 encabezado=obj[0]['contenido'];
					 // document.getElementById('encabezad').innerHTML = encabezado;
					 ///
						 document.getElementById('mensaje1').innerHTML=encabezado;

							 $(document).ready(function()
							 {
								 $("#modal-message").modal("show");
							 });

					 ///
					 text=obj[0]['content'];
						 console.log('este es mi texto'+text);
						 if(text=='Questions' || text=='Question'){
	 						ocultaMedia();
	 					}else{
	 						document.getElementById('encabezado').innerHTML = text;
	 						mostrarMedia();
	 					}

					 //console.log('este es el texto'+encabezado);
					 for(var i=0; i<obj.length; i++){
					 nuevo1[i]=obj[i]['question'];
					 }
					 console.log('criollo'+nuevo1);
					 for(var i=0; i<obj.length; i++){
						 objeto[i]=obj[i];
					 }

					 console.log("tenemos las preguntas"+nuevo1);
					 console.log("tenemos los objetos con atributo"+objeto);
					 llenarPreguntas(nuevo1,objeto);

				 },

				 error:function(){
					 $("#resultados").html("No se ha encontrado nada");
				 },

			 });
		 }

		 }

		function preguntasAudiosB1(){
			nuevo.length=0;
			objetos.length=0;
			nuevo1.length=0;
			//alert('contenido audios vector'+titulosAB1);
			valor=numAleat(1,titulosAB1.length-1);
			element=valor;
			tit = titulosAB1.splice( valor, 1 );

			var ata="1B";
			title=tit.toString();
			extra=title;
			//alert('tenemos title : '+title);
			if(title!=""){
			$.ajax({
				url:$("#url").val()+"inicio/preguntastodo",
				type:"post",
				data:{xnivel:ata,title:title},
				beforeSend:function(){
					$("#resultados").html("espere un momento ......");
				},
				success:function(datos){
					console.log('datos'+datos);
					var obj = JSON.parse(datos);
					//console.log("preguntas nivel A1"+obj);
					//console.log('tamano'+obj.length);
					console.log(obj);


					encabezado=obj[0]['contenido'];
					// document.getElementById('encabezad').innerHTML = encabezado;
					///
						document.getElementById('mensaje1').innerHTML=encabezado;

							$(document).ready(function()
							{
								$("#modal-message").modal("show");
							});

					///
					text=obj[0]['content'];
						console.log('este es mi texto'+text);
						//document.getElementById('encabezado').innerHTML = text;

							$('#player').attr('src',text);

					//console.log('este es el texto'+encabezado);
					for(var i=0; i<obj.length; i++){
					nuevo1[i]=obj[i]['question'];
					}
					console.log('criollo'+nuevo1);
					for(var i=0; i<obj.length; i++){
						objeto[i]=obj[i];
					}

					console.log("tenemos las preguntas"+nuevo1);
					console.log("tenemos los objetos con atributo"+objeto);
					llenarPreguntas(nuevo1,objeto);

				},

				error:function(){
					$("#resultados").html("No se ha encontrado nada");
				},

			});
		}

		}
		function muestraTextos(){

			text = document.getElementById('encabezado');
								text.style.display = 'block';
			player = document.getElementById('player');
								player.style.display = 'none';


		}
		function muestraAudios(){
			text = document.getElementById('encabezado');
								text.style.display = 'none';
			text = document.getElementById('media');
								text.style.display = 'none';
			player = document.getElementById('player');
								player.style.display = 'block';
		}
		function ocultarEncabezado(){
			text = document.getElementById('pregunta');
								text.style.display = 'none';
		}
		function mostrarEncabezado(){
			text = document.getElementById('pregunta');
								text.style.display = 'block';
		}
		function ocultaMedia(){
			text = document.getElementById('media');
			text.style.display = 'none';
		}
		function mostrarMedia(){
			text = document.getElementById('media');
			text.style.display = 'block';
		}
		function ocultarPreg(){
			text = document.getElementById('pregunta');
			text.style.display = 'none';
		}
		function mostrarPreg(){
			text = document.getElementById('pregunta');
			text.style.display = 'block';
		}
		function ocultarTodo(){
			text = document.getElementById('encabezado');
								text.style.display = 'none';
			player = document.getElementById('player');
								player.style.display = 'none';
			text = document.getElementById('pregunta');
								text.style.display = 'none';
			text = document.getElementById('media');
								text.style.display = 'none';
			btn = document.getElementById('regresar');
								btn.style.display = 'block';
			btn = document.getElementById('boton');
								btn.style.display = 'none';
			btn = document.getElementById('answer');
								btn.style.display = 'none';
			btn = document.getElementById('timer');
								btn.style.display = 'none';
		 	btn = document.getElementById('limit');
								btn.style.display = 'none';

		}

		/*
			Devuelve un número aleatorio entero entre 'min' y 'max' (ambos inclusive)
		*/
		function numAleat(min, max){
			return Math.floor( Math.random() * (max - min + 1) ) + min;
		}
		/*
			Se programa que al pulsarse el botón "Siguiente Pregunta" se compruebe si se ha acertado la pregunta, en cuyo caso, se incrementa en una unidad 'acertadas'.
			También se comprueba si ya se han realizado las 5 preguntas, en cuyo caso, se llama a 'muestraResultado()' que mostrará el resultado del juego y terminará el programa, de lo contrario, se formula una nueva pregunta.
		*/


		/*
		vamos agenerar el tiempo limite de desarrollo de el test
		*/

		function convertSecond(s){
			var min= Math.floor(s / 60);
			var sec=s%60;
			return min + ' : ' + sec;
		}
		function setup(){
			counter =0;
			timeleft=2400;

			document.getElementById('timer').innerHTML=(convertSecond(timeleft-counter));
			function timeIt(){
				counter ++;
				document.getElementById('timer').innerHTML=(convertSecond(timeleft-counter));

				var tim=document.getElementById('timer').innerHTML;
				//alert(tim);
				//alert(document.getElementById("timer").innerHTML);
				if(tim=='0 : 0'){
					// alert('funciona');
					ocultarTodo();
				}
			}
			setInterval(timeIt, 1000);
		}
		var consenti="";
		var consen="";
		function consentimiento(){

			$( document ).ready(function() {
			consenti='<b>Título de la investigación:</b>'+' PARLANA, Sistema Experto para determinar el nivel de inglés de un estudiante según el Marco Común Europeo de Referencia (MCER) para las lenguas en los estudiantes de la Facultad de Ingeniería de la Universidad de Nariño.'+'<br><br>'+
			'<b>Objetivo de la investigación:</b>'+' Determinar el nivel de inglés de los estudiantes por medio de un sistema experto.'+'<br><br>'+
			'<b>¿Qué se propone en este estudio?</b> Conocer el nivel de inglés de un estudiante por medio de un sistema experto, buscando despertar el interés de los estudiantes por el idioma inglés.'+'<br><br>'+
			'<b>Características y detalles del estudio:</b>'+'<br>'+

'-Los participantes serán seleccionados aleatoriamente con previa autorización del docente que esté a cargo.'+'<br>'+
'-La cantidad serán 100 estudiantes, repartidos entre los programas de la Faculta de Ingeniería de la siguiente manera: Cívil (38), Electrónica (30) y Sistemas (32).'+'<br>'+
'-La edad no es un factor a tener en cuenta.'+'<br>'+
'-El tiempo estimado para contestar el test será de aproximadamente 45-60 minutos.'+'<br>'+
'-El estudio no conlleva ningún tipo de riesgo.'+'<br>'+
'-el participante recibirá como beneficio, conocer cuál es su nivel de inglés actual.'+'<br>'+
'-El proceso es estrictamente confidencial, su nombre no será usado en ningún informe cuando los resultados sean publicados.'+'<br>'+
'-La participación es completamente voluntaria.'+'<br>'+
'-El participante tendrá derecho de retirarse de la investigación en cualquier momento. No habrá ningún tipo de sanción o represalia.'+'<br>';
			document.getElementById('title').innerHTML=consenti;

				$(document).ready(function()
				{
					$("#modal-consentimiento").modal("show");
					///
					// $(document).ready(function() {
					// 	$("#btn_validar").on("click", function() {
					// 		var condiciones = $("#aceptar").is(":checked");
					// 		if (!condiciones) {
					//
					// 			alert("Debe aceptar las condiciones");
					// 			consentimiento();
					// 			//event.preventDefault();
					// 		}
					// 	});
					// });
					///
				});
				});

		}
		// function validarInput() {
		// 	if ($('#firm').val() != " ") {
    //     alert('lleno');
		// 			//document.getElementById('btn_validar').disabled = false;
		// 			//return true;
    // }else{
		// 	alert('vacio');
		// 		//document.getElementById('btn_validar').disabled = true;
		// 		//return false;
		// }
		// }

		function validar(){
			 //obteniendo el valor que se puso en campo text del formulario
			 miCampoTexto = document.getElementById("firm").value;
			 //la condición
			 if ((miCampoTexto.length > 0 && $('#aceptar').prop('checked')) || ($('#aceptar').prop('checked') && miCampoTexto.length > 0 )) {
						document.getElementById('btn_validar').disabled = false;
			 }else{
				 		document.getElementById('btn_validar').disabled = true;
				 }
	 	}

		function comprobar(obj)
		{
			//alert(obj);
			conf=validar();
			alert('retorna'+conf);
			if (obj.checked && conf==true)
				document.getElementById('btn_validar').disabled = false;
			else
			    document.getElementById('btn_validar').disabled = true;
		}
		function envia(){
		//	alert('datos a enviar');
		}

</script>

<!-- <button type="button" class="btn btn-info btn-view-venta"  data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button> -->
<div class="modal fade" id="alert" >
  <div class="modal-dialog" style="box-shadow:1px 1px 1px 1px #f44336">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        	<span class="im"><img class="" src="<?php echo base_url();?>assets/dist/img/parlan.png"/><b>&nbsp;PARL</b>ANA</span>
      </div style="Left:50px">
			<div>

      <div class="encabezad" id="messa" style="margin-left:120px; margin-right:20px; font-size:20px;">

      </div>
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
				<!-- <li><a type="button" href="<?php echo base_url ();?>Welcome/datos" class="btn btn-success pull-left">graphic level</a><li>
				<li><a href="<?php echo base_url ();?>Welcome/datos" class="btn btn-success pull-left">graphic themes</a><li>
        <!-- <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        	<span class="im"><img class="" src="<?php echo base_url();?>assets/dist/img/parlan.png"/><b>&nbsp;PARL</b>ANA</span>
      </div style="Left:50px">
			<div>

      <div class="encabezad" id="mensaje" style="margin-left:80px; margin-right:20px; font-size:20px;">

      </div><br>
			<div class="modal-body" id="imagen" style="margin-left:220px;">

      </div>
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
				<!-- <li><a type="button" href="<?php echo base_url ();?>Welcome/datos" class="btn btn-success pull-left">graphic level</a><li>
				<li><a href="<?php echo base_url ();?>Welcome/datos" class="btn btn-success pull-left">graphic themes</a><li>
        <!-- <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- segundo modal -->

<div class="modal fade" id="modal-message" style="">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="align:center;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <!-- <h4 class="modal-title" style="align:center">English level</h4> -->
					<span class="im"><img class="" src="<?php echo base_url();?>assets/dist/img/parlan.png"/><b>&nbsp;PARL</b>ANA</span>
      </div style="Left:50px"><br>
			<div class="encabezad" id="mensaje1" style="margin-left:20px; margin-right:20px; font-size:20px;">
			</div>
			<br>
      <div class="modal-footer">
        <button type="button" class="btn btn-info pull-right" data-dismiss="modal">Continue</button>
				<!-- <li><a type="button" href="<?php echo base_url ();?>Welcome/datos" class="btn btn-success pull-left">graphic level</a><li>
				<li><a href="<?php echo base_url ();?>Welcome/datos" class="btn btn-success pull-left">graphic themes</a><li>
        <!-- <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--
modal para consentimiento informado de los estudiantes -->

<div class="modal fade" id="modal-consentimiento">
  <div style="width:1250px;" class="modal-dialog">
    <div class="modal-content">
      <div style="height:80px;" class="modal-header">
        <button style="display:none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        	<span class="im"><img class="" src="<?php echo base_url();?>assets/dist/img/parlan.png"/><b>&nbsp;PARL</b>ANA</span>
					<p style="text-align:center; font-size:24px; color:black; margin-top:-30px;"><b>CONSENTIMIENTO INFORMADO</b></p>
      </div style="Left:50px">
			<div>
			 <div class="encabezad" id="title" style="margin-left:80px; margin-right:20px; font-size:14px; text-align:justify;">



      </div><br>
			<div style="margin-left:60px;">
				<label><input type="checkbox" id="aceptar" onChange="validar();">      Mediante mi firma digital acepto que he leído y entendido el procedimiento descrito arriba. Los investigadores han explicado en detalle y contestado mis preguntas. Voluntariamente doy mi consentimiento para participar en este estudio y por medio de la firma acepto las condiciones del mismo.</label><br>
			</div>

			<div class="modal-body" id="imagen" style="margin-left:220px;">

      </div>
		</div>
      <div class="modal-footer">
				<div class="form-group pull-left">
					<label for="firm" class="pull-left">Signature:</label>
					<input type="text" class="form-control" id="firm" onInput="validar();">
				</div><br><br>
        <button type="button" class="btn btn-success pull-right"  id="btn_validar" data-dismiss="modal" onclick="envia();" disabled>Continue</button>
				<!-- <li><a type="button" href="<?php echo base_url ();?>Welcome/datos" class="btn btn-success pull-left">graphic level</a><li>
				<li><a href="<?php echo base_url ();?>Welcome/datos" class="btn btn-success pull-left">graphic themes</a><li>
        <!-- <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
