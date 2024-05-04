<?php

namespace Engramium\Optimator\Dashboard;

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;

/**
 * Dashboard base class
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
        AdminMenu::instance()->init();
        Assets::instance()->init();
    }
}