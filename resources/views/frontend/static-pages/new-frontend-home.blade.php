@extends('frontend.static-pages.new-frontend-master')
@section('site-title')
{{ 'Home' }}
@endsection
@section('included-css')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/new-index.css') }}">
@endsection
@section('content')
<section class="" id="firstSection">
    <div class="container-fluid py-5">
        <div class="row my-2 py-0 px-0 px-md-3 my-lg-0 py-lg-0 mx-lg-5 px-lg-0 my-xl-5 py-xl-0 mx-xl-5 px-xl-5 ">
            <div class="col-xl-12">
                <div class="row justify-content-center justify-content-xl-around justify-content-xl-center align-items-lg-center align-items-xl-center gy-5 gy-md-4 gy-lg-0">
                    <div class="col-12 col-lg-8 col-xl-5">
                        <div class="sections-hero-title d-md-flex d-lg-block">
                            <div class="color3 me-0 me-md-2 me-lg-0">APIs that are built for</div><div class="color2 animatedText"></div>
                        </div>
                        <div class="sections-hero-sub-text mt-3 mt-lg-2 mt-xl-4">
                            <div class="color7">Utilize our APIs to access real-time market data, execute trades, and
                                build customized trading applications, algorithmic systems, bots, and tools to offer
                                investment services or automated trading capabilities.</div>
                        </div>
                    </div>
                    <div class="col-9 col-lg-3 col-xl-4 offset-lg-1 offset-xl-1">
                        <div class="text-md-center text-lg-end py-lg-3">
                            <img src="{{ asset('assets/frontend/img/home/hero-img.svg') }}" alt="" class=" w-100">
                        </div>
                    </div>
                    <div class="d-none d-xl-none col-xl-0"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-liner-v-color8">
    <div class="container-fluid py-5">
        <div class="row my-2 py-0 px-0 px-md-3 my-lg-0 py-lg-0 mx-lg-5 px-lg-0 my-xl-5 py-xl-0 mx-xl-5 px-xl-5 justify-content-center">
            <div class="col-12 col-md-12 col-lg-9 col-xl-7">
                <div class="title text-center">
                    <div class="color3">What are the features?</div>
                </div>
                <div class="sub-text mt-3 mt-lg-2 mt-xl-2 text-center">
                    <div class="color9">Unlock the Potential of Your Business with Our Powerful API Features
                        Tailored for Unprecedented Success and Growth.</div>
                </div>
            </div>
        </div>

        <div class="row my-5 py-0 px-0 px-md-3 my-lg-0 py-lg-0 mx-lg-5 px-lg-0 my-xl-5 py-xl-0 mx-xl-5 px-xl-5 gy-3 justify-content-center justify-content-md-start">
            <div class="col-6 col-md-6 col-lg-4 col-xl-4">
                <div class="card border-0 py-3 h-100 feture-box-shadow">
                    <div class="card-header border-0 bg-transparent">
                        <div class="feture-icon-box">
                            <img src="{{ asset('assets/frontend/img/home/icon1.svg') }}" alt="" class="">
                        </div>
                    </div>
                    <div class="card-body pt-2 border-0">
                        <div class="mb-2 feture-title">Interoperability</div>
                        <div class="mb-2 feture-text">
                            APIs help different systems, software, programming languages, or devices to work together and communicate with each other.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-4 col-xl-4">
                <div class="card border-0 py-3 h-100 feture-box-shadow">
                    <div class="card-header border-0 bg-transparent">
                        <div class="feture-icon-box">
                            <img src="{{ asset('assets/frontend/img/home/icon2.svg') }}" alt="" class="">
                        </div>
                    </div>
                    <div class="card-body pt-2 border-0">
                        <div class="mb-2 feture-title">Extensibility</div>
                        <div class="mb-2 feture-text">
                            APIs can improve and expand software systems without the need for a complete redesign. New features or services can be added using additional APIs.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-4 col-xl-4">
                <div class="card border-0 py-3 h-100 feture-box-shadow">
                    <div class="card-header border-0 bg-transparent">
                        <div class="feture-icon-box">
                            <img src="{{ asset('assets/frontend/img/home/icon3.svg') }}" alt="" class="">
                        </div>
                    </div>
                    <div class="card-body pt-2 border-0">
                        <div class="mb-2 feture-title">Documentation</div>
                        <div class="mb-2 feture-text">
                            Developers can use well-documented APIs to easily access information about available endpoints, request parameters, and expected responses, helping them to use the API effectively.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-4 col-xl-4">
                <div class="card border-0 py-3 h-100 feture-box-shadow">
                    <div class="card-header border-0 bg-transparent">
                        <div class="feture-icon-box">
                            <img src="{{ asset('assets/frontend/img/home/icon4.svg') }}" alt="" class="">
                        </div>
                    </div>
                    <div class="card-body pt-2 border-0">
                        <div class="mb-2 feture-title">Security</div>
                        <div class="mb-2 feture-text">
                            To control access to system features and data, APIs can have authentication and authorization procedures, ensuring that only approved users or apps can make requests.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-4 col-xl-4">
                <div class="card border-0 py-3 h-100 feture-box-shadow">
                    <div class="card-header border-0 bg-transparent">
                        <div class="feture-icon-box">
                            <img src="{{ asset('assets/frontend/img/home/icon5.svg') }}" alt="" class="">
                        </div>
                    </div>
                    <div class="card-body pt-2 border-0">
                        <div class="mb-2 feture-title">Abstraction</div>
                        <div class="mb-2 feture-text">
                            APIs simplify things for developers by hiding complex system/service details, so they can use the system without knowing everything about how it works.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-4 col-xl-4">
                <div class="card border-0 py-3 h-100 feture-box-shadow">
                    <div class="card-header border-0 bg-transparent">
                        <div class="feture-icon-box">
                            <img src="{{ asset('assets/frontend/img/home/icon6.svg') }}" alt="" class="">
                        </div>
                    </div>
                    <div class="card-body pt-2 border-0">
                        <div class="mb-2 feture-title">Modularity</div>
                        <div class="mb-2 feture-text">
                            APIs promote modular design, allowing developers to work on and update system parts separately by breaking it down into smaller, manageable components, each with its own API.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="">
    <div class="container-fluid pb-5 pt-3">
        <div class="row my-2 py-0 px-0 px-md-3 my-lg-0 py-lg-0 mx-lg-5 px-lg-0 my-xl-0 py-xl-0 mx-xl-5 px-xl-5 justify-content-center">
            <div class="col-12 col-md-12 col-lg-9 col-xl-7">
                <div class="title text-center">
                    <div class="color3">Our Most Trending API</div>
                </div>
            </div>
        </div>
        <div class="row my-5 py-0 px-0 px-md-3 my-lg-0 py-lg-0 mx-lg-5 px-lg-0 my-xl-5 py-xl-0 mx-xl-5 px-xl-5 gy-3 justify-content-center">
            <div class="col-12 col-md-9 col-lg-6 col-xl-6">
                <a class="text-decoration-none" href="{{ route('odin.api.detail') }}">
                <div class="card api-box-border py-2 h-100 flex-row rounded-4 api-box-shadow">
                    <div class="card-header pe-0 border-0 bg-transparent d-flex align-items-center">
                        <img src="{{ asset('assets/frontend/img/home/api-icon1.svg') }}" alt="" class="api-icon" height="64" width="64">
                    </div>
                    <div class="card-body pe-0 border-0">
                        <div class="api-title">Odin API</div>
                        <div class="api-text">Start your own algorithm trading with our free Trading API</div>
                    </div>
                    <div class="card-footer bg-transparent border-0 d-flex align-items-center">
                        <div class="color1 fs-3">
                            <i class="fa-solid fa-chevron-right icon-chavron"></i>
                        </div>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 d-none">
                <div class="card api-box-border py-2 h-100 flex-row rounded-4 api-box-shadow">
                    <div class="card-header pe-0 border-0 bg-transparent d-flex align-items-center">
                        <img src="{{ asset('assets/frontend/img/home/api-icon2.svg') }}" alt="" class="api-icon" height="64" width="64">
                    </div>
                    <div class="card-body pe-0 border-0">
                        <div class="api-title">Terminal API</div>
                        <div class="api-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
                            pulvinar sem vel purus scelerisque, auctor laoreet urna varius. </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 d-flex align-items-center">
                        <div class="color1 fs-3">
                            <i class="fa-solid fa-chevron-right icon-chavron"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-md-block text-end">
                <a href="{{ route('all.apis') }}" class="btn btn-jnm-outline-primary fs-14 mt-3">View All</a>
            </div>
        </div>
    </div>
