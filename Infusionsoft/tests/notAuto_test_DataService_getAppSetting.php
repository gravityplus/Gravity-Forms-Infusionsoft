
<form>
            module: <input type="text" name="module" value="<?php if(isset($_REQUEST['module'])) echo $_REQUEST['module']; ?>"><br/>
            setting: <input type="text" name="setting" value="<?php if(isset($_REQUEST['setting'])) echo $_REQUEST['setting']; ?>"><br/>
    <input type="submit">
<input type="hidden" name="go">
</form>
<?php
include('../infusionsoft.php');
include('testUtils.php');

if(isset($_REQUEST['go'])){
	$out = Infusionsoft_DataService::getAppSetting($_REQUEST['module'], $_REQUEST['setting']);
	var_dump($out);
}