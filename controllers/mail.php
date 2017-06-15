<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/mail_model.php';
require '../lib/phpmailer/class.smtp.php';
require '../lib/phpmailer/class.phpmailer.php';

$nams = "Tirta";
$em = "ferrytailsekai@gmail.com";
//$em = "ahmad.fatchur.roji.yahya@gmail.com";
$em2 = "tirta.rachmandiri.widiantoro@gmail.com";
//$em3 = "racodex@gmail.com";
        
$mail = new PHPMailer;

$mail->CharSet="UTF-8";
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Mailer = "smtp";
$mail->Port = 465;
$mail->Username = "racodex@gmail.com";
$mail->Password = "Arteid_07";
$mail->SMTPAuth = true;
$mail->From = "presiden@gmail.com";
$mail->FromName = $nams;
$mail->addAddress($em2);
$mail->addBCC($em);
//$mail->addCC($em3);
$mail->AddReplyTo('presiden@gmail.com', 'Information');
//for use debug
//$mail->SMTPDebug = 2;

$mail->IsHTML(true);
$mail->Body    = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'><head>
  <!--[if gte mso 9]><xml>
   <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
   </o:OfficeDocumentSettings>
  </xml><![endif]-->
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width'>
  <meta http-equiv='X-UA-Compatible' content='IE=9; IE=8; IE=7; IE=EDGE'>
  <title>Template Base</title>
  
  
  <style id='media-query'>
    /* Client-specific Styles & Reset */
    #outlook a {
        padding: 0;
    }

    /* .ExternalClass applies to Outlook.com (the artist formerly known as Hotmail) */
    .ExternalClass {
        width: 100%;
    }

    .ExternalClass,
    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
        line-height: 100%;
    }

    #backgroundTable {
        margin: 0;
        padding: 0;
        width: 100% !important;
        line-height: 100% !important;
    }

    /* Buttons */
    .button a {
        display: inline-block;
        text-decoration: none;
        -webkit-text-size-adjust: none;
        text-align: center;
    }

    .button a div {
        text-align: center !important;
    }

    /* Outlook First */
    body.outlook p {
        display: inline !important;
    }

    a[x-apple-data-detectors] {
  color: inherit !important;
  text-decoration: none !important;
  font-size: inherit !important;
  font-family: inherit !important;
  font-weight: inherit !important;
  line-height: inherit !important; }

/*  Media Queries */
@media only screen and (max-width: 500px) {
  table[class='body'] img {
    height: auto !important;
    width: 100% !important; }
  table[class='body'] img.fullwidth {
    max-width: 100% !important; }
  table[class='body'] center {
    min-width: 0 !important; }
  table[class='body'] .container {
    width: 95% !important; }
  table[class='body'] .row {
    width: 100% !important;
    display: block !important; }
  table[class='body'] .wrapper {
    display: block !important;
    padding-right: 0 !important; }
  table[class='body'] .columns, table[class='body'] .column {
    table-layout: fixed !important;
    float: none !important;
    width: 100% !important;
    padding-right: 0px !important;
    padding-left: 0px !important;
    display: block !important; }
  table[class='body'] .wrapper.first .columns, table[class='body'] .wrapper.first .column {
    display: table !important; }
  table[class='body'] table.columns td, table[class='body'] table.column td, .col {
    width: 100% !important; }
  table[class='body'] table.columns td.expander {
    width: 1px !important; }
  table[class='body'] .right-text-pad, table[class='body'] .text-pad-right {
    padding-left: 10px !important; }
  table[class='body'] .left-text-pad, table[class='body'] .text-pad-left {
    padding-right: 10px !important; }
  table[class='body'] .hide-for-small, table[class='body'] .show-for-desktop {
    display: none !important; }
  table[class='body'] .show-for-small, table[class='body'] .hide-for-desktop {
    display: inherit !important; }
  .mixed-two-up .col {
    width: 100% !important; } }
 @media screen and (max-width: 500px) {
      div[class='col'] {
          width: 100% !important;
      }
    }

    @media screen and (min-width: 501px) {
      table[class='container'] {
          width: 500px !important;
      }
    }
  </style>
