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

    <!-- Custom Theme Style -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
                    <h2>User Report <small>Activity report</small></h2>
                    <div class="clearfix"></div>
                  </div>
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
                        
                        <li>
                          <i class="fa fa-phone user-profile-icon"></i> {{$user->phone}} / {{$user->phone1}}
                        </li>

                        <li>
                          <i class="fa fa-user user-profile-icon"></i> {{$user->username}}
                        </li>

                      </ul>
                      <br />
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="x_panel">
                  <div class="x_title">
                  @if (session()->has('flash_notification.message'))
                        <div class="alert alert-{{ session('flash_notification.level') }}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                            {!! session('flash_notification.message') !!}
                        </div>
              @endif
              @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h2>Form Design <small>different form elements</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" enctype="multipart/form-data" action="/useredit/{{$user->id}}" method="POST" onSubmit="return validate();">
                    {{ csrf_field() }}
                    
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess3" placeholder="First Name" value="{{ $user->first_name }}" name="first_name">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" id="inputSuccess2" placeholder="Last Name" value="{{ $user->last_name }}" name="last_name">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>

                

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Change Email Address" name="email">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" id="inputSuccess5" placeholder="Change Username" name="username">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                       
                      </div>

              

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess5" placeholder="Phone" value="{{ $user->phone }}" name="phone">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess2" placeholder="Additional Phone" value="{{$user->phone1}}" name="phone1">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Admin Permissions</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <span class="button-checkbox">
                            <button type="button" class="btn" data-color="info">Admin</button>
                            <input type="checkbox" class="hidden" name="admincheck" value="1" @if($user->admin == 1) checked @endif/>
                        </span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Area:</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name="area"  class="select2basic" style="width: 100%;">
                          @foreach ($areas as $area)
                              <option value="{{$area->id}}"@if ($user->area_id == $area->id) selected @endif>{{$area->name}} </option>
                         @endforeach
                          </select>
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Change Photo </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <span id="file_error"></span>
                         <input type="file" id="file" name="avatar" class="form-control col-md-7 col-xs-12 demoInputBox" accept="image/*">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                      </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Address </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="address" placeholder="Address" value="{{ $user->address }}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Card </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="idcard" placeholder="ID Card Number" value="{{ $user->idcard }}">
                        </div>
                      </div>
                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> 
                        Change Password
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input id="password" type="password" class="form-control" name="password" placeholder="Change Password">
                          @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> 
                        Confirm Password
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <a href="/users" class="btn btn-primary" >Back</a>
                          <button type="submit" class="btn btn-success" >Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>  
                    </div>
                     <!-- /End Form content --> 
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
  <script src="/js/jquery-2.2.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
  function validate() {
  $("#file_error").html("");
  $(".demoInputBox").css("border-color","#F0F0F0");
  var file_size = $('#file')[0].files[0].size;
  if(file_size>2097152) {
    $("#file_error").html("File size is greater than 2MB!");
    $(".demoInputBox").css("border-color","#FF0000");
    return false;
  } 
  return true;
}
</script>
 <script>
 $(document).ready(function() {
  $(".select2basic").select2();
});
     </script>
    <script type="text/javascript">
       jQuery(function($){
    $('#inputSuccess5').keyup(function(e){
        if (e.which === 32) {
            var str = $(this).val();
            str = str.replace(/\s/g,'');
            $(this).val(str);            
        }
    }).blur(function() {
        var str = $(this).val();
        str = str.replace(/\s/g,'');
        $(this).val(str);            
    });
});
   </script>
   <script type="text/javascript">
     $(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});
   </script>
    <script src="/js/sweetalert.min.js"></script>
    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>
  </body>
</html>
