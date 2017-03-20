# Default Group
Automatically add users to specified groups. It will add user to a groups on every successful login, thus ensuring every active user is processed, no matter how it was created. This behavior deals with user_external and other apps, that don’t trigger user create event and thus render hooks useless.


Place this app in **nextcloud/apps/**

## Usage

* Install and enable app
* Go to Admin -> Additional settings
* Add default groups

Now every new user will be added to selected groups. Existing users will be added to the groups when they log in. This behaviour is needed, because some apps that can create users don't trigger user create event.

This **app never remove** any user from any group, you have to do this manually.

### TODO

* Button to add all existing users to default groups

[Issue tracker](https://github.com/Stibila/DefaultGroup/issues)
