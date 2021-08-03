@extends('front.master')

@push('style')
<style>
    *{
    margin:0;
    padding:0;
    box-sizing: border-box;
    /* font-family: 'Mukta', sans-serif; */
}

.marquee_background{
    background-color: #2161bb;
    width: 100%;
    height: 3rem;
    color: white;
    
}

.marquee_content{
    width: 80%;
    margin: 0 auto;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.marquee{
    direction: left;
    height: 100%;
    font-size: 18px;
    padding-top: .6rem;
}

.main_container{
    width: 100%;
    margin: 0 auto;
    /* font-family: 'Arvo', serif; */
}

.carousel_container{
    width: 100%;
}

.carousel_image{
    height: 30rem;
}

h1{
    text-align: center;
}

.marquee_content .title{
    background-color: #21539a;
    border-right: 5px solid white;
    width: 8rem;
    display: flex;
    height: 100%;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    letter-spacing: .05rem;
}

.marquee{
    display: flex;
    justify-content: space-between;
    font-weight: 500;
    letter-spacing: .1rem;
}

.marquee a{
    list-style: none;
    margin-right: 4rem;
    cursor: pointer;
    font-weight: bold;
    color: white;
}

.marquee a:hover{
    color: white;
    text-decoration: none;
}

.carousel_icon{
    border-radius: 50%;
    color: #7aacf1;
    height: 40px;
    width: 40px;
    font-weight: bold;
    background: #7aacf1;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 1;
    position: relative;
    z-index: 5;
    text-align: center;
}
.carousel_icon::before{
    content: '';
    height: 20px;
    width: 20px;
    position: absolute;
    background-color: white;
    border-radius: 50%;
    z-index: -1;
    text-align: center;
}

.diploma .background .image{
    width: 100%;
    height: 15rem;
    object-fit: cover;
    opacity: .3;
}

.diploma .background{
    background-color: black;
}

.diploma{
    position: relative;
}

.diploma>h1{
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    transform: translate(-50%, -50%);
    color: white;
    font-style: normal;
    font-weight: bold;
    font-size: 40px;
    line-height: 49px;
    text-align: center;
    letter-spacing: .05rem;
}

.other_courses{
    background-color: #F2F5FF;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    border-radius: 4px;
    padding: 1rem;
    height:max-content;
    margin-top: 5rem;

}

.other_courses span{
    border-bottom: 0.5px solid rgba(0, 0, 0, 0.5);
    padding-inline: 4rem;
    padding-bottom: .4rem;
   
}

.other_courses a::before{
    content: "•";
    color: #0464A0;
    margin-right: .5rem;
}

.other_courses a{
    display: flex;
    width: 80%;
    margin-top: .5rem;
    font-style: normal;
    font-weight: bold;
    font-size: 12px;
    line-height: 25px;
    color: #0464A0;
    transition: all .2s ease-in-out;
}

.text-section{
    width: 80%;
    margin: 0 auto;
    display:flex;
    justify-content:space-between;
    flex-wrap:wrap;
    margin-bottom: 2rem;
}

.other_courses a:hover{
    text-decoration: none;
    color: #01314f;
}

.text{
    width: 75%;
    display: flex;
    flex-direction: column;
}

.text .about_course{
    font-style: normal;
    font-weight: bold;
    font-size: 30px;
    line-height: 37px;
    color: #0464A0;
    margin: 2rem 0;
}

.text .course_description{
    width: 80%;
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    line-height: 25px;
    font-size:15px;
    letter-spacing: 0.05em;
    color: rgba(0, 0, 0, 0.8);
}
.cards{
    width: 90%;
    margin: 5rem auto;
    display: flex;
    justify-content: space-between;
    column-gap: 7rem;
}

.card{
    background: #FFFFFF;
    border: 1px solid #CDCDCD;
    box-sizing: border-box;
    box-shadow: 0px 2px 2px rgba(57, 57, 57, 0.2);
    border-radius: 4px;
    padding: 1rem 2rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

@media screen and (min-width: 1400px) {
    .text{
        width: 90%;
    }
}
@media screen and (max-width:1300px) {
    .text{
        width: 60%;
    }
}
@media screen and (max-width:1025px) {
    .main_container, .marquee_content{
        width: 100%;
    }

    .main_container, .text-section{
        width:100%;
    }

    .text-section{
        padding-inline: 0 2rem;
        justify-content:center;
        align-items:center;
    }

    .text{
        padding-left: 2rem;
    }
    .text .about_course{
        margin: 1rem 0;
    }
    .text .course_description{
        width: 80%;
    }

    .other_courses{
        margin-bottom: 4rem;
    }
}

@media screen and (max-width:950px) {
    .marquee_content .title{
        font-size: .9rem;
    }
    .main_container{
        width:100%;
    }
    .carousel_image{
        height: 20rem;
    }
    .cards{
        flex-direction: column;
        row-gap: 2rem;
    }
    .text-section{
        justify-content:center;
        align-items:center;
        flex-direction: column-reverse;
    }
    .text{
        width: 100%;
    }
    .text .about_course{
        margin: 2rem 0;
    }
    .diploma h1{
        font-size: 30px;
    }
    .text .course_description{
        width: 100%;
    }
    .other_courses{
        margin-bottom: 0;
    }
}


@media screen and (max-width:500px) {
    .carousel_image{
        height: 15rem;
    }
    .marquee_background{
        padding-inline: 0;
    }
    .icon{
        height: 30px;
        width: 30px;
    }
    .icon::before{
        height: 15px;
        width: 15px;
    }
    .other_courses{
        margin:2rem auto;
    }
    .text-section{
        width: 100%;
        justify-content:center;
        align-items:center;
        padding:0;
        margin-block:2rem;
    }

    .text{
        width:90%;
        margin: 0 auto;
        padding:0;
    }
}

@media screen and (max-width:400px) {
     ul{
        font-size:.8rem;
    }

    .other_courses{
        margin: 0 1rem;
    }
}

@media screen and (max-width:300px) {
    .other_courses{
        margin: 0;
    }
}

</style>

@endpush

@section('content')

<div class='main_container'>
    
        <div class="diploma">
            <div class="background">
                <img class="image" src="{{ asset($course->image) }}" alt="Diploma">
            </div>
            <h1>{{ $course->title }}</h1>
        </div>
        <div class='text-section'>
            <div class="text">
                <span class="about_course">About the Course</span>
                <span class="course_description">{!! $course->description !!}</span>
            </div>
            <div class="other_courses">
                <span>Other Courses</span>
                @if(!empty($allcourses))
                @foreach ($allcourses as $course)

                <a href='{{ route('front.courses',$course->slug) }}' >{{ $course->title }}</a>
                @endforeach
                @endif

            </div>
        </div>
</div>
@endsection

@push('script')
@endpush