</head>
<body style='width: 100% !important;min-width: 100%;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100% !important;margin: 0;padding: 0;background-color: #FFFFFF'>
  <table cellpadding='0' cellspacing='0' width='100%' class='body' border='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;height: 100%;width: 100%;table-layout: fixed'>
      <tbody><tr style='vertical-align: top'>
          <td class='center' align='center' valign='top' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;text-align: center;background-color: #FFFFFF'>

              <table cellpadding='0' cellspacing='0' align='center' width='100%' border='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
                <tbody><tr style='vertical-align: top'>
                  <td width='100%' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: #2C2D37'>
                    <!--[if gte mso 9]>
                    <table id='outlookholder' border='0' cellspacing='0' cellpadding='0' align='center'><tr><td>
                    <![endif]-->
                    <!--[if (IE)]>
                    <table width='500' align='center' cellpadding='0' cellspacing='0' border='0'>
                        <tr>
                            <td>
                    <![endif]-->
                    <table cellpadding='0' cellspacing='0' align='center' width='100%' border='0' class='container' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;max-width: 500px;margin: 0 auto;text-align: inherit'><tbody><tr style='vertical-align: top'><td width='100%' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'><table cellpadding='0' cellspacing='0' width='100%' bgcolor='transparent' class='block-grid two-up' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;width: 100%;max-width: 500px;color: #333;background-color: transparent'><tbody><tr style='vertical-align: top'><td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;text-align: center;font-size: 0'><!--[if (gte mso 9)|(IE)]><table width='100%' align='center' bgcolor='transparent' cellpadding='0' cellspacing='0' border='0'><tr><![endif]--><!--[if (gte mso 9)|(IE)]><td valign='top' width='250' style='width:250px;'><![endif]--><div class='col num6' style='display: inline-block;vertical-align: top;text-align: center;width: 250px'><table cellpadding='0' cellspacing='0' align='center' width='100%' border='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'><tbody><tr style='vertical-align: top'><td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;padding-top: 20px;padding-right: 0px;padding-bottom: 5px;padding-left: 0px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent'><table cellpadding='0' cellspacing='0' width='100%' border='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
    <tbody><tr style='vertical-align: top'>
        <td align='center' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;width: 100%'>
            <div align='center' style='font-size:12px'>
                <a href='https://beefree.io' target='_blank'>
                    <img class='center' align='center' border='0' src='../img/user/jasa.png' alt='Image' title='Image' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block;border: none;height: auto;line-height: 100%;margin: 0 auto;float: none;width: 100% !important;max-width: 191px' width='191'>
                </a>

            </div>
        </td>
    </tr>
</tbody></table>
</td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td><![endif]--><!--[if (gte mso 9)|(IE)]><td valign='top' width='250' style='width:250px;'><![endif]--><div class='col num6' style='display: inline-block;vertical-align: top;text-align: center;width: 250px'><table cellpadding='0' cellspacing='0' align='center' width='100%' border='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'><tbody><tr style='vertical-align: top'><td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;padding-top: 20px;padding-right: 0px;padding-bottom: 20px;padding-left: 0px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent'><table width='100%' border='0' cellspacing='0' cellpadding='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
  <tbody><tr style='vertical-align: top'>
    <td align='center' valign='top' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
      <table border='0' cellspacing='0' cellpadding='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
        <tbody><tr style='vertical-align: top'>
          <td align='center' valign='top' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;text-align: center;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px;max-width: 151px'>

            <!--[if (gte mso 9)|(IE)]>
            <table width='141' align='left' border='0' cellspacing='0' cellpadding='0'>
              <tr>
                <td align='left'>
            <![endif]-->
            <table width='100%' align='left' cellpadding='0' cellspacing='0' border='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
              <tbody><tr style='vertical-align: top'>
                <td align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>


                  <table align='left' border='0' cellspacing='0' cellpadding='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;padding: 0 5px 5px 0' height='37'>
                    <tbody><tr style='vertical-align: top'>
                      <td width='37' align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
                        <a href='https://www.facebook.com/' title='Facebook' target='_blank'>
                          <img src='../img/user/facebook@2x.png' alt='Facebook' title='Facebook' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block;border: none;height: auto;line-height: 100%;max-width: 32px !important'>
                        </a>
                      </td>
                    </tr>
                  </tbody></table>
                  <table align='left' border='0' cellspacing='0' cellpadding='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;padding: 0 5px 5px 0' height='37'>
                    <tbody><tr style='vertical-align: top'>
                      <td width='37' align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
                        <a href='https://twitter.com/' title='Twitter' target='_blank'>
                          <img src='../img/user/twitter@2x.png' alt='Twitter' title='Twitter' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block;border: none;height: auto;line-height: 100%;max-width: 32px !important'>
                        </a>
                      </td>
                    </tr>
                  </tbody></table>
                  <table align='left' border='0' cellspacing='0' cellpadding='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;padding: 0 5px 5px 0' height='37'>
                    <tbody><tr style='vertical-align: top'>
                      <td width='37' align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
                        <a href='https://plus.google.com/' title='Google+' target='_blank'>
                          <img src='../img/user/googleplus@2x.png' alt='Google+' title='Google+' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block;border: none;height: auto;line-height: 100%;max-width: 32px !important'>
                        </a>
                      </td>
                    </tr>
                  </tbody></table>

                </td>
              </tr>
            </tbody></table>
            <!--[if (gte mso 9)|(IE)]>
                </td>
              </tr>
            </table>
            <![endif]-->
          </td>
        </tr>
      </tbody></table>
    </td>
  </tr>
