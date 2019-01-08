/*
* Copyright by Alexander Afanasyev
* E-mail: blackbirdeagle@mail.ru
* Skype: al_sidorenko1
* */
var flag = 0;

$(document).mouseup(function (e){ 
    var div = $(".mobile_menu"); 
    if (!div.is(e.target) && div.has(e.target).length === 0) { 
        div.animate({left: -170}, 300);
    }
});	

$('.show_menu').click(function(){
    if(flag === 0){
        $('.mobile_menu').animate({left: 0}, 300);
        flag = 1;
    }else if(flag === 1){
        $('.mobile_menu').animate({left: -170}, 300);
        flag = 0;		
    }
});

function v_count(){
    var count = 0;
    $(".voprosy li a").each(function(){
        count++;	
    });

    return count + 1;
}

function e_v_count(){
    var count = 0;
    $(".exam_voprosy li a").each(function(){
        count++;	
    });

    return count + 1;
}

function reload(param){
    if(param === 1){
        var str = '<div class = "reload"><img src = "/images/reload.gif" alt = ""/></div>';
        $("body").prepend(str);
        var top_r = $(window).height() / 2 - 125 / 2;
        var left_r = $(window).width() / 2 - 125 / 2;

        $('.reload img').css('top', top_r).css('left', left_r);		
    }else if(param === 0){
        $(".reload").remove();
    }
}

/*Создаем разметку модального окна*/
function createPopup(data){
    var str = '<div class = "overlay"></div><div class = "popup pdd_popap">';
    str += '<a class="close2" href="#"><img src="/images/uploads/close.png"></a>';
    str += '<div class = "head_popup"></div>';
    str += '<div class = "content_popup">';
    str += data;
    str += '</div></div>';

    return str;
}

function createPopupMenu(data){
    var str = '<div class = "overlay"></div><div class = "popup menu_popap">';
    str += '<a class="close2" href="#"><img src="/images/uploads/close.png"></a>';
    str += '<div class = "head_popup"></div>';
    str += '<div class = "content_popup"><div class = "container"><div class = "row">';
    str += data;
    str += '</div></div></div></div>';

    return str;
}

$(".voprosy li a").click(function(){
    $(".voprosy li a").each(function(){
        $(this).removeClass("select");	
    });

    $(this).addClass("select");
});

$(".exam_voprosy li a").click(function(){
    $(".exam_voprosy li a").each(function(){
        $(this).removeClass("select");	
    });

    $(this).addClass("select");
});

function load_data(id){	
    $.get("/ajaxvopros", {ID: id}, function(data){
        data = JSON.parse(data);

        $(".queryLabel").html("Билет " + data.bilet + " Вопрос " + data.poradok);
        $(".name_vopros").empty();
        $(".name_vopros").html(data.name);

        $(".img_vopros").empty();
        $(".img_vopros").html('<img src = "/' + data.image + '"/>');	

        $(".otvet_vopros").empty();
        $(".otvet_vopros").html(data.otvet);				
    });

    $.get("/ajaxotvet", {ID: id}, function(data){
        data = JSON.parse(data);
        $(".variants").empty();
        for(var i in data){
            $(".variants").append('<li o_id = "' + data[i].id +'" v_id = "' + data[i].vopros + '" stat = "' + data[i].verno + '"><span>' + data[i].name + '</span></li>');
        }

        $(".variants li").bind("click", function(){
            var stat = parseInt($(this).attr("stat"));
            var id = parseInt($(".voprosy li a.select").attr("id")) + 1;
            var v_id = parseInt($(this).attr("v_id"));
            var o_id = parseInt($(this).attr("o_id"));
            reload(1);
            if(stat === 0){
                $(this).addClass("neverno");
                $(".voprosy li a.select").addClass("error");

                $.get("/ajaxsession", {"V_ID": v_id, "O_ID": o_id}, function(){});
                reload(0);
            }else if(stat === 1){
                $(this).addClass("verno");
                $(".voprosy li a.select").addClass("correct");
                reload(0);
            }

            if(id < v_count()){
                $("#" + id).click();
            }else{
                document.location.href = "/result";
            }
        });		
    });

    return false;
}

