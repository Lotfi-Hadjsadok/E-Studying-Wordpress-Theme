<?php

namespace Inc\Theme;

class Breadcrumbs
{
    public function __construct()
    {
        add_action('e-breadcrumbs', array($this, 'breadcrumbs_show'));
    }
    public function breadcrumbs_show()
    {
        include PLUGIN_DIR . '/templates/breadcrumbs.php';
    }
}
