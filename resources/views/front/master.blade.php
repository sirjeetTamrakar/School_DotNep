<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <!-- <link rel="icon" href="%PUBLIC_URL%/favicon.ico" /> -->
    <meta
            name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="theme-color" content="#000000" />
    <meta
            name="description"
            content="Web site created using create-react-app"
    />

    <title>{{ isset($settings['name']) ? $settings['name'] : "High School" }}</title>
    
    <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
            crossorigin="anonymous"
    />
    <!-- font awesome -->
    <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
            integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
            crossorigin="anonymous"
    />


<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
/>
<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
/>
    <link rel="stylesheet" href="{{ asset('front/assets/css/index.css') }}" />
    @stack('style')
    <style>
        img{
            max-width:100%;
        }
    </style>
</head>
<body>

@include('front.partials.nav')

<div class="content">
    @yield('content')
</div>

@include('front.partials.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script
src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
crossorigin="anonymous"
></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="{{asset('front/assets/js/index.js')}}"></script>
<script>
    jQuery(function() {
        $('.frontselectlanguage').change(function() {
            this.form.submit();
        });
    });
</script>
@stack('script')
</body>
</html>
