
<form>
            contactId: <input type="text" name="contactId" value="<?php if(isset($_REQUEST['contactId'])) echo $_REQUEST['contactId']; ?>"><br/>
            campaignId: <input type="text" name="campaignId" value="<?php if(isset($_REQUEST['campaignId'])) echo $_REQUEST['campaignId']; ?>"><br/>
    <input type="submit">
<input type="hidden" name="go">
</form>
<?php
include('../infusionsoft.php');
include('testUtils.php');

if(isset($_REQUEST['go'])){
	$out = Infusionsoft_ContactService::getCampaigneeDetails($_REQUEST['contactId'], $_REQUEST['campaignId']);
	var_dump($out);
}