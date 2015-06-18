<?php
/**
* This interface is the start for any one that wishes to join in the use of our modules.
* - Checkout
* - Label Generation
*  - Delivery
*  - Returns
* - Track and Trace
* - ...
* 
* @author     Michiel Van Gucht
* @version    0.0.1
* @copyright  2015 Michiel Van Gucht
* @license    LGPL
*/

interface dpdLibraryInterface {
  /**
  * Get the configuration fields needed for the library/api to work.
  * eg: 
  *   Delicom API needs delisID, password
  *   Cloud services need different tokens.
  * These configuration fields will be show in the modules configuration
  * @return dpdConfiguration[]
  */
  public function getConfiguration();
  
  /**
  * Get the service that the shipper can use
  * eg: Classic, Predict, Pickup ...
  * These services will define what is visible in the checkout
  * @return dpdService[]
  */
  public function getService();
  
  /**
  * Get a list of parcelshops close to a given location.
  * This function should use the address details or the geolocation from the dpdLocation object.
  * TIP: If possible map the address to geolocation for an optimal location lookup.
  * @param dpdLocation $location location to look up.
  * @param integer $limit the maximum amount of shops to return
  * @return dpdShop[] 
  */
  public function getShops(dpdLocation $location, int $limit);
  
  /**
  * Get label(s) for a single order.
  * 
  * @param dpdOrder $order order details te be used.
  * @return dpdLabel
  */
  public function getLabel(dpdOrder $order);
  
  /**
  * Get labels for multiple orders.
  * 
  * @param dpdOrder[] $order an array of dpdOrder objects.
  * @return dpdLabel[]
  */
  public function getLabels(array $orders);
  
  /**
  * Get T&T for a Label/Label Number
  * 
  * @param dpdLabel $label
  * @return dpdTracking
  */
  public function getInfo(dpdLabel $label);
}
