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
                            <li><a href="">Gallary</a></li>
                            <li><a href="">About</a></li>
                            <li><a href="">Contact Us</a></li>
                        </div>
                        
                        <div class="check">
                            
                            @if (Route::has('login'))
                                @auth
                                    <li class="wel"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    
                                    @else
                                    <div class="option1">
                                        <li><a href="login">Login</a></li>
                                    </div>
                                    <div class="option">
                                        @if (Route::has('register'))
                                            <li><a href="register">Signup</a></li>
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
                <img src="{{asset('assets/img/1.jpg')}}" style="width:100%;max-height:400px;">
                    
            </div>

                <div id="carouselExampleInterval" class="carousel slide" data-mdb-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-mdb-interval="1000">
                        <img src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp" class="d-block w-100"
                            alt="Wild Landscape" />
                        </div>
                        <div class="carousel-item" data-mdb-interval="3000">
                        <img src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp" class="d-block w-100" alt="Camera" />
                        </div>
                        <div class="carousel-item" data-mdb-interval="5000">
                        <img src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp" class="d-block w-100"
                            alt="Exotic Fruits" />
                        </div>
                    </div>
                    <button class="carousel-control-prev" data-mdb-target="#carouselExampleInterval" type="button"
                        data-mdb-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" data-mdb-target="#carouselExampleInterval" type="button"
                        data-mdb-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            
            <!-- <div id="slideshow">
                <div class="slditem">

                    <div id="slider" class="slider" >
                        <div class="slider-content">
                            <div class="slider-content-wrapper">
                                <div class="slider-content__item image-1" style="display:inline-flex;gap:5px;"><img src="{{asset('assets/img/car1.jpg')}}" class="slideitem" ><img src="{{asset('assets/img/1.jpg')}}" class="slideitem" ><img src="{{asset('assets/img/car1.jpg')}}" class="slideitem" ><img src="{{asset('assets/img/1.jpg')}}" class="slideitem" ><img src="{{asset('assets/img/1.jpg')}}" class="slideitem" ></div>

                            </div>
                        </div>
                    </div>
                    
                </div>

            </div> -->

           
            
            <!-- Our Work -->
            <center>
                <div class="our-work">
                    <li><h3>This is how we work</h3></li> <hr>
                    <div class="work-details">
                        <div>We Collect your Clothes</div>
                        <div>Wash and Iron them</div>
                        <div>Get it delivered to customers</div>
                    </div>
                </div>
            </center>
            <br>

            <!--  -->
            <div class="advert">
                <img src="{{asset('assets/img/2.jpg')}}" style="width:100%;max-height:400px;">
                
            </div>

            <div>
            <button class="trigger" data-modal-trigger="trigger-1">Alert</button>

            <div class="modal" data-modal="trigger-1">
  <article class="content-wrapper">
    <button class="close"></button>
    <header class="modal-header">
      <h2>Are you sure you want to delete?</h2>
    </header>
    <div class="content">
    <p>This action is inreversible </p>
</div>
    <footer class="modal-footer">
      <button class="action">Yes</button>
      <button class="action2">No</button>
    </footer>
  </article>
</div>
<style>
    $base-duration: 0.25s;

// Colors
$primary: slategray;
$accent: tomato;
$white: whitesmoke;
$green: #2ecc71;
$red: #e74c3c;


*, *:before, *:after {
	box-sizing: border-box;
	outline: none;
}

.modal-footer {
			position: relative;
			display: flex;
			align-items: center;
			justify-content: flex-end;
			width: 100%;
			margin: 0;
			padding: 1.875rem 0 0;
		}
        .action {
				position: relative;
				margin-left: 0.625rem;
				padding: 0.625rem 1.25rem;
				border: none;
				background-color:darkgreen;
				border-radius: 0.25rem;
				color: white;
				font-size: 0.87rem;
				font-weight: 300;
				overflow: hidden;
				z-index: 1;
        }
        .action2 {
				position: relative;
				margin-left: 0.625rem;
				padding: 0.625rem 1.25rem;
				border: none;
				background-color: darkred;
				border-radius: 0.25rem;
				color: white;
				font-size: 0.87rem;
				font-weight: 300;
				overflow: hidden;
				z-index: 1;
                
        }
