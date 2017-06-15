<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/../../lib/phpexcel/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");


// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'No. Invoice')
						->setCellValue('C1', 'Tanggal')
						->setCellValue('D1', 'Member id')
						->setCellValue('E1', 'Member name')
            ->setCellValue('F1', 'Meja')
            ->setCellValue('G1', 'Total')
						->setCellValue('H1', 'Discount(%)')
						->setCellValue('I1', 'Discount(Rp.)')
						->setCellValue('J1', 'Disc Nominal')
						->setCellValue('K1', 'Disc Member')
						->setCellValue('L1', 'Grand Total')
						->setCellValue('M1', 'Cash')
						->setCellValue('N1', 'Bayar')
						->setCellValue('O1', 'Kembali')
						->setCellValue('P1', 'Cara Bayar')
						->setCellValue('Q1', 'Kasir');

			$i=2;
			$j=1;

			$total = 0;
			$discount = 0;
			$charge = 0;
			$tax = 0;
			$grandtot = 0;
			$bayar = 0;
			$kembali = 0;
while ($row = mysql_fetch_array($query)) {
	$totalawal  = $row['transaction_total'];
	$grandtotawal  = $row['transaction_grand_total'];
	// $svc	    = 5/100*$totalawal;
	// $tax	    = 10/100*($totalawal+$svc);
	// $totalkedua =	$totalawal+$svc+$tax;
	$totalkedua =	$totalawal;
	$totalkedua=ceil($totalkedua);
	if (substr($totalkedua,-2)!=00){
		if(substr($totalkedua,-2)<50){
			$totalkedua=round($totalkedua,-2)+100;
		}else{
			$totalkedua=round($totalkedua,-2);
		}
	}
	$total = $total+$totalawal;
	$grandtot = $grandtot+$grandtotawal;
	$discount = $discount+$row['transaction_discount']/100*$row['transaction_total'];
	// $charge = $charge+$svc;
	// $tax = $tax+$tax;
	//$grandtot = $grandtot+$totalkedua;
	$bayar = $bayar+$row['transaction_payment'];
	//$kembali = $kembali+($row['transaction_payment']-$totalkedua);
	if ($row['payment_method_id'] != 1) {
		$cash = 0;
	} else {
		$cash = "Rp. ".number_format($row['transaction_grand_total']);
	}
	$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $j)
            ->setCellValue('B'.$i, $row['transaction_id'])//INI INVOICE
            ->setCellValue('C'.$i, $row['transaction_date'])//tgl
						->setCellValue('D'.$i, $row['member_id'] )//member
            ->setCellValue('E'.$i, $row['member_name'])//nama
						->setCellValue('F'.$i, $row['table_name'].'('.$row['building_name'].')' )//meja
            ->setCellValue('G'.$i, 'Rp. '.number_format($row['transaction_total']))//haraga kotor
            ->setCellValue('H'.$i, $row['transaction_discount'].'%')//diskon
						->setCellValue('I'.$i, 'Rp. '.number_format($row['transaction_discount']/100*$row['transaction_total']))//diskon total
						->setCellValue('J'.$i, 'Rp. '.number_format($row['transaction_disc_nominal']))//diskon nominal
						->setCellValue('K'.$i, $row['member_discount'].'%')//disc Member
						->setCellValue('L'.$i, 'Rp. '.number_format($row['transaction_grand_total']))//Grand total
						->setCellValue('M'.$i, $cash)//Cash
						->setCellValue('N'.$i, 'Rp. '.number_format($row['transaction_payment']))//bayar
						->setCellValue('O'.$i, 'Rp. '.number_format($row['transaction_change']))//kembali
						->setCellValue('P'.$i, $row['payment_method_name'])
						->setCellValue('Q'.$i, $row['user_name'].'('.$row['user_login'].')');
						$i++;
						$j++;
}
$k = $i++;
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('B'.$k, 'Total')
			->setCellValue('G'.$k, 'Rp. '.number_format($total))
			//->setCellValue('F'.$k, 'Rp. '.number_format($discount))
			//->setCellValue('G'.$k, 'Rp. '.number_format($charge))
			//->setCellValue('H'.$k, 'Rp. '.number_format($tax))
			->setCellValue('L'.$k, 'Rp. '.number_format($grandtot));
			//->setCellValue('J'.$k, 'Rp. '.number_format($bayar))
			//->setCellValue('N'.$k, 'Rp. '.number_format($kembali));

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="transaksi.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