$(".variants li").click(function(){
    var stat = parseInt($(this).attr("stat"));
    var id = parseInt($(".voprosy li a.select").attr("id")) + 1;
    var v_id = parseInt($(this).attr("v_id"));
    var o_id = parseInt($(this).attr("o_id"));
    reload(1);
    if(stat === 0){
        $(this).addClass("neverno");
        $(".voprosy li a.select").addClass("error");

        $.get("/ajaxsession", {"V_ID": v_id, "O_ID": o_id}, function(){});	
        reload(0);	
    }else if(stat === 1){
        $(this).addClass("verno");
        $(".voprosy li a.select").addClass("correct");
        reload(0);
    }

    if(id < v_count()){
        $("#" + id).click();
    }else{
        document.location.href = "/result";
    }
});
/*-------------------EXAM-------------------------------------*/
function exam_load_data(id){
    $.get("/ajaxvopros", {ID: id}, function(data){
        data = JSON.parse(data);

        $(".queryLabel").html("Билет " + data.bilet + " Вопрос " + data.poradok);
        $(".name_vopros").empty();
        $(".name_vopros").html(data.name);

        $(".img_vopros").empty();
        $(".img_vopros").html('<img src = "/' + data.image + '"/>');	

        $(".otvet_vopros").empty();
        $(".otvet_vopros").html(data.otvet);				
    });

    $.get("/ajaxotvet", {ID: id}, function(data){
        data = JSON.parse(data);
        $(".exam_variants").empty();
        for(var i in data){
            $(".exam_variants").append('<li o_id = "' + data[i].id +'" v_id = "' + data[i].vopros + '" stat = "' + data[i].verno + '"><span>' + data[i].name + '</span></li>');
        }

        $(".exam_variants li").bind("click", function(){
            var stat = parseInt($(this).attr("stat"));
            var id = parseInt($(".exam_voprosy li a.select").attr("id")) + 1;
            var v_id = parseInt($(this).attr("v_id"));
            var o_id = parseInt($(this).attr("o_id"));
            reload(1);
            if(stat === 0){
                $(this).addClass("neverno");
                $(".exam_voprosy li a.select").addClass("error");

                $.get("/ajaxExamSession", {"V_ID": v_id, "O_ID": o_id}, function(data){});

                $.get("/ajaxdop", {"CNT": $(".exam_voprosy li a.select").attr("id")}, function(dataDop){
                    reload(0);
                    dataDop = JSON.parse(dataDop);
                    var idn = 0;
                    for(var i in dataDop){
                        idn = e_v_count();
                        $(".exam_voprosy").append('<li><a id = "' + idn +'" href = "#" onclick = "exam_load_data(' + dataDop[i].id +')">' + idn + '</a></li>');
                        $("#" + idn).bind("click", function(){
                            $(".exam_voprosy li a").each(function(){
                                    $(this).removeClass("select");	
                            });

                            $(this).addClass("select");
                        });
                    }
                });
            }else if(stat === 1){
                $(this).addClass("verno");
                $(".exam_voprosy li a.select").addClass("correct");
                reload(0);
            }

            if(id < e_v_count()){
                $.get("/errorCount", {}, function(data){
                        if(data > 2){
                                document.location.href = "/resultexam";
                        }
                });

                $("#" + id).click();
            }else{
                document.location.href = "/resultexam";
            }
        });		
    });

    return false;
}

