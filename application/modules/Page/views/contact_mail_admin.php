<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Thank You For Query</title>
  <style>
    body{background: aliceblue;font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;color: #777777;}
    *{margin: 0;padding: 0;}
    a{text-decoration: none !important;}
    .maintable{width: 100%;max-width: 700px;background: #ffffff;margin:30px auto;border:1px solid #dddddd;padding: 1px;}
    .maintable td,.maintable th{border: 1px solid #dddddd;padding: 10px;}
    .maintable table td{border:none;padding: 0px;}
    .mk-brand {
          height: initial;
          min-height: 00px;
          max-height: 100px;
          display: block;
          padding-top: 3px;
          padding-bottom: 3px;
          margin-top: 10px;
          text-align: left;
      }
      .firsthalftext {
          font-size: 30px;
          font-weight: bold;
          color: #F44336;
      }
      .secondhalftext {
          font-size: 30px;
          color: #004175;
          font-weight: bold;
      }
  </style>
</head>
<body>
  <table class="maintable" border="1" cellpadding="10">
    <tbody>
      <tr>
        <th style="width: 50%; vertical-align: top;">
		  <a class="mk-brand" href="<?php echo base_url();?>">
			<?php if($this->website['data']->logo_status=='Logo'){?>
			<img src="<?php echo base_url('admin/webroot/uploads/logo/'.$this->website['data']->company_logo.'');?>" alt="<?php echo $this->website['data']->company_name;?> Logo" class="logo-img">
			<?php }else{
			 $companyname=$this->website['data']->company_name;
			 $LogName= explode(" ",$companyname);?>
			<span class="firsthalftext"><?php echo $LogName[0]; ?></span><span class="secondhalftext"><?php echo $LogName[1]; ?></span>
			<?php } ?>
		</a>
        </th>
        <th style="width: 50%; vertical-align: top;">
          <p style="text-align:right; margin-bottom: 5px; font-weight: normal;font-size: 14px;"><a href="tel:<?php echo $this->website['data']->support_contact?>"><?php echo $this->website['data']->support_contact;?></a></p>
          <p style="text-align:right; margin-bottom: 5px; font-weight: normal;font-size: 14px;"><a href="mailto:<?php echo $this->website['data']->support_email?>"><?php echo $this->website['data']->support_email;?></a></p>
          <p style="text-align:right; margin-bottom: 5px; font-weight: normal;font-size: 14px;"><?php echo $this->website['data']->footer_address; ?></p>
        </th>
      </tr>
      <tr>
        <td colspan="12">
          <p style="font-size: 16px; color: #000000; line-height: 24px;" class="adminmessege"> Hi, <b><?php echo $this->website['data']->company_name; ?>,</b> <br>
            Mr./Mrs./Ms. <b><?php echo $_POST['cname']; ?></b> has sent query to you. <br>
            Please find the details below.
          </p>
        </td>
      </tr>
      <tr>
        <td><b>Name</b></td>
        <td><?php echo $_POST['cname']; ?></td>
      </tr>
      <tr>
        <td><b>Phone No.</b></td>
        <td>+91 <?php echo $_POST['cnumber']; ?></td>
      </tr>
      <tr>
        <td><b>Email ID</b></td>
        <td><?php echo $_POST['cemail']; ?></td>
      </tr>
      <tr>
        <td><b>Subject</b></td>
        <td><?php echo $_POST['csubject']; ?></td>
      </tr>
      <tr>
        <td colspan="12">
          <table style="width: 100%;">
            <tr>
              <td style="display: block; width: 100%; margin-bottom: 10px;"><b>Message</b></td>
        <td style="display: block; width: 100%;"><p><?php echo $_POST['cmessage']; ?></p></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="12" style="text-align: center;">for more information visit <a href="<?php echo site_url();?>"><?php echo site_url();?></a></td>
      </tr>
    </tbody>
  </table>
</body>
</html>