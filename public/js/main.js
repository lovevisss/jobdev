$(function(){
	var _navIndex = $(".nav>ul>li.current").index();
	$(".nav>ul>li").hover(function(){
		$(this).addClass("current").siblings().removeClass("current");
		$(this).find("ul").stop().slideDown(300);
	},function(){
		$(this).removeClass("current");
		$(".nav>ul>li").eq(_navIndex).addClass("current");
		$(this).find("ul").stop().slideUp(300);
	})
})