
<form>
            invoiceId: <input type="text" name="invoiceId" value="<?php if(isset($_REQUEST['invoiceId'])) echo $_REQUEST['invoiceId']; ?>"><br/>
            notes: <input type="text" name="notes" value="<?php if(isset($_REQUEST['notes'])) echo $_REQUEST['notes']; ?>"><br/>
            creditCardId: <input type="text" name="creditCardId" value="<?php if(isset($_REQUEST['creditCardId'])) echo $_REQUEST['creditCardId']; ?>"><br/>
            merchantAccountId: <input type="text" name="merchantAccountId" value="<?php if(isset($_REQUEST['merchantAccountId'])) echo $_REQUEST['merchantAccountId']; ?>"><br/>
            bypassCommissions: <input type="text" name="bypassCommissions" value="<?php if(isset($_REQUEST['bypassCommissions'])) echo $_REQUEST['bypassCommissions']; ?>"><br/>
    <input type="submit">
<input type="hidden" name="go">
</form>
<?php
include('../infusionsoft.php');
include('testUtils.php');

if(isset($_REQUEST['go'])){
	$out = Infusionsoft_InvoiceService::chargeInvoice($_REQUEST['invoiceId'], $_REQUEST['notes'], $_REQUEST['creditCardId'], $_REQUEST['merchantAccountId'], $_REQUEST['bypassCommissions']);
	var_dump($out);
}