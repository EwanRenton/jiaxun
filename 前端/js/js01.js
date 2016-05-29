$(function(){  
//当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失  
	$(function () {  
		$(window).scroll(function(){  
			if ($(window).scrollTop()>200){  
			$(".rt03").fadeIn(1000); 
		} 
		else{
			$(".rt03").fadeOut(1000);  
		}

		});
		//当点击跳转链接后，回到页面顶部位置 
		$(".rt03").click(function(){ 

			$('body,html').animate({scrollTop:0},1000); 
			return false;              
		});          
	});     
});  