$("li img").hover(function(){
    $("#main-img").attr("src",$(this).attr("src"));
    
});


$('.carousel').carousel({
    
    interval: 2000 
});

/*https://getbootstrap.com/docs/4.0/components/carousel/*/

/*$(document).ready(function(){
    $(".lead").mouseover(function(){
        $(this).effect('slide')
        
    });
        
});*/

$(document).ready(function(){
    $(".box").mouseenter(function(){
        $(this).animate({backgroundColor:"purple"},5000);
    });
});



$(document).ready(function(){
    $(".created").hover(function(){
        $(this).effect("slide", {time:1},3000);
    });
});

$(document).ready(function(){
    $(".enhance").click(function(){
        $(this).effect("scale", {percent:150}, 1000).animate({left:40},1000);
    });
});