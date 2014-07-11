function user_login(){
	$("#user_dialog").dialog({
		buttons:[{
					text:'ok',
					iconCls:'icon-ok',
					handler:function(){
						alert('ok');
					}
				},
				{
					text:'cancer',
					handler:function(){
						$("#user_dialog").dialog('close');
					}
				}
	]
	});
}
function changeimg(target_img,src,base_url,backend_url){
	var	inner_html=$("#src_"+src).attr('src');
	$("#w").html('<div style="margin-bottom:15px;margin-left:8px;"><img id="uploaded_img" src="'+inner_html+'"><div><input type="file" name="uploadify" id="uploadify" />').show();
	$("#uploadify").uploadify({
		"uploader"       : base_url+"/js/uploadify.swf",
		"script"         : backend_url,
		"cancelImg"      : base_url+"/js/cancel.png",
		"folder"         : base_url+"/upload",
	//	'scriptData'     : {'name':target_img},
		'auto'           : true,
		'multi'          : true,
		'onComplete'     : function(event,ID,fileObj,response,data){
				$("#uploaded_img").attr({'src':fileObj.filePath});
		},
		'onOpen'         : function(event,ID,fileObj){
			if(fileObj.name ==target_img)
				return true;
			else{
				alert('文件名不一致!');
			//	return false;
			}
		}
	});
	$("#w").window({
				title: 'New Title',
				width: 600,
				modal: true,
				shadow: false,
				closed: false,
				height: 300,
				onClose:function(){
					window.location.reload();
				}
			});
}
