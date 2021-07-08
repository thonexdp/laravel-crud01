<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


	
     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="style.css"> -->

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('assets/css/paper-dashboard.css') }}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/themify-icons.css') }}  " rel="stylesheet">

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <ul class="nav">
                <li class="active menuFlag">
                    <a href="#"  id="idDashboard">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
				<li class="menuFlag">
                    <a href="#"  id="idProfile">
                        <i class="fa fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
				
				
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{  strtoupper(Auth::user()->name) }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                
               @yield('content')

            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{ asset('assets/js/bootstrap-checkbox-radio.js') }}"></script>

	<!--  Charts Plugin -->
	<script src="{{ asset('assets/js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>

   

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="{{ asset('assets/js/paper-dashboard.js') }}"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="{{ asset('assets/js/demo.js') }}"></script>


</html>

<script type="text/javascript">
    
        $("#idDashboard").click(function(e){
            //$("#idBody").html("Hellow");

            //$(".idBody").load("example/table.html");

            $.ajax({

                url: "example/table.html",
                success: function(data){
                   $(".idBody").html(data);
                }
            });
        })
  
		$("#idProfile").click(function(e){
            
            $.ajax({

                url: "example/profile.html",
                success: function(data){
                   $(".idBody").html(data);
                }
            });
        })
		
        $(document).on("click", "#btnAlter", function(e){
            //$("#idBody").html("Hellow");

            $(".nim").hide();
        })
		
		$(document).on("click", "#btnSave", function(e){
			var str = "";
            $(".profile").each(function(){
				if ($(this).val() == ""){
					str = str + "<br>Empty " + $(this).attr("placeholder");
				}
			})
			
			if ($("#Password1").val() != $("#Password2").val()){
				str = str + "<br>Password not matched";
			}
			
			if (str != ""){
				$("#msg").html("<div class = 'alert alert-danger'>"+str+"</div>");
			}else{
				$.ajax({
					type: "post",
					url: "example/ProcessProfile.php",
					data: $("#frmProfile").serialize(),
					success: function(data){
					   $(".idBody").html(data);
					}
				});
			}
				
        })
		
		$(".menuFlag").click(function(){
			$(".menuFlag").removeClass("active");
			$(this).addClass("active");
		})
</script>