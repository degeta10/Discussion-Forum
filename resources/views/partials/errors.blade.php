@if (session()->has('errors'))  
    <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $( document ).ready(function() {
            swal({
                title: "Failed",
                text: "{!! session()->get('errors') !!}",   
                icon: "error",
            });
        });      
    </script>   
@endif