</tbody></table>
</td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td><![endif]--><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr></tbody></table></td></tr></tbody></table>
                    <!--[if mso]>
                    </td></tr></table>
                    <![endif]-->
                    <!--[if (IE)]>
                    </td></tr></table>
                    <![endif]-->
                  </td>
                </tr>
              </tbody></table>
              <table cellpadding='0' cellspacing='0' align='center' width='100%' border='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
                <tbody><tr style='vertical-align: top'>
                  <td width='100%' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: #323341'>
                    <!--[if gte mso 9]>
                    <table id='outlookholder' border='0' cellspacing='0' cellpadding='0' align='center'><tr><td>
                    <![endif]-->
                    <!--[if (IE)]>
                    <table width='500' align='center' cellpadding='0' cellspacing='0' border='0'>
                        <tr>
                            <td>
                    <![endif]-->
                    <table cellpadding='0' cellspacing='0' align='center' width='100%' border='0' class='container' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;max-width: 500px;margin: 0 auto;text-align: inherit'><tbody><tr style='vertical-align: top'><td width='100%' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'><table cellpadding='0' cellspacing='0' width='100%' bgcolor='transparent' class='block-grid ' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;width: 100%;max-width: 500px;color: #000000;background-color: transparent'><tbody><tr style='vertical-align: top'><td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;text-align: center;font-size: 0'><!--[if (gte mso 9)|(IE)]><table width='100%' align='center' bgcolor='transparent' cellpadding='0' cellspacing='0' border='0'><tr><![endif]--><!--[if (gte mso 9)|(IE)]><td valign='top' width='500' style='width:500px;'><![endif]--><div class='col num12' style='display: inline-block;vertical-align: top;width: 100%'><table cellpadding='0' cellspacing='0' align='center' width='100%' border='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'><tbody><tr style='vertical-align: top'><td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent'><table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
  <tbody><tr style='vertical-align: top'>
    <td align='center' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px'>
      <div style='height: 10px;'>
        <table align='center' border='0' cellspacing='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;border-top: 10px solid transparent;width: 100%'><tbody><tr style='vertical-align: top'><td align='center' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'></td></tr></tbody></table>
      </div>
    </td>
  </tr>
</tbody></table>
<table cellpadding='0' cellspacing='0' width='100%' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
  <tbody><tr style='vertical-align: top'>
    <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 30px;padding-right: 0px;padding-bottom: 30px;padding-left: 0px'>
      <div style='color:#ffffff;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;'>
      	<div style='font-size:14px;line-height:17px;text-align:center;color:#ffffff;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;'><p style='margin: 0;font-size: 14px;line-height: 17px;text-align: center'><strong><span style='font-size: 28px; line-height: 33px;'>Introducing Hackister2</span></strong></p></div>
      </div>
    </td>
  </tr>
</tbody></table>
<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
  <tbody><tr style='vertical-align: top'>
    <td align='center' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px'>
      <div style='height: 10px;'>
        <table align='center' border='0' cellspacing='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;border-top: 10px solid transparent;width: 100%'><tbody><tr style='vertical-align: top'><td align='center' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'></td></tr></tbody></table>
      </div>
    </td>
  </tr>
