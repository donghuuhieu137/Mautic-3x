<?php

return [
    'name'        => 'Firebase Cloud Notification',
    'description' => 'Enables to use Google Firebase Cloud Notification as push notification sender service',
    'author'      => 'peter.osvath@reachmedia.hu',
    'version'     => '2.4.1',

    'services' => [
        'events' => [
            'mauticplugin.fcmnotification.campaignbundle.subscriber' => [
                'class'     => \MauticPlugin\FCMNotificationBundle\EventListener\CampaignSubscriber::class,
                'arguments' => [
                    'mautic.helper.integration',
                    'mautic.fcmnotification.model.notification',
                    'mauticplugin.fcmnotification.notification.api',
                    'event_dispatcher',
                    'mautic.lead.model.dnc'
                ],
            ],
            'mauticplugin.fcmnotification.campaignbundle.condition_subscriber' => [
                'class'     => \MauticPlugin\FCMNotificationBundle\EventListener\CampaignConditionSubscriber::class,
                'arguments' => [
                    'mautic.helper.integration',
                ],
            ],
            'mauticplugin.fcmnotification.pagebundle.subscriber' => [
                'class'     => \MauticPlugin\FCMNotificationBundle\EventListener\PageSubscriber::class,
                'arguments' => [
                    'templating.helper.assets',
                    'mautic.helper.integration',
                    'mautic.fcmnotification.model.notification',
                ],
            ],
            'mauticplugin.fcmnotification.core.js.subscriber' => [
                'class'     => \MauticPlugin\FCMNotificationBundle\EventListener\BuildJsSubscriber::class,
                'arguments' => [
                    'mauticplugin.fcmnotification.helper.notification',
                    'mautic.helper.integration',
                    'router'
                ],
            ],
            'mauticplugin.fcmnotification.notificationbundle.subscriber' => [
                'class'     => \MauticPlugin\FCMNotificationBundle\EventListener\NotificationSubscriber::class,
                'arguments' => [
                    'mautic.core.model.auditlog',
                    'mautic.page.model.trackable',
                    'mautic.page.helper.token',
                    'mautic.asset.helper.token',
                    'mautic.helper.integration',
                ],
            ],
            'mauticplugin.fcmnotification.subscriber.channel' => [
                'class'     => \MauticPlugin\FCMNotificationBundle\EventListener\ChannelSubscriber::class,
                'arguments' => [
                    'mautic.helper.integration',
                ],
            ],
            'mauticplugin.fcmnotification.stats.subscriber' => [
                'class'     => \MauticPlugin\FCMNotificationBundle\EventListener\StatsSubscriber::class,
                'arguments' => [
                    'mautic.security',
                    'doctrine.orm.entity_manager',
                    'mautic.helper.integration',
                ],
            ],
            'mauticplugin.fcmnotification.mobile_notification.report.subscriber' => [
                'class'     => \MauticPlugin\FCMNotificationBundle\EventListener\ReportSubscriber::class,
                'arguments' => [
                    'doctrine.dbal.default_connection',
                    'mautic.lead.model.company_report_data',
                    'mautic.notification.repository.stat',
                    'mautic.helper.integration',
                    'translator',                    
                ],
            ],
            'mautic.plugin.fcmnotification.plugin.subscriber' => [
                'class'     => \MauticPlugin\FCMNotificationBundle\EventListener\PluginSubscriber::class,
                'arguments' => [
                  'mautic.helper.integration',
                  'monolog.logger.mautic',
                  'doctrine.orm.entity_manager',
                  'translator',
                  'mautic.core.service.flashbag',                  
                ],
            ],
            'mautic.plugin.fcmnotification.user.subscriber' => [
                'class'     => \MauticPlugin\FCMNotificationBundle\EventListener\UserSubscriber::class,
                'arguments' => [
                    'translator',
                    'mautic.helper.integration',
                    'mautic.core.service.flashbag',
                ],
            ],
            'mautic.plugin.fcmnotification.lead.subscriber' => [
                'class'     => \MauticPlugin\FCMNotificationBundle\EventListener\LeadSubscriber::class,
                'arguments' => [
                    'translator',
                    'mautic.helper.integration',
                    'doctrine.orm.entity_manager',                 
                ],
            ],
            'mautic.plugin.fcmnotification.kernel.subscriber' => [
                'class'     => \MauticPlugin\FCMNotificationBundle\EventListener\KernelSubscriber::class,
                'arguments' => [                    
                    'mautic.helper.integration',
                    'event_dispatcher',
                    'monolog.logger.mautic',
                ],
            ],
            'mautic.plugin.fcmnotification.segment.subscriber'  => [
                'class'     => \MauticPlugin\FCMNotificationBundle\EventListener\SegmentFiltersSubscriber::class,
                'arguments' => [
                    'mautic.lead.model.list',
                    'mautic.helper.integration',
                    'mautic.lead.model.lead_segment_filter_factory',
                    'mautic.lead.repository.lead_segment_query_builder',
                    'translator',
                    'request_stack',
                ],
            ],
        ],
        'forms' => [
            'mauticplugin.fcmnotification.form.type.notification' => [
                'class' => \MauticPlugin\FCMNotificationBundle\Form\Type\NotificationType::class,
                'alias' => 'notification',
            ],
            'mauticplugin.fcmnotification.form.type.mobile.notification' => [
                'class' => \MauticPlugin\FCMNotificationBundle\Form\Type\MobileNotificationType::class,
                'alias' => 'mobile_notification',
            ],
            'mauticplugin.fcmnotification.form.type.mobile.notification_details' => [
                'class'     => \MauticPlugin\FCMNotificationBundle\Form\Type\MobileNotificationDetailsType::class,
                'arguments' => [
                    'mautic.helper.integration',
                ],                
            ],
            'mauticplugin.fcmnotification.form.type.notificationconfig' => [
                'class' => \Mautic\NotificationBundle\Form\Type\ConfigType::class,
            ],
            'mauticplugin.fcmnotification.form.type.notificationsend_list' => [
                'class'     => \Mautic\NotificationBundle\Form\Type\NotificationSendType::class,
                'arguments' => 'router',                
            ],
            'mauticplugin.fcmnotification.form.type.notification_list' => [
                'class' => \Mautic\NotificationBundle\Form\Type\NotificationListType::class,
            ],
            'mauticplugin.fcmnotification.form.type.mobilenotificationsend_list' => [
                'class'     => \Mautic\NotificationBundle\Form\Type\MobileNotificationSendType::class,
                'arguments' => 'router',                
            ],
            'mauticplugin.fcmnotification.form.type.mobilenotification_list' => [
                'class' => \Mautic\NotificationBundle\Form\Type\MobileNotificationListType::class,                
            ],
        ],
        'helpers' => [
            'mauticplugin.fcmnotification.helper.notification' => [
                'class'     => \MauticPlugin\FCMNotificationBundle\Helper\NotificationHelper::class,
                'alias'     => 'notification_helper',
                'arguments' => [
                    'doctrine.orm.entity_manager',
                    'templating.helper.assets',
                    'mautic.helper.core_parameters',
                    'mautic.helper.integration',
                    'router',
                    'request_stack',
                    'mautic.lead.model.dnc',
                ],
            ],
        ],
        'other' => [
            'mauticplugin.fcmnotification.notification.api' => [
                'class'     => \MauticPlugin\FCMNotificationBundle\Api\FCMApi::class,
                'arguments' => [                    
                    'mautic.http.connector',
                    'mautic.page.model.trackable',
                    'mautic.helper.integration',
                ],
                'alias' => 'fcmnotification_api',
            ],
        ],
        'models' => [
            'mautic.fcmnotification.model.notification' => [
                'class'     => \MauticPlugin\FCMNotificationBundle\Model\NotificationModel::class,
                'arguments' => [
                    'mautic.page.model.trackable',
                ],
            ],
        ],
        'integrations' => [
            'mautic.integration.fcm' => [
                'class' => \MauticPlugin\FCMNotificationBundle\Integration\FCMIntegration::class,
                'arguments' => [
                    'event_dispatcher',
                    'mautic.helper.cache_storage',
                    'doctrine.orm.entity_manager',
                    'session',
                    'request_stack',
                    'router',
                    'translator',
                    'logger',
                    'mautic.helper.encryption',
                    'mautic.lead.model.lead',
                    'mautic.lead.model.company',
                    'mautic.helper.paths',
                    'mautic.core.model.notification',
                    'mautic.lead.model.field',
                    'mautic.plugin.model.integration_entity',
                    'mautic.lead.model.dnc',
                ],
                'methodCalls' => [
                    'setCoreParametersHelper' => ['mautic.helper.core_parameters'],
                ],
            ],
        ],
    ],
    'routes' => [
        'main' => [
            'mautic_notification_index' => [
                'path'       => '/notifications/{page}',
                'controller' => 'FCMNotificationBundle:Notification:index',
            ],
            'mautic_notification_action' => [
                'path'       => '/notifications/{objectAction}/{objectId}',
                'controller' => 'FCMNotificationBundle:Notification:execute',
            ],
            'mautic_notification_contacts' => [
                'path'       => '/notifications/view/{objectId}/contact/{page}',
                'controller' => 'FCMNotificationBundle:Notification:contacts',
            ],
            'mautic_mobile_notification_index' => [
                'path'       => '/mobile_notifications/{page}',
                'controller' => 'FCMNotificationBundle:MobileNotification:index',
            ],
            'mautic_mobile_notification_action' => [
                'path'       => '/mobile_notifications/{objectAction}/{objectId}',
                'controller' => 'FCMNotificationBundle:MobileNotification:execute',
            ],
            'mautic_mobile_notification_contacts' => [
                'path'       => '/mobile_notifications/view/{objectId}/contact/{page}',
                'controller' => 'FCMNotificationBundle:MobileNotification:contacts',
            ],
        ],
        'public' => [
            'mautic_receive_notification' => [
                'path'       => '/notification/receive',
                'controller' => 'FCMNotificationBundle:Api\NotificationApi:receive',
            ],
            'mautic_subscribe_notification' => [
                'path'       => '/notification/subscribe',
                'controller' => 'FCMNotificationBundle:Api\NotificationApi:subscribe',
            ],
            'mautic_track_notification_open' => [
                'path'       => '/notification/trackopen',
                'controller' => 'FCMNotificationBundle:Api\NotificationApi:trackopen',
            ],
            'mautic_notification_popup' => [
                'path'       => '/notification',
                'controller' => 'FCMNotificationBundle:Popup:index',
            ],
            'mautic_notification_test' => [
                'path'       => '/notificationTest',
                'controller' => 'FCMNotificationBundle:Popup:test',
            ], 

            // JS / Manifest URL's
            'mautic_fcm_worker' => [
                'path'       => '/firebase-messaging-sw.js',
                'controller' => 'FCMNotificationBundle:Js:worker',
            ],            
            'mautic_fcm_manifest' => [
                'path'       => '/manifest.json',
                'controller' => 'FCMNotificationBundle:Js:manifest',
            ],
            'mautic_app_notification' => [
                'path'       => '/notification/appcallback',
                'controller' => 'FCMNotificationBundle:AppCallback:index',
            ],
        ],
        'api' => [
            'mautic_api_notificationsstandard' => [
                'standard_entity' => true,
                'name'            => 'notifications',
                'path'            => '/notifications',
                'controller'      => 'FCMNotificationBundle:Api\NotificationApi',
            ],
        ],
    ],
    'menu' => [
        'main' => [
            'items' => [
                'mautic.plugin.fcmnotification.notifications' => [
                    'route'  => 'mautic_notification_index',
                    'access' => ['notification:notifications:viewown', 'notification:notifications:viewother'],
                    'checks' => [
                        'integration' => [
                            'FCM' => [
                                'enabled' => true,
                            ],
                        ],
                    ],
                    'parent'   => 'mautic.core.channels',
                    'priority' => 80,
                ],
                'mautic.plugin.fcmnotification.mobile_notifications' => [
                    'route'  => 'mautic_mobile_notification_index',
                    'access' => ['notification:mobile_notifications:viewown', 'notification:mobile_notifications:viewother'],
                    'checks' => [
                        'integration' => [
                            'FCM' => [
                                'enabled'  => true,
                                'features' => [
                                    'mobile',
                                ],
                            ],
                        ],
                    ],
                    'parent'   => 'mautic.core.channels',
                    'priority' => 65,
                ],
            ],
        ],
    ],
    //'categories' => [
    //    'notification' => null
    //],
    'parameters' => [
        'notification_enabled'               => false,
        'notification_landing_page_enabled'  => true,
        'notification_tracking_page_enabled' => false,
        'notification_app_id'                => null,
        'notification_rest_api_key'          => null,
        'notification_safari_web_id'         => null,
        'gcm_sender_id'                      => '103953800507',
        'notification_subdomain_name'        => null,
        'welcomenotification_enabled'        => true,
    ],
];
