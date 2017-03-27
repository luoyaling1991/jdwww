<?php 
class Excel_model extends MY_Model {
	function __construct(){
		parent::__construct();$this->load->database();
		if(!isset($_SESSION)){  
		   session_start();  
		}  
	}
	//导出订单信息
	public function out_some($order_ids){
		$shop_id=&$_SESSION['admin_user']['shop_id'];
		//先查询所有订单
		$str="select order_id,order_no,order_1,order_2,order_price,order_by,order_desc,insert_time,order_time from shop_order where order_id in($order_ids) and shop_id={$_SESSION['admin_user']['shop_id']} and order_type=0 and order_state=2  order by insert_time desc";
		$list=$this->select_all($str);
		$date_time=date("Y_m_d_H_i_s",time());
		require_once 'PHPExcel/PHPExcel.php';
		require_once 'PHPExcel/PHPExcel/Writer/Excel5.php';
		require_once 'PHPExcel/PHPExcel/Writer/Excel2007.php';
		$data=array();
			/* 实例化类 */
		$objPHPExcel = new PHPExcel();
			/* 设置输出的excel文件为2007兼容格式 */
			//$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter=new PHPExcel_Writer_Excel5($objPHPExcel);
	
			/* 设置当前的sheet */
		$objPHPExcel->setActiveSheetIndex(0);
		$objActSheet = $objPHPExcel->getActiveSheet();
	
			/* sheet标题 */
		$objActSheet->setTitle("销售详情表");
			//$value2=iconv("gbk","utf-8",$value2);
	
			//合并单元格
			$objActSheet->mergeCells('A1:I1');
			$objActSheet->setCellValue('A1',"销售详情表");
			$objStyleA1 =$objPHPExcel->getActiveSheet()->getStyle('A1');
			//内容居中
			$objStyleA1->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);//设置垂直居中
			$objStyleA1->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//设置横向居中
			//颜色填充
			$objStyleA1->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$objStyleA1->getFill()->getStartColor()->setARGB(PHPExcel_Style_Color::COLOR_YELLOW);
			//字体设置
			$objStyleA1->getFont()->setName('微软雅黑');
			$objStyleA1->getFont()->setSize(16);
			$objStyleA1->getFont()->setBold(true);
			$objStyleA1->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
			$objStyleA1->getFont()->setBold(true);
			$objActSheet->getColumnDimension('A')->setWidth(10);
			$objActSheet->getColumnDimension('B')->setWidth(20);
			$objActSheet->getColumnDimension('C')->setWidth(20);
			$objActSheet->getColumnDimension('D')->setWidth(20);
			$objActSheet->getColumnDimension('E')->setWidth(10);
			$objActSheet->getColumnDimension('F')->setWidth(10);
			$objActSheet->getColumnDimension('G')->setWidth(10);
			$objActSheet->getColumnDimension('H')->setWidth(30);
			$objActSheet->getColumnDimension('I')->setWidth(50);
	
			$objActSheet->setCellValue('A2',"ID");
			$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
			$objActSheet->setCellValue('B2',"订单号");
			$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
			$objActSheet->setCellValue('C2',"开单时间");
			$objPHPExcel->getActiveSheet()->getStyle('C2')->getFont()->setBold(true);
			$objActSheet->setCellValue('D2',"结单时间");
			$objPHPExcel->getActiveSheet()->getStyle('D2')->getFont()->setBold(true);
			$objActSheet->setCellValue('E2',"应收");
			$objPHPExcel->getActiveSheet()->getStyle('E2')->getFont()->setBold(true);
			$objActSheet->setCellValue('F2',"实收");
			$objPHPExcel->getActiveSheet()->getStyle('F2')->getFont()->setBold(true);
			$objActSheet->setCellValue('G2',"差价");
			$objPHPExcel->getActiveSheet()->getStyle('G2')->getFont()->setBold(true);
			$objActSheet->setCellValue('H2',"原因");
			$objPHPExcel->getActiveSheet()->getStyle('H2')->getFont()->setBold(true);
			$objActSheet->setCellValue('I2',"备注");
			$objPHPExcel->getActiveSheet()->getStyle('I2')->getFont()->setBold(true);

