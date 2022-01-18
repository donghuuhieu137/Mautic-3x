Firebase Cloud Messaging Push Notification plugin for Mautic
===========

## Caution 
This is a plugin for Mautic to enable sending Notifications via Firebase Cloud Messaging rather than OneSignal. 
This is **not a replacement** for NotificationBundle, but only an **extension**. This plugins relies on several Models, Events and Entities found in NotificationBundle directory. In other cases creating copies was necessary. 

## Modifications

- Currently FCM does not support Safari
- distinction of notification and Mobile Notifications was removed

### Dependencies

Addition to other dependencies of NotificationsBundle, FCM Notifications also require:

- plokko/firebase-php

There requirements are placed in the composer.json

### Plugin setup

With OneSignal the administrator had to setup the plugin with api keys and secrets. FCM also requires these data, but uploading the contents of the FCM service account json is also required.

### Additions

- While Onesignal worked only on one url (mautic url or web page url) It is not possible to use Notifications on both.
- Show notification is now registered as "Read" event

### Changes to the original NotificationsBundle

- Bundles (plugins) in Mautic work on several occasions only if an integration is published. Most functions (mostly those that change appearance of menus) do a check if the integration is present and does nothing if it is not. Other functions lacked these security measures. If only one Notification plugin is present in the application this does not cause any trouble since you would never get to run any of these functions without first setting up the plugin. But with two notifications sender backends implementation of integration checks in the original NotificationBundle send, report, etc functions was necessary.


## Installation steps
- create firebase project
- setup FCM plugin with basic data: ApiKey, project ID, messagingSenderId
- acquire service Account json and input it to FCM plugin settings
	https://console.firebase.google.com/project/researchcenter-209311/settings/serviceaccounts/adminsdk
	https://cloud.google.com/iam/docs/creating-managing-service-account-keys
- enable features in the settings as you like

## docs
- [hu](https://docs.google.com/document/d/1d8u9wnDbTxjtGSUp_uDdK76hRYgEtrZR-wXIieN2lPI/edit)
- [en](https://docs.google.com/document/d/1i4_UNnrOd7mGuTDytsxnHrmpbrD7lWG9ww95HOCCmUI/edit)