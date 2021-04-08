@extends('client.layout.master')
@section('title', 'E-Book | Home ')
@section('headname','Dashboard')
@section('content')

<section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        
<!-- contact area Start -->
        <main class="contact_area inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-md-3">
                    @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                        <div class="contact_form border p-5">
                            <h3 class="ct_title">Send Us a Message</h3>
                            <form  action="{{route('contact-process')}}" method="post" class="contact-form">
                            @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                        <label>Your Name <span class="required">*</span></label>
                                        <input type="text" id="con_name" name="name" class="form-control">
                                        <span class="text-danger">{{$errors->first('name')}}</span>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Email <span class="required">*</span></label>
                                            <input type="email" id="con_email" name="email" class="form-control">
                                            <span class="text-danger">{{$errors->first('email')}}</span>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Message <span class="required">*</span></label>
                                            <textarea id="con_message" name="message"
                                            class="form-control">
                                            </textarea>
                                            <span class="text-danger">{{$errors->first('message')}}</span>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-btn">
                                            <button type="submit" value="submit" id="submit" class="btn btn-black w-100"
                                                name="submit">send</button>
                                        </div>
                                        <div class="form__output"></div>
                                    </div>
                                </div>
                            </form>
                            <div class="form-output">
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- contact area End -->
        <div class="contact-bottom-info inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row">
                    <!--Contact Information Start-->
                    <div class="col-lg-3 col-sm-6 col-12 mb-30">
                        <div class="contact-info">
                            <span class="icon"><i class="fa fa-phone"></i></span>
                            <div class="content">
                                <h3 class="title">Contact By Phone</h3>
                                <p>xxxx.xxx.xxxx<br> xxxx.xxx.xxxx</p>
                            </div>
                        </div>
                    </div>
                    <!--Contact Information End-->

                    <!--Contact Information Start-->
                    <div class="col-lg-3 col-sm-6 col-12 mb-30">
                        <div class="contact-info">
                            <span class="icon"><i class="fa fa-envelope"></i></span>
                            <div class="content">
                                <h3 class="title">Contact By Email</h3>
                                <p>contact@yoursite.com <br> asd@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <!--Contact Information End-->

                    <!--Contact Information Start-->
                    <div class="col-lg-3 col-sm-6 col-12 mb-30">
                        <div class="contact-info">
                            <span class="icon"><i class="fa fa-map-marker"></i></span>
                            <div class="content">
                                <h3 class="title">Come To See Us</h3>
                                <p>lorem ipsum lorem ipsum <br> lorem ipsum lorem ipsum</p>
                            </div>
                        </div>
                    </div>
                    <!--Contact Information End-->

                    <!--Contact Information Start-->
                    <div class="col-lg-3 col-sm-6 col-12 mb-30">
                        <div class="contact-info">
                            <span class="icon"><i class="fa fa-users"></i></span>
                            <div class="content">
                                <h3 class="title">E-Book Social</h3>
                                <ul class="social-list list-inline">
                                <li class="single-social facebook"><a href="{{route('auth.facebook')}}"><i class="ion ion-social-facebook"></i></a>
                                </li>
                                <li class="single-social twitter"><a href="{{route('auth.linkedin')}}"><i class="ion ion-social-linkedin"></i></a></li>
                                <li class="single-social google"><a href="{{route('auth.gmail')}}"><i class="ion ion-social-googleplus-outline"></i></a></li>
                                <li class="single-social youtube"><a href="#"><i class="ion ion-social-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Contact Information End-->
                </div>
            </div>
        </div>

@endsection