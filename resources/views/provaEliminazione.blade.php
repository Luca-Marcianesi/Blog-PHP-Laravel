@extends('layouts.userLayout')

@section('title', 'I Miei Blog')

@section('content')
@isset($blogs)
    @foreach($blogs as $blog)
        <div>
            <p>{{$blog->tema}}</p>
            <button class='delete btn btn-danger' id='del_<?= $blog->id ?>' data-id='<?= $blog->id?>' >Delete</button>
                        
            {{$blog->tema}}
        </div>
    @endforeach
    
@endisset()


<script>
            $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

            $(document).ready(function () {

                // Delete 
                $('.delete').click(function () {
                    var el = this;

                    // Delete id
                    var deleteid = $(this).data('id');

                    // Confirm box
                    bootbox.confirm("Vuoi eliminare "+ deleteid + "?", function (result) {

                        if (result) {
                            // AJAX Request
                            $.ajax({
                                
                                url: "{{ route('eliminaBlog') }}",
                                type: 'POST',
                                data: {id: deleteid},
                                dataType: "json",
                                error: function (data) {
                                    
                                        bootbox.alert(""+data.status);  
                                    
              
                                },
                                success: function (response) {
                                    bootbox.alert("successo");
                                    window.location.replace(response.redirect);

                                }
                                
                            });
                        }

                    });

                });
            });
        </script>
@endsection()