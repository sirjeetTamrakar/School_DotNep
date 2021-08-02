
@if (\Illuminate\Support\Facades\Session::has('error'))

    <div class="alert alert-danger">
        {!! session('error') !!}
    </div>

@endif