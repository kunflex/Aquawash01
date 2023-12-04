<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <title>AquaClean | Official website page</title>
         <link rel="shortcut icon" href="{{asset('assets/img/aquaclean.png')}}" type="image/png">

    </head>
    <style>@import url('assets/css/style.css');</style>
    <style>@import url('assets/js/popup.js');</style>
    
    <body >
<!-- ==== navigation==== -->
        <head>
            <nav class="top_navigation">
                <nav class="channel">
                    
                </nav>
                <nav class="navigation" style="position:fixed;border-bottom:1px solid #ddd;">
                    <ul>
                        <div class="company">
                            <h3 class="aqua">Aqua</h3>
                            <h3 class="clean">Clean</h3>
                        </div>
                        <div class="menu">
                            <li><a href="">Home</a></li>
                            <li><a href="">Services</a></li>
                            <li><a href="">About</a></li>
                            <li><a href="">Contact Us</a></li>
                        </div>
                        
                        <div class="check">
                            
                            @if (Route::has('login'))
                                @auth
                                    <li class="wel"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    
                                    @else
                                    <div class="option1">
                                        <li><a href="{{url('login')}}">Login</a></li>
                                    </div>
                                    <div class="option">
                                        @if (Route::has('register'))
                                            <li><a href="{{url('register')}}">Signup</a></li>
                                        @endif
                                    </div>
                                @endauth
                            @endif
                        </div>

                    </ul>
                </nav>
            </nav>
        </head>


        <!-- ===== body ===== -->
        <tbody>
            <div class="image_slide">
                    <video autoplay muted loop style="height:100%;width: 100%;">
                            <source src="{{asset('assets/video/Laundry Service Promo Video Ads Examples.mp4')}}" type="video/mp4">
                        </video>
                
                    
            </div>
           
             
            <!-- Our Work -->
            <center>
                <div class="our-work">
                    <li><h3>This is how we work</h3></li> <hr><br>
                    <div class="work-details">
                        <div>We Collect your Clothes <br><br>
                            <img src="{{asset('assets/img/wash2.png')}}" alt="" style="width:100hv;height:300px;">
                        </div>
                        <div>Wash and Iron them<br><br>
                            <img src="{{asset('assets/img/ironing.jpg')}}" alt="" style="width:100hv;height:300px;">
                        </div>
                        <div>Get it delivered to customers<br><br>
                            <img src="{{asset('assets/img/wash.png')}}" alt="" style="width:100hv;height:300px;">
                        </div>
                    </div>
                </div>
            </center>
            <br>

            
            
            <!--Overview  -->
            <div class="overview">
                <Li>
                    <h1>Clean with confidence, from top-notch service quality to a spotless satisfaction guarantee.</h1>
                </Li>
                <div class="box">
                    <div>
                        <li>Ensure production quality with</li> <br>
                        
                    </div>
                    <div>
                        <li>Protect your purchases with</li>
                    </div>
                </div>
            </div>

            
            <!-- Our Team -->
            <center>
                <div class="our-team">
                    <li><h3>Our Team</h3></li> <hr>
                    <div class="team-details">
                        <div>
                            <img src="{{asset('assets/img/customer01.jpg')}}" alt=""><br>
                            We Collect your Clothes
                        </div>
                        <div>
                            <img src="{{asset('assets/img/customer01.jpg')}}" alt=""><br>
                            Wash and Iron them
                        </div>
                        <div>
                            <img src="{{asset('assets/img/customer01.jpg')}}" alt=""><br>
                            Get it delivered to customers
                        </div>
                        <div>
                            <img src="{{asset('assets/img/customer01.jpg')}}" alt=""><br>
                            Get it delivered to customers
                        </div>
                    </div>
                </div>
            </center>
        </tbody>


<!--==== footer ====-->
        <br>
            <footer>
                <div class="bottombar">

                </div>
                <center>
                    <nav class="footer">
                        <ul>
                            <li>AquaClean &copy; 2023 | Alright Reserved | Theme <span style="background: linear-gradient(to right, red, blue); -webkit-background-clip: text; color: transparent;">&#10084;</span>
                            Kunflex &reg;</li>
                        </ul>
                    </nav>
                </center>
            </footer>
    </body>
</html>
