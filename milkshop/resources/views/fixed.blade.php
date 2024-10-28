<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,target-densitydpi=device-dpi, user-scalable=no" />
    <link rel="shortcut icon" href="/sitesmall.png" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="/build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/sweetalert.css">
<script type="text/javascript">
<!--

function updateClock ( )
{
  var currentTime = new Date ( );

  var currentHours = currentTime.getHours ( );
  var currentMinutes = currentTime.getMinutes ( );
  var currentSeconds = currentTime.getSeconds ( );

  // Pad the minutes and seconds with leading zeros, if required
  currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

  // Choose either "AM" or "PM" as appropriate
  var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

  // Convert the hours component to 12-hour format if needed
  currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

  // Convert an hours component of "0" to "12"
  currentHours = ( currentHours == 0 ) ? 12 : currentHours;

  // Compose the string for display
  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

  // Update the time display
  document.getElementById("clock").firstChild.nodeValue = currentTimeString;
}

// -->
</script>

<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  font-weight: 100;
  font-size: 12px;
  line-height: 30px;
  color: #777;
  background: #2A3F54;
}

.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}
</style>
    <style type="text/css">
    /* centered columns styles */
      .row-centered {
          text-align:center;
      }
      .col-centered {
          display:inline-block;
          float:none;
          /* reset the text-align */
          text-align:left;
          /* inline-block space fix */
          margin-right:-4px;
      }
      .col-fixed {
            /* custom width */
            width:320px;
        }
        .col-min {
            /* custom min width */
            min-width:320px;
        }
        .col-max {
            /* custom max width */
            max-width:320px;
        }
      .profile_view .col-sm-12:hover{
        background-color: #F2F5F7;
      }
      .profile_view{
        padding: 0 0 0 !important;
      }
        div.nav.toggle{
    padding-top: 5px;
    padding-bottom: 5px;
        padding-left: 20px;
  }
    div.nav.toggle img{
      width:140px;
    }
  a.user-profile.dropdown-toggle{
        padding-top: 31px;
    padding-bottom: 32px;
        padding-right: 40px;}
ul.nav.navbar-nav.navbar-right{
      height: 70px;
}
@media screen and (max-width: 500px) {
div.nav.toggle{
    padding-top: 5px;
    padding-bottom: 5px;
        padding-left: 20px;
  }
  a.user-profile.dropdown-toggle{
        padding-top: 18px;
    padding-bottom: 20px;
        padding-right: 40px;}
  div.nav.toggle img{
    width: 100px;
    }
ul.dropdown-menu.dropdown-usermenu.pull-right{
      width: 170px;
}
}
@media screen and (max-width: 300px) {
div.right.col-xs-5.text-center{
  width: 130px;
}
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body onload="updateClock(); setInterval('updateClock()', 1000 )">
<div class="container"> 
    <div class="container body">
      <div class="main_container">
        <div class="top_nav" style="margin:0;">
          <div class="nav_menu" style="width: 100%;">
            <nav>
              <div class="nav toggle">
               <a href=""><img src="/site_logo.png"></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="padding-right: 35px;">
                    <img src="/{{ $user->avatar }}" alt="">{{ $user->username }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"">
                          <i class="fa fa-sign-out pull-right"></i> Log Out
                  </a>
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
         <div class="col-xs-12 text-center" style="text-align: center;">
              <div class="dy-date" style="padding-top: 10px; padding-bottom: 10px;">
              <h2 style="font-size: 22px; color: black; display: inline;">{{date("d/m/Y")}} , </h2>
              <h2 id="clock" style="font-size: 22px; color: black; display: inline;">&nbsp;</h2>
                  </div>
                          
         </div>
        <!-- page content -->
        <div class="right_col" role="main" style="margin: 0;">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                  <div class="x_content">
                       @foreach($houses as $body)
                       <div class="row row-centered">
                      <div class="col-xs-12 profile_details col-centered">
                        <div class="well profile_view">
                          <div class="col-sm-12" onclick="location.href='addquantity={{ $body->id  }}';" style="cursor:pointer;">
                          <div class="right col-xs-5 text-center">
                              <img src="/{{ $body->photo  }}" alt="" class="img-responsive">
                            </div>
                            <div class="left col-xs-7" style="margin-top: 5px;">
                              <h5 style="margin-bottom: 5px; margin-top: 5px;">{{ $body->address  }}</h5>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-user"></i> {{ $body->firstname  }} {{ $body->lastname  }}</li>
                                <li><i class="fa fa-phone"></i> {{ $body->phone  }} @if($body->phone1)<br><i class="fa fa-phone"></i> {{ $body->phone1 }} @endif 
                                </li>
                              </ul>
                            </div>
                            
                            
                          </div>
                        </div>
                      </div>
                       </div>
                     @endforeach 
                     <div class="row">
                    <div class="col-xs-12 text-center">
              <h2 style="margin: 5px; color: black; ">For Complaints Contact:</h2>
              <i class="fa fa-phone fa-2x" aria-hidden="true"></i>
            <a href="tel:03214567788" style="font-size: 22px; color: black;">Call 0321-456-7788 </a>
                    </div>
                  </div>
                </div>
              </div>
        <!-- /page content -->
                </div>
             </div>
          </div>
        <!-- /footer content -->
      </div>
    </div> 
</div>

</body>
<script src="/js/sweetalert.min.js"></script>
    <!-- Include this after the sweet alert js file -->
@include('sweet::alert')
    <!-- jQuery -->
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>
</html>