</tbody></table>
<table cellpadding='0' cellspacing='0' width='100%' border='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
    <tbody><tr style='vertical-align: top'>
        <td align='center' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;width: 100%'>
            <div align='center' style='font-size:12px'>
                <a href='https://beefree.io' target='_blank'>
                    <img class='center' align='center' border='0' src='../img/user/bee_rocket.png' alt='Image' title='Image' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block;border: none;height: auto;line-height: 100%;margin: 0 auto;float: none;width: 100% !important;max-width: 402px' width='402'>
                </a>

            </div>
        </td>
    </tr>
</tbody></table>
</td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td><![endif]--><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr></tbody></table></td></tr></tbody></table>
                    <!--[if mso]>
                    </td></tr></table>
                    <![endif]-->
                    <!--[if (IE)]>
                    </td></tr></table>
                    <![endif]-->
                  </td>
                </tr>
              </tbody></table>
              <table cellpadding='0' cellspacing='0' align='center' width='100%' border='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
                <tbody><tr style='vertical-align: top'>
                  <td width='100%' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: #61626F'>
                    <!--[if gte mso 9]>
                    <table id='outlookholder' border='0' cellspacing='0' cellpadding='0' align='center'><tr><td>
                    <![endif]-->
                    <!--[if (IE)]>
                    <table width='500' align='center' cellpadding='0' cellspacing='0' border='0'>
                        <tr>
                            <td>
                    <![endif]-->
                    <table cellpadding='0' cellspacing='0' align='center' width='100%' border='0' class='container' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;max-width: 500px;margin: 0 auto;text-align: inherit'><tbody><tr style='vertical-align: top'><td width='100%' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'><table cellpadding='0' cellspacing='0' width='100%' bgcolor='transparent' class='block-grid ' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;width: 100%;max-width: 500px;color: #333;background-color: transparent'><tbody><tr style='vertical-align: top'><td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;text-align: center;font-size: 0'><!--[if (gte mso 9)|(IE)]><table width='100%' align='center' bgcolor='transparent' cellpadding='0' cellspacing='0' border='0'><tr><![endif]--><!--[if (gte mso 9)|(IE)]><td valign='top' width='500' style='width:500px;'><![endif]--><div class='col num12' style='display: inline-block;vertical-align: top;width: 100%'><table cellpadding='0' cellspacing='0' align='center' width='100%' border='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'><tbody><tr style='vertical-align: top'><td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;padding-top: 30px;padding-right: 0px;padding-bottom: 30px;padding-left: 0px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent'><table cellpadding='0' cellspacing='0' width='100%' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
  <tbody><tr style='vertical-align: top'>
    <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 25px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px'>
      <div style='color:#ffffff;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;'>
      	<div style='font-size:18px;line-height:22px;text-align:center;color:#ffffff;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;'><p style='margin: 0;font-size: 18px;line-height: 22px;text-align: center'><span style='font-size: 24px; line-height: 28px;'><strong>The fake app for real-time collaboration</strong></span></p></div>
      </div>
    </td>
  </tr>
</tbody></table>
<table cellpadding='0' cellspacing='0' width='100%' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
  <tbody><tr style='vertical-align: top'>
    <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 0px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px'>
      <div style='color:#B8B8C0;line-height:150%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;'>
      	<div style='font-size:14px;line-height:21px;text-align:center;color:#B8B8C0;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;'><p style='margin: 0;font-size: 14px;line-height: 21px;text-align: center'><span style='font-size: 14px; line-height: 21px;'>Aenean eu leo quam. Pellentesque ornare sem </span></p></div><div style='font-size:14px;line-height:21px;text-align:center;color:#B8B8C0;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;'><p style='margin: 0;font-size: 14px;line-height: 21px;text-align: center'><span style='font-size: 14px; line-height: 21px;'>lacinia quam venenatis vestibulum. </span></p></div><div style='font-size:14px;line-height:21px;text-align:center;color:#B8B8C0;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;'><p style='margin: 0;font-size: 14px;line-height: 21px;text-align: center'><span style='font-size: 14px; line-height: 21px;'>Donec sed odio dui.</span></p></div>
      </div>
    </td>
  </tr>
