<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/sitesmall.png" />

    <title>Masroor|The Best Milk in Town</title>

    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <!-- Datatables -->
    <link href="/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="/css/sweetalert.css">
    <link href="/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ url('/admin') }}" class="site_title"><i class="fa fa-wrench"></i> <span>Admin Panel</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="/{{ Auth::user()->avatar }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ url('/admin') }}"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a href="{{ url('/houses') }}"><i class="fa fa-server"></i> Houses </a>
                  </li>
                  <li><a href="{{ url('/users') }}"><i class="fa fa-user"></i> Personnels </a>
                  </li>
                  <li><a href="{{ url('/inactive') }}"><i class="fa fa-toggle-off"></i> Inactive </a>
                  </li>
                  <li><a href="{{ url('/surveyresult') }}"><i class="fa fa-smile-o"></i> Survey </a>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Add or Edit</h3>
                <ul class="nav side-menu">
                  <li><a href="/area"><i class="fa fa-plus-square-o"></i> Areas</a>
                  </li>                 
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="padding-right: 35px;">
                    <img src="/{{ Auth::user()->avatar }}" alt="">{{ Auth::user()->username }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="/useredit/{{ Auth::user()->id }}"> Profile</a></li>
                    <li><a href="{{ route('logout') }}"  
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();""><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                 </form>
                 </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Survey Results</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>Simple table with project listing with progress and editing options</p>

                    <!-- start project list -->
                    <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Quality</th>
                          <th>Quantity</th>
                          <th>Service</th>
                          <th>Availability</th>
                          <th>Behaviour</th>
                          <th>Date</th>
                          <th>Address</th>
                          <th>Assigned To</th>
                          <th>Description</th>
                          <th>Modify</th>
                        </tr>
                      </thead>
                      <tbody>
                    @foreach($surveys as $body)
                        <tr>
                          <td>{{ $body->quality  }}</td>
                          <td>{{ $body->quantity  }}</td>
                          <td>{{ $body->service  }}</td>
                          <td>{{ $body->availibility  }}</td>
                          <td>{{ $body->behaviour  }}</td>
                          <td>{{ $body->created_at  }}</td>
                          <td>
                          @foreach($houses as $house)
                          @if($house->id == $body->find_model_id) {{$house->address}} @endif
                          @endforeach
                          </td>
                          <td>
                          @foreach($users as $user)
                          @if($user->id == $body->user_id) {{$user->first_name}} {{$user->last_name}} @endif
                          @endforeach
                          </td>
                          <td>{{ $body->description  }}</td>
                          <td>
                            <a href="survey/{{$body->id}}/delete"" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                    </div>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     <!-- /page content -->
 <!-- footer content -->
        <footer>
          <div class="pull-right">
           Masroor &copy Copyright All Rights Reserved.
          </div>
          <div class="clearfix"></div>
        </footer>
 <!-- /footer content -->
    <script src="/js/sweetalert.min.js"></script>
    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
    <!-- jQuery -->
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Datatables -->
    <script src="/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>
  </body>
</html>
