$(function(){
    var common = {

        // 初始化方法
        init: function(){
            common.toTop();
            common.closeWindow();
        },

        // 回到顶部
        toTop: function(){
            var topBtn = $('.to-top');

            topBtn.hide();
            $(window).scroll(function(){
                var scrollTop = $(document).scrollTop();

                if(scrollTop <= 0){
                    topBtn.fadeOut(400);
                }else if(scrollTop > 300){
                    topBtn.fadeIn(400);
                }
            })
            topBtn.on('click',function(){
                $('html body').animate({
                    scrollTop:0
                },700,"swing")
            });
        },

        // 关闭当前窗口
        closeWindow: function(){
            $('.close').on('click',function(){
                window.close();
            })
        }
    };

    common.init();
})