			$num=0;
			$money_sum_1=0;
			$money_sum_2=0;
			$money_sum_3=0;
			$i_num=2;
			foreach ($list as $row){
					$num++;
					$i_num++;
					$order_1=$row['order_1'];
					$order_no=substr($row['order_no'],0,4)."-".substr($row['order_no'],4,2)."-".substr($row['order_no'],6,2)."_".substr($row['order_no'],8);
					$order_2=$row['order_2'];
					$order_price=$row['order_price'];
					$money_sum_1+=$order_1;
					$money_sum_2+=$order_2;
					$money_sum_3+=$order_price;
					$order_by=$row['order_by'];
					$order_desc=$row['order_desc'];
					$order_time=$row['order_time'];
					$insert_time=$row['insert_time'];
					
					$objActSheet->setCellValue('A'.$i_num,$num);
					$objActSheet->setCellValue('B'.$i_num,$order_no);
					$objActSheet->setCellValue('C'.$i_num,$insert_time);
					$objActSheet->setCellValue('D'.$i_num,$order_time);
					$objActSheet->setCellValue('E'.$i_num,$order_2);
					$objActSheet->setCellValue('F'.$i_num,$order_price);
					$objActSheet->setCellValue('G'.$i_num,$order_1);
					$objActSheet->setCellValue('H'.$i_num,$order_by);
					$objActSheet->setCellValue('I'.$i_num,$order_desc);
			}
			$i_num++;
			$objActSheet->setCellValue('A'.$i_num,"合计");
			$objPHPExcel->getActiveSheet()->getStyle('A'.$i_num)->getFont()->setBold(true);
			$objActSheet->setCellValue('B'.$i_num,$num."单");
			$objPHPExcel->getActiveSheet()->getStyle('B'.$i_num)->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('B'.$i_num)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
			$objActSheet->setCellValue('E'.$i_num,$money_sum_2."元");
			$objPHPExcel->getActiveSheet()->getStyle('E'.$i_num)->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('E'.$i_num)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
			$objActSheet->setCellValue('F'.$i_num,$money_sum_3."元");
			$objPHPExcel->getActiveSheet()->getStyle('F'.$i_num)->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('F'.$i_num)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
			$objActSheet->setCellValue('G'.$i_num,$money_sum_1."元");
			$objPHPExcel->getActiveSheet()->getStyle('G'.$i_num)->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('G'.$i_num)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
			/* 生成到浏览器，提供下载 */
			ob_end_clean();  //清空缓存
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
			header("Content-Type:application/force-download");
			header("Content-Type:application/vnd.ms-execl");
			header("Content-Type:application/octet-stream");
			header("Content-Type:application/download");
	