</section>
<section class="bg-color8">
    <div class="container-fluid py-5">
        <div class="row my-2 py-0 px-0 px-md-3 my-lg-0 py-lg-0 mx-lg-5 px-lg-0 my-xl-5 py-xl-0 mx-xl-5 px-xl-5 justify-content-center">
            <div class="col-12 col-md-12 col-lg-9 col-xl-7">
                <div class="title text-center">
                    <div class="color3">Frequently asked questions</div>
                </div>
            </div>
        </div>
        <div class="row my-5 py-0 px-0 px-md-3 my-lg-0 py-lg-0 mx-lg-5 px-lg-0 my-xl-5 py-xl-0 mx-xl-5 px-xl-5 gy-3 justify-content-center justify-content-md-start">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item accordion_item bg-transparent border-color11">
                        <h2 class="accordion-header accordion_header border-bottom border-color11" id="heading1">
                            <button class="accordion-button accordion_button shadow-none bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                How can I access purchased the API?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse accordion_collapse collapse show" aria-labelledby="heading1" data-bs-parent="#faqAccordion">
                            <div class="accordion-body accordion_body">
                                <div class="color7 mb-1 fw-medium fs-16">
                                    <p>
                                        After logging in, purchase the API from us. It will then appear on your dashboard, granting seamless access to our services. Enjoy the benefits of our API effortlessly.
                                    </p>
                                </div>
                                <div class="color7 mb-1 fw-medium fs-16">With that being said, feel free to use free
                                    APIs for
                                    your
                                    open-source projects.
                                </div>
                                <div class="color7">Find out more information by <span class="text-primary">reading the
                                        license</span>.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item accordion_item bg-transparent border-color11">
                        <h2 class="accordion-header accordion_header border-bottom border-color11" id="heading2">
                            <button class="accordion-button accordion_button shadow-none bg-transparent collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                What is API?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse accordion_collapse collapse" aria-labelledby="heading2" data-bs-parent="#faqAccordion">
                            <div class="accordion-body accordion_body">
                                <div class="color7 mb-1 fw-medium fs-16">
                                    <p>An API, which stands for Application Programming Interface is, like a set of rules and protocols that different software applications follow to talk to each other. APIs define how developers can ask for and share information between parts of software or services. They make it possible for systems to work together and exchange data and functions.</p>
                                    <p>APIs are commonly used in software development situations, like building websites creating apps and connecting software systems. They act as intermediaries that let developers access and use the features and data of a service, application or platform without needing to know how that service works internally.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item accordion_item bg-transparent border-color11">
                        <h2 class="accordion-header accordion_header border-bottom border-color11" id="heading3">
                            <button class="accordion-button accordion_button shadow-none bg-transparent collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                Who can use this API?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse accordion_collapse collapse" aria-labelledby="heading3" data-bs-parent="#faqAccordion">
                            <div class="accordion-body accordion_body">
                                <div class="color7 mb-1 fw-medium fs-16">
                                    <p><strong>Traders and investors</strong> have the opportunity to develop their trading or investment applications, algorithmic trading systems or automated trading strategies by utilizing the API. This allows them to access real time market data and execute trades.</p>
                                    <p><strong>Financial institutions</strong> such, as banks and portfolio management companies may also leverage the API to offer trading and investment services to their clients.</p>
                                    <p><strong>Software developers</strong> who specialize in creating software applications trading bots or tools related to stock market trading can take advantage of the API. It enables them to access market data and execute trades on behalf of their users.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="conatct-us">
    <div class="container-fluid py-5">
        <div class="row my-2 py-0 px-0 px-md-3 my-lg-0 py-lg-0 mx-lg-5 px-lg-0 my-xl-5 py-xl-0 mx-xl-5 px-xl-5 ">
            <div class="col-xl-12">
                <div class="row justify-content-center justify-content-xl-around justify-content-xl-center align-items-lg-center align-items-xl-center gy-5 gy-md-4 gy-lg-0">
                    <div class="col-12 col-md-7 col-lg-8 col-xl-5 order-md-2 offset-xl-1">
                        <div class="sections-hero-title text-center text-lg-start">
                            <div class="color1">Contact <span class="color3">Us!</span> </div>
                        </div>
                        <div class="form mt-3 mt-lg-2 mt-xl-4">
                            <form id="lead-form" class="lead-form" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control border-color11 rounded-1" id="lead_name" name="lead_name" placeholder="Full Name" aria-label="lead_name" aria-describedby="basic-addon1">
                                            <small class="error_lead_name text-white"></small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="input-group mb-3">
                                            <input type="tel" class="form-control border-color11 rounded-1" id="lead_mobile" name="lead_mobile" placeholder="Mobile No" aria-label="lead_mobile" aria-describedby="basic-addon1">
                                            <small class="error_lead_mobile text-white"></small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control border-color11 rounded-1" id="lead_email" name="lead_email" placeholder="Email Id" aria-label="lead_email" aria-describedby="basic-addon1">
                                            <small class="error_lead_email text-white"></small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control border-color11 rounded-1" id="lead_occupation" name="lead_occupation" placeholder="Occupation" aria-label="lead_occupation" aria-describedby="basic-addon1">
                                            <small class="error_lead_occupation text-white"></small>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <textarea class="form-control border-color11 rounded-1" id="message" name="message" rows="4" placeholder="Your Message..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-end">
                                            <input type="hidden" id="recaptchaResponse" name="recaptchaResponse">
                                            <input type="hidden" id="lead_user_id" name="lead_user_id" value="0">
                                            <input type="hidden" id="lead_intrest" name="lead_intrest" value="API-1">
                                            <input type="hidden" id="lead_otp" name="lead_otp" value="0000">
                                            <div class="btn btn-jnm-primary px-lg-3 py-lg-2 fs-16" id="submit-lead">Get In Touch</div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-9 col-md-5 col-lg-3 col-xl-3 offset-lg-1 offset-xl-0 order-md-1">
                        <div class="text-md-center text-lg-end py-lg-3">
                            <img src="{{ asset('assets/frontend/img/home/contact-us.svg') }}" alt="" class=" w-100">
                        </div>
                    </div>
                    <div class="d-none d-xl-none col-xl-0"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-color8">
    <div class="container-fluid py-5">
        <div class="row my-2 py-0 px-0 px-md-3 my-lg-0 py-lg-0 mx-lg-5 px-lg-0 my-xl-5 py-xl-0 mx-xl-5 px-xl-5 justify-content-center">
            <div class="col-12 col-md-12 col-lg-6 col-xl-6 bg-color12">
                <div class="row py-3 py-md-4 px-md-3 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-12 col-md-9">
                        <div class="banner-title text-center text-md-start mb-1 mb-md-0">
                            <div class="color1">Enjoy Trade & Investment on one place</div>
                        </div>
                        <div class="banner-sub-text text-center text-md-start">
                            <div class="color7">Where you trade and do investments at your comfort</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="text-center py-3 py-md-0">
                            <a href="https://jainam.in/Home/Index#open_an_account_home" class="btn btn-jnm-primary px-lg-3 py-lg-2 fs-16 text-nowrap">Sign-Up for Duck</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('include-js')
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
                $('#submit-lead').html('Wait...').addClass('disabled').prop('disabled', true);
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
                            $('#submit-lead').html('Success').addClass('disabled');
                            Swal.fire({
                                title: 'Lead Received Successfully',
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
<script>
    
const textArray = [
  "Traders & Investors",
  "Software Developers",
  "Financial Institutions"
];


let typeJsText = document.querySelector(".animatedText");
let stringIndex = 0; 
let charIndex = 0; 
let isTyping = true; 

function typeJs() {
  if (stringIndex < textArray.length) {
    
    const currentString = textArray[stringIndex];

    if (isTyping) {
      
      if (charIndex < currentString.length) {
        typeJsText.innerHTML += currentString.charAt(charIndex);
        charIndex++;
      } else {
        isTyping = false; 
      }
    } else {
      
      if (charIndex > 0) {
        typeJsText.innerHTML = currentString.substring(0, charIndex - 1);
        charIndex--;
      } else {
        isTyping = true; 
        stringIndex++; 

        if (stringIndex >= textArray.length) {
          stringIndex = 1; 
        }

        charIndex = 0; 
        typeJsText.innerHTML = ""; 
      }
    }
  }
}


setInterval(typeJs, 300); 

</script>
@endsection