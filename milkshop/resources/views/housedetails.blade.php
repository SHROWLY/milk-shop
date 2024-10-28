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
    <link href="/build/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
    
    .modal  {
    /*   display: block;*/
    padding-right: 0px; 
    }
   
    .modal-dialog {
            top: 28%;
                max-width: 600px;
    margin-left: auto;
    margin-right: auto;
               
        }
        .modal-content {
                border-radius: 0px;
                border: none;
    top: 40%;
            }
          </style>
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
        <!-- /Analytics Table -->
            <div class="row">
                   <div class="col-sm-12">
                  <h3 style="contain: content;">
                    {{ $house->address }}
                  </h3>
            </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
               @if (count($errors) > 0)
                  <div class="alert alert-danger">
                                                      <ul>
                                                          @foreach ($errors->all() as $error)
                                                              <li>{{ $error }}</li>
                                                          @endforeach
                                                      </ul>
                                                  </div>
                                              @endif
                @if (session()->has('flash_notification.message'))
                        <div class="alert alert-{{ session('flash_notification.level') }}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                            {!! session('flash_notification.message') !!}
                        </div>
              @endif
                <div class="x_panel">
                  <div class="x_title">
                    <h2>
                    <a href="/house={{$house->id}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a></h2>
                     <a href="" data-toggle="modal" data-target=".bs-add-modal-lg" class="btn btn-primary btn-sm" style="float: right; margin-left: 5px;">Add Quantity</a>
                     <div class="modal fade bs-add-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                  
                                    <div class="modal-body">
                                          <H2 style="margin: 0;">Add 
                                          Quantity:</H2>
                                          <br>
                                   <div class="panel panel-default">
                                              <div class="panel-body form-horizontal payment-form">
                                              <form class="form-horizontal" role="form" method="POST" action="/billing/{{$house->id}}/add">
                                                      {{ csrf_field() }}
                                                             <div class="form-group">
                                                <label for="quantity" class="col-xs-3 control-label">Quantity Given:</label>
                                                <div class="col-xs-9">
                                                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                                                </div>
                                            </div>
                                                  <div class="form-group">
                                                      <div class="col-xs-12 text-right">
                                                          <button type="submit" class="btn btn-default preview-add-button">
                                                              <span class="glyphicon glyphicon-plus"></span> Add
                                                          </button>
                                                      </div>
                                                  </div>
                                                  </form>
                                              </div>
                                          </div>               
                                    </div>
                                  </div>
                                </div>
                              </div> 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Quantity</th>
                          <th>Amount (per liter)</th>
                          <th>Date</th>
                          <th>Total</th>
                          <th>Bill</th>
                          <th>Modify</th>
                        </tr>
                      </thead>

                      <tbody>
                           @foreach($house->billings as $body)
                              <tr>
                                <td>{{$body->quantity}} Litres</td>
                                <td>{{$body->price}} Rs</td>
                                <td>{{$body->created_at}}</td>
                                <td>{{$body->total}} Rs</td>
                                <td>@if(empty($body->recieved)) Unpaid @endif @if(!empty($body->recieved)) Recieved ({{$body->recieved}}) @endif</td>
                                <td>

                                 <a href="" data-toggle="modal" data-target=".bs-{{$body->id}}-modal-lg" class="btn btn-info btn-xs">edit</a> 

                              <div class="modal fade bs-{{$body->id}}-modal-lg">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                  
                                    <div class="modal-body">
                                          <H2 style="margin: 0;">Edit 
                                          Quantity:</H2>
                                          <br>
                                   <div class="panel panel-default">
                                              <div class="panel-body form-horizontal payment-form">
                                              <form class="form-horizontal" role="form" method="POST" action="/billing/{{$body->id}}/edit">
                                                      {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="quantity" class="col-xs-3 control-label">Quantity</label>
                                                <div class="col-xs-9">
                                                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                                                </div>
                                            </div>
                                                  <div class="form-group">
                                                      <div class="col-xs-12 text-right" style="height:33px;">
                                                          <button type="submit" class="btn btn-default preview-add-button">
                                                              <span class="glyphicon glyphicon-plus"></span> Edit
                                                          </button>
                                                      </div>
                                                  </div>
                                                  </form>
                                              </div>
                                          </div>               
                                    </div>
                                  </div>
                                </div>
                              </div>

                                 <a href="/billing/{{$body->id}}/delete" class="btn btn-danger btn-xs">delete</a></td>
                              </tr> 
                               @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              </div>

     <!-- /page content -->
     </div>
 <!-- footer content -->
        <footer>
          <div class="pull-right">
           Masroor &copy Copyright All Rights Reserved.
          </div>
          <div class="clearfix"></div>
        </footer>
 <!-- /footer content -->

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