<script type="text/javascript">
(function($){
function LeftMenu(menudata){
		this.menudata=menudata;
}
LeftMenu.prototype.init=function(){
	$("#backend_lftmenu").empty();
	var menuHtml='';
	$.each(this.menudata,function(i,n){
		menuHtml+='<li><span>'+n.text+'</span><ul class="easyui-tree">';
		$.each(n.children,function(j,m){
			menuHtml+='<li><span><a href="'+m.url+'" target="myFrame" style="text-decoration:none">&gt;'+m.text+'</a></span></li>';
		});
		menuHtml+='</ul></li>';
	});
	$("#backend_lftmenu").append(menuHtml);
//	$("#backend_lftmenu").tree();
//	using('tree',function(){$("#backend_lftmenu").tree();});
	$("#backend_lftmenu li a").click(function(){
			var my_tabs=new MyTabs($(this).attr('href'),$(this).text());
			my_tabs.addTabs();
			return false;
	});
}
function MyTabs(target_url,target_alt){
	this.target_url=target_url;
	this.target_alt=target_alt;
}
MyTabs.prototype.addTabs=function(){
		$("#tt").tabs('exists',this.target_alt)?$("#tt").tabs('select',this.target_alt):$('#tt').tabs('add',{
				title:this.target_alt,
			//	href:this.target_url,
			//	width:940,
				cache:true,
				content:"<iframe name='myFrame'  src='"+this.target_url+"' marginheight='0' marginwidth='0'  scrolling='auto' framespacing='0' frameborder='0' width='100%' height='99%'></iframe>",
				closable:true
		});

};
var leftmenu=new LeftMenu(<?php echo $tree?>);
leftmenu.init();
})(jQuery)
</script>
<ul id="backend_lftmenu" class="" style=""></ul>

