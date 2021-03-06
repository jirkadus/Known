<?php

    namespace IdnoPlugins\IndiePub {

        class Main extends \Idno\Common\Plugin {
            function registerPages() {

                \Idno\Core\Idno::site()->addPageHandler('/indieauth/callback/?', '\IdnoPlugins\IndiePub\Pages\IndieAuth\Callback',true);
                \Idno\Core\Idno::site()->addPageHandler('/indieauth/token/?', '\IdnoPlugins\IndiePub\Pages\IndieAuth\Token',true);
                \Idno\Core\Idno::site()->addPageHandler('/micropub/endpoint/?', '\IdnoPlugins\IndiePub\Pages\MicroPub\Endpoint',true);
                \Idno\Core\Idno::site()->template()->extendTemplate('shell/head','indiepub/shell/head');

                header('Link: <https://indieauth.com/auth>; rel="authorization_endpoint"');
                header('Link: <'.\Idno\Core\Idno::site()->config()->getURL().'indieauth/token>; rel="token_endpoint"');
                header('Link: <'.\Idno\Core\Idno::site()->config()->getURL().'micropub/endpoint>; rel="micropub"');
            }
        }

    }