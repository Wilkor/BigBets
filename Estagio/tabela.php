
<!DOCTYPE html>
<html>
<head>

<style type="text/css" media="all">
#filme {
  position:relative;
  z-index:2;
  margin:20px 0 20px 50px;
  }
.interruptor { 
  position:relative; 
  z-index:2;
  display:block; 
  width:120px;
  margin-top: 25px;
  }
#mascara {
  position:fixed;
  top:0;
  right:0;
  bottom:0;
  left:0;
  height:100%;
  width:100%;
  margin:0;
  padding:0;
  background:#000;
  opacity:.75;
  filter: alpha(opacity=75);
  -moz-opacity: 0.75;
  z-index: 1;
  }     
a.interruptor {
  font-size:14px;
  color:#fff;
  background:#98bbbd;
  text-align:center;
  } 
a.apaga-acende {
  background:#ccc;
  color:#333;
  }
</style>



<script type="text/javascript">
$(document).ready(function(){
  $('#mascara').css('height', $(document).height()).hide();
    $('.interruptor').click(function(e) {
      e.preventDefault();
      $('#mascara').toggle();
        if ($('#mascara').is(':hidden')) {
          $(this).html('Apagar luzes').removeClass('apaga-acende');
        } else {
          $(this).html('Acender luzes').addClass('apaga-acende');
        }
    });
        
});
</script>


</head>
<body>

</body>
</html>
<a class="interruptor" href="#">Apagar luzes</a>

<div id="filme">    
<object width="425" height="344">
<param name="movie" value="http://www.youtube.com/v/gsSmtvzegAQ&hl=pt-br&fs=1&"></param>
<param name="allowFullScreen" value="true"></param>
<param name="allowscriptaccess" value="always">
</param>
<embed src="http://www.youtube.com/v/gsSmtvzegAQ&hl=pt-br&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="425" height="344"></embed>
</object>
</div>  
...
<div id="mascara"></div>
</body>
</html>