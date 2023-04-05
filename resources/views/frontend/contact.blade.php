@extends('frontend.main_master')
@section('main')

@section('title')
Contact
@endsection

@php    
    $multi_images = App\Models\MultiImage::all();
@endphp



 <!-- breadcrumb-area -->
 <section class="breadcrumb__wrap">
                <div class="container custom-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="breadcrumb__wrap__content">
                                <h2 class="title">Contact us</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb__wrap__icon">
                    <ul>
                        @foreach($multi_images as $image)
                                <li><img src="{{asset($image->multi_image ) }}" alt=""></li>                
                        @endforeach

                    </ul>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- contact-map -->
            <div id="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.030484053615!2d126.99528181513976!3d37.53077867980462!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca3cab6b2347f%3A0x2a3fdc392844c84c!2s4-17%20Usadan-ro%204-gil%2C%20Yongsan-gu%2C%20Seoul!5e0!3m2!1sen!2skr!4v1673795519006!5m2!1sen!2skr"
                    allowfullscreen loading="lazy"></iframe>
            </div>
            <!-- contact-map-end -->

            <!-- contact-area -->
            <div class="contact-area">
                <div class="container">
                    <!-- contact form -->
                    <form action="{{ route('store.message') }}" method="POST" class="contact__form">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                @error('name')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                                <input name="name" type="text" placeholder="Enter your name*">
                         

                            </div>

                            <div class="col-md-6">
                                @error('email')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                                <input name="email" type="email" placeholder="Enter your mail*">
                               

                            </div>

                            <div class="col-md-6">
                                @error('subject')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                                <input name="subject" type="text" placeholder="Enter your subject*">
                              

                            </div>

                            <div class="col-md-6">
                                @error('phone')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                                <input name="phone" type="text" placeholder="Your phone*">
                               

                            </div>
                        </div>
                        
                        @error('message')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                        <textarea name="message" id="message" placeholder="Enter your massage*"></textarea>

                        <button type="submit" class="btn">send massage</button>
                    </form>
                </div>
            </div>
            <!-- contact-area-end -->

            <!-- contact-info-area -->
            <section class="contact-info-area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="contact__info">
                                <div class="contact__info__icon">
                                    <img src="{{ asset('frontend/assets/img/icons/contact_icon01.png') }}" alt="">
                                </div>
                                <div class="contact__info__content">
                                    <h4 class="title">address line</h4>
                                    <span>#101 , 4-17 Usadanro 4 Gil, Yongsan Gu , Seoul, S Korea </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="contact__info">
                                <div class="contact__info__icon">
                                    <img src="{{ asset('frontend/assets/img/icons/contact_icon02.png') }}" alt="">
                                </div>
                                <div class="contact__info__content">
                                    <h4 class="title">Phone Number</h4>
                                    <span>+821088854054</span>
                                    <!-- <span>+</span> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="contact__info">
                                <div class="contact__info__icon">
                                    <img src="{{ asset('frontend/assets/img/icons/contact_icon03.png') }}" alt="">
                                </div>
                                <div class="contact__info__content">
                                    <h4 class="title">Mail Address</h4>
                                    <span>msakorganization@gmail.com</span>
                                    <!-- <span>info@yourdomain.com</span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-info-area-end -->

            <!-- contact-area -->
            <section class="homeContact homeContact__style__two">
                <div class="container">
                    <div class="homeContact__wrap">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section__title">
                                    <!-- <span class="sub-title">07 - Say hello</span> -->
                                    <h2 class="title">Any questions? Feel free <br> to contact</h2>
                                </div>
                                <div class="homeContact__content">
                                    <p>MSAK is an independent organization working mainly for Muslim students in all around Korea.</p>
                                    <h2 class="mail"><a href="mailto:msakorganization@gmail.com">msakorganization@gmail.com</a></h2>
                                </div>
                            </div>
                            <!-- <div class="col-lg-6">
                                <div class="homeContact__form">
                                    <form action="#">
                                        <input type="text" placeholder="Enter name*">
                                        <input type="email" placeholder="Enter mail*">
                                        <input type="number" placeholder="Enter number*">
                                        <textarea name="message" placeholder="Enter Massage*"></textarea>
                                        <button type="submit">Send Message</button>
                                    </form>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->
@endsection