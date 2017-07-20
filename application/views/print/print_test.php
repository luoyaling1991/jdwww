<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8" /> 
<title>正在打印小票</title>
<script language=javascript>     
window.onload = function(){
		        try {  
		              // 创建ActiveXObject对象  
		              wdapp = new ActiveXObject("Word.Application");  
		         }  
		         catch (e) {  
		        	alert("请确认浏览器ActiveX控件和插件全部启用以及浏览器使用兼容模式！");
		            wdapp = null;  
		             return;  
		         }
		         wdapp.Documents.Open("<?php echo $print_type;?>"); //打开本地(客户端)word模板
		         wddoc = wdapp.ActiveDocument;  
		         wddoc.Bookmarks("print_name").Range.Text = "<?php echo $print_name;?>";
		         wddoc.Bookmarks("order_no").Range.Text = "201601010001"+"\n餐桌编号：测试楼层001"+"\n点单工号：008";  
		         wddoc.Bookmarks("insert_time").Range.Text = "2016-01-01 18:00:00";
		         wddoc.Bookmarks("call_num").Range.Text = "<?php echo $call_num?>";
		         wddoc.Bookmarks("call_address").Range.Text = "<?php echo $call_address;if($other!=""){?>"+"\n"+"<?php echo $other;}?>";;

		        
			   	wddoc.Bookmarks("log_name").Range.Text = "测试菜品名称"+"\n";
			   	wddoc.Bookmarks("log_count").Range.Text = "1"+"\n"+"";
			   	wddoc.Bookmarks("log_money").Range.Text = "68.00"+"元\n"+"";
			  
		         wddoc.Bookmarks("sum").Range.Text = "68.00";
		         wddoc.saveAs("d:\\PrinterTemp_cnblogs.doc"); //保存临时文件word
		         //wdapp.ActiveDocument.ActiveWindow.View.Type = 1;
		         wdapp.visible = false; //word模板是否可见  
		         wdapp.Application.Printout(); //调用自动打印功能  
		         wdapp.quit();
		         wdapp = null;  
		         window.opener=null;window.open('','_self');window.close();
	     }

</script> 

</head>
<body>

</body>
</html>