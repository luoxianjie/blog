$(function(){
	$('#top ul li a').click(function(){
		$(this).parent().siblings().each(function(){
			$(this).find('a').removeClass('select');
		});
		$(this).addClass('select');
	});
	var upload_thumbnail=document.getElementById('upload_thumbnail');
	var width=300;
	var height=80;
	var left=(window.screen.width-width)/2;
	var top=(window.screen.height-height)/2;
	upload_thumbnail.onclick=function(){
		window.open(uploaddir,"上传缩略图","width="+width+",height="+height+",left="+left+",top="+top);
	}
});

function changeCode(obj,url){
	url=url+'&random='+Math.random();
	$(obj).attr("src",url);
}
