window.onload = function(){
    //alert('hOLA');
    validarVehiculo();
};


//funcion para llamar validacion Vehiculo
function llamarValidarVehiculo() {
   
    //se svalida el form
    $('#frmVehiculo').bootstrapValidator("validate");
    var iValido = false;
    //se recupera el estatus del form
    iValido = $('#frmVehiculo').data("bootstrapValidator").isValid();
    //se verifica si el form es valido
    if (iValido == true) {
        realizaProceso();//llamar insertar editar
    } else {
        //$.notificacionMsj(2, "Hay Campos vacíos")
        alert("Existen campos vacíos");
    }
}

//Función para validar formulario Vehiculos
function validarVehiculo() {
    $('#frmVehiculo').bootstrapValidator({
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        message: 'El valor es inválido.',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'fa fa-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            marca: {
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio.'
                    },
                    regexp: {
                        regexp: /^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/,
                        message: 'Campo no acepta caracteres especiales'
                    }
                }
            },
            modelo: {
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio.'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Campo sólo acepta nùmeros'
                    }
                }
            },
            color: {
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio.'
                    },
                    regexp: {
                        regexp: /^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/,
                        message: 'Campo no acepta caracteres especiales no números'
                    }
                }
            },
            descripcion: {
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio.'
                    },
                    regexp: {
                        regexp: /^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/,
                        message: 'Campo no acepta caracteres especiales'
                    }
                }
            },
            idTipoV: {
                excluded: false,
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio debe seleccionar una opción.'
                    }
                }
            },
            precio: {
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio.'
                    },
                    regexp: {
                        regexp: /^\d{1,10}(\.\d{1,2})?$/,
                        message: 'Campo acepta números con dos decimales'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        
    });
}//Fin funcion=========================









function readId(idVehiculo){
    var datos = { action: 'readId', idVehiculo:idVehiculo };
        $.ajax({
                data:  datos,
                url:   '../controlador/VehiculoControlador.php',
                type:  'post',
                dataType: 'json',
                success:  function (response) {
                   
                        var  respuesta = response.Mensaje;
                        //Mensaje de exito
                        alert(respuesta);
                   
                         $("#idVehiculo").val(response.arrDatos.idVehiculo);
                         $("#marca").val(response.arrDatos.marca);
                         $("#modelo").val(response.arrDatos.modelo);
                         $("#color").val(response.arrDatos.color);
                         $("#descripcion").val(response.arrDatos.descripcion);
                         $("#idTipoV").val(response.arrDatos.idTipoAuto).change();
                         $("#precio").val(response.arrDatos.precio);
                         var estado = response.arrDatos.estado;
                         if(estado == 1){   
                            $("input[name='estado']").prop("checked", true);
                        }else{
                            $("input[name='estado']").prop("checked", false);
                        }
                    },
                error: function(XMLHttpRequest, textStatus, erroThrown){
                    alert("Error al obtener datos");
                }
        });
}


function IdEliminarVehiculo(id){
    $(htxtiIdRegistroEliminar).val(id);
}

function obtenerIdEliminar(){
    var idV = $(htxtiIdRegistroEliminar).val();
    eliminarVehiculo(idV);
}

function eliminarVehiculo(idVehiculo){
   
    var datos = { action: 'delete', idVehiculo:idVehiculo };
        $.ajax({
                data:  datos,
                url:   '../controlador/VehiculoControlador.php',
                type:  'post',
                dataType: 'json',
                success:  function (response) {
                    
                    var  respuesta = response.Mensaje;
                    //Mensaje de exito
                    alert(respuesta);  
                     //recargar pagina
                    location.reload();
                },
                error: function(XMLHttpRequest, textStatus, erroThrown){
                    alert("mall");
                }
        });
}

//Funcion que Inserta y Edita
function realizaProceso(){
    var idVehiculo = $("#idVehiculo").val();
    var marca = $("#marca").val();
    var modelo = $("#modelo").val();
    var color = $("#color").val();
    var descripcion = $("#descripcion").val();
    var idTipoAuto = $("#idTipoV").val();
    var precio = $("#precio").val();
    var estado = $("input[name='estado']:checked").val();
    estado = estado != "" && estado != null && estado != undefined ? true : false;
    if(estado == true){   
        estado = 1;
    }else{
        estado = 0;
    }
    
    
    var datos = { action: 'insert',  idVehiculo: idVehiculo, marca: marca, modelo: modelo,
             color: color , descripcion:  descripcion, 
             idTipoV: idTipoAuto, precio:  precio ,
             estado: estado};
   alert(datos);
        $.ajax({
                data:  datos,
                url:   '../controlador/VehiculoControlador.php',
                type:  'post',
                dataType: 'json',
                success:  function (response) {
                  var  respuesta = response.Mensaje;
                    //Mensaje de exito
                    alert(respuesta);
                    
                    //recargar pagina
                    location.reload();
                },
                error: function(XMLHttpRequest, textStatus, erroThrown){
                    alert("mall");
                }
        });
}
