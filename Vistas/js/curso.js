
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

function  mostrar_grad(valor){
    
    
    if (valor!="0")
    {

        busca_grad();
  
    }
    else    
    {
     
       // document.getElementById("grado").disabled=true;
      //  document.getElementById("curso").disabled=true;

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

function busca_grad(){
   // alert('si llega hasta aqui');
    $.ajax({
        type:"POST",
        url: "ajax/cursoajax.php",
        data:{carr: $('#carrerac').val()},
        success: function(a){
            $('#mgrado').html(a);
        }
    });
}





