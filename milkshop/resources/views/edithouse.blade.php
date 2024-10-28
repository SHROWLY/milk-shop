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
                    <h2>Edit Selected House</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal" role="form" method="POST" action="/houseupdate{{$house->id}}" enctype="multipart/form-data" onSubmit="return validate();">
                        {{ csrf_field() }}
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Status
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <span class="button-checkbox">
                            <button type="button" class="btn" data-color="info">Active</button>
                            <input type="checkbox" class="hidden" name="status" value="1" @if($house->status == 1) checked @endif />
                        </span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="area">Area
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="area"  class="select2basic" style="width: 100%;">
                          @foreach ($areas as $area)
                              <option value="{{$area->id}}" @if($house->area_id == $area->id) selected @endif>{{$area->name}} </option>
                         @endforeach
                          </select>
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="area">Assign to User
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="user"  class="select2basic" style="width: 100%;">
                            @foreach ($users as $user)
                              @if($user->admin == 0)
                              <option value="{{$user->id}}" @if($house->assign == $user->id) selected @endif>{{$user->first_name}} {{$user->last_name}}</option>
                              @endif
                           @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo">Image Upload 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <span id="file_error"></span>
                          <input type="file" name="photo" id="file" class="form-control col-md-7 col-xs-12 demoInputBox" accept="image/*">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                      </div>
                      <div class="item form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="firstname" name="firstname" required="required" class="form-control col-md-7 col-xs-12" placeholder="First Name" value="{{ $house->firstname }}">
                        </div>
                      </div>
                      <div class="item form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="lastname" name="lastname" required="required" class="form-control col-md-7 col-xs-12" placeholder="Last Name"  value="{{ $house->lastname }}">
                        </div>
                      </div>


                      <div class="item form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Price per Litre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="price" name="price" required="required" class="form-control col-md-7 col-xs-12" placeholder="Price per Liter"  value="{{ $house->price }}">
                      </div>
                      </div>

                      <div class="item form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="address" name="address" required="required" class="form-control col-md-7 col-xs-12" placeholder="House Address"  value="{{ $house->address }}">
                        </div>
                      </div>
                      <div class="item form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Contact Number: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="phone" name="phone" required="required" placeholder="Phone Number" class="form-control col-md-7 col-xs-12"  value="{{ $house->phone }}">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="additionalphone">Additional Phone 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="phone1" type="text" name="phone1" class="optional form-control col-md-7 col-xs-12" placeholder="Additional Phone Number"  value="{{ $house->phone1 }}">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idcard">ID Card Number 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="idcard" type="text" name="idcard" class="optional form-control col-md-7 col-xs-12" placeholder="ID Card Number">
                        </div  value="{{ $house->idcard }}">
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="/houses" class="btn btn-primary" >Back</a>
                          <button type="submit" class="btn btn-success">Submit</button></button>
                        </div>
                      </div>
                    </form>
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
    $('#username').keyup(function(e){
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