			$excelFileName="销售详情表_".$date_time;
			header('Content-Disposition:attachment;filename="'.$excelFileName.'.xlsx"');
			header("Content-Transfer-Encoding:binary");
			$objWriter->save('php://output');

	}
	//导出订单信息
	public function out_all(){
		$shop_id=&$_SESSION['admin_user']['shop_id'];
		//先查询所有订单
		$str="select order_id,order_no,order_1,order_2,order_price,order_by,order_desc,insert_time,order_time from shop_order where shop_id={$_SESSION['admin_user']['shop_id']} and order_type=0 and order_state=2  order by insert_time desc";
		$list=$this->select_all($str);
		$date_time=date("Y_m_d_H_i_s",time());
		require_once 'PHPExcel/PHPExcel.php';
		require_once 'PHPExcel/PHPExcel/Writer/Excel5.php';
		require_once 'PHPExcel/PHPExcel/Writer/Excel2007.php';
		$data=array();
		/* 实例化类 */
		$objPHPExcel = new PHPExcel();
		/* 设置输出的excel文件为2007兼容格式 */
		//$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter=new PHPExcel_Writer_Excel5($objPHPExcel);
	
		/* 设置当前的sheet */
		$objPHPExcel->setActiveSheetIndex(0);
		$objActSheet = $objPHPExcel->getActiveSheet();
	
		/* sheet标题 */
		$objActSheet->setTitle("销售详情表");
		//$value2=iconv("gbk","utf-8",$value2);
	
		//合并单元格
		$objActSheet->mergeCells('A1:I1');
		$objActSheet->setCellValue('A1',"销售详情表");
		$objStyleA1 =$objPHPExcel->getActiveSheet()->getStyle('A1');
		//内容居中
		$objStyleA1->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);//设置垂直居中
		$objStyleA1->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//设置横向居中
		//颜色填充
		$objStyleA1->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$objStyleA1->getFill()->getStartColor()->setARGB(PHPExcel_Style_Color::COLOR_YELLOW);
		//字体设置
		$objStyleA1->getFont()->setName('微软雅黑');
		$objStyleA1->getFont()->setSize(16);
		$objStyleA1->getFont()->setBold(true);
		$objStyleA1->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
		$objStyleA1->getFont()->setBold(true);
		$objActSheet->getColumnDimension('A')->setWidth(10);
		$objActSheet->getColumnDimension('B')->setWidth(20);
		$objActSheet->getColumnDimension('C')->setWidth(20);
		$objActSheet->getColumnDimension('D')->setWidth(20);
		$objActSheet->getColumnDimension('E')->setWidth(10);
		$objActSheet->getColumnDimension('F')->setWidth(10);
		$objActSheet->getColumnDimension('G')->setWidth(10);
		$objActSheet->getColumnDimension('H')->setWidth(30);
		$objActSheet->getColumnDimension('I')->setWidth(50);
	
		$objActSheet->setCellValue('A2',"ID");
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
		$objActSheet->setCellValue('B2',"订单号");
		$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
		$objActSheet->setCellValue('C2',"开单时间");
		$objPHPExcel->getActiveSheet()->getStyle('C2')->getFont()->setBold(true);
		$objActSheet->setCellValue('D2',"结单时间");
		$objPHPExcel->getActiveSheet()->getStyle('D2')->getFont()->setBold(true);
		$objActSheet->setCellValue('E2',"应收");
		$objPHPExcel->getActiveSheet()->getStyle('E2')->getFont()->setBold(true);
		$objActSheet->setCellValue('F2',"实收");
		$objPHPExcel->getActiveSheet()->getStyle('F2')->getFont()->setBold(true);
		$objActSheet->setCellValue('G2',"差价");
		$objPHPExcel->getActiveSheet()->getStyle('G2')->getFont()->setBold(true);
		$objActSheet->setCellValue('H2',"原因");
		$objPHPExcel->getActiveSheet()->getStyle('H2')->getFont()->setBold(true);
		$objActSheet->setCellValue('I2',"备注");
		$objPHPExcel->getActiveSheet()->getStyle('I2')->getFont()->setBold(true);
	
		$num=0;
		$money_sum_1=0;
		$money_sum_2=0;
		$money_sum_3=0;
		$i_num=2;
		foreach ($list as $row){
			$num++;
			$i_num++;
			$order_1=$row['order_1'];
			$order_no=substr($row['order_no'],0,4)."-".substr($row['order_no'],4,2)."-".substr($row['order_no'],6,2)."_".substr($row['order_no'],8);
			$order_2=$row['order_2'];
			$order_price=$row['order_price'];
			$money_sum_1+=$order_1;
			$money_sum_2+=$order_2;
			$money_sum_3+=$order_price;
			$order_by=$row['order_by'];
			$order_desc=$row['order_desc'];
			$order_time=$row['order_time'];
			$insert_time=$row['insert_time'];
				
			$objActSheet->setCellValue('A'.$i_num,$num);
			$objActSheet->setCellValue('B'.$i_num,$order_no);
			$objActSheet->setCellValue('C'.$i_num,$insert_time);
			$objActSheet->setCellValue('D'.$i_num,$order_time);
			$objActSheet->setCellValue('E'.$i_num,$order_2);
			$objActSheet->setCellValue('F'.$i_num,$order_price);
			$objActSheet->setCellValue('G'.$i_num,$order_1);
			$objActSheet->setCellValue('H'.$i_num,$order_by);
			$objActSheet->setCellValue('I'.$i_num,$order_desc);
		}
		$i_num++;
		$objActSheet->setCellValue('A'.$i_num,"合计");
		$objPHPExcel->getActiveSheet()->getStyle('A'.$i_num)->getFont()->setBold(true);
		$objActSheet->setCellValue('B'.$i_num,$num."单");
		$objPHPExcel->getActiveSheet()->getStyle('B'.$i_num)->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('B'.$i_num)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
		$objActSheet->setCellValue('E'.$i_num,$money_sum_2."元");
		$objPHPExcel->getActiveSheet()->getStyle('E'.$i_num)->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('E'.$i_num)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
		$objActSheet->setCellValue('F'.$i_num,$money_sum_3."元");
		$objPHPExcel->getActiveSheet()->getStyle('F'.$i_num)->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('F'.$i_num)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
		$objActSheet->setCellValue('G'.$i_num,$money_sum_1."元");
		$objPHPExcel->getActiveSheet()->getStyle('G'.$i_num)->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('G'.$i_num)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
		/* 生成到浏览器，提供下载 */
		ob_end_clean();  //清空缓存
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
		header("Content-Type:application/force-download");
		header("Content-Type:application/vnd.ms-execl");
		header("Content-Type:application/octet-stream");
		header("Content-Type:application/download");
	
		$excelFileName="销售详情表_".$date_time;
		header('Content-Disposition:attachment;filename="'.$excelFileName.'.xlsx"');
		header("Content-Transfer-Encoding:binary");
		$objWriter->save('php://output');
	
	}

}
?>