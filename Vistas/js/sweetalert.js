

const MsjGrande = Swal.mixin({
    toast: false,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1000,
    timerProgressBar: false,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  
  const msjpequeño= Swal.mixin({
toast:true,
position: 'top-end',
showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })


 /*MsjGrande.fire({
      title: 'Bienvenido'
  })*/

  function mensaje(titulo,texto,icono)
  {
    msjpequeño.fire({
        title: texto,
        icono:icono
    });

  }

  