html {
	font-family: 'Source Sans Pro', sans-serif;
	font-size: 16px;
	font-smooth: auto;
	font-weight: 300;
	line-height: 1.5;
	color: #444;
	background-color: $primary;
}

button {
	cursor: pointer;
}



.pdfobject-container { height: 30rem; border: 1rem solid rgba(0,0,0,.1); }

.trigger {
	margin: 0 0.75rem;
	padding: 0.625rem 1.25rem;
	border: none;
	border-radius: 0.25rem;
	box-shadow: 0 0.0625rem 0.1875rem rgba(0,0,0,0.12), 0 0.0625rem 0.125rem rgba(0,0,0,0.24);
	transition: all $base-duration cubic-bezier(.25,.8,.25,1);
	font-size: 0.875rem;
	font-weight: 300;
	
	i {
		margin-right: 0.3125rem;
	}
	
	&:hover {
		box-shadow: 0 0.875rem 1.75rem rgba(0,0,0,0.25), 0 0.625rem 0.625rem rgba(0,0,0,0.22);
	}
}

.modal {
	position: fixed;
	top: 0;
	left: 0;
	display: flex;
	align-items: center;
	justify-content: center;
	height: 0vh;
	background-color: transparent;
	overflow: hidden;
	transition: background-color $base-duration ease;
	z-index: 9999;
	
	&.open {
		position: fixed;
		width: 100%;
		height: 100vh;
		background-color: rgba(0,0,0,0.5);
		transition: background-color $base-duration;
		
		> .content-wrapper {
			transform: scale(1.0);
		}
	}
	
	.content-wrapper {
		position: relative;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: flex-start;
		width: 50%;
		margin: 0;
		padding: 2.5rem;
		background-color: white;
		border-radius: 0.3125rem;
		box-shadow: 0 0 2.5rem rgba(0,0,0,0.5);
		transform: scale(0.0);
		transition: transform $base-duration;
		transition-delay: 0.15s;
		
		.close {
			position: absolute;
			top: 0.5rem;
			right: 0.5rem;
			display: flex;
			align-items: center;
			justify-content: center;
			width: 2.5rem;
			height: 2.5rem;
			border: none;
			background-color: transparent;
			font-size: 1.5rem;
			transition: $base-duration linear;
			
			&:before, &:after {
				position: absolute;
				content: '';
				width: 1.25rem;
				height: 0.125rem;
				background-color: black;
			}
			
			&:before {
				transform: rotate(-45deg);
			}
			
			&:after {
				transform: rotate(45deg);
			}
			
			&:hover {
				transform: rotate(360deg);
				
				&:before, &:after {
					background-color: $accent;
				}
			}
		}
		
		.modal-header {
			position: relative;
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: space-between;
			width: 100%;
			margin: 0;
			padding: 0 0 1.25rem;
			
			h2 {
				font-size: 1.5rem;
				font-weight: bold;
			}
		}
		
		.content {
			position: relative;
			display: flex;
			
			p {
				font-size: 0.875rem;
				line-height: 1.75;
			}
		}
		
		
	}
}
            </style>
                <script>
                    const buttons = document.querySelectorAll('.trigger[data-modal-trigger]');

for(let button of buttons) {
	modalEvent(button);
}

function modalEvent(button) {
	button.addEventListener('click', () => {
		const trigger = button.getAttribute('data-modal-trigger');
		// console.log('trigger', trigger)
		const modal = document.querySelector(`[data-modal=${trigger}]`);
		console.log('modal', modal)
		const contentWrapper = modal.querySelector('.content-wrapper');
		const close = modal.querySelector('.close');

		close.addEventListener('click', () => modal.classList.remove('open'));
		modal.addEventListener('click', () => modal.classList.remove('open'));
		contentWrapper.addEventListener('click', (e) => e.stopPropagation());

		modal.classList.toggle('open');
	});
}

                </script>
            </div>
            
            <!--Overview  -->
            <div class="overview">
                <Li>
                    <h1>Clean with confidence, from top-notch service quality to a spotless satisfaction guarantee.</h1>
                </Li>
                <div class="box">
                    <div>
                        <li>Ensure production quality with</li>
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
