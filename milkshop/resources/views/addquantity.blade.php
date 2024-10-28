<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,target-densitydpi=device-dpi, user-scalable=no" />
    <link rel="shortcut icon" href="/sitesmall.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="/css/set1.css" />
    <script src="https://use.fontawesome.com/d11fd9e6eb.js"></script>
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

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 10px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  border-radius: 20px;
  text-align: -webkit-center;
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-weight: 400;
}


::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}
.pointer {
    cursor:touch;
}

.row{
 padding:20px;   
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body onload="updateClock(); setInterval('updateClock()', 1000 )">
<div class="container">  
<div id="contact">
<a href="{{ url('/') }}" class="btn btn-default btn-lg" style="float: left;"><i class="fa fa-arrow-left"></i> Back</a>
 <form class="form-horizontal" role="form" method="POST" action="/addquantity={{$house->id}}">
                        {{ csrf_field() }}
               
        <section class="content" style="padding-top: 3em;">
      <div class="dy-date" style="padding-top: 20px;">
      <h2 style="font-size: 22px; color: black; display: inline; opacity: 1;">{{date("d/m/Y")}} , </h2>
              <h2 id="clock" style="font-size: 22px; color: black; display: inline; opacity: 1;">&nbsp;</h2>
      <h4>{{$house->address}}</h4>
      </div>
       @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul style="list-style-type: none; ">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        <span class="input">
          <input name="quantity" required="required" type="number" class="input__field input__field--ichiro" type="text" id="input-25" />
          <label class="input__label input__label--ichiro" for="input-25">
            <span class="input__label-content input__label-content--ichiro">Add Quantity</span>
          </label>
        </span>
      </section>
      <button type="submit" class="btn btn-primary btn-lg" style="width: calc(100% - 2em);"><i class="fa fa-plus"></i> Add</button>

</form>
<hr>
      <a href="/billdetails/{{$house->id}}" class="btn btn-info btn-lg">Details</a>
      <a href="/survey/{{$house->id}}" class="btn btn-success btn-lg">Survey</a>

</div>
</div>

</body>
<script src="/js/sweetalert.min.js"></script>
    <!-- Include this after the sweet alert js file -->
@include('sweet::alert')
</html>







