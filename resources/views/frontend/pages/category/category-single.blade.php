@extends('frontend.frontend-page-master')
@section('page-title')
    {{ $api_category_details->api_category_title }}
@endsection
@section('content')
    <style>
        .lds-ellipsis {
            display: inline-block;
            position: relative;
            width: 5rem;
            height: 1rem;
        }

        .lds-ellipsis div {
            position: absolute;
            top: 0.2rem;
            width: 13px;
            height: 13px;
            border-radius: 50%;
            background: #fff;
            animation-timing-function: cubic-bezier(0, 1, 1, 0);
        }

        .submit-btn:hover .lds-ellipsis div {
            background: #fff;
            color: var(--main-color-two) !important;
        }

        .lds-ellipsis div:nth-child(1) {
            left: 8px;
            animation: lds-ellipsis1 0.6s infinite;
        }

        .lds-ellipsis div:nth-child(2) {
            left: 8px;
            animation: lds-ellipsis2 0.6s infinite;
        }

        .lds-ellipsis div:nth-child(3) {
            left: 32px;
            animation: lds-ellipsis2 0.6s infinite;
        }

        .lds-ellipsis div:nth-child(4) {
            left: 56px;
            animation: lds-ellipsis3 0.6s infinite;
        }

        @keyframes lds-ellipsis1 {
            0% {
                transform: scale(0);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes lds-ellipsis3 {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(0);
            }
        }

        @keyframes lds-ellipsis2 {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(24px, 0);
            }
        }
    </style>
    <div class="page-content service-details py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-details-item">
                        <div class="thumb margin-bottom-40">
                            @php
                                $api_bg_img_url = asset('storage/image/category/' . $api_category_details->api_bg_img_url);
                            @endphp
                            {{-- <img class="img-fluid" src="{{$api_bg_img_url}}" alt="{{$api_category_details->api_bg_img_url}}"> --}}
                        </div>
                        <div class="service-description">
                            <div>
                                {{ $api_category_details->api_category_short_desc }}
                            </div>
                            <div>
                                {!! $api_category_details->api_category_descripetion !!}
                            </div>
                        </div>
                        <div class="price-plan-wrapper margin-top-40">
                            <div class="row">
                                @php $a = 1; @endphp
                                @foreach ($api_list as $key => $data)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-we-cover-item-02 h-100">
                                            <div class="single-what-img">
                                                <img class="img-fluid" src="{{ $api_bg_img_url }}"
                                                    alt="{{ $api_category_details->api_bg_img_url }}">
                                            </div>
                                            <div class="align-items-baseline content d-flex h-100 justify-content-center">
                                                <a href="{{ route('frontend.dynamic.doc', ['slug' => $data->api_slug]) }}">
                                                    <h4 class="title">{{ $data->api_title }}</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        if ($a == 4) {
                                            $a = 1;
                                        } else {
                                            $a++;
                                        }
                                    @endphp
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        <div class="widget-nav-menu margin-bottom-30 service-category sidebars-single-content">
                            <ul>
                                @foreach ($suggested_category_details as $item => $category)
                                    <li>
                                        <a href="{{ route('frontend.dynamic.category', ['slug' => $category->api_category_slug]) }}"
                                            class="service-widget ">
                                            <div class="service-title">
                                                <h6 class="title">{{ $category->api_category_title }}</h6>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="no-padding-border service-widget widget">
                            <div class="attorney-contact-form-wrap">
                                <h3 class="title">Have Query ?</h3>
                                <div class="attorney-contact-form">
                                    <form id="lead-form" class="lead-form" enctype="multipart/form-data">
                                        <div class="error-message"></div>
                                        <div class="form-group">
                                            <label for="lead_name">Your Name <span class="text-white">*</span></label>
                                            <input type="text" id="lead_name" name="lead_name" class="form-control" value="{{ isset(auth()->user()->name) ? auth()->user()->name : '' }}" placeholder="Your Name" required="required">
                                            <small class="error_lead_name text-white"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="lead_email">Your Email <span class="text-white">*</span></label>
                                            <input type="email" id="lead_email" name="lead_email" class="form-control" value="{{ isset(auth()->user()->email) ? auth()->user()->email : '' }}" placeholder="Your Email" required="required">
                                            <small class="error_lead_email text-white"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="lead_mobile">Your Phone <span class="text-white">*</span></label>
                                            <input type="tel" id="lead_mobile" name="lead_mobile" class="form-control" value="{{ isset(auth()->user()->phone) ? auth()->user()->phone : '' }}" placeholder="Your Phone">
                                            <small class="error_lead_mobile text-white"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="lead_occupation">Your Occupation <span class="text-white">*</span></label>
                                            <input type="text" id="lead_occupation" name="lead_occupation" class="form-control" placeholder="Your Name" required="required">
                                            <small class="error_lead_occupation text-white"></small>
                                        </div>
                                        <div class="btn-wrapper">
                                            <!-- Hidden input field to store reCAPTCHA v3 response -->
                                            <input type="hidden" id="recaptchaResponse" name="recaptchaResponse">
                                            <input type="hidden" id="lead_user_id" name="lead_user_id" value="{{ isset(auth()->user()->id) ? auth()->user()->id : 0 }}">
                                            <input type="hidden" id="lead_intrest" name="lead_intrest" value="CAT-{{ $api_category_details->api_category_id }}">
                                            <input type="hidden" id="lead_otp" name="lead_otp" value="0000">
                                            <div id="submit-lead" class="text-center custom_submit_form_buttons submit-btn">Submit Request</div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("form").submit(function(e) {
                e.preventDefault();
            });
            $('#submit-lead').click(function(e) {
                e.preventDefault();
                if (!$(this).hasClass('disabled')) {
                    let submit_url = "{{ route('frontend.new.lead') }}";

                    let lead_name = $(`#lead_name`).val();
                    let lead_email = $(`#lead_email`).val();
                    let lead_mobile = $(`#lead_mobile`).val();
                    let lead_occupation = $(`#lead_occupation`).val();
                    let lead_user_id = $(`#lead_user_id`).val();
                    let lead_intrest = $(`#lead_intrest`).val();
                    let lead_otp = $(`#lead_otp`).val();
                    let recaptchaResponse = $(`#recaptchaResponse`).val();

                    let form_data = {
                        lead_name: lead_name,
                        lead_email: lead_email,
                        lead_mobile: lead_mobile,
                        lead_occupation: lead_occupation,
                        lead_user_id: lead_user_id,
                        lead_intrest: lead_intrest,
                        lead_otp: lead_otp,
                        recaptchaResponse: recaptchaResponse,
                    };
                    $('#submit-lead').html(
                            '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>')
                        .addClass('disabled');
                    $('#submit-lead').prop('disabled', true);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "post",
                        url: submit_url,
                        data: form_data,
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                $('#submit-lead').html('Success').addClass(
                                    'disabled');
                                Swal.fire({
                                    title: 'Lead Recived Successfully',
                                    text: 'our representative will contact you soon.',
                                    icon: 'success',
                                }).then((result) => {
                                    location.reload();
                                });
                            } else {
                                if (response.status_code == 410) {
                                    $.each(response.message, function(indexInArray,
                                        valueOfElement) {
                                        $(`.error_${indexInArray}`).html(valueOfElement[
                                                0])
                                            .fadeIn().delay(3000).fadeOut();
                                    });
                                    $('#submit-lead').html('Submit Request').removeClass('disabled');
                                } else {
                                    Swal.fire({
                                        title: response.message,
                                        icon: 'error',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload();
                                        }
                                    });
                                }
                            }
                        }
                    });
                }
            });

            // Call reCAPTCHA v3 API to get the reCAPTCHA response and store it in the hidden input field
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ config("app.recaptcha_v3_site_key") }}', {action: 'submit'}).then(function(token) {
                    document.getElementById('recaptchaResponse').value = token;
                });
            });

        });
    </script>
@endsection
