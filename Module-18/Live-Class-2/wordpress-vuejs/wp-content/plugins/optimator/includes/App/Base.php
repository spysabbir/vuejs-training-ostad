<?php

namespace Engramium\Optimator\App;

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;

/**
 * Application base class
 *
 * @author sayedulsayem
 * @since 1.0.0
 */
class Base {

    use \Engramium\Optimator\Traits\Singleton;

    /**
     * initialization function
     *
     * @return void
     * @since 1.0.0
     */
    public function init() {
        RegisterAssets::instance()->init();
        AjaxHandler::instance()->init();
        QuickToggle\GeneralManager::instance()->init();
        QuickToggle\MediaManager::instance()->init();
    }
}