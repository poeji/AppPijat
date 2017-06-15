<?php
require_once('lib/pdf.inc.php');
$p = new PDF();
$p->SetMargins(15,15,15);
$p->AddPage('L');
$p->setStyle('title');
$p->text(0,'BAÛNG KEÂ HOÙA ÑÔN, CHÖÙNG TÖØ HAØNG HOÙA, DÒCH VUÏ MUAVAØO',0,'C');
$p->setfont('vni_times','',10);
$p->text(0,"(Keøm theo tôø khai thueá GTGT)\n(Duøng cho cô sôû tính thueá GTGT theo phöông phaùp khaáu tröø thueá keá khai haøng thaùng)\nThaùng $this->month naêm $this->year",0,'C');
$html = "
<table width=$p->width>
<tr><td width=18>Teân ñôn vò<td width=180>: ".VNCode::UTF8VNI(getinfo(ADR_NAME))."<td width=13>Maãu soá<td>: ".($this->hdvao?'03':'02')."/GTGT
<tr><td>Ñòa chæ<td>: ".VNCode::UTF8VNI(getinfo(ADR_ADDRESS))."<td>Maõ soá<td>: ".getinfo(ADR_CODE)."
<tr><td>Ñieän thoaïi<td>: ".getinfo(ADR_TELL)."
";
$p->htmltable($html);
$p->Ln(3);
$vr1 = ($this->hdvao ? 'mua':'baùn');
$vr2 = ($this->hdvao ? 'baùn':'mua');
$html = '
<table width='.$p->width.' align=center>
<tr bgcolor=#eeeeee repeat=1>
<td align=center border=1111 rowspan=2 width=1>S<br>T<br>T
<td align=center border=1110 colspan=3>Hoùa ñôn chöùng töø '.$vr1.'
<td align=center border=1110 rowspan=2 width=50>Teân ngöôøi '.$vr2.'
<td align=center border=1110 rowspan=2>Maõ soá thueá
<td align=center border=1110 rowspan=2 width=50>Maët haøng
<td align=center border=1110 rowspan=2>Doanh soá '.$vr1.' chöa coù thueá
<td align=center border=1110 rowspan=2 nowrap>Thueá<br>suaát
<td align=center border=1110 rowspan=2>Thueá GTGT
<td align=center border=1110 rowspan=2 width=10>Ghi chuù
<tr bgcolor=#eeeeee repeat=1>
<td align=center border=0110>Kyù hieäu
<td align=center border=0110>Soá hoùa ñôn
<td align=center border=0110>Ngaøy phaùt haønh
';
$q = new DB("SELECT * FROM $this->temptable");
$stt = 1;
//Seri, Code, Publish, B.Name,TaxCode,Good, C.Total, TaxRatio, Tax
while ($r = $q->getRowField()) {
	$html .= '<tr>'.
	'<td align=center border=0111 nowrap>'.$stt
	.'<td align=center border=0110 nowrap>'.$r['Seri']
	.'<td align=center border=0110 nowrap>'.$r['Code']
	.'<td align=center border=0110 nowrap>'.date2html($r['Publish'])
	.'<td border=0110>'.VNCode::UTF8VNI($r['Name'])
	.'<td align=center border=0110 nowrap>'.$r['TaxCode']
	.'<td border=0110>'.VNCode::UTF8VNI($r['Good'])
	.'<td align=right border=0110 nowrap>'.so2pc($r['Total'])
	.'<td align=center border=0110 nowrap>'.$r['TaxRatio']
	.'<td align=right border=0110 nowrap>'.so2pc($r['Tax'])
	.'<td border=0110 width=20>&nbsp;'
	;
	$stt++;
}
$p->htmltable($html);
$p->Ln(3);
$time = strftime('Ngaøy %d thaùng %m naêm %Y');
$html = "<table width=$p->width>
<tr><td align=center valign=top height=40>&nbsp;<br>NGÖÔØI LAÄP BAÛNG<br>(Kyù vaø ghi roõ hoï teân)<td align=center valign=top>$time<br>GIAÙM ÑOÁC<br>(Kyù vaø ghi roõ hoï teân)
";
$p->htmltable($html);
$p->download('bkhd'.($this->hdvao?'vao':'ra'));
?>