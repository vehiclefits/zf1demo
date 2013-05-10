<?php
class IndexController extends Zend_Controller_Action
{

    function indexAction()
    {
        $this->view->request = $this->getRequest();
    }

    function hasVehicleSelection()
    {
        return !$this->flexibleSearch()->vehicleSelection()->isEmpty();
    }

    function vafProductIds()
    {
        $this->flexibleSearch()->storeFitInSession();
        $productIds = $this->flexibleSearch()->doGetProductIds();
        return $productIds;
    }

    /** @return VF_FlexibleSearch */
    function flexibleSearch()
    {
        $search = new VF_FlexibleSearch(new VF_Schema, $this->getRequest());
        $search->setConfig(Elite_Vaf_Helper_Data::getInstance()->getConfig());
        return $search;
    }
}