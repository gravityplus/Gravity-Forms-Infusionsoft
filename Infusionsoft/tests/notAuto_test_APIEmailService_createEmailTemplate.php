
<form>
            templateTitle: <input type="text" name="templateTitle" value="<?php if(isset($_REQUEST['templateTitle'])) echo $_REQUEST['templateTitle']; ?>"><br/>
            visibility: <input type="text" name="visibility" value="<?php if(isset($_REQUEST['visibility'])) echo $_REQUEST['visibility']; ?>"><br/>
            fromAddress: <input type="text" name="fromAddress" value="<?php if(isset($_REQUEST['fromAddress'])) echo $_REQUEST['fromAddress']; ?>"><br/>
            toAddress: <input type="text" name="toAddress" value="<?php if(isset($_REQUEST['toAddress'])) echo $_REQUEST['toAddress']; ?>"><br/>
            ccAddresses: <input type="text" name="ccAddresses" value="<?php if(isset($_REQUEST['ccAddresses'])) echo $_REQUEST['ccAddresses']; ?>"><br/>
            bccAddresses: <input type="text" name="bccAddresses" value="<?php if(isset($_REQUEST['bccAddresses'])) echo $_REQUEST['bccAddresses']; ?>"><br/>
            contentType: <input type="text" name="contentType" value="<?php if(isset($_REQUEST['contentType'])) echo $_REQUEST['contentType']; ?>"><br/>
            subject: <input type="text" name="subject" value="<?php if(isset($_REQUEST['subject'])) echo $_REQUEST['subject']; ?>"><br/>
            htmlBody: <input type="text" name="htmlBody" value="<?php if(isset($_REQUEST['htmlBody'])) echo $_REQUEST['htmlBody']; ?>"><br/>
            textBody: <input type="text" name="textBody" value="<?php if(isset($_REQUEST['textBody'])) echo $_REQUEST['textBody']; ?>"><br/>
    <input type="submit">
<input type="hidden" name="go">
</form>
<?php
include('../infusionsoft.php');
include('testUtils.php');

if(isset($_REQUEST['go'])){
	$out = Infusionsoft_APIEmailService::createEmailTemplate($_REQUEST['templateTitle'], $_REQUEST['visibility'], $_REQUEST['fromAddress'], $_REQUEST['toAddress'], $_REQUEST['ccAddresses'], $_REQUEST['bccAddresses'], $_REQUEST['contentType'], $_REQUEST['subject'], $_REQUEST['htmlBody'], $_REQUEST['textBody']);
	var_dump($out);
}