(function($){
function LeftMenu(menudata){
		this.menudata=menudata;
}
LeftMenu.prototype.init=function(){
	$(".easyui-accordion").empty();
	var menuHtml='';
	$.each(this.menudata,function(i,n){
		menuHtml+='<div title="'+n.text+'" iconCls="icon-add"><ul class="left_menu">';
		$.each(n.children,function(j,m){
			menuHtml+='<li><a href="'+m.url+'" target="myFrame" style="text-decoration:none">&gt;&gt;'+m.text+'</li>';
		});
		menuHtml+='</li></div>';
	});
	$(".easyui-accordion").append(menuHtml);
	$(".easyui-accordion li a").click(function(){
			var my_tabs=new MyTabs($(this).attr('href'),$(this).text());
			my_tabs.addTabs();
	});
}
function MyTabs(target_url,target_alt){
	this.target_url=target_url;
	this.target_alt=target_alt;
}
MyTabs.prototype.addTabs=function(){
		$('#tt').tabs('add',{
				title:this.target_alt,
				content:"<iframe name='myFrame'  marginheight='0' marginwidth='0'  scrolling='no' framespacing='0' frameborder='0' width='780' height='800'></iframe>",
				closable:true
})
};
var leftmenu=new LeftMenu(<?php echo $tree?>);
leftmenu.init();
})(jQuery)
