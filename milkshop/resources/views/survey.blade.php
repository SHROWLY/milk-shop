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
<script src="https://use.fontawesome.com/d11fd9e6eb.js"></script>
<link href="http://abpetkov.github.io/switchery/dist/switchery.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/sweetalert.css">
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
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 10px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  border-radius: 20px;
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
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="url"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4CAF50;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43A047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
  text-align: center;
}

#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
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
.emojis{
    padding:20px;
}
#sad{
    float: right;
    font-size: 80px;
}
#happy{
    font-size: 80px;
}
#happy:hover{
    color: green;
}
#sad:hover{
    color: red; 
}

#addForm{
    display: none;
}
#sadForm{
  display:none;
}
.pointer {
    cursor:touch;
}

.row{
 padding:20px;   
}
.not{
    color: black;
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">  
<div id="contact">
<a href="/addquantity={{$id}}" class="btn btn-default btn-lg"><i class="fa fa-arrow-left"></i> Back</a>
    <h3>How was our Service?</h3>

    <div class="emojis">
    <a class="happy-link" type="checkbox"><i class="fa fa-smile-o fa-5x" id="happy" aria-hidden="true"></i>
</a>
<a><i class="fa fa-frown-o fa-5x" id="sad" aria-hidden="true"></i>
</a>
</div>
 <form class="form-horizontal" role="form" method="POST" action="/survey/{{$id}}">
                        {{ csrf_field() }}
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul style="list-style-type: none;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
<div id="addForm">
        <label>Please select things you are satisfied with:</label>
    <div class="col-md-12">

      <label class="pointer">
        <input type="checkbox" value="Good" name="quality" class="js-switch">  Quality</label>
      <br>
      <label class="pointer">
        <input type="checkbox" value="Good" name="quantity" class="js-switch">  Quantity</label>
        <br>
        <label class="pointer">
        <input type="checkbox" value="Good" name="service" class="js-switch">  Service</label>
      <br>
      <label class="pointer">
        <input type="checkbox" value="Good" name="availibility" class="js-switch">  Availibility</label>
      <br>
      <label class="pointer">
        <input type="checkbox" value="Good" name="behaviour" class="js-switch">  Milkman Behaviour</label>
    </div>

  <hr>


    <fieldset>
    <label>Suggest Improvements:</label>
      <textarea placeholder="Please Suggest some Improvements..." name="suggestion" tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
</div>
</form>
<form class="form-horizontal" role="form" method="POST" action="/survey/{{$id}}/poor">
                        {{ csrf_field() }}
    <div id="sadForm">
        <div class="alert alert-danger">
  <strong>We are really Sorry!</strong>
</div>
<!-- these would go in <head>  -->
    <p class="not">Please select things you are <b>NOT</b> satisfied with:</p>
    <div class="col-md-12">

      <label class="pointer">
        <input type="checkbox" value="Poor" name="quality" class="js-switch">  Quality</label>
      <br>
      <label class="pointer">
        <input type="checkbox" value="Poor" name="quantity" class="js-switch">  Quantity</label>
      <br>
        <label class="pointer">
        <input type="checkbox" value="Poor" name="service" class="js-switch">  Service</label>
      <br>
      <label class="pointer">
        <input type="checkbox" value="Poor" name="availibility" class="js-switch">  Availibility</label>
      <br>
      <label class="pointer">
        <input type="checkbox" value="Poor" name="behaviour" class="js-switch">  Milkman Behaviour</label>
    </div>

  <hr>


    <fieldset>
    <label>Message:</label>
      <textarea placeholder="Please Share your Problem..." tabindex="5" name="description" required ></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
    </div>
  </form>
</div>
</div>

</body>
<script src="/js/sweetalert.min.js"></script>
    <!-- Include this after the sweet alert js file -->
@include('sweet::alert')
<script type="text/javascript" src="http://abpetkov.github.io/switchery/dist/switchery.min.js"></script>
<script>
    $(function() {

  $("#happy").on("click", function() {

        $("#sadForm").hide("slow");
    $("#addForm").toggle("slow");

  });

});
</script>
<script>
    $(function() {

  $("#sad").on("click", function() {
     $("#addForm").hide("slow");
    $("#sadForm").toggle("slow");

  });

});
</script>
<script>
    $(document).ready(function () {

var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});

});
</script>
</html>