</tbody></table>
<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
  <tbody><tr style='vertical-align: top'>
    <td align='center' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px'>
      <div style='height: 0px;'>
        <table align='center' border='0' cellspacing='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;border-top: 0px solid transparent;width: 100%'><tbody><tr style='vertical-align: top'><td align='center' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'></td></tr></tbody></table>
      </div>
    </td>
  </tr>
</tbody></table>
</td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td><![endif]--><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr></tbody></table></td></tr></tbody></table>
                    <!--[if mso]>
                    </td></tr></table>
                    <![endif]-->
                    <!--[if (IE)]>
                    </td></tr></table>
                    <![endif]-->
                  </td>
                </tr>
              </tbody></table>
              <table cellpadding='0' cellspacing='0' align='center' width='100%' border='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
                <tbody><tr style='vertical-align: top'>
                  <td width='100%' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: #ffffff'>
                    <!--[if gte mso 9]>
                    <table id='outlookholder' border='0' cellspacing='0' cellpadding='0' align='center'><tr><td>
                    <![endif]-->
                    <!--[if (IE)]>
                    <table width='500' align='center' cellpadding='0' cellspacing='0' border='0'>
                        <tr>
                            <td>
                    <![endif]-->
                    <table cellpadding='0' cellspacing='0' align='center' width='100%' border='0' class='container' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;max-width: 500px;margin: 0 auto;text-align: inherit'><tbody><tr style='vertical-align: top'><td width='100%' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'><table cellpadding='0' cellspacing='0' width='100%' bgcolor='transparent' class='block-grid ' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;width: 100%;max-width: 500px;color: #333;background-color: transparent'><tbody><tr style='vertical-align: top'><td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;text-align: center;font-size: 0'><!--[if (gte mso 9)|(IE)]><table width='100%' align='center' bgcolor='transparent' cellpadding='0' cellspacing='0' border='0'><tr><![endif]--><!--[if (gte mso 9)|(IE)]><td valign='top' width='500' style='width:500px;'><![endif]--><div class='col num12' style='display: inline-block;vertical-align: top;width: 100%'><table cellpadding='0' cellspacing='0' align='center' width='100%' border='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'><tbody><tr style='vertical-align: top'><td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;padding-top: 30px;padding-right: 0px;padding-bottom: 30px;padding-left: 0px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent'><table width='100%' border='0' cellspacing='0' cellpadding='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
  <tbody><tr style='vertical-align: top'>
    <td align='center' valign='top' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
      <table border='0' cellspacing='0' cellpadding='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
        <tbody><tr style='vertical-align: top'>
          <td align='center' valign='top' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;text-align: center;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px;max-width: 151px'>

            <!--[if (gte mso 9)|(IE)]>
            <table width='141' align='left' border='0' cellspacing='0' cellpadding='0'>
              <tr>
                <td align='left'>
            <![endif]-->
            <table width='100%' align='left' cellpadding='0' cellspacing='0' border='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
              <tbody><tr style='vertical-align: top'>
                <td align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>


                  <table align='left' border='0' cellspacing='0' cellpadding='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;padding: 0 5px 0 0' height='37'>
                    <tbody><tr style='vertical-align: top'>
                      <td width='37' align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
                        <a href='https://www.facebook.com/' title='Facebook' target='_blank'>
                          <img src='../img/user/facebook.png' alt='Facebook' title='Facebook' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block;border: none;height: auto;line-height: 100%;max-width: 32px !important'>
                        </a>
                      </td>
                    </tr>
                  </tbody></table>
                  <table align='left' border='0' cellspacing='0' cellpadding='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;padding: 0 5px 0 0' height='37'>
                    <tbody><tr style='vertical-align: top'>
                      <td width='37' align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
                        <a href='http://twitter.com/' title='Twitter' target='_blank'>
                          <img src='../img/user/twitter.png' alt='Twitter' title='Twitter' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block;border: none;height: auto;line-height: 100%;max-width: 32px !important'>
                        </a>
                      </td>
                    </tr>
                  </tbody></table>
                  <table align='left' border='0' cellspacing='0' cellpadding='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;padding: 0 5px 0 0' height='37'>
                    <tbody><tr style='vertical-align: top'>
                      <td width='37' align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
                        <a href='http://plus.google.com/' title='Google+' target='_blank'>
                          <img src='../img/user/googleplus.png' alt='Google+' title='Google+' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block;border: none;height: auto;line-height: 100%;max-width: 32px !important'>
                        </a>
                      </td>
                    </tr>
                  </tbody></table>

                </td>
              </tr>
            </tbody></table>
            <!--[if (gte mso 9)|(IE)]>
                </td>
              </tr>
            </table>
            <![endif]-->
          </td>
        </tr>
      </tbody></table>
    </td>
  </tr>
