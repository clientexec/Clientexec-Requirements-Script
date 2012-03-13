<?php
    $errors = array();
    $warnings = array();
    
    if ( extension_loaded('ionCube Loader') ) {
        $version = 'ionCube';
    } else if ( extension_loaded('Zend Optimizer') && version_compare(PHP_VERSION, '5.3.0', '>=' ) ) {
        $version = 'Zend-5.3';
    } else if ( extension_loaded('Zend Optimizer') && version_compare(PHP_VERSION, '5.2.0', '>=' ) ) {
        $version = 'Zend-5.2';
    } else {
        $errors[] = 'Unable to find a valid encoding.  Please be sure the ionCube Loader or the Zend Optimizer is installed and configured on your server';
    }
    
    if ( version_compare(PHP_VERSION, '5.2.0', '<') ) {
        $errors[] = 'ClientExec requires you run PHP 5.2.0 or newer.  You are currently running ' . PHP_VERSION;
    }
            
    if ( !function_exists('mysql_connect') ) {
	$errors[] = 'The required PHP extension MySQL could not be found.';
    }
    
    if ( !function_exists('mb_ereg') ) {
	$errors[] = 'The required PHP extension Multibyte String with Regex could not be found.';
    }
    
    if ( !function_exists('gd_info') ) {
        $errors[] = 'The PHP extension GD could not be found.  This is required for report graphs.';
    }
    
    // Warnings
    if ( !extension_loaded('mcrypt') ) {
        $warnings[] = 'The PHP extension mcrypt could not be found.  You will not be able to encrypt hosting passwords, or store Credit Card information.';
    }
    
    if ( !function_exists('curl_init') ) {
        $warnings[] = 'The PHP extension cURL could not be found.  Some control panel and dashboard plugins require this extension.';
    }
    
    if ( !function_exists('imap_mime_header_decode') ) {
        $warnings[] = 'The PHP extension imap could not be found.  This is required for e-mail fetching and piping to function.';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>ClientExec Requirements</title>
        <style type="text/css">
           .ReadMsgBody{width:100%;}
           .ExternalClass{width:100%;}
        </style>
	</head>
        <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="-webkit-text-size-adjust:none; background-color:#dfdfdf; margin:0; padding:0; width:100% !important;">
    	<center>

        
<div style="background-color:#dfdfdf">
  
  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="width:100%;border:0;margin:0">
    <tbody>
      <tr>
        <td align="center">
          
          <table border="0" bgcolor="#ffffff" cellpadding="0" cellspacing="0" width="660" style="margin:0;background-color:#ffffff;border-width:15px;border-style:solid;border-color:#333;width:660px;border-radius:10px">
            <tbody>
              <tr bgcolor="#333" style="background-color:#333">
                <td align="left">

                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr>
                        <td colspan="7" height="30" style="font-size:0"><img src="https://s3.amazonaws.com/ClientExecEmail/spacer.png" alt="" width="1" height="30" border="0" style="border:0"></td>
                      </tr>
                      <tr>
                        <td width="40" style="font-size:0"><img src="https://s3.amazonaws.com/ClientExecEmail/spacer.png" alt="" width="40" height="1" border="0" style="border:0"></td>
                        <td width="228" style="width:228px"><a href="http://www.clientexec.com/" style="text-decoration:none;position:relative;top:-7px;" target="_blank"><img src="https://s3.amazonaws.com/ClientExecEmail/clientexecheader.png" alt="ClientExec" border="0" style="border:0"></a></td>
                        <td width="30" style="font-size:0"><img src="https://s3.amazonaws.com/ClientExecEmail/spacer.png" alt="" width="30" height="1" border="0" style="border:0"></td>

                        <td valign="middle" style="vertical-align:middle;color:#b3c4a9;font-family:verdana,arial,sans-serif;font-size:12px;font-weight:normal;font-style:normal"><a href="http://www.clientexec.com/?source=newsletter" style="color:#cdcdcd;font-family:verdana,arial,sans-serif;font-size:12px;font-weight:normal;font-style:normal;text-decoration:none" target="_blank">Billing for Smart Companies</a></td>
                        <td width="30" style="font-size:0"><img src="https://s3.amazonaws.com/ClientExecEmail/spacer.png" alt="" width="30" height="1" border="0" style="border:0"></td>

                      </tr>
                      <tr>
                        <td colspan="7" height="20" style="font-size:0"><img src="https://s3.amazonaws.com/ClientExecEmail/spacer.png" alt="" width="1" height="20" border="0" style="border:0"></td>
                      </tr>

                    </tbody>
                  </table>
                </td>
              </tr>
              <tr bgcolor="#ffffff" style="background-color:#ffffff">
                <td align="left">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr>

                        <td colspan="3" height="10" style="font-size:0"><img src="https://s3.amazonaws.com/ClientExecEmail/spacer.png" alt="" width="1" height="10" border="0" style="border:0"></td>
                      </tr>
                      <tr>
                        <td width="40" style="font-size:0"><img src="https://s3.amazonaws.com/ClientExecEmail/spacer.png" alt="" width="40" height="1" border="0" style="border:0"></td>
                        <td style="font-family:verdana,arial,sans-serif;font-size:14px;font-weight:normal;font-style:normal" align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="width:100%;font-family:verdana,arial,sans-serif;font-size:14px;font-weight:normal;font-style:normal">
                            <tbody><tr>
                              <td valign="top" style="color:#4e4e4e;font-family:verdana,arial,sans-serif;font-size:14px;font-weight:normal;font-style:normal;vertical-align:top">
                                  <h2>ClientExec Requirements</h2>
                                  <?php
                                    if ( count($errors) > 0 ) {
                                  ?>
                                  <h3 style="color: red">Requirements Not Met</h3>
                                  <p>The following ClientExec requirements were not met:</p>
                                  <ul>
                                  <?php
                                        foreach ( $errors as $error ) {
                                  ?>
                                  <li><?php echo $error; ?></li>
                                  <?php
                                        }
                                    ?>
                                  </ul>
                                  <?php
                                    }
                                  ?>
                                  
                                  
                                   <?php
                                    if ( count($warnings) > 0 ) {
                                  ?>
                                  <h3 style="color: orange">Requirements Warnings</h3>
                                  <p>Some ClientExec functions will not work properly:</p>
                                  <ul>
                                  <?php
                                        foreach ( $warnings as $warning ) {
                                  ?>
                                  <li><?php echo $warning; ?></li>
                                  <?php
                                        }
                                    ?>
                                  </ul>
                                  <?php
                                    }
                                  ?>
                                  
                                  <?php if ( count($errors) == 0 ) { ?>
                                    <h3 style="color: green">Requirements Met</h3>
                                    <p>Congratulations, your server meets all of the ClientExec requirements.</p>
                                    <p>You should download the <?php echo $version; ?> version of ClientExec.</p>
                                  <?php } ?>
                              </td>
                            </tr>
                          </tbody>
                          </table>
                        </td>
                        <td width="40" style="font-size:0"><img src="https://s3.amazonaws.com/ClientExecEmail/spacer.png" alt="" width="40" height="1" border="0" style="border:0"></td>
                      </tr>                 
                    </tbody>
                  </table>
                </td>
              </tr>             
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="yj6qo"></div><div class="adL">
</div></div>
	
</center>
</body>
</html>