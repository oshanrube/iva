<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


/**
 * appdevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRouteNames = array(
       '_welcome' => true,
       '_demo_login' => true,
       '_security_check' => true,
       '_demo_logout' => true,
       'acme_demo_secured_hello' => true,
       '_demo_secured_hello' => true,
       '_demo_secured_hello_admin' => true,
       '_demo' => true,
       '_demo_hello' => true,
       '_demo_contact' => true,
       '_assetic_5711373' => true,
       '_assetic_5711373_0' => true,
       '_assetic_b91db09' => true,
       '_assetic_b91db09_0' => true,
       '_assetic_b91db09_1' => true,
       '_assetic_b91db09_2' => true,
       '_assetic_b91db09_3' => true,
       '_assetic_cd2c765' => true,
       '_assetic_cd2c765_0' => true,
       '_assetic_cd2c765_1' => true,
       '_assetic_cd2c765_2' => true,
       '_assetic_cd2c765_3' => true,
       '_assetic_cd2c765_4' => true,
       '_assetic_cd2c765_5' => true,
       '_assetic_c9c1fcb' => true,
       '_assetic_c9c1fcb_0' => true,
       '_assetic_c9c1fcb_1' => true,
       '_assetic_c9c1fcb_2' => true,
       '_assetic_c9c1fcb_3' => true,
       '_assetic_c9c1fcb_4' => true,
       '_assetic_c9c1fcb_5' => true,
       '_assetic_c9c1fcb_6' => true,
       '_assetic_c9c1fcb_7' => true,
       '_assetic_c9c1fcb_8' => true,
       '_assetic_c9c1fcb_9' => true,
       '_assetic_c9c1fcb_10' => true,
       '_assetic_c9c1fcb_11' => true,
       '_assetic_c9c1fcb_12' => true,
       '_assetic_f5be9b0' => true,
       '_assetic_f5be9b0_0' => true,
       '_assetic_f5be9b0_1' => true,
       '_assetic_f5be9b0_2' => true,
       '_assetic_f5be9b0_3' => true,
       '_assetic_f5be9b0_4' => true,
       '_assetic_f5be9b0_5' => true,
       '_assetic_f5be9b0_6' => true,
       '_assetic_f5be9b0_7' => true,
       '_assetic_f5be9b0_8' => true,
       '_assetic_f5be9b0_9' => true,
       '_assetic_f5be9b0_10' => true,
       '_assetic_f5be9b0_11' => true,
       '_assetic_f5be9b0_12' => true,
       '_assetic_f5be9b0_13' => true,
       '_assetic_f5be9b0_14' => true,
       '_assetic_f5be9b0_15' => true,
       '_assetic_197700a' => true,
       '_assetic_197700a_0' => true,
       '_assetic_e6261eb' => true,
       '_assetic_e6261eb_0' => true,
       '_assetic_e6261eb_1' => true,
       '_assetic_e6261eb_2' => true,
       '_assetic_e6261eb_3' => true,
       '_assetic_e6261eb_4' => true,
       '_assetic_e6261eb_5' => true,
       '_assetic_e6261eb_6' => true,
       '_assetic_e6261eb_7' => true,
       '_assetic_e6261eb_8' => true,
       '_assetic_e6261eb_9' => true,
       '_assetic_e6261eb_10' => true,
       '_assetic_e6261eb_11' => true,
       '_assetic_1ea6468' => true,
       '_assetic_1ea6468_0' => true,
       '_assetic_1ea6468_1' => true,
       '_assetic_1ea6468_2' => true,
       '_assetic_1ea6468_3' => true,
       '_assetic_1ea6468_4' => true,
       '_assetic_1ea6468_5' => true,
       '_assetic_1ea6468_6' => true,
       '_assetic_1ea6468_7' => true,
       '_assetic_1ea6468_8' => true,
       '_assetic_1ea6468_9' => true,
       '_assetic_1ea6468_10' => true,
       '_assetic_1ea6468_11' => true,
       '_assetic_1ea6468_12' => true,
       '_assetic_1ea6468_13' => true,
       '_assetic_1ea6468_14' => true,
       '_assetic_1ea6468_15' => true,
       '_wdt' => true,
       '_profiler_search' => true,
       '_profiler_purge' => true,
       '_profiler_import' => true,
       '_profiler_export' => true,
       '_profiler_search_results' => true,
       '_profiler' => true,
       '_configurator_home' => true,
       '_configurator_step' => true,
       '_configurator_final' => true,
       'AcmeFeedbackBundle_add' => true,
       'AcmeLearningBundle_homepage' => true,
       'AcmeLearningBundle_learnLocation' => true,
       'AcmeLearningBundle_addLocation' => true,
       'AcmeLearningBundle_editLocation' => true,
       'AcmeLearningBundle_learnWeather' => true,
       'AcmeLearningBundle_addWeather' => true,
       'AcmeLearningBundle_learnTravel' => true,
       'AcmeLearningBundle_saveTravel' => true,
       'AcmeScheduleBundle_homepage' => true,
       'AcmeMobileBundle_homepage' => true,
       'AcmeMobileBundle_addtask' => true,
       'AcmeMobileBundle_viewTodaysTasks' => true,
       'AcmeMobileBundle_viewTask' => true,
       'AcmeMobileBundle_addCalendar' => true,
       'AcmeMobileBundle_viewCalendars' => true,
       'AcmeMobileBundle_manageCalendars' => true,
       'AcmeMobileBundle_viewCalendar' => true,
       'AcmeMobileBundle_editCalendar' => true,
       'AcmeMobileBundle_viewTaskDay' => true,
       'AcmeDashBundle_ajax_panel' => true,
       'AcmeEventsBundle_homepage' => true,
       'AcmeNewsBundl_test' => true,
       'AcmeNewsBundle_ajax_panel' => true,
       'AcmeLocationBundle_homepage' => true,
       'AcmeCalendarBundle_ajaxcurrentmonth' => true,
       'AcmeCalendarBundle_ajaxnextmonth' => true,
       'AcmeCalendarBundle_ajaxprevmonth' => true,
       'AcmeCalendarBundle_ajaxnextyear' => true,
       'AcmeCalendarBundle_ajaxprevyear' => true,
       'AcmeCalendarBundle_ajaxprevpanel' => true,
       'AcmeCalendarBundle_ajaxnextpanel' => true,
       'AcmeCalendarBundle_ajaxcurrentpanel' => true,
       'AcmeCalendarBundle_ajaxnewcalendar' => true,
       'AcmeCalendarBundle_ajaxtickcalendar' => true,
       'AcmeCalendarBundle_ajaxdeletecalendar' => true,
       'AcmeCalendarBundle_sync_calendar_facebook' => true,
       'AcmeCalendarBundle_dash_list_calendars' => true,
       'AcmeCalendarBundle_dash_edit_calendar' => true,
       'AcmeCalendarBundle_dash_share_calendar' => true,
       'AcmeMemberBundle_dashboard' => true,
       'member_menu' => true,
       'fos_user_security_login' => true,
       'fos_user_security_check' => true,
       'fos_user_security_logout' => true,
       'fos_user_profile_show' => true,
       'fos_user_profile_edit' => true,
       'fos_user_registration_register' => true,
       'fos_user_registration_check_email' => true,
       'fos_user_registration_confirm' => true,
       'fos_user_registration_confirmed' => true,
       'fos_user_resetting_request' => true,
       'fos_user_resetting_send_email' => true,
       'fos_user_resetting_check_email' => true,
       'fos_user_resetting_reset' => true,
       'fos_user_change_password' => true,
       'AcmeHomeBundle_homepage' => true,
       'AcmeHomeBundle_ajax' => true,
       'error' => true,
       'AcmeUserBundle_profile_edit' => true,
       'AcmeUserBundle_profile' => true,
       'AcmeUserBundle_login_fail' => true,
       'AcmeUserBundle_google_login' => true,
       'AcmeUserBundle_facebook_login' => true,
       'AcmeProfileBundle_homepage' => true,
       'AcmeStoreBundle_homepage' => true,
       'AcmeStoreBundle_create' => true,
       'AcmeStoreBundle_showall' => true,
       'AcmeStoreBundle_show' => true,
       'AcmeStoreBundle_update' => true,
       'AcmeStoreBundle_delete' => true,
       'AcmeTaskBundle_success' => true,
       'AcmeTaskBundle_addnewtask' => true,
       'AcmeTaskBundle_edit_id' => true,
       'AcmeTaskBundle_delete' => true,
       'AcmeNotificationsBundle_homepage' => true,
       'AcmeNotificationsBundle_edit_id' => true,
       'AcmeNotificationsBundle_confirm_push' => true,
       'AcmeNotificationsBundle_call_details' => true,
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function generate($name, $parameters = array(), $absolute = false)
    {
        if (!isset(self::$declaredRouteNames[$name])) {
            throw new RouteNotFoundException(sprintf('Route "%s" does not exist.', $name));
        }

        $escapedName = str_replace('.', '__', $name);

        list($variables, $defaults, $requirements, $tokens) = $this->{'get'.$escapedName.'RouteInfo'}();

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }

    private function get_welcomeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\HomeBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function get_demo_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/login',  ),));
    }

    private function get_security_checkRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/login_check',  ),));
    }

    private function get_demo_logoutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/logout',  ),));
    }

    private function getacme_demo_secured_helloRouteInfo()
    {
        return array(array (), array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/hello',  ),));
    }

    private function get_demo_secured_helloRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/secured/hello',  ),));
    }

    private function get_demo_secured_hello_adminRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/secured/hello/admin',  ),));
    }

    private function get_demoRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/',  ),));
    }

    private function get_demo_helloRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/hello',  ),));
    }

    private function get_demo_contactRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/contact',  ),));
    }

    private function get_assetic_5711373RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 5711373,  'pos' => NULL,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/5711373.css',  ),));
    }

    private function get_assetic_5711373_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 5711373,  'pos' => 0,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/5711373_bootstrap_1.css',  ),));
    }

    private function get_assetic_b91db09RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'b91db09',  'pos' => NULL,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/b91db09.css',  ),));
    }

    private function get_assetic_b91db09_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'b91db09',  'pos' => 0,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/b91db09_jquery.mobile-1.0.1.min_1.css',  ),));
    }

    private function get_assetic_b91db09_1RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'b91db09',  'pos' => 1,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/b91db09_mobile-styles_2.css',  ),));
    }

    private function get_assetic_b91db09_2RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'b91db09',  'pos' => 2,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/b91db09_jquery.mobile.datebox_3.css',  ),));
    }

    private function get_assetic_b91db09_3RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'b91db09',  'pos' => 3,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/b91db09_iva.min_4.css',  ),));
    }

    private function get_assetic_cd2c765RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'cd2c765',  'pos' => NULL,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/cd2c765.js',  ),));
    }

    private function get_assetic_cd2c765_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'cd2c765',  'pos' => 0,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/cd2c765_jquery.mob_1.js',  ),));
    }

    private function get_assetic_cd2c765_1RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'cd2c765',  'pos' => 1,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/cd2c765_jquery.mobile-1.0.1.min_2.js',  ),));
    }

    private function get_assetic_cd2c765_2RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'cd2c765',  'pos' => 2,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/cd2c765_googleMaps.mobile_3.js',  ),));
    }

    private function get_assetic_cd2c765_3RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'cd2c765',  'pos' => 3,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/cd2c765_mobile_4.js',  ),));
    }

    private function get_assetic_cd2c765_4RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'cd2c765',  'pos' => 4,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/cd2c765_cordova-1.5.0_5.js',  ),));
    }

    private function get_assetic_cd2c765_5RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'cd2c765',  'pos' => 5,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/cd2c765_speechrecognizer_6.js',  ),));
    }

    private function get_assetic_c9c1fcbRouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'c9c1fcb',  'pos' => NULL,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/c9c1fcb.css',  ),));
    }

    private function get_assetic_c9c1fcb_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'c9c1fcb',  'pos' => 0,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/c9c1fcb_layout_1.css',  ),));
    }

    private function get_assetic_c9c1fcb_1RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'c9c1fcb',  'pos' => 1,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/c9c1fcb_style_2.css',  ),));
    }

    private function get_assetic_c9c1fcb_2RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'c9c1fcb',  'pos' => 2,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/c9c1fcb_notifications_3.css',  ),));
    }

    private function get_assetic_c9c1fcb_3RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'c9c1fcb',  'pos' => 3,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/c9c1fcb_slide_4.css',  ),));
    }

    private function get_assetic_c9c1fcb_4RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'c9c1fcb',  'pos' => 4,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/c9c1fcb_menu_5.css',  ),));
    }

    private function get_assetic_c9c1fcb_5RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'c9c1fcb',  'pos' => 5,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/c9c1fcb_jquery.mCustomScrollbar_6.css',  ),));
    }

    private function get_assetic_c9c1fcb_6RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'c9c1fcb',  'pos' => 6,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/c9c1fcb_articles_7.css',  ),));
    }

    private function get_assetic_c9c1fcb_7RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'c9c1fcb',  'pos' => 7,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/c9c1fcb_calendar_8.css',  ),));
    }

    private function get_assetic_c9c1fcb_8RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'c9c1fcb',  'pos' => 8,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/c9c1fcb_tasks_9.css',  ),));
    }

    private function get_assetic_c9c1fcb_9RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'c9c1fcb',  'pos' => 9,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/c9c1fcb_weather_10.css',  ),));
    }

    private function get_assetic_c9c1fcb_10RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'c9c1fcb',  'pos' => 10,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/c9c1fcb_news_11.css',  ),));
    }

    private function get_assetic_c9c1fcb_11RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'c9c1fcb',  'pos' => 11,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/c9c1fcb_feedback_12.css',  ),));
    }

    private function get_assetic_c9c1fcb_12RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'c9c1fcb',  'pos' => 12,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/c9c1fcb_jquery.jscrollpane_13.css',  ),));
    }

    private function get_assetic_f5be9b0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f5be9b0',  'pos' => NULL,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/f5be9b0.js',  ),));
    }

    private function get_assetic_f5be9b0_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f5be9b0',  'pos' => 0,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/f5be9b0_jquery-1.6_1.js',  ),));
    }

    private function get_assetic_f5be9b0_1RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f5be9b0',  'pos' => 1,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/f5be9b0_jquery.jqtransform_2.js',  ),));
    }

    private function get_assetic_f5be9b0_2RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f5be9b0',  'pos' => 2,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/f5be9b0_menu_3.js',  ),));
    }

    private function get_assetic_f5be9b0_3RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f5be9b0',  'pos' => 3,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/f5be9b0_feedback_4.js',  ),));
    }

    private function get_assetic_f5be9b0_4RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f5be9b0',  'pos' => 4,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/f5be9b0_ajax-content_5.js',  ),));
    }

    private function get_assetic_f5be9b0_5RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f5be9b0',  'pos' => 5,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/f5be9b0_jquery-ui.min_6.js',  ),));
    }

    private function get_assetic_f5be9b0_6RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f5be9b0',  'pos' => 6,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/f5be9b0_jquery.easing.1.3_7.js',  ),));
    }

    private function get_assetic_f5be9b0_7RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f5be9b0',  'pos' => 7,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/f5be9b0_jquery.mousewheel.min_8.js',  ),));
    }

    private function get_assetic_f5be9b0_8RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f5be9b0',  'pos' => 8,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/f5be9b0_jquery.mousewheel_9.js',  ),));
    }

    private function get_assetic_f5be9b0_9RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f5be9b0',  'pos' => 9,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/f5be9b0_jquery.jscrollpane.min_10.js',  ),));
    }

    private function get_assetic_f5be9b0_10RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f5be9b0',  'pos' => 10,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/f5be9b0_jquery.form_11.js',  ),));
    }

    private function get_assetic_f5be9b0_11RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f5be9b0',  'pos' => 11,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/f5be9b0_slide_12.js',  ),));
    }

    private function get_assetic_f5be9b0_12RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f5be9b0',  'pos' => 12,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/f5be9b0_bootstrap-twipsy_13.js',  ),));
    }

    private function get_assetic_f5be9b0_13RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f5be9b0',  'pos' => 13,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/f5be9b0_bootstrap-popover_14.js',  ),));
    }

    private function get_assetic_f5be9b0_14RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f5be9b0',  'pos' => 14,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/f5be9b0_script_15.js',  ),));
    }

    private function get_assetic_f5be9b0_15RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'f5be9b0',  'pos' => 15,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/f5be9b0_jquery.vticker-min_16.js',  ),));
    }

    private function get_assetic_197700aRouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '197700a',  'pos' => NULL,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/197700a.js',  ),));
    }

    private function get_assetic_197700a_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '197700a',  'pos' => 0,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/197700a_jquery.mCustomScrollbar_1.js',  ),));
    }

    private function get_assetic_e6261ebRouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => NULL,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/e6261eb.css',  ),));
    }

    private function get_assetic_e6261eb_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 0,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/e6261eb_layout_1.css',  ),));
    }

    private function get_assetic_e6261eb_1RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 1,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/e6261eb_style_2.css',  ),));
    }

    private function get_assetic_e6261eb_2RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 2,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/e6261eb_notifications_3.css',  ),));
    }

    private function get_assetic_e6261eb_3RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 3,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/e6261eb_slide_4.css',  ),));
    }

    private function get_assetic_e6261eb_4RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 4,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/e6261eb_menu_5.css',  ),));
    }

    private function get_assetic_e6261eb_5RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 5,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/e6261eb_jquery.mCustomScrollbar_6.css',  ),));
    }

    private function get_assetic_e6261eb_6RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 6,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/e6261eb_calendar_7.css',  ),));
    }

    private function get_assetic_e6261eb_7RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 7,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/e6261eb_tasks_8.css',  ),));
    }

    private function get_assetic_e6261eb_8RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 8,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/e6261eb_weather_9.css',  ),));
    }

    private function get_assetic_e6261eb_9RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 9,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/e6261eb_news_10.css',  ),));
    }

    private function get_assetic_e6261eb_10RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 10,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/e6261eb_feedback_11.css',  ),));
    }

    private function get_assetic_e6261eb_11RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => 'e6261eb',  'pos' => 11,  '_format' => 'css',), array (), array (  0 =>   array (    0 => 'text',    1 => '/css/e6261eb_jquery.jscrollpane_12.css',  ),));
    }

    private function get_assetic_1ea6468RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => NULL,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/1ea6468.js',  ),));
    }

    private function get_assetic_1ea6468_0RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 0,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/1ea6468_jquery-1.6_1.js',  ),));
    }

    private function get_assetic_1ea6468_1RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 1,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/1ea6468_jquery.jqtransform_2.js',  ),));
    }

    private function get_assetic_1ea6468_2RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 2,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/1ea6468_menu_3.js',  ),));
    }

    private function get_assetic_1ea6468_3RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 3,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/1ea6468_feedback_4.js',  ),));
    }

    private function get_assetic_1ea6468_4RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 4,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/1ea6468_ajax_content_5.js',  ),));
    }

    private function get_assetic_1ea6468_5RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 5,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/1ea6468_jquery-ui.min_6.js',  ),));
    }

    private function get_assetic_1ea6468_6RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 6,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/1ea6468_jquery.easing.1.3_7.js',  ),));
    }

    private function get_assetic_1ea6468_7RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 7,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/1ea6468_jquery.mousewheel.min_8.js',  ),));
    }

    private function get_assetic_1ea6468_8RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 8,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/1ea6468_jquery.mousewheel_9.js',  ),));
    }

    private function get_assetic_1ea6468_9RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 9,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/1ea6468_jquery.jscrollpane.min_10.js',  ),));
    }

    private function get_assetic_1ea6468_10RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 10,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/1ea6468_jquery.form_11.js',  ),));
    }

    private function get_assetic_1ea6468_11RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 11,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/1ea6468_slide_12.js',  ),));
    }

    private function get_assetic_1ea6468_12RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 12,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/1ea6468_bootstrap-twipsy_13.js',  ),));
    }

    private function get_assetic_1ea6468_13RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 13,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/1ea6468_bootstrap-popover_14.js',  ),));
    }

    private function get_assetic_1ea6468_14RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 14,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/1ea6468_script_15.js',  ),));
    }

    private function get_assetic_1ea6468_15RouteInfo()
    {
        return array(array (), array (  '_controller' => 'assetic.controller:render',  'name' => '1ea6468',  'pos' => 15,  '_format' => 'js',), array (), array (  0 =>   array (    0 => 'text',    1 => '/js/1ea6468_jquery.vticker-min_16.js',  ),));
    }

    private function get_wdtRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_wdt',  ),));
    }

    private function get_profiler_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/search',  ),));
    }

    private function get_profiler_purgeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/purge',  ),));
    }

    private function get_profiler_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/import',  ),));
    }

    private function get_profiler_exportRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '.txt',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler/export',  ),));
    }

    private function get_profiler_search_resultsRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search/results',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_profilerRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_configurator_homeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/',  ),));
    }

    private function get_configurator_stepRouteInfo()
    {
        return array(array (  0 => 'index',), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'index',  ),  1 =>   array (    0 => 'text',    1 => '/_configurator/step',  ),));
    }

    private function get_configurator_finalRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/final',  ),));
    }

    private function getAcmeFeedbackBundle_addRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\FeedbackBundle\\Controller\\DefaultController::addAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/feedback/add',  ),));
    }

    private function getAcmeLearningBundle_homepageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\LearningBundle\\Controller\\MobileController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/member/learning/index',  ),));
    }

    private function getAcmeLearningBundle_learnLocationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\LearningBundle\\Controller\\LocationController::listLocationsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/member/learning/locations/list',  ),));
    }

    private function getAcmeLearningBundle_addLocationRouteInfo()
    {
        return array(array (  0 => 'title',), array (  '_controller' => 'Acme\\LearningBundle\\Controller\\LocationController::addLocationAction',  'title' => '',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'title',  ),  1 =>   array (    0 => 'text',    1 => '/member/learning/locations/add',  ),));
    }

    private function getAcmeLearningBundle_editLocationRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Acme\\LearningBundle\\Controller\\LocationController::editLocationAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/member/learning/locations/edit',  ),));
    }

    private function getAcmeLearningBundle_learnWeatherRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\LearningBundle\\Controller\\WeatherController::listWeatherAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/member/learning/weather/list',  ),));
    }

    private function getAcmeLearningBundle_addWeatherRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Acme\\LearningBundle\\Controller\\WeatherController::addWeatherAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/member/learning/weather/add',  ),));
    }

    private function getAcmeLearningBundle_learnTravelRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\LearningBundle\\Controller\\TravelController::learnAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/member/learning/travel/learn',  ),));
    }

    private function getAcmeLearningBundle_saveTravelRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\LearningBundle\\Controller\\TravelController::saveAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/member/learning/travel/save',  ),));
    }

    private function getAcmeScheduleBundle_homepageRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\ScheduleBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/hello',  ),));
    }

    private function getAcmeMobileBundle_homepageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\MobileBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/mobile/home',  ),));
    }

    private function getAcmeMobileBundle_addtaskRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\MobileBundle\\Controller\\TaskController::addAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/mobile/addtask',  ),));
    }

    private function getAcmeMobileBundle_viewTodaysTasksRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\MobileBundle\\Controller\\TaskController::viewTodaysAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/mobile/view/today',  ),));
    }

    private function getAcmeMobileBundle_viewTaskRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Acme\\MobileBundle\\Controller\\TaskController::viewTaskAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/mobile/view/today',  ),));
    }

    private function getAcmeMobileBundle_addCalendarRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\MobileBundle\\Controller\\CalendarController::addAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/mobile/add/calendar',  ),));
    }

    private function getAcmeMobileBundle_viewCalendarsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\MobileBundle\\Controller\\CalendarController::browseAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/mobile/view/calendars',  ),));
    }

    private function getAcmeMobileBundle_manageCalendarsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\MobileBundle\\Controller\\CalendarController::listAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/mobile/manage/calendars',  ),));
    }

    private function getAcmeMobileBundle_viewCalendarRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'year',  2 => 'month',), array (  '_controller' => 'Acme\\MobileBundle\\Controller\\CalendarController::viewCalendarAction',  'year' => NULL,  'month' => NULL,), array (  'id' => '\\d+',  'year' => '\\d+',  'month' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'month',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'year',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  3 =>   array (    0 => 'text',    1 => '/mobile/view/calendar',  ),));
    }

    private function getAcmeMobileBundle_editCalendarRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Acme\\MobileBundle\\Controller\\CalendarController::editCalendarAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/mobile/edit/calendar',  ),));
    }

    private function getAcmeMobileBundle_viewTaskDayRouteInfo()
    {
        return array(array (  0 => 'year',  1 => 'month',  2 => 'day',), array (  '_controller' => 'Acme\\MobileBundle\\Controller\\TaskController::viewTaskDayAction',  'year' => NULL,  'month' => NULL,  'day' => NULL,), array (  'year' => '\\d+',  'month' => '\\d+',  'day' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'day',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'month',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'year',  ),  3 =>   array (    0 => 'text',    1 => '/mobile/view/task',  ),));
    }

    private function getAcmeDashBundle_ajax_panelRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DashBundle\\Controller\\DefaultController::ajaxAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/member/dash/ajax/panel',  ),));
    }

    private function getAcmeEventsBundle_homepageRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\EventsBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/hello',  ),));
    }

    private function getAcmeNewsBundl_testRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\NewsBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/member/news/test',  ),));
    }

    private function getAcmeNewsBundle_ajax_panelRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\NewsBundle\\Controller\\DefaultController::ajaxAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/member/news/ajax/panel',  ),));
    }

    private function getAcmeLocationBundle_homepageRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\LocationBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/member/hello',  ),));
    }

    private function getAcmeCalendarBundle_ajaxcurrentmonthRouteInfo()
    {
        return array(array (  0 => 'year',  1 => 'month',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxMonthAction',  'year' => 2011,  'month' => 1,  'nav' => 'currentMonth',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'month',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'year',  ),  2 =>   array (    0 => 'text',    1 => '/member/calendar/month/ajax/currentmonth',  ),));
    }

    private function getAcmeCalendarBundle_ajaxnextmonthRouteInfo()
    {
        return array(array (  0 => 'year',  1 => 'month',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxMonthAction',  'year' => 2011,  'month' => 1,  'nav' => 'nextMonth',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'month',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'year',  ),  2 =>   array (    0 => 'text',    1 => '/member/calendar/month/ajax/nextmonth',  ),));
    }

    private function getAcmeCalendarBundle_ajaxprevmonthRouteInfo()
    {
        return array(array (  0 => 'year',  1 => 'month',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxMonthAction',  'year' => 2011,  'month' => 1,  'nav' => 'prevMonth',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'month',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'year',  ),  2 =>   array (    0 => 'text',    1 => '/member/calendar/month/ajax/prevmonth',  ),));
    }

    private function getAcmeCalendarBundle_ajaxnextyearRouteInfo()
    {
        return array(array (  0 => 'year',  1 => 'month',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxMonthAction',  'year' => 2011,  'month' => 1,  'nav' => 'nextYear',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'month',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'year',  ),  2 =>   array (    0 => 'text',    1 => '/member/calendar/month/ajax/nextyear',  ),));
    }

    private function getAcmeCalendarBundle_ajaxprevyearRouteInfo()
    {
        return array(array (  0 => 'year',  1 => 'month',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxMonthAction',  'year' => 2011,  'month' => 1,  'nav' => 'prevYear',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'month',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'year',  ),  2 =>   array (    0 => 'text',    1 => '/member/calendar/month/ajax/prevyear',  ),));
    }

    private function getAcmeCalendarBundle_ajaxprevpanelRouteInfo()
    {
        return array(array (  0 => 'current',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxPanelAction',  'nav' => 'prev',  'current' => 'mycalendars',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'current',  ),  1 =>   array (    0 => 'text',    1 => '/member/calendar/panel/ajax/prev',  ),));
    }

    private function getAcmeCalendarBundle_ajaxnextpanelRouteInfo()
    {
        return array(array (  0 => 'current',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxPanelAction',  'nav' => 'next',  'current' => 'mycalendars',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'current',  ),  1 =>   array (    0 => 'text',    1 => '/member/calendar/panel/ajax/next',  ),));
    }

    private function getAcmeCalendarBundle_ajaxcurrentpanelRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxPanelAction',  'nav' => 'next',  'current' => 'mycalendars',), array (), array (  0 =>   array (    0 => 'text',    1 => '/member/calendar/panel/ajax/next/newcalendar',  ),));
    }

    private function getAcmeCalendarBundle_ajaxnewcalendarRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DefaultController::addNewCalendarAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/member/calendar/action/add',  ),));
    }

    private function getAcmeCalendarBundle_ajaxtickcalendarRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DefaultController::tickCalendarAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/member/calendar/action/tick',  ),));
    }

    private function getAcmeCalendarBundle_ajaxdeletecalendarRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DefaultController::deleteCalendarAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/member/calendar/action/delete',  ),));
    }

    private function getAcmeCalendarBundle_sync_calendar_facebookRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DefaultController::syncFacebookAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/member/calendar/action/sync/facebook',  ),));
    }

    private function getAcmeCalendarBundle_dash_list_calendarsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DashController::listAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/member/calendar/dash/calendars',  ),));
    }

    private function getAcmeCalendarBundle_dash_edit_calendarRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DashController::editAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/member/calendar/dash/editcalendar',  ),));
    }

    private function getAcmeCalendarBundle_dash_share_calendarRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DashController::shareAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/member/calendar/dash/sharecalendar',  ),));
    }

    private function getAcmeMemberBundle_dashboardRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\MemberBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/member/',  ),));
    }

    private function getmember_menuRouteInfo()
    {
        return array(array (  0 => 'url',), array (  '_controller' => 'Acme\\MenusBundle\\Controller\\DefaultController::redirectAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'url',  ),  1 =>   array (    0 => 'text',    1 => '/member/member-menu',  ),));
    }

    private function getfos_user_security_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/login',  ),));
    }

    private function getfos_user_security_checkRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/login_check',  ),));
    }

    private function getfos_user_security_logoutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/logout',  ),));
    }

    private function getfos_user_profile_showRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/profile/',  ),));
    }

    private function getfos_user_profile_editRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/profile/edit',  ),));
    }

    private function getfos_user_registration_registerRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/register/',  ),));
    }

    private function getfos_user_registration_check_emailRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/register/check-email',  ),));
    }

    private function getfos_user_registration_confirmRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/register/confirm',  ),));
    }

    private function getfos_user_registration_confirmedRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/register/confirmed',  ),));
    }

    private function getfos_user_resetting_requestRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/resetting/request',  ),));
    }

    private function getfos_user_resetting_send_emailRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/resetting/send-email',  ),));
    }

    private function getfos_user_resetting_check_emailRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/resetting/check-email',  ),));
    }

    private function getfos_user_resetting_resetRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',), array (  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/resetting/reset',  ),));
    }

    private function getfos_user_change_passwordRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',), array (  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'text',    1 => '/profile/change-password',  ),));
    }

    private function getAcmeHomeBundle_homepageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\HomeBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getAcmeHomeBundle_ajaxRouteInfo()
    {
        return array(array (  0 => 'article',), array (  '_controller' => 'Acme\\HomeBundle\\Controller\\DefaultController::ajaxAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'article',  ),  1 =>   array (    0 => 'text',    1 => '/ajax',  ),));
    }

    private function geterrorRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\HomeBundle\\Controller\\DefaultController::indexAction',  'name' => 'error',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getAcmeUserBundle_profile_editRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\UserBundle\\Controller\\ProfileController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/member/profile/edit',  ),));
    }

    private function getAcmeUserBundle_profileRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\UserBundle\\Controller\\ProfileController::profileAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/member/profile',  ),));
    }

    private function getAcmeUserBundle_login_failRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\UserBundle\\Controller\\DefaultController::loginFailureAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/user/login_check',  ),));
    }

    private function getAcmeUserBundle_google_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\UserBundle\\Controller\\GoogleController::loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/user/google/login',  ),));
    }

    private function getAcmeUserBundle_facebook_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\UserBundle\\Controller\\FacebookController::loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/user/facebook/login',  ),));
    }

    private function getAcmeProfileBundle_homepageRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\ProfileBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),));
    }

    private function getAcmeStoreBundle_homepageRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/store/hello',  ),));
    }

    private function getAcmeStoreBundle_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\DefaultController::createAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/store/create',  ),));
    }

    private function getAcmeStoreBundle_showallRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\DefaultController::showAllAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/store/showall',  ),));
    }

    private function getAcmeStoreBundle_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\DefaultController::showAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/store/show',  ),));
    }

    private function getAcmeStoreBundle_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\DefaultController::updateAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/store/update',  ),));
    }

    private function getAcmeStoreBundle_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\DefaultController::deleteAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/store/delete',  ),));
    }

    private function getAcmeTaskBundle_successRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\TaskBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/task/success',  ),));
    }

    private function getAcmeTaskBundle_addnewtaskRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\TaskBundle\\Controller\\PanelController::addNewTaskAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/task/new',  ),));
    }

    private function getAcmeTaskBundle_edit_idRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Acme\\TaskBundle\\Controller\\DashController::editAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/task/edit',  ),));
    }

    private function getAcmeTaskBundle_deleteRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\TaskBundle\\Controller\\DefaultController::deleteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/task/delete',  ),));
    }

    private function getAcmeNotificationsBundle_homepageRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\NotificationsBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/notification/hello',  ),));
    }

    private function getAcmeNotificationsBundle_edit_idRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Acme\\NotificationsBundle\\Controller\\DashController::editAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/notification/edit',  ),));
    }

    private function getAcmeNotificationsBundle_confirm_pushRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\NotificationsBundle\\Controller\\DefaultController::confirmPushAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/notification/push/comfirm',  ),));
    }

    private function getAcmeNotificationsBundle_call_detailsRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'confirmId',), array (  '_controller' => 'Acme\\NotificationsBundle\\Controller\\DefaultController::callDetailsAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'confirmId',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/notification/call/voice',  ),));
    }
}
