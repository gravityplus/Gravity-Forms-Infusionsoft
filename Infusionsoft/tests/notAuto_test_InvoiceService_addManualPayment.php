
<form>
            invoiceId: <input type="text" name="invoiceId" value="<?php if(isset($_REQUEST['invoiceId'])) echo $_REQUEST['invoiceId']; ?>"><br/>
            amt: <input type="text" name="amt" value="<?php if(isset($_REQUEST['amt'])) echo $_REQUEST['amt']; ?>"><br/>
            paymentDate: <input type="text" name="paymentDate" value="<?php if(isset($_REQUEST['paymentDate'])) echo $_REQUEST['paymentDate']; ?>"><br/>
            paymentType: <input type="text" name="paymentType" value="<?php if(isset($_REQUEST['paymentType'])) echo $_REQUEST['paymentType']; ?>"><br/>
            paymentDescription: <input type="text" name="paymentDescription" value="<?php if(isset($_REQUEST['paymentDescription'])) echo $_REQUEST['paymentDescription']; ?>"><br/>
            bypassCommissions: <input type="text" name="bypassCommissions" value="<?php if(isset($_REQUEST['bypassCommissions'])) echo $_REQUEST['bypassCommissions']; ?>"><br/>
    <input type="submit">
<input type="hidden" name="go">
</form>
<?php
include('../infusionsoft.php');
include('testUtils.php');

if(isset($_REQUEST['go'])){
	$out = Infusionsoft_InvoiceService::addManualPayment($_REQUEST['invoiceId'], $_REQUEST['amt'], $_REQUEST['paymentDate'], $_REQUEST['paymentType'], $_REQUEST['paymentDescription'], $_REQUEST['bypassCommissions']);
	var_dump($out);
}