</tbody></table>
<table width='100%' border='0' cellspacing='0' cellpadding='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
  <tbody><tr style='vertical-align: top'>
    <td class='button-container' align='center' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px'>
      <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
        <tbody><tr style='vertical-align: top'>
          <td width='100%' class='button' align='center' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
            <!--[if mso]>
              <v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='' style='height:34px;   v-text-anchor:middle; width:135px;' arcsize='59%'   strokecolor='#CB1818'   fillcolor='#CB1818' >
              <w:anchorlock/>
                <center style='color:#ffffff; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:14px;'>
            <![endif]-->
            <!--[if !mso]><!-- -->
            <div align='center' style='display: inline-block; border-radius: 20px; -webkit-border-radius: 20px; -moz-border-radius: 20px; max-width: 100%; width: auto; border-top: 0px solid transparent; border-right: 0px solid transparent; border-bottom: 0px solid transparent; border-left: 0px solid transparent;'>
              <table width='100%' border='0' cellspacing='0' cellpadding='0' style='border-spacing: 0;border-collapse: collapse;vertical-align: top;height: 34'>
                <tbody><tr style='vertical-align: top'><td valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;border-radius: 20px; -webkit-border-radius: 20px; -moz-border-radius: 20px; color: #ffffff; background-color: #CB1818; padding-top: 5px; padding-right: 20px; padding-bottom: 5px; padding-left: 20px; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align: center'>
            <!--<![endif]-->
                  <a href='' target='_blank' style='display: inline-block;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;background-color: #CB1818;color: #ffffff'> <span style='font-size:12px;line-height:24px;'>Unsubscribe</span>
                  </a>
              <!--[if !mso]><!-- -->
                </td></tr></tbody></table>
              </div><!--<![endif]-->
              <!--[if mso]>
                    </center>
                </v:roundrect>
              <![endif]-->
          </td>
        </tr>
      </tbody></table>
    </td>
  </tr>
</tbody></table>
<table cellpadding='0' cellspacing='0' width='100%' style='border-spacing: 0;border-collapse: collapse;vertical-align: top'>
  <tbody><tr style='vertical-align: top'>
    <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 15px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px'>
      <div style='color:#959595;line-height:150%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;'>
      	<div style='font-size:14px;line-height:21px;text-align:center;color:#959595;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;'><p style='margin: 0;font-size: 14px;line-height: 21px;text-align: center'>This is a sample template from <strong>BEE free email editor </strong></p></div><div style='font-size:14px;line-height:21px;text-align:center;color:#959595;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;'><p style='margin: 0;font-size: 14px;line-height: 21px;text-align: center'>Visit <span style='text-decoration: underline; font-size: 14px; line-height: 21px;'><a style='color:#C7702E' title='beefree' href='http://beefree.io/' target='_blank'>beefree.io</a></span> to create beautiful and rich email messages at no cost.</p></div>
      </div>
    </td>
  </tr>
</tbody></table>
</td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td><![endif]--><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr></tbody></table></td></tr></tbody></table>
                    <!--[if mso]>
                    </td></tr></table>
                    <![endif]-->
                    <!--[if (IE)]>
                    </td></tr></table>
                    <![endif]-->
                  </td>
                </tr>
              </tbody></table>
          </td>
      </tr>
  </tbody></table>


</body></html>";
    
$mail->AltBody    = 'To view the message, please use an HTML compatible email viewer!';

//var_dump($mail);
//exit();
if(!$mail->Send())
{
   echo "Error sending: " . $mail->ErrorInfo;
}
else
{
   echo "Letter is sent";
}
?>