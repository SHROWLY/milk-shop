<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,target-densitydpi=device-dpi, user-scalable=no" />

    <title>Masroor|The Best Milk in Town</title>
    <link rel="shortcut icon" href="/sitesmall.png" />

    <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="/build/css/custom.min.css" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
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
      width:100px;
    }
  a.user-profile.dropdown-toggle{
        padding-top: 18px;
    padding-bottom: 20px;
        padding-right: 40px;}
ul.nav.navbar-nav.navbar-right{
      height: 70px;
}
ul.dropdown-menu.dropdown-usermenu.pull-right{
      width: 160px;
}
@media screen and (max-width: 300px) {
div.right.col-xs-5.text-center{
  width: 130px;
}
}
.container{
    max-width: 400px;
    min-width: 280px;
    width: 100%;
    position: relative;
    height:100vh;
}
.main_container{
    text-align: -webkit-center;
    height:100vh;
    background-color: #F7F7F7;
}
</style>
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
  </head>

  <body class="nav-md" onload="updateClock(); setInterval('updateClock()', 1000 )">
    <div class="container body" style="">
      <div class="main_container" style="">
        <div class="top_nav col" style="margin:0;">
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

            <div class="row row-centered">
              <div class="col-md-12 col-centered">
                  <div class="x_content">
                       @foreach($houses as $body)
                       <div class="row row-centered">
                      <div class="col-xs-12 profile_details col-centered">
                        <div class="well profile_view" >
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
                    <div class="col-xs-12 text-center" style="margin-bottom: 20px;">
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
    <!-- jQuery -->
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>
  </body>
</html>