$(".exam_variants li").click(function(){
    var stat = parseInt($(this).attr("stat"));
    var id = parseInt($(".exam_voprosy li a.select").attr("id")) + 1;
    var v_id = parseInt($(this).attr("v_id"));
    var o_id = parseInt($(this).attr("o_id"));
    reload(1);
    if(stat === 0){
        $(this).addClass("neverno");
        $(".exam_voprosy li a.select").addClass("error");

        $.get("/ajaxsession", {"V_ID": v_id, "O_ID": o_id}, function(data){});

        $.get("/ajaxdop", {"CNT": $(".exam_voprosy li a.select").attr("id")}, function(dataDop){
            reload(0);
            dataDop = JSON.parse(dataDop);
            var idn = 0;
            for(var i in dataDop){
                idn = e_v_count();
                $(".exam_voprosy").append('<li><a id = "' + idn +'" href = "#" onclick = "exam_load_data(' + dataDop[i].id +')">' + idn + '</a></li>');
                $("#" + idn).bind("click", function(){
                    $(".exam_voprosy li a").each(function(){
                        $(this).removeClass("select");	
                    });

                    $(this).addClass("select");
                });
            }
        });		
    }else if(stat === 1){
        $(this).addClass("verno");
        $(".exam_voprosy li a.select").addClass("correct");
        reload(0);
    }

    if(id < e_v_count()){
        $("#" + id).click();
    }
});
/*---------------------------------------------------------*/

/*Открываем popup с нужным комментарием*/
$(".comment span").click(function(){
    var key = $(this).text();
    reload(1);
    $.get("/ajaxContent", {KEY: key}, function(data){
        reload(0);
        $("body").prepend(createPopup(data));

        $('.overlay').fadeIn(200, function(){
            $("html,body").css({"overflow":"hidden"});
            $('.pdd_popap').fadeIn(200);
            var top = $(window).height() / 2 - $('.pdd_popap').height() / 2;
            var left = $('body').width() / 2 - $('.pdd_popap').width() / 2;
            left = left - 3;
            $('.pdd_popap').css('top', top).css('left', left);
        });

        $(".popup > .close2, .overlay").bind('click', function(){
            var popup = $('.popup:visible');
            popup.fadeOut(200, function(){
                $('.overlay').fadeOut(200);
            });

            $(".popup").remove();
            $(".overlay").remove();
            $("html,body").css("overflow","auto");
            return false;	
        });		
    });	
});

/*Закрытие popup по нажатию на Esc*/
function keyExit(e){
    if(e.keyCode === 27){
        if($(".overlay").is(":visible")){
            var popup = $('.popup');
            popup.fadeOut(200, function(){
                $('.overlay').fadeOut(200);
            });

            $(".popup").remove();
            $(".overlay").remove();			
        }	
    }
}

addEventListener("keydown", keyExit);


$(".mobile_menu_bilety").click(function(){	
    reload(1);
    $.get('/ajaxmenubilety', {}, function(data){
        var str = '';
        data = JSON.parse(data);
        reload(0);
        for(var i in data){
            str += '<div class = "col-sm-12 "><div class = "menu_div"><a href = "/bilety/' + data[i].id +'">' + data[i].name + '</a></div></div>';	
        }

        $("body").prepend(createPopupMenu(str));

        $('.overlay').fadeIn(200, function(){
            $('.menu_popap').fadeIn(200);

            $('.menu_popap').css('top', 10).css('left', 5).css('right', 10).css('bottom', 10).css('width', '98%').css('height', '98%').css('max-width', '100%');
            $('.content_popup').css('max-height', '100%');
        });

        $(".popup > .close2, .overlay").bind('click', function(){
            var popup = $('.popup:visible');
            popup.fadeOut(200, function(){
                $('.overlay').fadeOut(200);
            });

            $(".popup").remove();
            $(".overlay").remove();

            return false;	
        });		
    });
});

