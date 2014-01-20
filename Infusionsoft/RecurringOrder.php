<?php
class Infusionsoft_RecurringOrder extends Infusionsoft_Generated_RecurringOrder{
    var $customFieldFormId = -10;
    public function __construct($id = null, $app = null){
    	parent::__construct($id, $app);    	    	
    }

    //Find the Id first order charged for this subscription
    public static function getFirstOrderId ($recurringOrderId) {
        //load recurringOrder
        $recurringOrder = new Infusionsoft_RecurringOrder($recurringOrderId);

        //If there was an originating shopping cart or order form order, that is the first order
        if ($recurringOrder->OriginatingOrderId != 0) {
            return $recurringOrder->OriginatingOrderId;
        } else {
            //find all Orders with a matching JobRecurringId and put them in this array, sorted by date.
            $matchingOrders = Infusionsoft_DataService::queryWithOrderBy(new Infusionsoft_Job(), array('JobRecurringId' => $recurringOrderId),'DateCreated');

            if (!empty($matchingOrders)){
                $earliestMatchingOrder = array_shift($matchingOrders);
                return $earliestMatchingOrder->Id;
            } else {
                return false;
            }

        }
    }

    public static function getSubscriptionFromOrder($orderId){
        try{
            $order = new Infusionsoft_Job($orderId);
            if (!empty($order->JobRecurringId)){
                return new Infusionsoft_RecurringOrder($order->JobRecurringId);
            } else {
                $subscription = Infusionsoft_DataService::query(new Infusionsoft_RecurringOrder(), array('OriginatingOrderId' => $orderId));
                if (!empty($subscription)){
                    return $subscription[0];
                } else {
                    return false;
                }
            }
        } catch (Exception $e){
            CakeLog::write('error', 'getSusbscriptionIdForOrder failed to get the Order! orderId: ' . $orderId);
            return false;
        }
    }
}