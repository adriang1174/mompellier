var numActual=0;

function moverFotos(numero) {
	$(".boton").removeClass("botonActivo");
	$("#num"+numero).addClass("botonActivo");
	
	numActual=Number(numero);
	var leftNuevo = -(numActual*810);
	$("#eventosSlider").stop().animate({ left: leftNuevo }, 400, 'easeInOutCirc' );
}

function avanzarFotos() {
	if (numActual<($(".boton").length-1)) {
		numActual=numActual+1;
		$(".boton").removeClass("botonActivo");	
		$("#num"+numActual).addClass("botonActivo");
		var leftNuevo = -(numActual*810);
		$("#eventosSlider").stop().animate({ left: leftNuevo }, 400, 'easeInOutCirc' );
	}
}

function retrocederFotos() {
	if (numActual>0) {
		numActual=numActual-1;
		$(".boton").removeClass("botonActivo");	
		$("#num"+numActual).addClass("botonActivo");
		var leftNuevo = -(numActual*810);
		$("#eventosSlider").stop().animate({ left: leftNuevo }, 400, 'easeInOutCirc' );
	}
}

function enviarForm() {
	$('#formInscribise').submit();
}

function enviarForm2() {
	$.post("/send/enviar.php", {
		sendNombre: $("#nombre").val() ,
		sendApellido: $("#apellido").val() ,
		sendTelefono: $("#telefono").val() ,
		sendEmail: $("#email").val() ,
		sendMatriculaNac: $("#matriculaNac").val() ,
		sendMatriculaProv: $("#matriculaProv").val() ,
		sendCondicion: $("#condicion").val() ,
		sendEspecialidad: $("#especialidad").val() ,
		sendInstitucion: $("#institucion").val() ,
		sendLocalidad: $("#localidad").val() ,
		sendProvincia: $("#provincia").val() ,
		sendNombreEvento: $("#nombreEvento").val()
	}, function(data) {
		if (data!="NOK") {
			jAlert('<strong>El Formulario ha sido enviado correctamente.</strong>', 'Muchas gracias por inscribirse');			
			$("#nombre").val("");
			$("#apellido").val("");
			$("#telefono").val("");
			$("#email").val("");
			$("#matriculaNac").val("");
			$("#matriculaProv").val("");
			$("#condicion").val("");
			$("#especialidad").val("");
			$("#institucion").val("");
			$("#localidad").val("");
			$("#provincia").val("");
		} else {
			jAlert('Ha ocurrido un error al enviar el Formulario. \nIntente en otro momento. Disculpe las molestias', 'Error');			
		}
	})
}

function enviarNews() {
	$.post("/send/newsletter.php", {
		sendNewsNombre: $("#newsNombre").val() ,
		sendNewsEmail: $("#newsEmail").val()
	}, function(data) {
		if (data!="NOK") {
			jAlert('<strong>Tus datos han sido enviados correctamente.</strong>', 'Muchas gracias por Suscribirte');			
			$("#newsNombre").val("Nombre...");
			$("#newsEmail").val("Email...");
		} else {
			jAlert('Ha ocurrido un error al enviar el Formulario. \nIntente en otro momento. Disculpe las molestias', 'Error');			
		}
	})
}

function populateEspec(seltxt)
{
	//Populate especialidad dropdown
	$.post("../db.php", {
	  a : "get_spec" },
	  function(data) {
		var sel = $("#especialidad");
		sel.empty();
		sel.append('<option value="">Seleccione...</option>');		
		for (var i=0; i<data.length; i++) {
			if(data[i].desc == seltxt){
				sel.append('<option value="' + data[i].id + '" selected>' + data[i].desc + '</option>');	
			}
			else{
				sel.append('<option value="' + data[i].id + '">' + data[i].desc + '</option>');
			}
		}
	  }, "json");
}

