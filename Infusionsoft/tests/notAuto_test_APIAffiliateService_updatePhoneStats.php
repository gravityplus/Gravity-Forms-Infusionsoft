
<form>
            firstName: <input type="text" name="firstName" value="<?php if(isset($_REQUEST['firstName'])) echo $_REQUEST['firstName']; ?>"><br/>
            lastName: <input type="text" name="lastName" value="<?php if(isset($_REQUEST['lastName'])) echo $_REQUEST['lastName']; ?>"><br/>
            calls: <input type="text" name="calls" value="<?php if(isset($_REQUEST['calls'])) echo $_REQUEST['calls']; ?>"><br/>
            totalTime: <input type="text" name="totalTime" value="<?php if(isset($_REQUEST['totalTime'])) echo $_REQUEST['totalTime']; ?>"><br/>
            averageTime: <input type="text" name="averageTime" value="<?php if(isset($_REQUEST['averageTime'])) echo $_REQUEST['averageTime']; ?>"><br/>
    <input type="submit">
<input type="hidden" name="go">
</form>
<?php
include('../infusionsoft.php');
include('testUtils.php');

if(isset($_REQUEST['go'])){
	$out = Infusionsoft_APIAffiliateService::updatePhoneStats($_REQUEST['firstName'], $_REQUEST['lastName'], $_REQUEST['calls'], $_REQUEST['totalTime'], $_REQUEST['averageTime']);
	var_dump($out);
}