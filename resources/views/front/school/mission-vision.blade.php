@extends('front.master')

@push('style')
@endpush

@section('content')

    <div class="sub-banner">
        <div class="img-container">
            <img src="{{ asset('front/assets/images/banner1.jpg') }}" alt="" />
            <div class="overlay">
                <div class="title">
                    Mission & Vision
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Mission and Vision
            </li>
        </ol>
    </nav>
    <div class="mission-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="img-container">
                        <img src="{{ asset('front/assets/images/about.jpg') }}" alt="" class="img-fluid" />
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="mission-title">
                        Mission
                    </div>
                    <div class="mission-detail">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Adipisci, quis culpa nobis quod minus labore ea perspiciatis
                        dicta nam sequi? Commodi magnam pariatur obcaecati magni eveniet
                        sint, a quam expedita? Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Ducimus eius modi soluta quod, harum vero
                        quisquam maxime voluptas hic quas doloremque molestias assumenda
                        non expedita itaque suscipit aperiam officia commodi. elit.
                        Ducimus eius modi soluta quod, harum vero quisquam maxime
                        voluptas hic quas doloremque molestias assumenda non expedita
                        itaque suscipit aperiam officia commodi.
                    </div>
                </div>
            </div>
            <div class="title">
                Mission Detail Overview
            </div>
            <div class="overview-detail">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
                    voluptatum eos debitis repellat cumque necessitatibus numquam
                    sapiente, ab deleniti consequuntur in, iure mollitia illum natus
                    iste facere nesciunt, perspiciatis assumenda. Lorem ipsum dolor
                    sit amet consectetur adipisicing elit. Consequatur labore nostrum
                    commodi provident illum ut quasi totam harum, ipsum mollitia
                    facere culpa cupiditate quibusdam ratione, saepe, quae dolorum
                    corporis itaque?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
                    voluptatum eos debitis repellat cumque necessitatibus numquam
                    sapiente, ab deleniti consequuntur in, iure mollitia illum natus
                    iste facere nesciunt, perspiciatis assumenda. Lorem ipsum dolor
                    sit amet consectetur adipisicing elit. Consequatur labore nostrum
                    commodi provident illum ut quasi totam harum, ipsum mollitia
                    facere culpa cupiditate quibusdam ratione, saepe, quae dolorum
                    corporis itaque?
                </p>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row pt-5">
                <div class="col-md-5">
                    <div class="img-container">
                        <img src="{{ asset('front/assets/images/about.jpg') }}" alt="" class="img-fluid" />
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="mission-title">
                        Vision
                    </div>
                    <div class="mission-detail">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Adipisci, quis culpa nobis quod minus labore ea perspiciatis
                        dicta nam sequi? Commodi magnam pariatur obcaecati magni eveniet
                        sint, a quam expedita? Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Ducimus eius modi soluta quod, harum vero
                        quisquam maxime voluptas hic quas doloremque molestias assumenda
                        non expedita itaque suscipit aperiam officia commodi. elit.
                        Ducimus eius modi soluta quod, harum vero quisquam maxime
                        voluptas hic quas doloremque molestias assumenda non expedita
                        itaque suscipit aperiam officia commodi.
                    </div>
                </div>
            </div>
            <div class="title">
                Vision Detail Overview
            </div>
            <div class="overview-detail">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
                    voluptatum eos debitis repellat cumque necessitatibus numquam
                    sapiente, ab deleniti consequuntur in, iure mollitia illum natus
                    iste facere nesciunt, perspiciatis assumenda. Lorem ipsum dolor
                    sit amet consectetur adipisicing elit. Consequatur labore nostrum
                    commodi provident illum ut quasi totam harum, ipsum mollitia
                    facere culpa cupiditate quibusdam ratione, saepe, quae dolorum
                    corporis itaque?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
                    voluptatum eos debitis repellat cumque necessitatibus numquam
                    sapiente, ab deleniti consequuntur in, iure mollitia illum natus
                    iste facere nesciunt, perspiciatis assumenda. Lorem ipsum dolor
                    sit amet consectetur adipisicing elit. Consequatur labore nostrum
                    commodi provident illum ut quasi totam harum, ipsum mollitia
                    facere culpa cupiditate quibusdam ratione, saepe, quae dolorum
                    corporis itaque?
                </p>
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush