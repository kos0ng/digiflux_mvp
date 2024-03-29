<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="/assets/img/digiflux.png" style="margin-left: 15%" />
                    {{-- <h3>Digiflux</h3> --}}
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                @php
                if(Session::get('role')==1){
                @endphp
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('dashboard')">
                            <a class="js-arrow" href="{{route('home')}}">
                                <img src="@yield('home_active')" style="margin-right: 5%;margin-bottom: 2%">Beranda</a>
                        </li>
                        <li class="@yield('influencer')">
                            <a class="js-arrow" href="{{route('influencer')}}">
                                <img src="@yield('groups_active')" style="margin-right: 5%;margin-bottom: 2%">Influencer</a>
                        </li>
                        <li class="@yield('profile')">
                            <a class="js-arrow" href="{{route('profile')}}">
                                <img src="@yield('user_active')" style="margin-right: 9%;margin-bottom: 2%">Profil</a>
                        </li>
                        <li style="margin-top: 270%">
                                 <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                    <i class="zmdi zmdi-power"></i>Logout
                                                </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                        </li>
                    </ul>
                </nav>
                @php
            }else{
                @endphp
<nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('dashboard')">
                            <a class="js-arrow" href="{{route('home')}}">
                                <img src="@yield('home_active')" style="margin-right: 5%;margin-bottom: 2%">Beranda</a>
                        </li>
                        <li class="@yield('campaign')">
                            <a class="js-arrow" href="{{route('campaign')}}">
                                <img src="@yield('groups_active')" style="margin-right: 5%;margin-bottom: 2%">Open Campaign</a>
                        </li>
                        <li class="@yield('profile')">
                            <a class="js-arrow" href="{{route('profile')}}">
                                 <img src="@yield('user_active')" style="margin-right: 9%;margin-bottom: 2%">Profil</a>
                        </li>
                        <li style="margin-top: 270%">
                                 <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                    <i class="zmdi zmdi-power"></i>Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                        </li>
                    </ul>
                </nav>
                @php
            }
                @endphp
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
           {{--  <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/profile.png" alt="" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Fahmi</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/profile.png" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">Fahmi</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                    <i class="zmdi zmdi-power"></i>Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header> --}}
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            @yield('content')
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <!-- <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script> -->
    <script src="{{ asset('vendor/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('vendor/jquery.dataTables.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('js/main.js') }}"></script>
    
    @yield('filter-js')

    <script type="text/javascript">
        $(document).ready(function() {
            $('#campaign_switch').change(function() {
                $('#id_campaign').val($(this).val());
            });


             $("#add").click(function() {
        var lastField = $("#buildyourform div:last");
        var fType = $( "#tag" ).clone();
        var removeButton = $("<input type=\"button\" class=\"btn btn-danger\" id=\"remove\" value=\"x\" style=\"margin-right:1%\" />");
        removeButton.click(function() {
            $("#tag").last().remove();
            $("#remove").last().remove();
        });
        $("#buildyourform").append(fType);
        $("#buildyourform").append(removeButton);
    });
        $("#add4").click(function() {
        var lastField = $("#buildyourform4 div:last");
        var fType = $( "#tag2" ).clone();
        var removeButton = $("<input type=\"button\" class=\"btn btn-danger\" id=\"remove4\" value=\"x\" style=\"margin-right:1%\" />");
        removeButton.click(function() {
            $("#tag2").last().remove();
            $("#remove4").last().remove();
        });
        $("#buildyourform4").append(fType);
        $("#buildyourform4").append(removeButton);
    });
        $("#add2").click(function() {
        var lastField = $("#buildyourform2 div:last");
        var fType = $( "#daerah" ).clone();
        var removeButton = $("<input type=\"button\" class=\"btn btn-danger\" id=\"remove2\" value=\"x\" style=\"margin-right:1%\" />");
        removeButton.click(function() {
            $("#daerah").last().remove();
            $("#remove2").last().remove();
        });
        $("#buildyourform2").append(fType);
        $("#buildyourform2").append(removeButton);
    });
            $("#add3").click(function() {
        var lastField = $("#buildyourform3 div:last");
        var fType = $( "#photo_example" ).clone();
        var removeButton = $("<input type=\"button\" class=\"btn btn-danger\" id=\"remove3\" value=\"x\" style=\"margin-right:1%\" />");
        removeButton.click(function() {
            $("#photo_example").last().remove();
            $("#remove3").last().remove();
        });
        $("#buildyourform3").append(fType);
        $("#buildyourform3").append(removeButton);
    });
             $("#add5").click(function() {
        var lastField = $("#buildyourform5 div:last");
        var fType = $( "#photo_example" ).clone();
        var removeButton = $("<input type=\"button\" class=\"btn btn-danger\" id=\"remove5\" value=\"x\" style=\"margin-right:1%\" />");
        removeButton.click(function() {
            $("#photo_example2").last().remove();
            $("#remove5").last().remove();
        });
        $("#buildyourform5").append(fType);
        $("#buildyourform5").append(removeButton);
    });

               $("#add6").click(function() {
        var lastField = $("#buildyourform6 div:last");
        var fType = $( "#photo_portofolio" ).clone();
        var removeButton = $("<input type=\"button\" class=\"btn btn-danger\" id=\"remove6\" value=\"x\" style=\"margin-right:1%\" />");
        removeButton.click(function() {
            $("#photo_portofolio").last().remove();
            $("#remove6").last().remove();
        });
        $("#buildyourform6").append(fType);
        $("#buildyourform6").append(removeButton);
    });
    // Setup - add a text input to each footer cell
    $('#searchtable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Cari '+title+'" />' );
    } );

 
    // DataTable
    var table = $('#searchtable').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that.search( this.value ).draw();
                    }
                } );
            } );
        }
    });
 
} );

        function deleteSiswa(id){
            if (confirm('Yakin ingin menghapus data?')) {
                $.get("/dashboard/deleteSiswa/"+id,function(result){    
                    location.reload();
                });
            }
        }
        function deletePrestasi(id){
            if (confirm('Yakin ingin menghapus data?')) {
                $.get("/dashboard/deletePrestasi/"+id,function(result){    
                    location.reload();
                });
            }
        }
        function deleteKasus(id){
            if (confirm('Yakin ingin menghapus data?')) {
                $.get("/dashboard/deleteKasus/"+id,function(result){    
                    location.reload();
                });
            }
        }
        function deleteKonseling(id){
            if (confirm('Yakin ingin menghapus data?')) {
                $.get("/dashboard/deleteKonseling/"+id,function(result){    
                    location.reload();
                });
            }
        }
        function deleteWali(id){
            if (confirm('Yakin ingin menghapus data?')) {
                $.get("/dashboard/deleteWali/"+id,function(result){    
                    location.reload();
                });
            }
        }
        function deleteAlumni(id){
            if (confirm('Yakin ingin menghapus data?')) {
                $.get("/dashboard/deleteAlumni/"+id,function(result){    
                    location.reload();
                });
            }
        }
        function deleteBK(id){
            if (confirm('Yakin ingin menghapus data?')) {
                $.get("/dashboard/deleteBK/"+id,function(result){    
                    location.reload();
                });
            }
        }
    </script>


</body>

</html>
<!-- end document-->
