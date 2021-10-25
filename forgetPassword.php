<?php 
include("connect.php");
include("nav.php"); 
session_start();
if(isset($_SESSION['email'])){
echo "<script>window.location.href = 'dash.php'</script>";

}
if($_SERVER["REQUEST_METHOD"]=="POST")
{

    if (isset($_POST['getOtp'])){
        $rnum=rand(100000,1000000);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $user_check_query = "SELECT email FROM login WHERE email='$email'";
        $result = mysqli_query($conn, $user_check_query);
        $row=mysqli_num_rows($result);
        $user = mysqli_fetch_assoc($result);
        
        if ($row>0) { // if user exis  
            // ini_set('display_errors',1);
            // error_reporting( E_ALL );
            // $from="EasyTron@easytron.xyz";
            // $to=$email;
            // $subject="One Time Password";
            // $message="
            // <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            // <html xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office' style='width:100%;font-family:arial, 'helvetica neue', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0'>
            //     <head> 
            //     <meta charset='UTF-8'> 
            //     <meta content='width=device-width, initial-scale=1' name='viewport'> 
            //     <meta name='x-apple-disable-message-reformatting'> 
            //     <meta http-equiv='X-UA-Compatible' content='IE=edge'> 
            //     <meta content='telephone=no' name='format-detection'> 
            //     <title></title> 
            //     <!--[if (mso 16)]>
            //     <style type='text/css'>
            //     a {text-decoration: none;}
            //     </style>
            //     <![endif]--> 
            //     <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--> 
            //     <!--[if gte mso 9]>
            // <xml>
            //     <o:OfficeDocumentSettings>
            //     <o:AllowPNG></o:AllowPNG>
            //     <o:PixelsPerInch>96</o:PixelsPerInch>
            //     </o:OfficeDocumentSettings>
            // </xml>
            // <![endif]--> 
            //     <style type='text/css'>
            // #outlook a {
            //     padding:0;
            // }
            // .ExternalClass {
            //     width:100%;
            // }
            // .ExternalClass,
            // .ExternalClass p,
            // .ExternalClass span,
            // .ExternalClass font,
            // .ExternalClass td,
            // .ExternalClass div {
            //     line-height:100%;
            // }
            // .es-button {
            //     mso-style-priority:100!important;
            //     text-decoration:none!important;
            // }
            // a[x-apple-data-detectors] {
            //     color:inherit!important;
            //     text-decoration:none!important;
            //     font-size:inherit!important;
            //     font-family:inherit!important;
            //     font-weight:inherit!important;
            //     line-height:inherit!important;
            // }
            // .es-desk-hidden {
            //     display:none;
            //     float:left;
            //     overflow:hidden;
            //     width:0;
            //     max-height:0;
            //     line-height:0;
            //     mso-hide:all;
            // }
            // [data-ogsb] .es-button {
            //     border-width:0!important;
            //     padding:10px 20px 10px 20px!important;
            // }
            // @media only screen and (max-device-width:600px) {
            //     .es-content table,
            //     .es-header table,
            //     .es-footer table {
            //         width:100%!important;
            //         max-width:600px!important;
            //     }
            // }
            // @media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150%!important } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120%!important } h1 { font-size:30px!important; text-align:center } h2 { font-size:26px!important; text-align:center } h3 { font-size:20px!important; text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:30px!important } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important } h3 a { text-align:center } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important } .es-menu td a { font-size:16px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:16px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class='gmail-fix'] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button, button.es-button { font-size:20px!important; display:block!important; border-width:10px 20px 10px 20px!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } }
            // </style> 
            //     </head> 
            //     <body style='width:100%;font-family:arial, 'helvetica neue', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0'> 
            //     <div class='es-wrapper-color' style='background-color:#EFEFEF'> 
            //     <!--[if gte mso 9]>
            //             <v:background xmlns:v='urn:schemas-microsoft-com:vml' fill='t'>
            //                 <v:fill type='tile' color='#efefef'></v:fill>
            //             </v:background>
            //         <![endif]--> 
            //     <table class='es-wrapper' width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top'> 
            //         <tr style='border-collapse:collapse'> 
            //         <td valign='top' style='padding:0;Margin:0'> 
            //         <table cellpadding='0' cellspacing='0' class='es-header' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top'> 
            //             <tr style='border-collapse:collapse'> 
            //             <td align='center' style='padding:0;Margin:0'> 
            //             <table class='es-header-body' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#E6EBEF;width:600px'> 
            //                 <tr style='border-collapse:collapse'> 
            //                 <td align='left' style='padding:20px;Margin:0'> 
            //                 <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                     <tr style='border-collapse:collapse'> 
            //                     <td valign='top' align='center' style='padding:0;Margin:0;width:560px'> 
            //                     <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                         <tr style='border-collapse:collapse'> 
            //                         <td align='center' style='padding:0;Margin:0'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:'comic sans ms', 'marker felt-thin', arial, sans-serif;line-height:45px;color:#5e1bee;font-size:30px'><strong>Easy Tron</strong></p></td> 
            //                         </tr> 
            //                     </table></td> 
            //                     </tr> 
            //                 </table></td> 
            //                 </tr> 
            //             </table></td> 
            //             </tr> 
            //         </table> 
            //         <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'> 
            //             <tr style='border-collapse:collapse'> 
            //             <td align='center' style='padding:0;Margin:0'> 
            //             <table class='es-content-body' cellspacing='0' cellpadding='0' bgcolor='#ffffff' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px'> 
            //                 <tr style='border-collapse:collapse'> 
            //                 <td align='left' style='padding:0;Margin:0'> 
            //                 <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                     <tr style='border-collapse:collapse'> 
            //                     <td valign='top' align='center' style='padding:0;Margin:0;width:600px'> 
            //                     <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                         <tr style='border-collapse:collapse'> 
            //                         <td style='padding:0;Margin:0;position:relative' align='center'><a target='_blank' href='https://viewstripo.email/' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#3E8EB8;font-size:14px'><img class='adapt-img' src='https://pmyhem.stripocdn.email/content/guids/bannerImgGuid/images/29201630507327674.png' alt='New features. We provide extensive assistance with any audit issues to modern businesses.' title='New features. We provide extensive assistance with any audit issues to modern businesses.' width='600' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></a></td> 
            //                         </tr> 
            //                     </table></td> 
            //                     </tr> 
            //                 </table></td> 
            //                 </tr> 
            //             </table></td> 
            //             </tr> 
            //         </table> 
            //         <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'> 
            //             <tr style='border-collapse:collapse'> 
            //             <td align='center' style='padding:0;Margin:0'> 
            //             <table class='es-content-body' cellspacing='0' cellpadding='0' bgcolor='#ffffff' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px'> 
            //                 <tr style='border-collapse:collapse'> 
            //                 <td align='left' style='padding:0;Margin:0;padding-left:20px;padding-right:20px;padding-top:30px'> 
            //                 <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                     <tr style='border-collapse:collapse'> 
            //                     <td valign='top' align='center' style='padding:0;Margin:0;width:560px'> 
            //                     <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                         <tr style='border-collapse:collapse'> 
            //                         <td align='center' style='padding:0;Margin:0'><h2 style='Margin:0;line-height:29px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:24px;font-style:normal;font-weight:normal;color:#333333'>One Time Password!</h2></td> 
            //                         </tr> 
            //                     </table></td> 
            //                     </tr> 
            //                 </table></td> 
            //                 </tr> 
            //                 <tr style='border-collapse:collapse'> 
            //                 <td class='esdev-adapt-off' align='left' style='padding:0;Margin:0'> 
            //                 <table class='esdev-mso-table' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:600px'> 
            //                     <tr style='border-collapse:collapse'> 
            //                     <td class='esdev-mso-td' valign='top' style='padding:0;Margin:0'> 
            //                     <table class='es-left' cellspacing='0' cellpadding='0' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left'> 
            //                         <tr style='border-collapse:collapse'> 
            //                         <td class='es-m-p20b' align='left' style='padding:0;Margin:0;width:300px'> 
            //                         <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                             <tr style='border-collapse:collapse'> 
            //                             <td align='right' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px;font-size:0'> 
            //                             <table width='40%' height='100%' cellspacing='0' cellpadding='0' border='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                                 <tr style='border-collapse:collapse'> 
            //                                 <td style='padding:0;Margin:0;border-bottom:3px solid #8598b2;background:#FFFFFF none repeat scroll 0% 0%;height:1px;width:100%;margin:0px'></td> 
            //                                 </tr> 
            //                             </table></td> 
            //                             </tr> 
            //                         </table></td> 
            //                         </tr> 
            //                     </table></td> 
            //                     <td class='esdev-mso-td' valign='top' style='padding:0;Margin:0'> 
            //                     <table class='es-right' cellspacing='0' cellpadding='0' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right'> 
            //                         <tr style='border-collapse:collapse'> 
            //                         <td align='left' style='padding:0;Margin:0;width:300px'> 
            //                         <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                             <tr style='border-collapse:collapse'> 
            //                             <td align='left' style='padding:0;Margin:0;padding-top:5px;padding-bottom:5px;font-size:0'> 
            //                             <table width='40%' height='100%' cellspacing='0' cellpadding='0' border='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                                 <tr style='border-collapse:collapse'> 
            //                                 <td style='padding:0;Margin:0;border-bottom:3px solid #2e3951;background:none 0% 0% repeat scroll #FFFFFF;height:1px;width:100%;margin:0px'></td> 
            //                                 </tr> 
            //                             </table></td> 
            //                             </tr> 
            //                         </table></td> 
            //                         </tr> 
            //                     </table></td> 
            //                     </tr> 
            //                 </table></td> 
            //                 </tr> 
            //                 <tr style='border-collapse:collapse'> 
            //                 <td align='left' style='padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px'> 
            //                 <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                     <tr style='border-collapse:collapse'> 
            //                     <td valign='top' align='center' style='padding:0;Margin:0;width:560px'> 
            //                     <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                         <tr style='border-collapse:collapse'> 
            //                         <td align='center' style='padding:0;Margin:0'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px'>Please&nbsp; don't share otp to any one OTP prevent you from some clever person.</p></td> 
            //                         </tr> 
            //                     </table></td> 
            //                     </tr> 
            //                 </table></td> 
            //                 </tr> 
            //                 <tr class='es-visible-simple-html-only' style='border-collapse:collapse'> 
            //                 <td class='es-struct-html' align='left' style='padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px'> 
            //                 <!--[if mso]><table style='width:560px' cellpadding='0'
            //                             cellspacing='0'><tr><td style='width:71px' valign='top'><![endif]--> 
            //                 <table class='es-left' cellspacing='0' cellpadding='0' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left'> 
            //                     <tr style='border-collapse:collapse'> 
            //                     <td class='es-m-p0r es-m-p20b' valign='top' align='center' style='padding:0;Margin:0;width:71px'> 
            //                     <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                         <tr style='border-collapse:collapse'> 
            //                         <td class='es-m-txt-c' align='left' style='padding:0;Margin:0;font-size:0'><a target='_blank' href='https://viewstripo.email/' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#3E8EB8;font-size:14px'><img src='https://pmyhem.stripocdn.email/content/guids/CABINET_b3156304f6ea49ad12cf8a28ac247f14/images/35521518781111316.png' alt='icon' title='icon' width='71' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></a></td> 
            //                         </tr> 
            //                     </table></td> 
            //                     </tr> 
            //                 </table> 
            //                 <!--[if mso]></td><td style='width:20px'></td><td style='width:469px' valign='top'><![endif]--> 
            //                 <table cellspacing='0' cellpadding='0' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                     <tr style='border-collapse:collapse'> 
            //                     <td align='left' style='padding:0;Margin:0;width:469px'> 
            //                     <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                         <tr style='border-collapse:collapse'> 
            //                         <td class='es-m-txt-c' align='left' style='padding:0;Margin:0;padding-bottom:5px'><h3 style='Margin:0;line-height:22px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:18px;font-style:normal;font-weight:normal;color:#333333'>Your OTP</h3></td> 
            //                         </tr> 
            //                         <tr style='border-collapse:collapse'> 
            //                         <td class='es-m-txt-c' align='left' style='padding:0;Margin:0'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:red;font-size:18px'><h3 style='color:red'>$rnum</h3></p></td> 
            //                         </tr> 
            //                     </table></td> 
            //                     </tr> 
            //                 </table> 
            //                 <!--[if mso]></td></tr></table><![endif]--></td> 
            //                 </tr> 
            //             </table></td> 
            //             </tr> 
            //         </table> 
            //         <table cellpadding='0' cellspacing='0' class='es-footer' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top'> 
            //             <tr style='border-collapse:collapse'> 
            //             <td align='center' style='padding:0;Margin:0'> 
            //             <table class='es-footer-body' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#E6EBEF;width:600px'> 
            //                 <tr style='border-collapse:collapse'> 
            //                 <td align='left' style='Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px'> 
            //                 <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                     <tr style='border-collapse:collapse'> 
            //                     <td valign='top' align='center' style='padding:0;Margin:0;width:560px'> 
            //                     <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                         <tr style='border-collapse:collapse'> 
            //                         <td align='center' style='padding:0;Margin:0;padding-top:10px;padding-left:15px;padding-right:15px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:30px;color:#333333;font-size:20px'>Easy Tron</p><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px'>Elizabeth St, Melbourne, Australia</p></td> 
            //                         </tr> 
            //                         <tr style='border-collapse:collapse'> 
            //                         <td align='center' style='Margin:0;padding-bottom:10px;padding-top:15px;padding-left:15px;padding-right:15px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:20px;color:#333333;font-size:13px'>You are receiving this email because you have visited our site or asked us about regular newsletter.</p><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px'>Vector graphics designed by <a target='_blank' href='https://www.freepik.com/' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2E3951;font-size:14px'>Freepik</a>.<br></p></td> 
            //                         </tr> 
            //                         <tr style='border-collapse:collapse'> 
            //                         <td esdev-links-color='#333333' align='center' class='es-m-txt-c' style='padding:0;Margin:0'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:20px;color:#333333;font-size:13px'><a href=' target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2E3951;font-size:14px' class='unsubscribe'>Unsubscribe</a></p></td> 
            //                         </tr> 
            //                         <tr style='border-collapse:collapse'> 
            //                         <td align='center' style='padding:0;Margin:0;padding-top:15px;font-size:0'> 
            //                         <table class='es-table-not-adapt es-social' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'> 
            //                             <tr style='border-collapse:collapse'> 
            //                             <td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px'><img title='Facebook' src='https://pmyhem.stripocdn.email/content/assets/img/social-icons/logo-black/facebook-logo-black.png' alt='Fb' width='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></td> 
            //                             <td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px'><img title='Twitter' src='https://pmyhem.stripocdn.email/content/assets/img/social-icons/logo-black/twitter-logo-black.png' alt='Tw' width='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></td> 
            //                             <td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px'><img title='Instagram' src='https://pmyhem.stripocdn.email/content/assets/img/social-icons/logo-black/instagram-logo-black.png' alt='Inst' width='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></td> 
            //                             <td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px'><img title='Youtube' src='https://pmyhem.stripocdn.email/content/assets/img/social-icons/logo-black/youtube-logo-black.png' alt='Yt' width='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></td> 
            //                             </tr> 
            //                         </table></td> 
            //                         </tr> 
            //                     </table></td> 
            //                     </tr> 
            //                 </table></td> 
            //                 </tr> 
            //             </table></td> 
            //             </tr> 
            //         </table></td> 
            //         </tr> 
            //     </table> 
            //     </div>  
            //     </body>
            // </html>";
            //     // Always set content-type when sending HTML email
            // $headers = "MIME-Version: 1.0" . "\r\n";
            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // // More headers
            // $headers .= 'From: <EasyTron@easytron.xyz>' . "\r\n";
            // mail($to,$subject,$message,$headers);
            // Storing username in session variable
            echo $rnum;
            $_SESSION['forgetrnum'] = $rnum;
            $_SESSION['forgetemail'] = $email;
        }
    }
    if (isset($_POST['submit'])){
        $otp=(int)$_POST['otp'];
        $otp2=$_SESSION['forgetrnum'];
        if($otp2===$otp)
        {
            echo gettype($otp) . "<br>";
            echo gettype($otp2) . "<br>";
            echo "success";
        }
        else{
            echo '<script type ="text/JavaScript">';  
            echo 'alert("OTP Does not match")';  
            echo '</script>';
        }
        echo gettype($otp) . "<br>";
        echo gettype($otp2) . "<br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    
 
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Sansita:ital@1&display=swap" rel="stylesheet">
<style>
    
    .footer {
	background-color: #39464a;
	color: #ffffff;
	text-align: center;
	font-size: 12px;
	padding: 15px;
	}
    /* For mobile phones: */
    [class*="col-"] {
    width: 100%;
    }
    @media only screen and (min-width: 0px) {
    /* For tablets: */
    
    .container {width: 100%;
    }
    
    }
    @media only screen and (min-width: 600px) {
    /* For tablets: */
    
    .container {width: 45%;
        }
    
    }
    @media only screen and (min-width: 768pix) {
    /* For desktop: */
    
    .container {width: 45%;
       }
  
    
    }
    h2{
        font-family: 'Sansita', sans-serif;
    }
    #img2{
        width: 100%;
        height:10em;
    }
</style>
</head>
<body class="bg-light">
   
    <div class="row p-3">
        
        <div class="container border rounded bg-white ">
        <div class="form p-2 ">     
			<img src="img/log.png" id="img2" alt="Easy Tron Logo" class="text-center border-radius" >

            <h2 class="text-center text-success">Forget Password </h2>
            <form action="forgetPassword.php" method="post">
            
            <div class="form-group">
            <label for="email" class="text-primary">Enter E-mail</label>
            <input type="email" name="email" id="email" class="form-control " value="">
            </div>

            <div class="form-group">
                <label for="otp" class="text-primary">Enter OTP</label>
                <div class="input-group mb-3">
                    <input type="number" id="otp" name="otp" class="form-control" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-danger flex-fill" name="getOtp"  >Get OTP</button>
                    </div>
                </div>
            </div>

            <div class="btn-group d-flex p-3">
            <button class="btn btn-primary flex-fill" name="submit" style="font-family: 'Sansita', sans-serif; font-size:25px;">Submit</button>
            </div>
            </form>
        </div>
        </div>
       
    </div>
	<div class="footer">
    <p>copyright: &copy; 2021 Easy Tron. All right are reserved.</p>
</div>
</script>
</body>
</html>