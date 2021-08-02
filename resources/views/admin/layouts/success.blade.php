
@if (\Illuminate\Support\Facades\Session::has('success'))

    <br>
    <div class="alert alert-success container text-center text-uppercase" style="font-weight: bold">
        {!! session('success') !!}
    </div>

@endif