@extends('front.master')

@push('style')
<style>
.loader {
  border: 5px solid #f3f3f3;
  border-radius: 50%;
  border-top: 5px solid #3498db;
  width: 20px;
  height: 20px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
@endpush

@section('content')

    <div class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="main-title">
                        Contact Us
                    </div>
                    {{--<div class="sub-title">--}}
                        {{--Lorem, ipsum dolor sit amet consectetur adipisicing elit.--}}
                        {{--Provident possimus voluptatibus porro corrupti--}}
                    {{--</div>--}}
                    <form action="post" id="contactForm">
                        <div class="form-group">
                            <input
                                    type="text" required name="name"
                                    class="form-control"
                                    placeholder="Full Name*"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                    type="email" required name="email"
                                    class="form-control"
                                    placeholder="Email*"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                    type="phone" required name="phone"
                                    class="form-control"
                                    placeholder="Phone*"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                    type="text" required name="subject"
                                    placeholder="Subject"
                                    class="form-control"
                            />
                        </div>
                        <div class="form-group">
									<textarea required
                                            id="" name="message"
                                            cols="30"
                                            rows="5"
                                            class="form-control"
                                            placeholder="Your Message *"
                                    ></textarea>
                        </div>
                        <div class="button-container position-relative">
                            <button type="submit" class="btn btn-primary message-button">
                                Send Message 
                            </button>
                            <div class="d-inline position-absolute" id="message-preload" style="top: 10px;left: 157px;"></div>
                        </div>
                        
                        <div id="message-contact" class="mt-3"></div>
                    </form>
                </div>
                <div class="col-md-6 my-auto">
                    <div class="img-container d-none d-md-block">
                        <img src="{{ asset(getAbout('contactImage')) }}" alt="" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="phone-wrapper">
                            <div class="title">
                                Call Us!
                            </div>
                            <div class="phone">
                                {{ isset($settings['phone']) ? $settings['phone'] : "" }}
                            </div>
                            <div class="phone-wrapper-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="phone-wrapper">
                            <div class="title">
                                Email Us!
                            </div>
                            <div class="phone">
                                {{ isset($settings['email']) ? $settings['email'] : "" }}
                            </div>
                            {{--<div class="phone">--}}
                                {{--administration@schoolname.com--}}
                            {{--</div>--}}
                            <div class="phone-wrapper-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="phone-wrapper">
                            <div class="title">
                                Locate Us!
                            </div>
                            <div class="phone">
                                {{ isset($settings['address']) ? $settings['address'] : "" }}
                            </div>
                            {{--<div class="phone">--}}
                                {{--Province Number 3--}}
                            {{--</div>--}}
                            <div class="phone-wrapper-icon">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.946120703582!2d85.30727344983875!3d27.718949782702598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18e36e151cad%3A0x7cfad33881817bf5!2sSorakhutte%20Taxi%20Stand!5e0!3m2!1sen!2snp!4v1585377262866!5m2!1sen!2snp"
            width="100%"
            height="450"
            frameborder="0"
            style="border:0;"
            allowfullscreen=""
            aria-hidden="false"
            tabindex="0"
    ></iframe>

@endsection

@push('script')

<script>

    $(document).on('submit', '#contactForm', function (e) {
        e.preventDefault();
        
        var form = new FormData($('#contactForm')[0]);
        var params = $('#contactForm').serializeArray();

        var myUrl = "{{ route('front.contact.store') }}";

        $.each(params, function (i, val) {
            form.append(val.name, val.value)
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: myUrl,
            contentType: false,
            processData: false,
            data: form,
            beforeSend: function (data) {
                $(".message-button").attr('disabled');
               $('#message-preload').html('<div class="loader"></div>');
               
            },
            success: function (data) {
                
                if(data.status == "success"){
                   $('#message-preload').html('');
                $('#message-contact').html("तपाईको  सन्देशको लागि धन्यवाद।");
                
                $('#contactForm')[0].reset();

                $(".message-button").removeAttr('disabled'); 
                }else{
                     $('#message-preload').html('');
                    $(".message-button").removeAttr('disabled');
                $('#message-contact').html("तपाईंले सन्देश पठाउन प्रयास गर्दा त्रुटि भएको छ। फेरी प्रयास गर्नु होला।");
                }
                
//                $('#quickView').modal('hide');
            },
            error: function (err) {
                $(".message-button").removeAttr('disabled');
                if (err.status == 422) {
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="' + i + '"]');
                        el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(15000));
                    });
                }
            }
        });
    });

</script>
@endpush