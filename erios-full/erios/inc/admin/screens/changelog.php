<?php
/**
 * @var Erios_Theme_Admin $this
 */

$this->get_tab_menu( 'changelog' );
?>

<div class="opal-wrap">
    <div class="container">
        <div class="row mt-30">
            <div class="col">
                <div class="theme-log box-shadow">
                    <div class="theme-log-header">
                        <h2 class="log-title"><?php esc_html_e( 'Theme Update Log', 'erios' ); ?></h2>
                    </div>
                    <div class="theme-log-content">
                        <div class="log-list">
                            <strong>Version: 1.0.0</strong><span class="log-date">29, Dec 2019</span>
                            <ul>
                                <li><span class="label-update">update</span>Released 1.0.0</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
