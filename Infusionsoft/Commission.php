<?php
/**
 * Created by JetBrains PhpStorm.
 * User: prescott
 * Date: 5/3/13
 * Time: 12:42 PM
 * To change this template use File | Settings | File Templates.
 */

class Infusionsoft_Commission extends Infusionsoft_Generated_Base {

    protected static $tableFields = array(
        "ContactLastName",
        "SoldByLastName",
        "Description",
        "ContactFirstName",
        "AmtEarned",
        "InvoiceId",
        "ProductName",
        "ContactId",
        "SoldByFirstName",
        "DateEarned",
        "SaleAffId"
    );

    //Commissions don't actually have ids in Infusionsoft, so $idString is i of the form $affId/$date/$index
    public function __construct($idString = null, $app = null){
        $this->table = 'Commission';
        if ($idString != null) {
            $this->load($idString, $app);
        }
    }

    public function getFields(){
        return self::$tableFields;
    }

    public function addCustomField($name){
        self::$tableFields[] = $name;
    }

    public function addCustomFields($fields){
        foreach($fields as $name){
            self::addCustomField($name);
        }
    }

    public function removeField($fieldName){
        $fieldIndex = array_search($fieldName, self::$tableFields);
        if($fieldIndex !== false){
            unset(self::$tableFields[$fieldIndex]);
            self::$tableFields = array_values(self::$tableFields);
        }
    }

    public function save() {
        throw new Infusionsoft_Exception("Commissions cannot be saved");
    }

    public function load($idString, $app = null) {
        //parse $idString
        $idArray = explode('/', $idString);
        $affiliateId = $idArray[0];
        $invoiceId = $idArray[1];

        $dateString = $idArray[2];
        $date = new DateTime($dateString);
        $date->modify('+1 second');
        $dateAndOneSecondString = $date->format('Ymd\TH:i:s');

        $index = $idArray[3];
        $commissions = Infusionsoft_APIAffiliateService::affCommissions($affiliateId, $dateString, $dateAndOneSecondString, $app);

        $commissionsInvoice = array(); //commissions with matching invoice Id
        foreach ($commissions as $commission){
            if ($commission['InvoiceId'] == $invoiceId){
                $commissionsInvoice[] = $commission;
            }
        }

        if ($index >= 0 && $index < count($commissionsInvoice) )
            $this->data = $commissionsInvoice[$index];
        else
            throw new Infusionsoft_Exception("Invalid commission Id");
    }

}