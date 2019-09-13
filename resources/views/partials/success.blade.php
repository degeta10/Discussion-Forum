@if (session()->has('success'))   
    <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $( document ).ready(function() {
            swal({
                title: "Success",
                text: "{!! session()->get('success') !!}",   
                icon: "success",
            });
        });      
    </script>    
@endif

