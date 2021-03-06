<?php

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1, shrink-to-fit=yes, user-scalable=yes">
    <title>Delete</title>
    <link rel="shortcut icon" href="icon.png"/>
    <link rel="stylesheet"  type="text/css" href="index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
  <div style="background-color: #001a72;" id="linetext"><p style="text-align:center; color: White;">Refresh to see login page</p></div>
    <div class="landing">
        <script>
            var canvasDots = function() {
                  var canvas = document.querySelector('canvas'),
                      ctx = canvas.getContext('2d'),
                      colorDot = '#CECECE',
                      color = '#CECECE';
                  canvas.width = window.innerWidth;
                  canvas.height = window.innerHeight;
                  canvas.style.display = 'block';
                  ctx.fillStyle = colorDot;
                  ctx.lineWidth = .1;
                  ctx.strokeStyle = color;
                  var mousePosition = {
                      x: 30 * canvas.width / 100,
                      y: 30 * canvas.height / 100
                  };

                  var dots = {
                      nb: 600,
                      distance: 60,
                      d_radius: 100,
                      array: []
                  };

                  function Dot(){
                      this.x = Math.random() * canvas.width;
                      this.y = Math.random() * canvas.height;

                      this.vx = -.5 + Math.random();
                      this.vy = -.5 + Math.random();

                      this.radius = Math.random();
                  }

                  Dot.prototype = {
                      create: function(){
                          ctx.beginPath();
                          ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
                          ctx.fill();
                      },

                      animate: function(){
                          for(i = 0; i < dots.nb; i++){

                              var dot = dots.array[i];

                              if(dot.y < 0 || dot.y > canvas.height){
                                  dot.vx = dot.vx;
                                  dot.vy = - dot.vy;
                              }
                              else if(dot.x < 0 || dot.x > canvas.width){
                                  dot.vx = - dot.vx;
                                  dot.vy = dot.vy;
                              }
                              dot.x += dot.vx;
                              dot.y += dot.vy;
                          }
                      },

                      line: function(){
                          for(i = 0; i < dots.nb; i++){
                              for(j = 0; j < dots.nb; j++){
                                  i_dot = dots.array[i];
                                  j_dot = dots.array[j];

                                  if((i_dot.x - j_dot.x) < dots.distance && (i_dot.y - j_dot.y) < dots.distance && (i_dot.x - j_dot.x) > - dots.distance && (i_dot.y - j_dot.y) > - dots.distance){
                                      if((i_dot.x - mousePosition.x) < dots.d_radius && (i_dot.y - mousePosition.y) < dots.d_radius && (i_dot.x - mousePosition.x) > - dots.d_radius && (i_dot.y - mousePosition.y) > - dots.d_radius){
                                          ctx.beginPath();
                                          ctx.moveTo(i_dot.x, i_dot.y);
                                          ctx.lineTo(j_dot.x, j_dot.y);
                                          ctx.stroke();
                                          ctx.closePath();
                                      }
                                  }
                              }
                          }
                      }
                  };

                  function createDots(){
                      ctx.clearRect(0, 0, canvas.width, canvas.height);
                      for(i = 0; i < dots.nb; i++){
                          dots.array.push(new Dot());
                          dot = dots.array[i];

                          dot.create();
                      }


                      dot.line();
                      dot.animate();
                  }

                  window.onmousemove = function(parameter) {
                      mousePosition.x = parameter.pageX;
                      mousePosition.y = parameter.pageY;
                  }

                  mousePosition.x = window.innerWidth / 2;
                  mousePosition.y = window.innerHeight / 2;

                  setInterval(createDots, 1000/30);
              };
              window.onload = function() {
                  canvasDots();
              };
            $(document).ready(function(){
              $("#Loginfail").hide();
              $("#linetext").hide();
              $("#lines").click(function(){
                $(".landing-login").hide();
                $("#linetext").show();
              })
            })
        </script>
        <canvas class='connecting-dots'></canvas>
        <div class="landing-login">
            <p class="btext">Delete</p>
            <div class="landing-login-form">
                <form class="landing-login-form" action="delete.php" method="post">
                  <input class="login-input SmallText" type="text" name="username" placeholder="Username" value="" required><br><br>
                  <button class="login-button" type="submit" name="submit">Delete</button>
                </form>
                <br>
            </div>
            <br><br>
            <p id="lines" style="color: White;">Click to play with the lines</p>
        </div>
    </div>
</body>
</html>
