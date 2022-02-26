<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">


<script>
$(function(){

    @if(Session::has('success'))
        Swal.fire({
        icon: 'success',
        title: 'Great!',
        text: '{{ Session::get("success") }}'
    })
    @endif
});
</script>


<script>
    $(function(){
    ​
        @if(Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ Session::get("error") }}'
        })
        @endif
    });
    </script>

<script>
    $(function(){

        @if(Session::has('warning'))
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: '{{ Session::get("warning") }}'
        })
        @endif
    });
    </script>


<script>
    $(function(){

        @if(Session::has('info'))
        Swal.fire({
            icon: 'info',
            title: 'Oops...',
            text: '{{ Session::get("info") }}'
        })
        @endif
    });
    </script>
