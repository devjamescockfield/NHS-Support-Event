@extends('layouts.main-app')

@section('style')
    /* The Modal (background) */
    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    }

    .close:hover,
    .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
    }
@stop

@section('js')
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
@stop

@section('content')
    <section class="intro text-center section-padding" id="intro">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 wp1">

                    <h1 class="animated fadeInDown" style="color: white">Welcome to the NHS Support Event</h1>

                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 wp1">
                    <img width="40%" height="40%" src="{{asset('../img/SQAURE_LOGO_MOCK_3_PNG.png')}}">
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 wp1">

                    <h1 class="animated fadeInDown" style="color: white">Donate to us today to help the NHS continue their amazing services!!</h1>
                    <br>
                    <a href="https://www.justgiving.com/fundraising/nhs-support-event" target="_blank"><i style="color: white" class="fas fa-donate fa-5x"></i></a>

                </div>
            </div>
        </div>
    </section>
    <section class="features text-center section-padding" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>About The Event</h1>
                    <hr>
                    <br>
                    <h3>Due to the difficult times right now and the NHS and other frontline workers we are hosting a 24 hour convoy to show our continued support during this national emergency.</h3>

                    <div class="features-wrapper">
                        <div class="col-md-4 wp2">
                            <div class="icon">
                                <i class="fa fa-question shadow"></i>
                            </div>
                            <h2>What is NHS?</h2>
                            <p style="color: black">The National Health Service (NHS) is the publicly-funded healthcare system of the United Kingdom</p>
                        </div>
                        <div class="col-md-4 wp2 delay-05s">
                            <div class="icon">
                                <i class="fa fa-users shadow"></i>
                            </div>
                            <h2>Agenda</h2>
                            <p style="color: black">On May 16th, Lakeside Transport and JD Logistics team up for a 24 hour convoy to show our support to them! This will include a variety of routes and a truckfest halfway.</p>
                        </div>
                        <div class="col-md-4 wp2 delay-1s">
                            <div class="icon">
                                <i class="fa fa-heart shadow"></i>
                            </div>
                            <h2>Event Details</h2>
                            <p style="color: black">Think you have what it takes to drive a 24 hour convoy? Then we hope to see you there! The event details can be found below.</p>

                            <!-- Trigger/Open The Modal -->
                            <button id="myBtn">See Event Details</button>

                            <!-- The Modal -->
                            <div id="myModal" class="modal">

                                <!-- Modal content -->
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <ul style="list-style-type: none">
                                        <li>Game - Euro Truck Simulator 2</li>
                                        <li>Server - Event Server</li>
                                        <li>Date and time - 16/05/2020 @ 13:00 BST</li>
                                        <li>Website - <a href="{{url('/')}}"><i class="fas fa-browser"></i></a></li>
                                        <li>Discord - <a href="https://discord.gg/BvGSrSb"><i class="fab fa-discord"></i></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="text-center split-bottom split-top" id="important-links">
        <div class="container-fluid nopadding responsive-services">
            <div class="wrapper">
                <div class="iphone">
                    <div class="wp3" style="margin-top: 100px">
                       <img width="80%" height="70%" src="{{asset('img/BANNER_MOCK_3_PNG.png')}}">
                    </div>
                </div>
                <div class="fluid-white">
                    <div class="container designs">
                        <div class="row">
                            <div class="col-md-5 col-md-offset-3">
                                <div id="servicesSlider">
                                    <h1>Important Links</h1>
                                    <hr><br>
                                    <ul class="slides">
                                        <li>
                                            <br>
                                            <h3>Event Discord</h3>
                                            <hr><br>
                                            <a target="_blank" href="https://discord.gg/BvGSrSb"><i class="fab fa-discord fa-5x"></i></a>
                                            <br>
                                        </li>
                                        <li>
                                            <br>
                                            <h3>ETS2C Link</h3>
                                            <hr><br>
                                            <a target="_blank" href="https://ets2c.com/view/85763/jdman-gaming-aberdeen-sea-port"><i class="fas fa-link fa-5x"></i></a>
                                            <br>
                                        </li>
                                        <li>
                                            <br>
                                            <h3>Facebook</h3>
                                            <hr><br>
                                            <a target="_blank" href="https://www.facebook.com/NHS-Support-Event-ETS2-109161937427035/"><i class="fab fa-facebook fa-5x"></i></a>
                                            <br>
                                        </li>
                                        <li>
                                            <br>
                                            <h3>Donations</h3>
                                            <hr><br>
                                            <a target="_blank" href="https://www.justgiving.com/fundraising/epilepsywareness2020"><i class="fas fa-donate fa-5x"></i></a>
                                            <br>
                                        </li>
                                        <li>
                                            <br>
                                            <h3>Epilepsy Event Forum</h3>
                                            <hr><br>
                                            <a target="_blank" href="https://forum.truckersmp.com/index.php?/topic/87448-28th-march-2020-epilespy-awareness/"><i class="fas fa-link fa-5x"></i></a>
                                            <br>
                                        </li>
                                        <li>
                                            <br>
                                            <h3>Truckfest Application Staff</h3>
                                            <hr><br>
                                            <a target="_blank" href="https://forms.gle/5aH5KhdvZLUmcmMV8"><i class="fas fa-link fa-5x"></i></a>
                                            <br>
                                        </li>
                                        <li>
                                            <br>
                                            <h3>Twitch</h3>
                                            <hr><br>
                                            <a target="_blank" href=" https://www.twitch.tv/nhseventsupport"><i class="fab fa-twitch fa-5x"></i></a>
                                            <br>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="portfolio text-center section-padding ignite-cta" id="routes">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 style="color: white">Event Routes</h1>
                    <hr>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="team-wrapper">
                    <div id="teamSlider">
                        <ul class="slides">
                            <!--<li>
                                <div class="col-md-4 wp5">
                                    <img src="{{asset('img/2020 routes/route1.png')}}" width="75%" height="75%" alt="Route 1">
                                    <h2>Route 1</h2>
                                    <p>Tartu to Paldiski ferry port</p>
                                    <p>973 Miles</p>
                                </div>

                                <div class="col-md-4 wp5">
                                    <img src="{{asset('img/2020 routes/route2.png')}}" width="75%" height="75%" alt="Route 2">
                                    <h2>Route 2</h2>
                                    <p>Kapellskar ferry port to Kiel Stokes</p>
                                    <p>1144 Miles</p>
                                </div>

                                <div class="col-md-4 wp5">
                                    <img src="{{asset('img/2020 routes/route3.png')}}" width="75%" height="75%" alt="Route 2">
                                    <h2>Route 3</h2>
                                    <p>Kiel Stokes To Duisburg LKW</p>
                                    <p>1159 Miles</p>
                                </div>
                            </li>
                            <li>
                                <div class="col-md-4 wp5">
                                    <img src="{{asset('img/2020 routes/route4.png')}}" width="75%" height="75%" alt="Route 4">
                                    <h2>Route 4</h2>
                                    <p> Duisburg LKW to Le Havre Nos Paturage</p>
                                    <p>1200 Miles</p>
                                </div>

                                <div class="col-md-4 wp5">
                                    <img src="{{asset('img/2020 routes/route5.png')}}" width="85%" height="85%" alt="Route 5">
                                    <h2>Route 5</h2>
                                    <p>Le Havre Nos Paturages to Strasburg WGCC</p>
                                    <p>1190 Miles</p>
                                </div>

                                <div class="col-md-4 wp5">
                                    <img src="{{asset('img/2020 routes/route6.png')}}" width="75%" height="75%" alt="Route 6">
                                    <h2>Route 6</h2>
                                    <p>Strasburg WGCC to Milan Cargotras</p>
                                    <p>1026 Miles</p>
                                </div>
                            </li>
                            <li>
                                <div class="col-md-4 wp5">
                                    <img src="{{asset('img/2020 routes/route7.png')}}" width="75%" height="75%" alt="Route 7">
                                    <h2>Route 7</h2>
                                    <p>Milan Cargotas to Venice LKW</p>
                                    <p>1050 Miles</p>
                                </div>

                                <div class="col-md-4 wp5">
                                    <img src="{{asset('img/2020 routes/route8.png')}}" width="75%" height="75%" alt="Route 8">
                                    <h2>Route 8</h2>
                                    <p>Venice LKW to Linz ITCC</p>
                                    <p>1096 Miles</p>
                                </div>

                                <div class="col-md-4 wp5">
                                    <img src="{{asset('img/2020 routes/route9.png')}}" width="75%" height="75%" alt="Route 9">
                                    <h2>Route 9</h2>
                                    <p>Linz ITCC to Lublin LKW </p>
                                    <p>1109 Miles</p>
                                </div>
                            </li>
                            <li>
                                <div class="col-md-4 wp5">
                                    <img src="{{asset('img/2020 routes/route10.png')}}" width="75%" height="75%" alt="Route 10">
                                    <h2>Route 10</h2>
                                    <p>Lublin LKW To Kaunas Suprema</p>
                                    <p>1146 Miles</p>
                                </div>
                            </li>-->
                            <li>
                                <div class="col-md-4 wp5"></div>
                                <div class="col-md-4 wp5">
                                    <h2>Routes Coming Soon!</h2>
                                </div>
                                <div class="col-md-4 wp5"></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="text-center section-padding" id="team">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>About the Team</h1>
                </div>
            </div>
            <div class="row">
                <div class="team-wrapper">
                    <div id="teamSlider">
                        <ul class="slides">
                            <li>
                                <div class="col-md-4 wp5">

                                </div>

                                <div class="col-md-4 wp5 delay-05s">
                                    <h2>Coming Soon!</h2>
                                </div>

                                <div class="col-md-4 wp5 delay-1s">

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="text-center section-padding" id="contact">
        <div class="container">
            <h1>Contact Us</h1>
            @guest
                <h3>Login or Register to Contact Us!</h3>
                <h4><a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a></h4>
                @if (Route::has('register'))
                    <h4><a class="btn btn-secondary" href="{{ route('register') }}">{{ __('Register') }}</a></h4>
                @endif
            @else
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                {!! Form::open(['route'=>'contact.contact.store']) !!}
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    {!! Form::label('Name:') !!}
                    <input class="form-control" name="name" id="name" disabled value="{{ $user->name }}">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    {!! Form::label('Email:') !!}
                    <input class="form-control" name="email" id="email" disabled value="{{ $user->email }}">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                    {!! Form::label('Message:') !!}
                    {!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Enter Message']) !!}
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Contact US!</button>
                </div>
                {!! Form::close() !!}
            @endif
        </div>
        <br>
    </section>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

@stop
