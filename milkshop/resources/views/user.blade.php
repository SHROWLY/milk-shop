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
    <!-- iCheck -->
   <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="css/sweetalert.css">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left" style="    text-align: -webkit-center;">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="/{{ $user->avatar }}" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $user->address }}
                        </li>

                        <li><i class="fa fa-envelope user-profile-icon"></i> {{ $user->email }}
                        </li>
                        @if($user->idcard)
                        <li><i class="fa fa-id-badge user-profile-icon"></i> {{ $user->idcard }}
                        </li>
                        @endif
                        
                        <li>
                          <i class="fa fa-phone user-profile-icon"></i> {{$user->phone}} @if($user->phone1) / {{ $user->phone1 }} @endif
                        </li>

                        <li>
                          <i class="fa fa-user user-profile-icon"></i> {{$user->username}}
                        </li>
                        <li>
                        <form class="form-horizontal" role="form" method="POST" action="/rating/{{$user->id}}">
                          {{ csrf_field() }}
                          <input type="number" name="rated" id="rating-custom-icons" class="rating" data-icon-lib="fa" data-active-icon="fa-star fa-2x" data-inactive-icon="fa-star-o fa-2x" value="{{$rating}}"/>
                          @if($user->averageRating)
                          <i class=" user-profile-icon">{{$user->averageRating}} / 5</i>
                          @endif
                        </form>
                        </li>
                             

                      </ul>
                      <br />
                    </div>
        @if($user->admin == 0)
              <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Assigned Houses</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                  <form class="form-horizontal" role="form" method="POST" action="/userassign/{{ $user->id }}">
                        {{ csrf_field() }}
                   <select name="user"  class="select2basic" style="width: 200px; margin-bottom: 10px; margin-right: 5px;">
                          @foreach ($users as $body)
                          @if($user->id !== $body->id)
                              @if($body->admin == 0)<option value="{{$body->id}}">{{$body->first_name}} {{$body->last_name}} </option>@endif
                              @endif
                         @endforeach
                  </select>
                  <button type="submit" class="btn btn-primary btn-xs"> Assign </button>
                  
                      
                    <div class="table-responsive">

                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              
                            </th>
                            <th class="column-title">Name </th>
                            <th class="column-title">Address </th>
                            <th class="column-title">Area </th>
                            <th class="column-title">Phone </th>
                            <th class="column-title ">Status
                            </th>
                            <th class="column-title ">Edit
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach($houses as $body)
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records[]" value="{{ $body->id }}">
                            </td>
                            <td class=" ">{{ $body->firstname  }} {{ $body->lastname  }}</td>
                            <td class=" ">{{ $body->address  }}</td>
                            <td class=" "><a href="housesbycategory/{{$body->area->id}}/view">{{ $body->area->name }}</a></td>
                            <td class=" ">{{ $body->phone  }} @if($body->phone1)<br>{{ $body->phone1 }} @endif</td>
                            <td class="">
                            @if($body->assign == $user->id) 
                            <button type="button" class="btn btn-success btn-xs">Assigned</button>
                             @endif
                            @if($body->assign != $user->id) 
                            @foreach($users as $hey) 
                            @if($body->assign == $hey->id) 
                            <button type="button" class="btn btn-warning btn-xs">{{$hey->first_name}} {{$hey->last_name}}</button> @endif
                            @endforeach 
                            @endif
                            </td>
                            <td class=" last">
                            <a href="/house={{ $body->id }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <a href="/houseedit{{ $body->id }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="/house/{{ $body->id }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                            </td>
                          </tr>
                        @endforeach 
                        </tbody>
                      </table>
                      </form>    
                    </div>
              
            
                  </div>
                </div>
              </div>
               @endif      

          </div>
        </div>
         </div>
                </div>
              </div>
            </div>
          </div>
       
 <!-- footer content -->
        <footer>
          <div class="pull-right">
           Masroor &copy Copyright All Rights Reserved.
          </div>
          <div class="clearfix"></div>
        </footer>
 <!-- /footer content -->

    <script src="js/sweetalert.min.js"></script>
    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
    <!-- jQuery -->
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/build/js/bootstrap-rating-input.min.js"></script>
    <script>
     $(function() {
    $('#rating-custom-icons').change(function() {
        this.form.submit();
    });
    });
    </script>
    <!-- FastClick -->
    <script src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="/vendors/iCheck/icheck.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>
  </body>
</html>
