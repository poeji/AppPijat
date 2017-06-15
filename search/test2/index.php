<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<style>
.highlighted {
    background-color:yellow;
}
.emptyBlock1000 {
    height:1000px;
}
.emptyBlock2000 {
    height:2000px;
}
</style>
</head>
<body>
    <script type="text/javascript">
$(document).ready(function() {  
    $('#searchbutton').click(function(){
        if(!searchAndHighlight($('#search-term').val())) {
            alert("No results found");
        }
    });    
});
function searchAndHighlight(searchTerm, selector) {
    if(searchTerm) {        
        var selector = selector || "body";                             //use body as selector if none provided
        var searchTermRegEx = new RegExp(searchTerm,"ig");
        var matches = $(selector).text().match(searchTermRegEx);
        if(matches) {
            $('.highlighted').removeClass('highlighted');     //Remove old search highlights
                $(selector).html($(selector).html()
                    .replace(searchTermRegEx, "<span class='highlighted'>"+searchTerm+"</span>"));
            if($('.highlighted:first').length) {             //if match found, scroll to where the first one appears
                $(window).scrollTop($('.highlighted:first').position().top);
            }
            return true;
        }
    }
    return false;
}
</script>
    <input type="text" id="search-term" />
    <input type="submit" id="searchbutton" value="search" />
    <div id="bodyContainer">
        <p>Welcome to Just4help.inf Blog</p>
        <p>Empty Space to test Scrolling functionality</p>
        <p>Welcome to my search and highlight script</p>
        <p>By Tom Alexander</p>
        <p>Searching for terms can be done by using the browser's control (or cmd)</p>
        <p>The problem is that not many people know about it and therefore its usefulness
            goes out the window</p>
        <p>Using this script, we can mimic that functionality by using a search box
            and button</p>
     
        <p>More text
        <p class="emptyBlock2000">Empty Space to test Scrolling functionality</p>
    </div>
</body>
</html>