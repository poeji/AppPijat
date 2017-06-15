
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- saved from url=(0081)http://jaspreetchahal.org/examples/jquery-onpage-text-highlighter-and-filter.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=GBK">
  <title>jQuery on page word highlighter and filter</title>
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="jcfilter.min.js"></script>
  
   
</head>

    <body>
      <div class="container">
         <h3>Filter by keyword <input type="text" id="filter" style="background:url(img/filter.png) 95% 60% no-repeat;background-size:16px; width:150px"></h3>          

      <div class="jcorgFilterTextParent" style="display: block;">
          <h3>This is header 1</h3>
          <div class="jcorgFilterTextChild">
              Hac magnis? Ac dignissim <span style="background:yellow;color:#000000">nec</span>! Phasellus aliquet magnis nisi, cursus. Habitasse mauris velit. Lacus! Augue scelerisque odio dolor, ultricies cursus? Magna! Integer nunc odio, integer lacus, <span style="background:yellow;color:#000000">nec</span> turpis<a href="http://www.jqueryscript.net/"><strong>http://www.jqueryscript.net</strong></a>
          </div>
      </div>
      <div class="jcorgFilterTextParent" style="display: none;">
          <h3>This is header 2</h3>
          <div class="jcorgFilterTextChild">
              blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah  <a href="http://www.jqueryscript.net/"><strong>http://www.jqueryscript.net</strong></a>
          </div>
      </div>
      <div class="jcorgFilterTextParent" style="display: none;">
          <h3>This is header 3</h3>
          <div class="jcorgFilterTextChild">
              what the what the what the what the what the what the what the what the what the what the what the what the what the what the what the what the what the what the what the what the what the what the what the what the  <a href="http://www.jqueryscript.net/"><strong>http://www.jqueryscript.net</strong></a>
          </div>
      </div>
      <div class="jcorgFilterTextParent" style="display: none;">
          <h3>This is header 4</h3>
          <div class="jcorgFilterTextChild">
              are you serious? are you serious? are you serious? are you serious? are you serious? are you serious? are you serious? are you serious? are you serious? are you serious? are you serious? are you serious? are you serious? are you serious? are you serious? are you serious? are you serious? are you serious? are you serious? are you serious? are you serious? <a href="http://www.jqueryscript.net/"><strong>http://www.jqueryscript.net</strong></a>
          </div>
      </div>


       
       <script type="text/javascript">
       jQuery(document).ready(function(){
          jQuery("#filter").jcOnPageFilter({animateHideNShow: true,
                    focusOnLoad:true,
                    highlightColor:'yellow',
                    textColorForHighlights:'#000000',
                    caseSensitive:false,
                    hideNegatives:true,
                    parentLookupClass:'jcorgFilterTextParent',
                    childBlockClass:'jcorgFilterTextChild'});
       });          
       </script>
     </div>
    


</body></html>