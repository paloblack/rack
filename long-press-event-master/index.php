<!doctype>
<html>
    <head>
      <link rel="icon" type="image/png" href="st/og-image.png">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="st/theme.css">

      <meta charset="utf-8"/>
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
      <meta property="og:image" content="/st/og-image.png"/>
      <meta name="keywords" content="sortable, reorder, list, javascript, html5, drag and drop, dnd, animation, groups, dnd, sortableJS"/>
      <meta name="description" content="Sortable — is a JavaScript library for reorderable drag-and-drop lists on modern browsers and touch devices. No jQuery required. Supports Meteor, AngularJS, React, Polymer, Vue, Knockout and any CSS library, e.g. Bootstrap."/>
      <meta name="viewport" content="width=device-width, initial-scale=0.5"/>
      <style media="screen">
        .green div{
          border:solid 2px green;
          margin:10px;
        }
        .yellow div{
          border:solid 2px yellow;
          margin:10px;
        }
        .red div{
          border:solid 2px red;
          margin:10px;
        }
      </style>
        <title>long-press Test Page</title>
        <script src="./src/long-press-event.js"></script>
        <style>

            @keyframes jiggle {
                0% {
                    transform: rotate(-0.1deg);
                }
                50% {
                    transform: rotate(0.1deg);
                }
            }

            .dock-item[data-editing="true"] {
                animation: jiggle 0.2s infinite;
                box-shadow: 0 0 2px rgba(0,0,0,.85);
            }
        </style>
        <script>

            window.onload = function() {

                document.addEventListener('long-press', function(e) {

                    e.preventDefault();
                    var x = document.getElementById("shared-lists").querySelectorAll(".dock-item");

                      // Create a for loop and set the background color of all elements with class="example" in div
                      var i;
                      for (i = 0; i < x.length; i++) {
                        x[i].setAttribute('data-editing', 'true');
                      }
                      var
                      	example2Top = document.getElementById('example2-top'),
                      	example2Middle = document.getElementById('example2-middle');
                      	example2Bottom = document.getElementById('example2-bottom');



                      // Example 2 - Shared lists
                      new Sortable(example2Top, {
                      	group: 'shared', // set both lists to same group
                      	animation: 150,
                        ghostClass: 'blue-background-class'
                      });

                      new Sortable(example2Middle, {
                      	group: 'shared',
                      	animation: 150,
                        ghostClass: 'blue-background-class'
                      });
                      new Sortable(example2Bottom, {
                      	group: 'shared',
                      	animation: 150,
                        ghostClass: 'blue-background-class'
                      });


                });

                document.addEventListener('click', function(e) {
                    console.log(e.type);
                    var x = document.getElementById("shared-lists").querySelectorAll(".dock-item");

                      // Create a for loop and set the background color of all elements with class="example" in div
                      var i;
                      for (i = 0; i < x.length; i++) {
                        x[i].setAttribute('data-editing', 'false');
                      }
                      var
                      	example2Top = document.getElementById('z'),
                      	example2Middle = document.getElementById('x');
                      	example2Bottom = document.getElementById('y');



                      // Example 2 - Shared lists
                      new Sortable(example2Top, {
                      	group: 'shared', // set both lists to same group
                      	animation: 150
                      });

                      new Sortable(example2Middle, {
                      	group: 'shared',
                      	animation: 150
                      });
                      new Sortable(example2Bottom, {
                      	group: 'shared',
                      	animation: 150
                      });
                })
            }
            $('#shared-lists').sortable({
                axis: 'y',
                update: function (event, ui) {
                    var data = $(this).sortable('serialize');

                    // POST to server using $.post or $.ajax
                    $.ajax({
                        data: data,
                        type: 'POST',
                        url: '../php/editar_proyectos.php'
                    });
                }
            });
        </script>
    </head>
    <body>
      <div id="shared-lists" class="row">
  			<h4 class="col-12">Shared lists</h4>
  			<div id="example2-top" class="list-group col-12 green">
  				<div id="1" class="list-group-item dock-item">Item 1 - Green</div>
  				<div id="2" class="list-group-item dock-item">Item 2 - Green</div>
  				<div id="3" class="list-group-item dock-item">Item 3 - Green</div>
  				<div id="4" class="list-group-item dock-item">Item 4 - Green</div>
  				<div id="5" class="list-group-item dock-item">Item 5 - Green</div>
  				<div id="6"class="list-group-item dock-item">Item 6 - Green</div>
  			</div>

  			<div id="example2-middle" class="list-group col-12 yellow">
  				<div class="list-group-item dock-item">Item 1 - Yellow</div>
  				<div class="list-group-item dock-item">Item 2 - Yellow</div>
  				<div class="list-group-item dock-item">Item 3 - Yellow</div>
  				<div class="list-group-item dock-item">Item 4 - Yellow</div>
  				<div class="list-group-item dock-item">Item 5 - Yellow</div>
  				<div class="list-group-item dock-item">Item 6 - Yellow</div>
  			</div>

  			<div id="example2-bottom" class="list-group col-12 red">
  				<div class="list-group-item dock-item">Item 1 - Red</div>
  				<div class="list-group-item dock-item">Item 2 - Red</div>
  				<div class="list-group-item dock-item">Item 3 - Red</div>
  				<div class="list-group-item dock-item">Item 4 - Red</div>
  				<div class="list-group-item dock-item">Item 5 - Red</div>
  				<div class="list-group-item dock-item">Item 6 - Red</div>
  			</div>

  		</div>
  		<hr />



  	</div>



      <div id="shared-lists" class="row">
        <div id="example2-top" class="dock-item" data-long-press-delay="500">Press and hold me for .5s</div>
        <div id="example2-middle" class="dock-item">Press and hold me for 1.5s</div>
        <div id="example2-bottom" class="dock-item" data-long-press-delay="5000">Press and hold me for 5s</div>
      </div>
      <script src="./Sortable.js"></script>

      <script type="text/javascript" src="st/prettify/prettify.js"></script>
      <script type="text/javascript" src="st/prettify/run_prettify.js"></script>

    </body>
</html>
