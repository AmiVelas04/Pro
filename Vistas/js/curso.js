
function habilitar(value1,value2,value3,value4){
    if (value1!="0" && value2!="0" && value3!="0" && value4!="0")
    {
        document.getElementById("save").disabled=false;
        if (value1!="0" && value2!="0")
        {
recargarlista();
        }
        else
        {

        }
    }

    else
    {
        document.getElementById("save").disabled=true;
    }

}

function  mostrar_grad(usu){
    
 busca_grad(usu);

}

function mostrar_curso(usu){
    
buscar_cur(usu);
}

function  alumnos(usu){
    var curso;
    var grado;
    var carrera
    carrera=$('#carrerac').val();
    grado=$('#gradoc').val();
    curso=$('#cursos').val();
    
    if (grado!=0 && carrera!=0 && curso!=0)
    {
    buscar_alu(usu);
    }
    else{
        alert ("no se ha escogido un valor correcto");
    }
}



function recargarlista(){
    $.ajax({
    type:"POST",
    url: "ajax/cursoajax.php",
    data:{carrera:  $('#carrera').val(),grado:  $('#grado').val()},
    success: function(r){
        $('#curso').html(r);
    }
    });
}
//busca los grados asignadoa al catedratico
function busca_grad(usu){

    $.ajax({
        type:"POST",
        url: "ajax/cursoajax.php",
        data:{carr: $('#carrerac').val(),usuario:usu},
        success: function(a){
            $('#mgrado').html(a);
        }
    });
}

//Busca los cursos asignados al catedraticos



function buscar_cur(usu){
        
    $.ajax({
        type:"POST",
        url:"ajax/cursoajax.php",
        data:{carre:$('#carrerac').val(),grado:$('#gradoc').val(),usuario:usu},
        success:function(h){
         
$('#mostracurso').html(h);
        }
       });
}

function buscar_alu(usu){
    $.ajax({
        type:"POST",
        url:"ajax/cursoajax.php",
        data:{car:$('#carrerac').val(),grad:$('#gradoc').val(),cur:$('#cursos').val(),usuario:usu,},
        success: function(r){
            
            $('#alumn').html(r);
        }
    });
}





