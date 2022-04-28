<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>Fecore Cloud Storage</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('template')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('template')}}/assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('template')}}/assets/plugins/toastr/toastr.min.css" rel="stylesheet">  

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <!-- Theme Styles -->
        <link href="{{ asset('template')}}/assets/css/lime.min.css" rel="stylesheet">
        <link href="{{ asset('template')}}/assets/css/custom.css" rel="stylesheet">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div>

        
       @include('dashboard.layouts.sidebar')
        
        
        {{-- Settings --}}
        <div class="lime-header">
            <nav class="navbar navbar-expand-lg">
                <section class="material-design-hamburger navigation-toggle">
                    <a href="javascript:void(0)" class="button-collapse material-design-hamburger__icon">
                        <span class="material-design-hamburger__layer"></span>
                    </a>
                </section>
                <a class="navbar-brand" href="#">Fecore Cloud Storage</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="material-icons">keyboard_arrow_down</i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <form action="/dashboard/logout" method="post">
                                    @csrf
                                <li><button class="dropdown-item" href="#">Log Out</button></li>
                            </form>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>


        <div class="lime-container">
            @yield('main')
            <div class="lime-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <center><span class="footer-text">{{Date('Y')}} © Dibuat dengan <i class="bi bi-suit-heart-fill"></i> menggunakan Laravel</span></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- Javascripts -->
        <script src="{{ asset('template')}}/assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="{{ asset('template')}}/assets/plugins/bootstrap/popper.min.js"></script>
        <script src="{{ asset('template')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ asset('template')}}/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="{{ asset('template')}}/assets/plugins/chartjs/chart.min.js"></script>
        <script src="{{ asset('template')}}/assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
        <script src="{{ asset('template')}}/assets/plugins/toastr/toastr.min.js"></script>
        <script src="{{ asset('template')}}/assets/js/lime.min.js"></script>
        {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
        <script src="{{ asset('template')}}/assets/js/pages/dashboard.js"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script> --}}
    </body>
</html>