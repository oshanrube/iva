<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = urldecode($pathinfo);

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }
            return array (  '_controller' => 'Acme\\HomeBundle\\Controller\\DefaultController::indexAction',  '_route' => '_welcome',);
        }

        // _demo_login
        if ($pathinfo === '/demo/secured/login') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
        }

        // _security_check
        if ($pathinfo === '/demo/secured/login_check') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
        }

        // _demo_logout
        if ($pathinfo === '/demo/secured/logout') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
        }

        // acme_demo_secured_hello
        if ($pathinfo === '/demo/secured/hello') {
            return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
        }

        // _demo_secured_hello
        if (0 === strpos($pathinfo, '/demo/secured/hello') && preg_match('#^/demo/secured/hello/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',)), array('_route' => '_demo_secured_hello'));
        }

        // _demo_secured_hello_admin
        if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',)), array('_route' => '_demo_secured_hello_admin'));
        }

        if (0 === strpos($pathinfo, '/demo')) {
            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',)), array('_route' => '_demo_hello'));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        // _assetic_5711373
        if ($pathinfo === '/css/5711373.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 5711373,  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_5711373',);
        }

        // _assetic_5711373_0
        if ($pathinfo === '/css/5711373_bootstrap_1.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 5711373,  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_5711373_0',);
        }

        // _assetic_b91db09
        if ($pathinfo === '/css/b91db09.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'b91db09',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_b91db09',);
        }

        // _assetic_b91db09_0
        if ($pathinfo === '/css/b91db09_jquery.mobile-1.0.1.min_1.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'b91db09',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_b91db09_0',);
        }

        // _assetic_b91db09_1
        if ($pathinfo === '/css/b91db09_mobile-styles_2.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'b91db09',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_b91db09_1',);
        }

        // _assetic_b91db09_2
        if ($pathinfo === '/css/b91db09_jquery.mobile.datebox_3.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'b91db09',  'pos' => 2,  '_format' => 'css',  '_route' => '_assetic_b91db09_2',);
        }

        // _assetic_b91db09_3
        if ($pathinfo === '/css/b91db09_iva.min_4.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'b91db09',  'pos' => 3,  '_format' => 'css',  '_route' => '_assetic_b91db09_3',);
        }

        // _assetic_cd2c765
        if ($pathinfo === '/js/cd2c765.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'cd2c765',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_cd2c765',);
        }

        // _assetic_cd2c765_0
        if ($pathinfo === '/js/cd2c765_jquery.mob_1.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'cd2c765',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_cd2c765_0',);
        }

        // _assetic_cd2c765_1
        if ($pathinfo === '/js/cd2c765_jquery.mobile-1.0.1.min_2.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'cd2c765',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_cd2c765_1',);
        }

        // _assetic_cd2c765_2
        if ($pathinfo === '/js/cd2c765_googleMaps.mobile_3.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'cd2c765',  'pos' => 2,  '_format' => 'js',  '_route' => '_assetic_cd2c765_2',);
        }

        // _assetic_cd2c765_3
        if ($pathinfo === '/js/cd2c765_mobile_4.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'cd2c765',  'pos' => 3,  '_format' => 'js',  '_route' => '_assetic_cd2c765_3',);
        }

        // _assetic_cd2c765_4
        if ($pathinfo === '/js/cd2c765_cordova-1.5.0_5.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'cd2c765',  'pos' => 4,  '_format' => 'js',  '_route' => '_assetic_cd2c765_4',);
        }

        // _assetic_cd2c765_5
        if ($pathinfo === '/js/cd2c765_speechrecognizer_6.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'cd2c765',  'pos' => 5,  '_format' => 'js',  '_route' => '_assetic_cd2c765_5',);
        }

        // _assetic_e6261eb
        if ($pathinfo === '/css/e6261eb.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_e6261eb',);
        }

        // _assetic_e6261eb_0
        if ($pathinfo === '/css/e6261eb_layout_1.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_e6261eb_0',);
        }

        // _assetic_e6261eb_1
        if ($pathinfo === '/css/e6261eb_style_2.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_e6261eb_1',);
        }

        // _assetic_e6261eb_2
        if ($pathinfo === '/css/e6261eb_notifications_3.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 2,  '_format' => 'css',  '_route' => '_assetic_e6261eb_2',);
        }

        // _assetic_e6261eb_3
        if ($pathinfo === '/css/e6261eb_slide_4.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 3,  '_format' => 'css',  '_route' => '_assetic_e6261eb_3',);
        }

        // _assetic_e6261eb_4
        if ($pathinfo === '/css/e6261eb_menu_5.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 4,  '_format' => 'css',  '_route' => '_assetic_e6261eb_4',);
        }

        // _assetic_e6261eb_5
        if ($pathinfo === '/css/e6261eb_jquery.mCustomScrollbar_6.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 5,  '_format' => 'css',  '_route' => '_assetic_e6261eb_5',);
        }

        // _assetic_e6261eb_6
        if ($pathinfo === '/css/e6261eb_calendar_7.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 6,  '_format' => 'css',  '_route' => '_assetic_e6261eb_6',);
        }

        // _assetic_e6261eb_7
        if ($pathinfo === '/css/e6261eb_tasks_8.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 7,  '_format' => 'css',  '_route' => '_assetic_e6261eb_7',);
        }

        // _assetic_e6261eb_8
        if ($pathinfo === '/css/e6261eb_weather_9.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 8,  '_format' => 'css',  '_route' => '_assetic_e6261eb_8',);
        }

        // _assetic_e6261eb_9
        if ($pathinfo === '/css/e6261eb_news_10.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 9,  '_format' => 'css',  '_route' => '_assetic_e6261eb_9',);
        }

        // _assetic_e6261eb_10
        if ($pathinfo === '/css/e6261eb_feedback_11.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 10,  '_format' => 'css',  '_route' => '_assetic_e6261eb_10',);
        }

        // _assetic_e6261eb_11
        if ($pathinfo === '/css/e6261eb_jquery.jscrollpane_12.css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 11,  '_format' => 'css',  '_route' => '_assetic_e6261eb_11',);
        }

        // _assetic_1ea6468
        if ($pathinfo === '/js/1ea6468.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_1ea6468',);
        }

        // _assetic_1ea6468_0
        if ($pathinfo === '/js/1ea6468_jquery-1.6_1.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_1ea6468_0',);
        }

        // _assetic_1ea6468_1
        if ($pathinfo === '/js/1ea6468_jquery.jqtransform_2.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_1ea6468_1',);
        }

        // _assetic_1ea6468_2
        if ($pathinfo === '/js/1ea6468_menu_3.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 2,  '_format' => 'js',  '_route' => '_assetic_1ea6468_2',);
        }

        // _assetic_1ea6468_3
        if ($pathinfo === '/js/1ea6468_feedback_4.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 3,  '_format' => 'js',  '_route' => '_assetic_1ea6468_3',);
        }

        // _assetic_1ea6468_4
        if ($pathinfo === '/js/1ea6468_ajax_content_5.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 4,  '_format' => 'js',  '_route' => '_assetic_1ea6468_4',);
        }

        // _assetic_1ea6468_5
        if ($pathinfo === '/js/1ea6468_jquery-ui.min_6.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 5,  '_format' => 'js',  '_route' => '_assetic_1ea6468_5',);
        }

        // _assetic_1ea6468_6
        if ($pathinfo === '/js/1ea6468_jquery.easing.1.3_7.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 6,  '_format' => 'js',  '_route' => '_assetic_1ea6468_6',);
        }

        // _assetic_1ea6468_7
        if ($pathinfo === '/js/1ea6468_jquery.mousewheel.min_8.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 7,  '_format' => 'js',  '_route' => '_assetic_1ea6468_7',);
        }

        // _assetic_1ea6468_8
        if ($pathinfo === '/js/1ea6468_jquery.mousewheel_9.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 8,  '_format' => 'js',  '_route' => '_assetic_1ea6468_8',);
        }

        // _assetic_1ea6468_9
        if ($pathinfo === '/js/1ea6468_jquery.jscrollpane.min_10.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 9,  '_format' => 'js',  '_route' => '_assetic_1ea6468_9',);
        }

        // _assetic_1ea6468_10
        if ($pathinfo === '/js/1ea6468_jquery.form_11.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 10,  '_format' => 'js',  '_route' => '_assetic_1ea6468_10',);
        }

        // _assetic_1ea6468_11
        if ($pathinfo === '/js/1ea6468_slide_12.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 11,  '_format' => 'js',  '_route' => '_assetic_1ea6468_11',);
        }

        // _assetic_1ea6468_12
        if ($pathinfo === '/js/1ea6468_bootstrap-twipsy_13.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 12,  '_format' => 'js',  '_route' => '_assetic_1ea6468_12',);
        }

        // _assetic_1ea6468_13
        if ($pathinfo === '/js/1ea6468_bootstrap-popover_14.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 13,  '_format' => 'js',  '_route' => '_assetic_1ea6468_13',);
        }

        // _assetic_1ea6468_14
        if ($pathinfo === '/js/1ea6468_script_15.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 14,  '_format' => 'js',  '_route' => '_assetic_1ea6468_14',);
        }

        // _assetic_1ea6468_15
        if ($pathinfo === '/js/1ea6468_jquery.vticker-min_16.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 15,  '_format' => 'js',  '_route' => '_assetic_1ea6468_15',);
        }

        // _assetic_197700a
        if ($pathinfo === '/js/197700a.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '197700a',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_197700a',);
        }

        // _assetic_197700a_0
        if ($pathinfo === '/js/197700a_jquery.mCustomScrollbar_1.js') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => '197700a',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_197700a_0',);
        }

        // _wdt
        if (preg_match('#^/_wdt/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+?)\\.txt$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)/search/results$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

        }

        if (0 === strpos($pathinfo, '/_configurator')) {
            // _configurator_home
            if (rtrim($pathinfo, '/') === '/_configurator') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_configurator_home');
                }
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
            }

            // _configurator_step
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

        // AcmeFeedbackBundle_add
        if ($pathinfo === '/feedback/add') {
            return array (  '_controller' => 'Acme\\FeedbackBundle\\Controller\\DefaultController::addAction',  '_route' => 'AcmeFeedbackBundle_add',);
        }

        if (0 === strpos($pathinfo, '/member/learning')) {
            // AcmeLearningBundle_homepage
            if ($pathinfo === '/member/learning/index') {
                return array (  '_controller' => 'Acme\\LearningBundle\\Controller\\MobileController::indexAction',  '_route' => 'AcmeLearningBundle_homepage',);
            }

            // AcmeLearningBundle_learnLocation
            if ($pathinfo === '/member/learning/locations/list') {
                return array (  '_controller' => 'Acme\\LearningBundle\\Controller\\LocationController::listLocationsAction',  '_route' => 'AcmeLearningBundle_learnLocation',);
            }

            // AcmeLearningBundle_addLocation
            if (0 === strpos($pathinfo, '/member/learning/locations/add') && preg_match('#^/member/learning/locations/add(?:/(?P<title>[^/]+?))?$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\LearningBundle\\Controller\\LocationController::addLocationAction',  'title' => '',)), array('_route' => 'AcmeLearningBundle_addLocation'));
            }

            // AcmeLearningBundle_editLocation
            if (0 === strpos($pathinfo, '/member/learning/locations/edit') && preg_match('#^/member/learning/locations/edit/(?P<id>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\LearningBundle\\Controller\\LocationController::editLocationAction',)), array('_route' => 'AcmeLearningBundle_editLocation'));
            }

            // AcmeLearningBundle_learnWeather
            if ($pathinfo === '/member/learning/weather/list') {
                return array (  '_controller' => 'Acme\\LearningBundle\\Controller\\WeatherController::listWeatherAction',  '_route' => 'AcmeLearningBundle_learnWeather',);
            }

            // AcmeLearningBundle_addWeather
            if (0 === strpos($pathinfo, '/member/learning/weather/add') && preg_match('#^/member/learning/weather/add/(?P<id>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\LearningBundle\\Controller\\WeatherController::addWeatherAction',)), array('_route' => 'AcmeLearningBundle_addWeather'));
            }

            // AcmeLearningBundle_learnTravel
            if ($pathinfo === '/member/learning/travel/learn') {
                return array (  '_controller' => 'Acme\\LearningBundle\\Controller\\TravelController::learnAction',  '_route' => 'AcmeLearningBundle_learnTravel',);
            }

            // AcmeLearningBundle_saveTravel
            if ($pathinfo === '/member/learning/travel/save') {
                return array (  '_controller' => 'Acme\\LearningBundle\\Controller\\TravelController::saveAction',  '_route' => 'AcmeLearningBundle_saveTravel',);
            }

        }

        // AcmeScheduleBundle_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\ScheduleBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'AcmeScheduleBundle_homepage'));
        }

        if (0 === strpos($pathinfo, '/mobile')) {
            // AcmeMobileBundle_homepage
            if ($pathinfo === '/mobile/home') {
                return array (  '_controller' => 'Acme\\MobileBundle\\Controller\\DefaultController::indexAction',  '_route' => 'AcmeMobileBundle_homepage',);
            }

            // AcmeMobileBundle_addtask
            if ($pathinfo === '/mobile/addtask') {
                return array (  '_controller' => 'Acme\\MobileBundle\\Controller\\TaskController::addAction',  '_route' => 'AcmeMobileBundle_addtask',);
            }

            // AcmeMobileBundle_viewTodaysTasks
            if ($pathinfo === '/mobile/view/today') {
                return array (  '_controller' => 'Acme\\MobileBundle\\Controller\\TaskController::viewTodaysAction',  '_route' => 'AcmeMobileBundle_viewTodaysTasks',);
            }

            // AcmeMobileBundle_viewTask
            if (0 === strpos($pathinfo, '/mobile/view/today') && preg_match('#^/mobile/view/today/(?P<id>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\MobileBundle\\Controller\\TaskController::viewTaskAction',)), array('_route' => 'AcmeMobileBundle_viewTask'));
            }

            // AcmeMobileBundle_addCalendar
            if ($pathinfo === '/mobile/add/calendar') {
                return array (  '_controller' => 'Acme\\MobileBundle\\Controller\\CalendarController::addAction',  '_route' => 'AcmeMobileBundle_addCalendar',);
            }

            // AcmeMobileBundle_viewCalendars
            if ($pathinfo === '/mobile/view/calendars') {
                return array (  '_controller' => 'Acme\\MobileBundle\\Controller\\CalendarController::browseAction',  '_route' => 'AcmeMobileBundle_viewCalendars',);
            }

            // AcmeMobileBundle_manageCalendars
            if ($pathinfo === '/mobile/manage/calendars') {
                return array (  '_controller' => 'Acme\\MobileBundle\\Controller\\CalendarController::listAction',  '_route' => 'AcmeMobileBundle_manageCalendars',);
            }

            // AcmeMobileBundle_viewCalendar
            if (0 === strpos($pathinfo, '/mobile/view/calendar') && preg_match('#^/mobile/view/calendar/(?P<id>\\d+)(?:/(?P<year>\\d+)(?:/(?P<month>\\d+))?)?$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\MobileBundle\\Controller\\CalendarController::viewCalendarAction',  'year' => NULL,  'month' => NULL,)), array('_route' => 'AcmeMobileBundle_viewCalendar'));
            }

            // AcmeMobileBundle_editCalendar
            if (0 === strpos($pathinfo, '/mobile/edit/calendar') && preg_match('#^/mobile/edit/calendar/(?P<id>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\MobileBundle\\Controller\\CalendarController::editCalendarAction',)), array('_route' => 'AcmeMobileBundle_editCalendar'));
            }

            // AcmeMobileBundle_viewTaskDay
            if (0 === strpos($pathinfo, '/mobile/view/task') && preg_match('#^/mobile/view/task(?:/(?P<year>\\d+)(?:/(?P<month>\\d+)(?:/(?P<day>\\d+))?)?)?$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\MobileBundle\\Controller\\TaskController::viewTaskDayAction',  'year' => NULL,  'month' => NULL,  'day' => NULL,)), array('_route' => 'AcmeMobileBundle_viewTaskDay'));
            }

        }

        // AcmeDashBundle_ajax_panel
        if ($pathinfo === '/member/dash/ajax/panel') {
            return array (  '_controller' => 'Acme\\DashBundle\\Controller\\DefaultController::ajaxAction',  '_route' => 'AcmeDashBundle_ajax_panel',);
        }

        // AcmeEventsBundle_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\EventsBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'AcmeEventsBundle_homepage'));
        }

        if (0 === strpos($pathinfo, '/member')) {
            // AcmeNewsBundl_test
            if ($pathinfo === '/member/news/test') {
                return array (  '_controller' => 'Acme\\NewsBundle\\Controller\\DefaultController::indexAction',  '_route' => 'AcmeNewsBundl_test',);
            }

            // AcmeNewsBundle_ajax_panel
            if ($pathinfo === '/member/news/ajax/panel') {
                return array (  '_controller' => 'Acme\\NewsBundle\\Controller\\DefaultController::ajaxAction',  '_route' => 'AcmeNewsBundle_ajax_panel',);
            }

            // AcmeLocationBundle_homepage
            if (0 === strpos($pathinfo, '/member/hello') && preg_match('#^/member/hello/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\LocationBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'AcmeLocationBundle_homepage'));
            }

            // AcmeCalendarBundle_ajaxcurrentmonth
            if (0 === strpos($pathinfo, '/member/calendar/month/ajax/currentmonth') && preg_match('#^/member/calendar/month/ajax/currentmonth(?:/(?P<year>[^/]+?)(?:/(?P<month>[^/]+?))?)?$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxMonthAction',  'year' => 2011,  'month' => 1,  'nav' => 'currentMonth',)), array('_route' => 'AcmeCalendarBundle_ajaxcurrentmonth'));
            }

            // AcmeCalendarBundle_ajaxnextmonth
            if (0 === strpos($pathinfo, '/member/calendar/month/ajax/nextmonth') && preg_match('#^/member/calendar/month/ajax/nextmonth(?:/(?P<year>[^/]+?)(?:/(?P<month>[^/]+?))?)?$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxMonthAction',  'year' => 2011,  'month' => 1,  'nav' => 'nextMonth',)), array('_route' => 'AcmeCalendarBundle_ajaxnextmonth'));
            }

            // AcmeCalendarBundle_ajaxprevmonth
            if (0 === strpos($pathinfo, '/member/calendar/month/ajax/prevmonth') && preg_match('#^/member/calendar/month/ajax/prevmonth(?:/(?P<year>[^/]+?)(?:/(?P<month>[^/]+?))?)?$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxMonthAction',  'year' => 2011,  'month' => 1,  'nav' => 'prevMonth',)), array('_route' => 'AcmeCalendarBundle_ajaxprevmonth'));
            }

            // AcmeCalendarBundle_ajaxnextyear
            if (0 === strpos($pathinfo, '/member/calendar/month/ajax/nextyear') && preg_match('#^/member/calendar/month/ajax/nextyear(?:/(?P<year>[^/]+?)(?:/(?P<month>[^/]+?))?)?$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxMonthAction',  'year' => 2011,  'month' => 1,  'nav' => 'nextYear',)), array('_route' => 'AcmeCalendarBundle_ajaxnextyear'));
            }

            // AcmeCalendarBundle_ajaxprevyear
            if (0 === strpos($pathinfo, '/member/calendar/month/ajax/prevyear') && preg_match('#^/member/calendar/month/ajax/prevyear(?:/(?P<year>[^/]+?)(?:/(?P<month>[^/]+?))?)?$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxMonthAction',  'year' => 2011,  'month' => 1,  'nav' => 'prevYear',)), array('_route' => 'AcmeCalendarBundle_ajaxprevyear'));
            }

            // AcmeCalendarBundle_ajaxprevpanel
            if (0 === strpos($pathinfo, '/member/calendar/panel/ajax/prev') && preg_match('#^/member/calendar/panel/ajax/prev(?:/(?P<current>[^/]+?))?$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxPanelAction',  'nav' => 'prev',  'current' => 'mycalendars',)), array('_route' => 'AcmeCalendarBundle_ajaxprevpanel'));
            }

            // AcmeCalendarBundle_ajaxnextpanel
            if (0 === strpos($pathinfo, '/member/calendar/panel/ajax/next') && preg_match('#^/member/calendar/panel/ajax/next(?:/(?P<current>[^/]+?))?$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxPanelAction',  'nav' => 'next',  'current' => 'mycalendars',)), array('_route' => 'AcmeCalendarBundle_ajaxnextpanel'));
            }

            // AcmeCalendarBundle_ajaxcurrentpanel
            if ($pathinfo === '/member/calendar/panel/ajax/next/newcalendar') {
                return array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxPanelAction',  'nav' => 'next',  'current' => 'mycalendars',  '_route' => 'AcmeCalendarBundle_ajaxcurrentpanel',);
            }

            // AcmeCalendarBundle_ajaxnewcalendar
            if ($pathinfo === '/member/calendar/action/add') {
                return array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DefaultController::addNewCalendarAction',  '_route' => 'AcmeCalendarBundle_ajaxnewcalendar',);
            }

            // AcmeCalendarBundle_ajaxtickcalendar
            if (0 === strpos($pathinfo, '/member/calendar/action/tick') && preg_match('#^/member/calendar/action/tick(?:/(?P<id>[^/]+?))?$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DefaultController::tickCalendarAction',  'id' => 0,)), array('_route' => 'AcmeCalendarBundle_ajaxtickcalendar'));
            }

            // AcmeCalendarBundle_ajaxdeletecalendar
            if (0 === strpos($pathinfo, '/member/calendar/action/delete') && preg_match('#^/member/calendar/action/delete(?:/(?P<id>[^/]+?))?$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DefaultController::deleteCalendarAction',  'id' => 0,)), array('_route' => 'AcmeCalendarBundle_ajaxdeletecalendar'));
            }

            // AcmeCalendarBundle_sync_calendar_facebook
            if ($pathinfo === '/member/calendar/action/sync/facebook') {
                return array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DefaultController::syncFacebookAction',  '_route' => 'AcmeCalendarBundle_sync_calendar_facebook',);
            }

            // AcmeCalendarBundle_dash_list_calendars
            if ($pathinfo === '/member/calendar/dash/calendars') {
                return array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DashController::listAction',  '_route' => 'AcmeCalendarBundle_dash_list_calendars',);
            }

            // AcmeCalendarBundle_dash_edit_calendar
            if (0 === strpos($pathinfo, '/member/calendar/dash/editcalendar') && preg_match('#^/member/calendar/dash/editcalendar(?:/(?P<id>[^/]+?))?$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DashController::editAction',  'id' => 0,)), array('_route' => 'AcmeCalendarBundle_dash_edit_calendar'));
            }

            // AcmeCalendarBundle_dash_share_calendar
            if (0 === strpos($pathinfo, '/member/calendar/dash/sharecalendar') && preg_match('#^/member/calendar/dash/sharecalendar(?:/(?P<id>[^/]+?))?$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DashController::shareAction',  'id' => 0,)), array('_route' => 'AcmeCalendarBundle_dash_share_calendar'));
            }

            // member_menu
            if (0 === strpos($pathinfo, '/member/member-menu') && preg_match('#^/member/member\\-menu/(?P<url>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\MenusBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'member_menu'));
            }

        }

        // AcmeMemberBundle_dashboard
        if (rtrim($pathinfo, '/') === '/member') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'AcmeMemberBundle_dashboard');
            }
            return array (  '_controller' => 'Acme\\MemberBundle\\Controller\\DefaultController::indexAction',  '_route' => 'AcmeMemberBundle_dashboard',);
        }

        // fos_user_security_login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
        }

        // fos_user_security_check
        if ($pathinfo === '/login_check') {
            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
        }

        // fos_user_security_logout
        if ($pathinfo === '/logout') {
            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

            // fos_user_change_password
            if ($pathinfo === '/profile/change-password') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_change_password;
                }
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
            }
            not_fos_user_change_password:

        }

        if (0 === strpos($pathinfo, '/register')) {
            // fos_user_registration_register
            if (rtrim($pathinfo, '/') === '/register') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                }
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
            }

            // fos_user_registration_check_email
            if ($pathinfo === '/register/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_registration_check_email;
                }
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
            }
            not_fos_user_registration_check_email:

            // fos_user_registration_confirm
            if (0 === strpos($pathinfo, '/register/confirm') && preg_match('#^/register/confirm/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_registration_confirm;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',)), array('_route' => 'fos_user_registration_confirm'));
            }
            not_fos_user_registration_confirm:

            // fos_user_registration_confirmed
            if ($pathinfo === '/register/confirmed') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_registration_confirmed;
                }
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
            }
            not_fos_user_registration_confirmed:

        }

        if (0 === strpos($pathinfo, '/resetting')) {
            // fos_user_resetting_request
            if ($pathinfo === '/resetting/request') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_request;
                }
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
            }
            not_fos_user_resetting_request:

            // fos_user_resetting_send_email
            if ($pathinfo === '/resetting/send-email') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_fos_user_resetting_send_email;
                }
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
            }
            not_fos_user_resetting_send_email:

            // fos_user_resetting_check_email
            if ($pathinfo === '/resetting/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_check_email;
                }
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
            }
            not_fos_user_resetting_check_email:

            // fos_user_resetting_reset
            if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_resetting_reset;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',)), array('_route' => 'fos_user_resetting_reset'));
            }
            not_fos_user_resetting_reset:

        }

        // AcmeHomeBundle_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'AcmeHomeBundle_homepage');
            }
            return array (  '_controller' => 'Acme\\HomeBundle\\Controller\\DefaultController::indexAction',  '_route' => 'AcmeHomeBundle_homepage',);
        }

        // AcmeHomeBundle_ajax
        if (0 === strpos($pathinfo, '/ajax') && preg_match('#^/ajax/(?P<article>[^/]+?)$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_AcmeHomeBundle_ajax;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\HomeBundle\\Controller\\DefaultController::ajaxAction',)), array('_route' => 'AcmeHomeBundle_ajax'));
        }
        not_AcmeHomeBundle_ajax:

        // error
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'error');
            }
            return array (  '_controller' => 'Acme\\HomeBundle\\Controller\\DefaultController::indexAction',  'name' => 'error',  '_route' => 'error',);
        }

        // AcmeUserBundle_profile_edit
        if ($pathinfo === '/member/profile/edit') {
            return array (  '_controller' => 'Acme\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'AcmeUserBundle_profile_edit',);
        }

        // AcmeUserBundle_profile
        if ($pathinfo === '/member/profile') {
            return array (  '_controller' => 'Acme\\UserBundle\\Controller\\ProfileController::profileAction',  '_route' => 'AcmeUserBundle_profile',);
        }

        // AcmeUserBundle_login_fail
        if ($pathinfo === '/user/login_check') {
            return array (  '_controller' => 'Acme\\UserBundle\\Controller\\DefaultController::loginFailureAction',  '_route' => 'AcmeUserBundle_login_fail',);
        }

        // AcmeUserBundle_google_login
        if ($pathinfo === '/user/google/login') {
            return array (  '_controller' => 'Acme\\UserBundle\\Controller\\GoogleController::loginAction',  '_route' => 'AcmeUserBundle_google_login',);
        }

        // AcmeUserBundle_facebook_login
        if ($pathinfo === '/user/facebook/login') {
            return array (  '_controller' => 'Acme\\UserBundle\\Controller\\FacebookController::loginAction',  '_route' => 'AcmeUserBundle_facebook_login',);
        }

        // AcmeProfileBundle_homepage
        if (preg_match('#^/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\ProfileBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'AcmeProfileBundle_homepage'));
        }

        // AcmeStoreBundle_homepage
        if (0 === strpos($pathinfo, '/store/hello') && preg_match('#^/store/hello/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\StoreBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'AcmeStoreBundle_homepage'));
        }

        // AcmeStoreBundle_create
        if ($pathinfo === '/store/create') {
            return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\DefaultController::createAction',  '_route' => 'AcmeStoreBundle_create',);
        }

        // AcmeStoreBundle_showall
        if ($pathinfo === '/store/showall') {
            return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\DefaultController::showAllAction',  '_route' => 'AcmeStoreBundle_showall',);
        }

        // AcmeStoreBundle_show
        if (0 === strpos($pathinfo, '/store/show') && preg_match('#^/store/show/(?P<id>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\StoreBundle\\Controller\\DefaultController::showAction',)), array('_route' => 'AcmeStoreBundle_show'));
        }

        // AcmeStoreBundle_update
        if (0 === strpos($pathinfo, '/store/update') && preg_match('#^/store/update/(?P<id>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\StoreBundle\\Controller\\DefaultController::updateAction',)), array('_route' => 'AcmeStoreBundle_update'));
        }

        // AcmeStoreBundle_delete
        if (0 === strpos($pathinfo, '/store/delete') && preg_match('#^/store/delete/(?P<id>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\StoreBundle\\Controller\\DefaultController::deleteAction',)), array('_route' => 'AcmeStoreBundle_delete'));
        }

        if (0 === strpos($pathinfo, '/task')) {
            // AcmeTaskBundle_success
            if ($pathinfo === '/task/success') {
                return array (  '_controller' => 'Acme\\TaskBundle\\Controller\\DefaultController::indexAction',  '_route' => 'AcmeTaskBundle_success',);
            }

            // AcmeTaskBundle_addnewtask
            if ($pathinfo === '/task/new') {
                return array (  '_controller' => 'Acme\\TaskBundle\\Controller\\PanelController::addNewTaskAction',  '_route' => 'AcmeTaskBundle_addnewtask',);
            }

            // AcmeTaskBundle_edit_id
            if (0 === strpos($pathinfo, '/task/edit') && preg_match('#^/task/edit/(?P<id>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\TaskBundle\\Controller\\DashController::editAction',)), array('_route' => 'AcmeTaskBundle_edit_id'));
            }

            // AcmeTaskBundle_delete
            if ($pathinfo === '/task/delete') {
                return array (  '_controller' => 'Acme\\TaskBundle\\Controller\\DefaultController::deleteAction',  '_route' => 'AcmeTaskBundle_delete',);
            }

        }

        if (0 === strpos($pathinfo, '/notification')) {
            // AcmeNotificationsBundle_homepage
            if (0 === strpos($pathinfo, '/notification/hello') && preg_match('#^/notification/hello/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\NotificationsBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'AcmeNotificationsBundle_homepage'));
            }

            // AcmeNotificationsBundle_edit_id
            if (0 === strpos($pathinfo, '/notification/edit') && preg_match('#^/notification/edit/(?P<id>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\NotificationsBundle\\Controller\\DashController::editAction',)), array('_route' => 'AcmeNotificationsBundle_edit_id'));
            }

            // AcmeNotificationsBundle_confirm_push
            if ($pathinfo === '/notification/push/comfirm') {
                return array (  '_controller' => 'Acme\\NotificationsBundle\\Controller\\DefaultController::confirmPushAction',  '_route' => 'AcmeNotificationsBundle_confirm_push',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
