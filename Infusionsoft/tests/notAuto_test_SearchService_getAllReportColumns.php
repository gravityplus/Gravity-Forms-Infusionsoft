<form>
    savedSearchId: <input type="text" name="savedSearchId" value="<?php if(isset($_REQUEST['savedSearchId'])) echo htmlentities($_REQUEST['savedSearchId']); ?>"><br/>
    userId: <input type="text" name="userId" value="<?php if(isset($_REQUEST['userId'])) echo htmlentities($_REQUEST['userId']); ?>"><br/>
    <input type="submit">
<input type="hidden" name="go">
</form>
<?php
include('../infusionsoft.php');
include('testUtils.php');

if(isset($_REQUEST['go'])){
	$out = Infusionsoft_SearchService::getAllReportColumns($_REQUEST['savedSearchId'], $_REQUEST['userId']);
	var_dump($out);
}