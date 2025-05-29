@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Crear Usuario</h3>
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf
            <div class="row">
                @include('admin.users.partials.form', ['button' => 'Crear'])
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#country').on('change', function() {
                let idCountry = this.value;
                $('#state').html('');
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.user.get-states')}}",
                    data: {
                        lc_country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: "json",
                    success: function (response) {
                        $.each(response.states, function (key, value) { 
                             $("#state").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#country_code').select2({
                templateResult: function(option) {
                    if (option.element && option.element.dataset.image) {
                        return $('<span><img src="' + option.element.dataset.image + '" width="20" height="15" /> ' + option.text + '</span>');
                    }
                    return  option.text;
                }
            });
        });
    </script>
@endsection