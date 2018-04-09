$(document).ready(function(){
    //showOnlySection($("#news"));

    $(".banner").click(function(){
        if($(this).css('height') == '200px'){
            $(this).animate({
                height: '800px'
            });
        }else{
            $(this).animate({
                height: '200px'
            });
        }
        
    })

    function showOnlySection(section){
        section.siblings().children("div").animate({
            height: 'hide'
        });
        section.children("div").animate({
            height: 'show'
        });
    }

    $("section .title").click(function(){
        //showOnlySection($(this).parent());
    });

    $(".header > a").click(function(){
        var s = $(this).attr("href");
        //showOnlySection($(s));
    });
});