<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Typeahead</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://twitter.github.io/typeahead.js/css/examples.css">
</style>
</head>
<body id="body" style="margin:0;" >
    <div class="back" style="display: block;width: 100%; height:100vh;">
    <div id="custom-templates">
        <input name="q" class="typeahead" placeholder="Search">
    </div>
    </div>
<script type="text/javascript">
$(document).ready(function() {
    $('input:text').focus(
    function(){
        $('.back').css({'background-color' : 'grey',});
    });
    $('input:text').blur(
    function(){
        $('.back').css({'background-color' : 'white'});
    });
});
var states = [{name: "Rizwan Ghafoor", link: "'http://abc.com'",address:"587 A Block Shah Rukne Alam Colony"}, 
             {name: "Usman Rizwan", link: "'http://nbc.com'",address:"Wapda Town Phase 1 Block D"},];

        jQuery(document).ready(function($) {
            // Set the Options for "Bloodhound" suggestion engine
            var engine = new Bloodhound({
                local:states,
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('address'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $(".typeahead").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                displayKey: 'address',
                source: engine.ttAdapter(),

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'usersList',

                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item" style="padding-left:20px;">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        return '<div style="position:relative;padding: 8px;cursor:pointer;" onclick="location.href='+data.link+';"><img src="img.jpg" style="position: absolute;top: 8px;left: 8px;width: 54px;height: 54px;border: 2px solid #ccd6dd;border-radius: 5px;"><div style="padding-left:70px; min-height: 60px;"><div style="font-weight: 700;">'+ data.name+'</div><div>'+ data.address+'</div></div></div>';
              }
                }
            });
        });
        </script>
</body>
</html>                                		