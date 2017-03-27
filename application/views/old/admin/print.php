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
		         wddoc.Bookmarks("order_no").Range.Text = "<?php echo $order['order_no']?>"+"\n餐桌编号：<?php echo $tab_name;?>"+"\n点单工号：<?php echo $order['waiter_id']?>";  
		         wddoc.Bookmarks("insert_time").Range.Text = "<?php echo $order['insert_time']?>";
		         wddoc.Bookmarks("call_num").Range.Text = "<?php echo $call_num?>";
		         wddoc.Bookmarks("call_address").Range.Text = "<?php echo $call_address;if($other!=""){?>"+"\n"+"<?php echo $other;}?>";;

		         <?php 
			        $sum=0;
			   		$num=0;
			   		$log_name_list=array();
			   		$log_count_list=array();
			   		$log_money_list=array();
			   		$order_list_1=$order_list;
			   		foreach ($order_list as $row){
			   			$log_name=$row['log_name'];
			   			$log_count=$row['log_count'];
			   			$log_money=$row['log_money'];
			   			$sum=$sum+$log_money;
			   			$log_name_list[]=$log_name;
			   			$log_count_list[]=$log_count;
			   			$log_money_list[]=$log_money;
			   		}
			   ?>
			   	wddoc.Bookmarks("log_name").Range.Text = "<?php foreach ($log_name_list as $row){echo $row;?>"+"\n"+"<?php }?>";
			   	wddoc.Bookmarks("log_count").Range.Text = "<?php foreach ($log_count_list as $row){echo $row;?>"+"\n"+"<?php }?>";
			   	wddoc.Bookmarks("log_money").Range.Text = "<?php foreach ($log_money_list as $row){echo $row;?>"+"元\n"+"<?php }?>";
			  
		         wddoc.Bookmarks("sum").Range.Text = "<?php echo $sum;?>";
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