<?php
define('FPDF_FONTPATH','lib/font/');
require_once('lib/pdftable.inc.php');

class PDF extends PDFTable{
function PDF($orientation='P',$unit='mm',$format='A4'){
	PDFTable::PDFTable($orientation,$unit,$format);
	$this->AddFont('vni_times');
	/*$this->AddFont('vni_times', 'B');
	$this->AddFont('vni_times', 'I');
	$this->AddFont('vni_times', 'BI');
	$this->AddFont('vni_helve', 'B');*/
	$this->SetAuthor('Pham Minh Dung');
	$this->AliasNbPages();
}

function Header(){
	parent::Header();
	$this->setStyle('small');
	$this->x = $this->left;
	$this->y = $this->top-$this->getLineHeight()-0.5;
	$user = getvar('UserName');
	$time = date('d/m/Y');
	$edit = getstr('EditBy');
	$date = getstr('Updated');
	$input = "Nhaäp bôûi [$edit] ngaøy $date";
	$print = "In bôûi [$user] ngaøy $time";
	$print = $edit? "$input. $print":$print;
	$html = "
	<table width=$this->width><tr>
		<td nowrap>Coâng ty TNHH Quoác Daân - Chi nhaùnh TPHCM</td>
		<td align=right nowrap>$print</td>
	</tr></table>
	";
	$this->htmltable($html,0);
	$this->hr();
	$this->y = $this->top;
}

function Footer(){
	$this->setStyle('small');
	$this->x = $this->left;
	$this->y = $this->bottom+0.5;
	$version = getvar('Version');
	$page = 'Trang '.$this->PageNo().'/{nb}';
	$html = "
	<table width=$this->width><tr>
		<td nowrap>$version</td>
		<td align=right nowrap>$page</td>
	</tr></table>
	";
	$this->hr();
	$this->htmltable($html,0);
}

/**
 * @@desc Xuat ra chi thi cho phep download file
 */
function download($name){
	$user = getvar('UserName');
	$folder = "temp/$user/";
	$name = $name.'_'.date('y-m-d_His').'.pdf';
	$file = $folder.$name;
	$this->Output($file,'F');
	message("In th&#224;nh c&#244;ng!<ul><li>Click chu&#7897;t tr&#225;i v&#224;o t&#234;n file &#273;&#7875; m&#7903; file tr&#234;n c&#7917;a s&#7893; m&#7899;i.<li>Click chu&#7897;t ph&#7843;i v&#224;o t&#234;n file v&#224; ch&#7885;n <b>Save target as...</b> &#273;&#7875; l&#432;u file.</ul><center><a href='get.php?f=$name' target=_blank>$name</a></center>");
}

/**
 * @desc Thiet lap style dinh truoc
 */
function setStyle($style='normal'){
	switch ($style){
		case 'title':
			$this->SetFont('vni_times','',19);
			break;
		case 'small':
			$this->SetFont('vni_times','',8);
			break;
		case 'normal':
		default:
			$this->SetFont('vni_times','',12);
	}
}

function text($w,$txt,$border=0,$align='J',$fill=0){
	FPDF::MultiCell($w,$this->FontSizePt/2,$txt,$border,$align,$fill);
}

/**
 * @desc Xuat ra dong chu xac dinh nguoi nhap du lieu tren form
 */
function makeSecurityString(){
	/*$this->setStyle('small');
	$this->x = $this->left;
	$user = getvar('UserName');
	$time = date('d/m/Y');
	$edit = getstr('EditBy');
	$date = getstr('Updated');
	$input = "Nhaäp bôûi [$edit] ngaøy $date";
	$print = "In bôûi [$user] ngaøy $time";
	$print = $edit? "$input. $print":$print;
	$version = getvar('Version');
	$html = "
	<table width=$this->width><tr>
		<td nowrap>Coâng ty TNHH Quoác Daân</td>
		<td align=center nowrap>$print</td>
		<td align=right nowrap>$version</td>
	</tr></table>
	";
	$this->hr();
	$this->htmltable($html);*/
}

/**
 * @desc Ve mot duong ngang toan chieu trang giay
 */
function hr(){
	$this->Line($this->left,$this->y,$this->right,$this->y);
}

/**
 * @desc Xuat ra phan ket thuc cua form va ve hinh chu nhat bao quanh form
 */
function formBox(){
	$this->Ln(3);
	$this->setStyle();
	$table = "<table width=$this->width><tr>
		<td align=center height=35 valign=top>Ngöôøi laäp bieåu
		<td align=center valign=top>Keá toaùn tröôûng
		<td align=center valign=top>Thuû tröôûng ñôn vò
		</table>";
	$this->htmltable($table);
}

/**
 * @return array
 * @desc Xac dinh kich thuoc cac cot tuong ung voi data
 */
function _getColumnSize($data, $size=array()){
	if (is_array(current($data))){
	    foreach($data as $row){
	    	foreach ($row as $i=>$txt){
	    		$wtxt = $this->GetStringWidth($txt)+2;
	    		if (!isset($size[$i]) || $size[$i] < $wtxt) $size[$i] = $wtxt;
	    	}
	    }
	}elseif (is_array($data)){
    	foreach ($data as $i=>$txt){
    		$wtxt = $this->GetStringWidth($txt)+2;
    		if (!isset($size[$i]) || $size[$i] < $wtxt) $size[$i] = $wtxt;
    	}
	}
	return $size;
}
}//end of class
?>