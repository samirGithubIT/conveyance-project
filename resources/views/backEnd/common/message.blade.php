

<script>
    @if (session()->get('success'))
            
    Swal.fire({
            toast: true,
            icon: 'success',
            title: "{{ session()->get('success') }}",
            animation: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
     })

     @endif

    @if (session()->get('info'))
            
    Swal.fire({
            toast: true,
            icon: 'info',
            title: "{{ session()->get('info') }}",
            animation: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
     })

    @endif

    @if (session()->get('warning'))
            
//     Swal.fire({
//             toast: true,
//             icon: 'warning',
//             title: "{{ session()->get('warning') }}",
//             animation: true,
//             position: 'center',
//             showConfirmButton: false,
//             timer: 3000,
//             timerProgressBar: true,
//             didOpen: (toast) => {
//                     toast.addEventListener('mouseenter', Swal.stopTimer)
//                     toast.addEventListener('mouseleave', Swal.resumeTimer)
//             }
//      });

Swal.fire({
      title: "Deleted!",
      text: "Your file has been deleted.",
      icon: "success"
    });

    @endif
    
</script>