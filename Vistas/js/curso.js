
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

/*
$(function(){
    curso();
})

function curso(){
    $.ajax({
        url:cursoCotrolador.php
    })
}*/


