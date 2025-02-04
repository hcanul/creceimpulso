<div
  x-data="{open: false}"
  x-show="open"
  @confirm-remove.window="
    Swal.fire({
      title: 'Está seguro?',
      text: 'Usted no podrá revertirlo una vez realizado!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonText: 'Declinar!',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Aceptar'
    }).then((result) => {
      if (result.isConfirmed) {
        $wire.RemoveAll().then(result => {
          Swal.fire({
            title: 'Revocado!',
            text: '',
            icon: 'success'
          });
        })
      }else if (result.dismiss === Swal.DismissReason.cancel){
        Swal.fire({
          title: 'Cancelado!',
          text: '',
          icon: 'error'
        });
      }
    });

  "
></div>