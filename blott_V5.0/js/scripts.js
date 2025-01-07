
$(function() {

    setTimeout(function(){
        $("#depreload .wrapper").animate({ opacity: 1 });
    }, 400);

    setTimeout(function(){
        $("#depreload .logo").animate({ opacity: 1 });
    }, 800);

    var canvas  = $("#depreload .line")[0],
        context = canvas.getContext("2d");

    context.beginPath();
    context.arc(280, 280, 260, Math.PI * 1.5, Math.PI * 1.6);
    context.strokeStyle = '#fff';
    context.lineWidth = 40;
    context.stroke();

    var loader = $("body").DEPreLoad({

        OnStep: function(percent) {
            $("#depreload .line").animate({ opacity: 1 });

            if(percent>=100)percent=100;
            $("#depreload .perc").text(percent + "%");

            if (percent > 5) {
                context.clearRect(0, 0, canvas.width, canvas.height);
                context.beginPath();
                context.arc(280, 280, 260, Math.PI * 1.5, Math.PI * (1.5 + percent / 50), false);
                context.stroke();
            }
        },

        OnComplete: function() {

            setInterval("smoke('smoke1','smoke2')", 50);

            $("#depreload .perc").text("done");
            $('#depreload .loading').fadeOut('100', function(){ });
            setTimeout("$('#content').fadeIn('2000', function(){ })", 2200);
            setTimeout("$('.circle-locator').fadeIn('2000', function(){ })", 2200);
            setTimeout("$('#depreload').fadeOut('slow', function(){ })", 2000);


        }
    });


    $('.content-section-header').click(function(){

        var t= $(this).attr('toggle-id');

        if ($('#' + t).is(":visible")) {
            $('.content-section-blurb').hide('250');
        } else {

            $('.content-section-blurb').hide('250', function(){
                setTimeout(function () {
                    $('#' + t).show('slow');
                    $('#' + t).animate({ scrollTop: 0 }, "fast");
                }, 50);
            });
        }
    });
});



var here = 0;
var here2 = 0;
function smoke(element1, element2){
    here += 1;
    here2 += 2;
    if(here==1900) here = 0;
    if(here2==1500) here2 = 0;
    $('#'+ element1).fadeIn(5000);
    $('#'+ element2).fadeIn(5000);
    $('#'+ element1).css("background-position", here+"px 50%");
    $('#'+ element2).css("background-position", here2+"px 50%");
}

function toggleSearch(){
    $('#blog-search').toggle();
}








