<?php

class ServicingController extends \BaseController {

    /**
     * Show index of servicing
     * @return [View] [views/servicing.blade.php]
     */
    public function showIndex()
    {
        return View::make('servicing');
    }

    /**
     * Show shaver servicing info.
     * @return [View] [views/servicing/shavers.blade.php]
     */
    public function showShavers()
    {
        return View::make('servicing.shavers');
    }

    /**
     * Show small appliance servicing info.
     * @return [View] [views/servicing/appliance-repair.blade.php]
     */
    public function showApplianceRepair()
    {
        return View::make('servicing.appliance-repair');
    }

    /**
     * Show warranty servicing info.
     * @return [View] [views/servicing/appliance-repair.blade.php]
     */
    public function showWarranty()
    {
        return View::make('servicing.warranty');
    }

    /**
     * Show battery change info.
     * @return [View] [views/servicing/battery-changes.blade.php]
     */
    public function showBatteryChanges()
    {
        return View::make('servicing.battery-changes');
    }

}