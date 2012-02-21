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
       'AcmeScheduleBundle_homepage' => true,
       'AcmeMobileBundle_homepage' => true,
       'AcmeMobileBundle_addtask' => true,
       'AcmeMobileBundle_viewTodaysTasks' => true,
       'AcmeMobileBundle_viewCalendars' => true,
       'AcmeMobileBundle_manageCalendars' => true,
       'AcmeMobileBundle_viewCalendar' => true,
       'AcmeMobileBundle_editCalendar' => true,
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

    private function getAcmeDashBundle_ajax_panelRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DashBundle\\Controller\\DefaultController::ajaxAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/dash/ajax/panel',  ),));
    }

    private function getAcmeEventsBundle_homepageRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\EventsBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/hello',  ),));
    }

    private function getAcmeNewsBundl_testRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\NewsBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/news/test',  ),));
    }

    private function getAcmeNewsBundle_ajax_panelRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\NewsBundle\\Controller\\DefaultController::ajaxAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/news/ajax/panel',  ),));
    }

    private function getAcmeLocationBundle_homepageRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\LocationBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/hello',  ),));
    }

    private function getAcmeCalendarBundle_ajaxcurrentmonthRouteInfo()
    {
        return array(array (  0 => 'year',  1 => 'month',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxMonthAction',  'year' => 2011,  'month' => 1,  'nav' => 'currentMonth',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'month',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'year',  ),  2 =>   array (    0 => 'text',    1 => '/calendar/month/ajax/currentmonth',  ),));
    }

    private function getAcmeCalendarBundle_ajaxnextmonthRouteInfo()
    {
        return array(array (  0 => 'year',  1 => 'month',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxMonthAction',  'year' => 2011,  'month' => 1,  'nav' => 'nextMonth',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'month',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'year',  ),  2 =>   array (    0 => 'text',    1 => '/calendar/month/ajax/nextmonth',  ),));
    }

    private function getAcmeCalendarBundle_ajaxprevmonthRouteInfo()
    {
        return array(array (  0 => 'year',  1 => 'month',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxMonthAction',  'year' => 2011,  'month' => 1,  'nav' => 'prevMonth',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'month',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'year',  ),  2 =>   array (    0 => 'text',    1 => '/calendar/month/ajax/prevmonth',  ),));
    }

    private function getAcmeCalendarBundle_ajaxnextyearRouteInfo()
    {
        return array(array (  0 => 'year',  1 => 'month',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxMonthAction',  'year' => 2011,  'month' => 1,  'nav' => 'nextYear',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'month',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'year',  ),  2 =>   array (    0 => 'text',    1 => '/calendar/month/ajax/nextyear',  ),));
    }

    private function getAcmeCalendarBundle_ajaxprevyearRouteInfo()
    {
        return array(array (  0 => 'year',  1 => 'month',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxMonthAction',  'year' => 2011,  'month' => 1,  'nav' => 'prevYear',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'month',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'year',  ),  2 =>   array (    0 => 'text',    1 => '/calendar/month/ajax/prevyear',  ),));
    }

    private function getAcmeCalendarBundle_ajaxprevpanelRouteInfo()
    {
        return array(array (  0 => 'current',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxPanelAction',  'nav' => 'prev',  'current' => 'mycalendars',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'current',  ),  1 =>   array (    0 => 'text',    1 => '/calendar/panel/ajax/prev',  ),));
    }

    private function getAcmeCalendarBundle_ajaxnextpanelRouteInfo()
    {
        return array(array (  0 => 'current',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxPanelAction',  'nav' => 'next',  'current' => 'mycalendars',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'current',  ),  1 =>   array (    0 => 'text',    1 => '/calendar/panel/ajax/next',  ),));
    }

    private function getAcmeCalendarBundle_ajaxcurrentpanelRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\PanelController::ajaxPanelAction',  'nav' => 'next',  'current' => 'mycalendars',), array (), array (  0 =>   array (    0 => 'text',    1 => '/calendar/panel/ajax/next/newcalendar',  ),));
    }

    private function getAcmeCalendarBundle_ajaxnewcalendarRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DefaultController::addNewCalendarAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/calendar/action/add',  ),));
    }

    private function getAcmeCalendarBundle_ajaxtickcalendarRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DefaultController::tickCalendarAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/calendar/action/tick',  ),));
    }

    private function getAcmeCalendarBundle_ajaxdeletecalendarRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DefaultController::deleteCalendarAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/calendar/action/delete',  ),));
    }

    private function getAcmeCalendarBundle_sync_calendar_facebookRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DefaultController::syncFacebookAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/calendar/action/sync/facebook',  ),));
    }

    private function getAcmeCalendarBundle_dash_list_calendarsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DashController::listAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/calendar/dash/calendars',  ),));
    }

    private function getAcmeCalendarBundle_dash_edit_calendarRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DashController::editAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/calendar/dash/editcalendar',  ),));
    }

    private function getAcmeCalendarBundle_dash_share_calendarRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Acme\\CalendarBundle\\Controller\\DashController::shareAction',  'id' => 0,), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/calendar/dash/sharecalendar',  ),));
    }

    private function getAcmeMemberBundle_dashboardRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\MemberBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/member/',  ),));
    }

    private function getmember_menuRouteInfo()
    {
        return array(array (  0 => 'url',), array (  '_controller' => 'Acme\\MenusBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'url',  ),  1 =>   array (    0 => 'text',    1 => '/member-menu',  ),));
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
}