function populateCond(seltxt)
{
	$.post("../db.php", {
	  a : "get_sit" },
	  function(data) {
		var sel = $("#condicion");
		sel.empty();
		sel.append('<option value="">Seleccione...</option>');		
		for (var i=0; i<data.length; i++) {
			if(data[i].desc == seltxt){
				sel.append('<option value="' + data[i].id + '" selected>' + data[i].desc + '</option>');	
			}
			else{
				sel.append('<option value="' + data[i].id + '">' + data[i].desc + '</option>');
			}
		}
	  }, "json");
}

function populateInst(seltxt)
{
	$.post("../db.php", {
	  a : "get_inst" },
	  function(data) {
		var sel = $("#institucion");
		sel.empty();
		sel.append('<option value="">Seleccione...</option>');
		for (var i=0; i<data.length; i++) {
			if(data[i].desc == seltxt){
				sel.append('<option value="' + data[i].id + '" selected>' + data[i].desc + '</option>');	
			}
			else{
				sel.append('<option value="' + data[i].id + '">' + data[i].desc + '</option>');
			}
		}
	  }, "json");
}

$(document).ready(function () {

	$("#newsNombre").focus(function() {
		if ($(this).val()=="Nombre..."){
			$(this).val("");
		}
	});
	$("#newsNombre").blur(function() {
		if ($(this).val()==""){
			$(this).val("Nombre...");
		}
	});
	
	$("#newsEmail").focus(function() {
		if ($(this).val()=="Email..."){
			$(this).val("");
		}
	});
	$("#newsEmail").blur(function() {
		if ($(this).val()==""){
			$(this).val("Email...");
		}
	});
	
	$("#num0").addClass("botonActivo");
	
	$(".boton").click(function() {
		moverFotos(this.id.slice(3));
	});
	
	$("#flechaIzq").click(function() {
		retrocederFotos();
	});
	
	$("#flechaDer").click(function() {
		avanzarFotos();
	});	
	
	//acciones formulario Contacto;
	$("#botonInscribirse").click(function(){
/*		if ( ($("#nombre").val()!="") &&
			 ($("#apellido").val()!="") &&
			 ($("#telefono").val()!="") &&
			 ($("#email").val()!="") &&
			 ($("#matriculaNac").val()!="") &&
			 ($("#matriculaProv").val()!="") &&
			 ($("#condicion").val()!="") &&
			 ($("#especialidad").val()!="") &&
			 ($("#institucion").val()!="") &&
			 ($("#localidad").val()!="") &&
			 ($("#provincia").val()!="") )		 
		{
			enviarForm();
		} else {
			jAlert('Por favor complete todos los campos\npara poder enviar el Formulario', 'Alerta');	
		} */
							var errtxt = "";
					if(	$("#nombre").val() == '')
					{
						errtxt += 'Debe ingresar Nombre.\n';
					}
					if ($("#apellido").val() == '')
					{
						errtxt += 'Debe ingresar Apellido.\n';
					}
					if($("#telefono").val() == '')
					{
						errtxt += 'Debe ingresar Telefono.\n';
					}
					if($("#dni").val() == '')
					{
						errtxt += 'Debe ingresar DNI.\n';
					}
					if($("#email").val() == '')
					{
						errtxt += 'Debe ingresar Email.\n';
					}
					if($("#institucion").val() == '')
					{
						errtxt += 'Debe ingresar Institución.\n';
					}
					if($("#localidad").val() == '')
					{
						errtxt += 'Debe ingresar Localidad.\n';
					}
					if($("#provincia").val() == '')
					{
						errtxt += 'Debe ingresar Provincia.\n';
					}
					if (errtxt != '')
					{
						jAlert("<strong>"+errtxt+"</strong>", "Alerta");
					}
					else{
							enviarForm();
					}
	});
	
	
	$("#botonSuscribirse").click(function(){
		if (
			 ($("#newsNombre").val()!="")
			 && ($("#newsNombre").val()!="Nombre...")
			 && ($("#newsEmail").val()!="")
			 && ($("#newsEmail").val()!="Email...")
		){
			enviarNews();
		} else {
			jAlert('Por favor complete todos los campos\npara poder suscribirse al newsletter', 'Alerta');	
		}
	});
	
	$("#botonMapa").colorbox({
		iframe:true,
		width:"640",
		height:"480"
	});

});