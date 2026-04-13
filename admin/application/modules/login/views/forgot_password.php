<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		 <link rel="icon" href="<?php echo site_url('webroot/uploads'); ?>/logo_fab/<?php echo $this->dev['company_fav_icon'];?>" type="image/x-icon" />
	</head>
	<body>
<table width="600" style="border:10px solid rgba(130,130,141,0.44)" cellspacing="0" cellpadding="0" align="center">
   <tbody><tr>
    <td width="600">
      </td></tr><tr>
        <td width="550" valign="top"><table width="550" border="0" cellspacing="0" cellpadding="0" align="center">
          <tbody><tr>
            <td width="198" style="border-bottom:dotted 1px #7ba4c7;padding:10px;text-align:left"><img src="<?php echo site_url('webroot/uploads'); ?>/logo/<?php echo $this->dev['company_logo'];?>" width="183" height="55" alt="<?php echo $this->dev['company_name'];?> Logo" class="CToWUd"></td>
            <td width="352" style="border-bottom:dotted 1px #7ba4c7;font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:10px;color:#666666;text-align:right"><?php echo $this->dev['company_contact_no'];?>
              <br>
			<a href="mailto:<?php echo $this->dev['company_support_emailid'];?>" style="color:#3333cc;text-decoration:none" target="_blank"><?php echo $this->dev['company_support_emailid'];?></a> </td>
          </tr>
          <tr>
            <td colspan="2" style="padding:20px 10px 0;text-align:left;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#838382">Dear , <?php echo $first_name .' '.$last_name;?></td>
          </tr>

          <tr>
            <td colspan="2" style="padding:5px 10px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#838382"><br>
            User Id:  <?php echo $user_email;?> <br/><br/>
            Password: <span style="color:#2E55CC;"><?php echo $random_password;?></span>
           

          </tr><br/>
          <tr>
            <td colspan="2" style="padding:0 0 5px 10px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#838382"> We hope to see you return to the world of <?php echo $this->dev['company_name'];?> very soon!</td>
          </tr>
          <tr>
            <td colspan="2" style="padding:0 0 5px 10px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#838382"> Team <?php echo $this->dev['company_name'];?><span class="HOEnZb"><font color="#888888"><br>
              <a href="<?php echo $this->dev['site_url'];?>" style="color:#3333cc;text-decoration:none" target="_blank"><?php echo $this->dev['site_url'];?></a></font></span></td>
          </tr>
        </tbody></table></td>
      </tr>
    </tbody></table>


	</body>
</html>