$('.mobile_menu_them').click(function(){
    reload(1);
    $.get('/ajaxmenutemy', {}, function(data){
        var str = '';
        data = JSON.parse(data);
        reload(0);
        for(var i in data){
            str += '<div class = "col-sm-12 "><div class = "menu_div"><a href = "/temy/' + data[i].id +'">' + data[i].name + '</a></div></div>';	
        }

        $("body").prepend(createPopupMenu(str));

        $('.overlay').fadeIn(200, function(){
            $('.menu_popap').fadeIn(200);

            $('.menu_popap').css('top', 10).css('left', 5).css('right', 10).css('bottom', 10).css('width', '98%').css('height', '98%').css('max-width', '100%');
            $('.content_popup').css('max-height', '100%');
        });

        $(".popup > .close2, .overlay").bind('click', function(){
            var popup = $('.popup:visible');
            popup.fadeOut(200, function(){
                    $('.overlay').fadeOut(200);
            });

            $(".popup").remove();
            $(".overlay").remove();

            return false;	
        });		
    });		
});

$('.mobile_menu_pdd').click(function(){
    reload(1);
    $.get('/ajaxmenupdd', {}, function(data){
        var str = '';
        data = JSON.parse(data);
        reload(0);
        for(var i in data){
            str += '<div class = "col-sm-12 "><div class = "menu_div"><a href = "/pdd/' + data[i].seokey +'">' + data[i].name + '</a></div></div>';	
        }

        $("body").prepend(createPopupMenu(str));

        $('.overlay').fadeIn(200, function(){
            $('.menu_popap').fadeIn(200);

            $('.menu_popap').css('top', 10).css('left', 5).css('right', 10).css('bottom', 10).css('width', '98%').css('height', '98%').css('max-width', '100%');
            $('.content_popup').css('max-height', '100%');
        });

        $(".popup > .close2, .overlay").bind('click', function(){
            var popup = $('.popup:visible');
            popup.fadeOut(200, function(){
                $('.overlay').fadeOut(200);
            });

            $(".popup").remove();
            $(".overlay").remove();

            return false;	
        });		
    });		
});

$('.mobile_menu_nv').click(function(){
    reload(1);
    $.get('/ajaxmenunv', {}, function(data){
        var str = '';
        data = JSON.parse(data);
        reload(0);
        for(var i in data){
            if(data[i].poradok === 3){
                str += '<div class = "col-sm-12 "><div class = "menu_div"><a href = "/voprosy/' + data[i].poradok +'">' + data[i].poradok + ' - и вопросы</a></div></div>';	
            }else{
                str += '<div class = "col-sm-12 "><div class = "menu_div"><a href = "/voprosy/' + data[i].poradok +'">' + data[i].poradok + ' - е вопросы</a></div></div>';	
            }
        }

        $("body").prepend(createPopupMenu(str));

        $('.overlay').fadeIn(200, function(){
            $('.menu_popap').fadeIn(200);

            $('.menu_popap').css('top', 10).css('left', 5).css('right', 10).css('bottom', 10).css('width', '98%').css('height', '98%').css('max-width', '100%');
            $('.content_popup').css('max-height', '100%');
        });

        $(".popup > .close2, .overlay").bind('click', function(){
            var popup = $('.popup:visible');
            popup.fadeOut(200, function(){
                    $('.overlay').fadeOut(200);
            });

            $(".popup").remove();
            $(".overlay").remove();

            return false;	
        });		
    });		
});

$('#send__comment').click(function(){
    var name = $('#name').val();
    var city = $('#city').val();
    var comment = $('#comment').val();
    var flag = 0;
    
    $('#name').css({"border":"1px solid #ccc"});
    $('#city').css({"border":"1px solid #ccc"});
    $('#comment').css({"border":"1px solid #ccc"});
    
    if(name == ''){
        $('#name').css({"border":"1px solid red"});
        flag = 1;
    }
    
    if(city == ''){
        $('#city').css({"border":"1px solid red"});
        flag = 1;
    }
    
    if(comment == ''){
        $('#comment').css({"border":"1px solid red"});
        flag = 1;
    }
    
    if(flag == 0){
        $.get("/send-comment", {NAME: name, CITY: city, COMMENT: comment}, function(data){
            if(data == 0){
                alert("Ошибка отправки комментария! Попробуйте еще раз.");
            }else if(data == 1){
                alert("Благодарим Вас за оставленный комментарий!");
                document.location.href = document.location.href;              
            }
        });
    }
});