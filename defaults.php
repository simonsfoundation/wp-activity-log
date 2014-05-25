<?php

// if not included correctly...
if ( !class_exists( 'WpSecurityAuditLog' ) ) exit();

defined('E_CRITICAL') || define('E_CRITICAL', 'E_CRITICAL');
defined('E_DEBUG') || define('E_DEBUG', 'E_DEBUG');

WpSecurityAuditLog::GetInstance()
	->constants->UseConstants(array(
		// default PHP constants
		array('name' => 'E_ERROR', 'description' => __('Fatal run-time error.', 'mah-domain')),
		array('name' => 'E_WARNING', 'description' => __('Run-time warning (non-fatal error).', 'mah-domain')),
		array('name' => 'E_PARSE', 'description' => __('Compile-time parse error.', 'mah-domain')),
		array('name' => 'E_NOTICE', 'description' => __('Run-time notice.', 'mah-domain')),
		array('name' => 'E_CORE_ERROR', 'description' => __('Fatal error that occurred during startup.', 'mah-domain')),
		array('name' => 'E_CORE_WARNING', 'description' => __('Warnings that occurred during startup.', 'mah-domain')),
		array('name' => 'E_COMPILE_ERROR', 'description' => __('Fatal compile-time error.', 'mah-domain')),
		array('name' => 'E_COMPILE_WARNING', 'description' => __('Compile-time warning.', 'mah-domain')),
		array('name' => 'E_USER_ERROR', 'description' => __('User-generated error message.', 'mah-domain')),
		array('name' => 'E_USER_WARNING', 'description' => __('User-generated warning message.', 'mah-domain')),
		array('name' => 'E_USER_NOTICE', 'description' => __('User-generated notice message. ', 'mah-domain')),
		array('name' => 'E_STRICT', 'description' => __('Non-standard/optimal code warning.', 'mah-domain')),
		array('name' => 'E_RECOVERABLE_ERROR', 'description' => __('Catchable fatal error.', 'mah-domain')),
		array('name' => 'E_DEPRECATED', 'description' => __('Run-time deprecation notices.', 'mah-domain')),
		array('name' => 'E_USER_DEPRECATED', 'description' => __('Run-time user deprecation notices.', 'mah-domain')),
		// custom constants
		array('name' => 'E_CRITICAL', 'description' => __('Critical, high-impact messages.', 'mah-domain')),
		array('name' => 'E_DEBUG', 'description' => __('Debug informational messages.', 'mah-domain')),
	));

WpSecurityAuditLog::GetInstance()
	->alerts->RegisterGroup(array(
		'Other User Activity' => array(
			array(1000, E_NOTICE, __('User logs in', 'mah-domain'), __('Successfully logged in', 'mah-domain')),
			array(1001, E_NOTICE, __('User logs out', 'mah-domain'), __('Successfully logged out', 'mah-domain')),
			array(1002, E_WARNING, __('Login failed', 'mah-domain'), __('%Attempts% failed login(s) detected', 'mah-domain')),
			array(2010, E_NOTICE, __('User uploaded file from Uploads directory', 'mah-domain'), __('Uploaded the file %FileName% in %FilePath%', 'mah-domain')),
			array(2011, E_WARNING, __('User deleted file from Uploads directory', 'mah-domain'), __('Deleted the file %FileName% from %FilePath%', 'mah-domain')),
			array(2046, E_CRITICAL, __('User changed a file using the editor', 'mah-domain'), __('Modified %File% with the Theme Editor', 'mah-domain')),
		),
		'Blog Posts' => array(
			array(2000, E_NOTICE, __('User created a new blog post and saved it as draft', 'mah-domain'), __('Created a new blog post called %PostTitle%. Blog post ID is %PostID%', 'mah-domain')),
			array(2001, E_NOTICE, __('User published a blog post', 'mah-domain'), __('Published a blog post called %PostTitle%. Blog post URL is %PostUrl%', 'mah-domain')),
			array(2002, E_NOTICE, __('User modified a published blog post', 'mah-domain'), __('Modified the published blog post %PostTitle%. Blog post URL is %PostUrl%', 'mah-domain')),
			array(2003, E_NOTICE, __('User modified a draft blog post', 'mah-domain'), __('Modified the draft blog post %PostTitle%. Blog post ID is %PostID%', 'mah-domain')),
			array(2008, E_NOTICE, __('User permanently deleted a blog post from the trash', 'mah-domain'), __('Deleted the post %PostTitle%. Blog post ID is %PostID%', 'mah-domain')),
			array(2012, E_WARNING, __('User moved a blog post to the trash', 'mah-domain'), __('Moved the blog post %PostTitle% to trash', 'mah-domain')),
			array(2014, E_CRITICAL, __('User restored a blog post from trash', 'mah-domain'), __('Restored post %PostTitle% from trash', 'mah-domain')),
			array(2016, E_NOTICE, __('User changed blog post category', 'mah-domain'), __('Changed the category of the post %PostTitle% from %OldCategories% to %NewCategories%', 'mah-domain')),
			array(2017, E_NOTICE, __('User changed blog post URL', 'mah-domain'), __('Changed the URL of the post %PostTitle% from %OldUrl% to %NewUrl%', 'mah-domain')),
			array(2019, E_NOTICE, __('User changed blog post author', 'mah-domain'), __('Changed the author of %PostTitle% post from %OldAuthor% to %NewAuthor%', 'mah-domain')),
			array(2021, E_NOTICE, __('User changed blog post status', 'mah-domain'), __('Changed the status of %PostTitle% post from %OldStatus% to %NewStatus%', 'mah-domain')),
			array(2023, E_NOTICE, __('User created new category', 'mah-domain'), __('Created a new category called %CategoryName%', 'mah-domain')),
			array(2024, E_WARNING, __('User deleted category', 'mah-domain'), __('Deleted the %CategoryName% category', 'mah-domain')),
			array(2025, E_WARNING, __('User changed the visibility of a blog post', 'mah-domain'), __('Changed the visibility of %PostTitle% blog post  from %OldVisibility% to %NewVisibility%', 'mah-domain')),
			array(2027, E_NOTICE, __('User changed the date of a blog post', 'mah-domain'), __('Changed the date of %PostTitle% blog post from %OldDate% to %NewDate%', 'mah-domain')),
			array(2049, E_NOTICE, __('User sets a post as sticky', 'mah-domain'), __('Set the post %PostTitle% as Sticky', 'mah-domain')),
			array(2050, E_NOTICE, __('User removes post from sticky', 'mah-domain'), __('Removed the post %PostTitle% from Sticky', 'mah-domain')),
		),
		'Pages' => array(
			array(2004, E_NOTICE, __('User created a new WordPress page and saved it as draft', 'mah-domain'), __('Created a new page called %PostTitle%. Page ID is %PostID%', 'mah-domain')),
			array(2005, E_NOTICE, __('User published a WorPress page', 'mah-domain'), __('Published a page called %PostTitle%. Page URL is %PostUrl%', 'mah-domain')),
			array(2006, E_NOTICE, __('User modified a published WordPress page', 'mah-domain'), __('Modified the published page %PostTitle%. Page URL is %PostUrl%', 'mah-domain')),
			array(2007, E_NOTICE, __('User modified a draft WordPress page', 'mah-domain'), __('Modified the draft page %PostTitle%. page ID is %PostID%', 'mah-domain')),
			array(2009, E_NOTICE, __('User permanently deleted a page from the trash', 'mah-domain'), __('Deleted the page %PostTitle%. Page ID is %PostID%', 'mah-domain')),
			array(2013, E_WARNING, __('User moved WordPress page to the trash', 'mah-domain'), __('Moved the page %PostTitle% to trash', 'mah-domain')),
			array(2015, E_CRITICAL, __('User restored a WordPress page from trash', 'mah-domain'), __('Restored page %PostTitle% from trash', 'mah-domain')),
			array(2018, E_NOTICE, __('User changed page URL', 'mah-domain'), __('Changed the URL of the page %PostTitle% from %OldUrl% to %NewUrl%', 'mah-domain')),
			array(2020, E_NOTICE, __('User changed page author', 'mah-domain'), __('Changed the author of %PostTitle% page from %OldAuthor% to %NewAuthor%', 'mah-domain')),
			array(2022, E_NOTICE, __('User changed page status', 'mah-domain'), __('Changed the status of %PostTitle% page from %OldStatus% to %NewStatus%', 'mah-domain')),
			array(2026, E_WARNING, __('User changed the visibility of a page post', 'mah-domain'), __('Changed the visibility of %PostTitle% page  from %OldVisibility% to %NewVisibility%', 'mah-domain')),
			array(2028, E_NOTICE, __('User changed the date of a page post', 'mah-domain'), __('Changed the date of %PostTitle% page from %OldDate% to %NewDate%', 'mah-domain')),
			array(2047, E_NOTICE, __('User changed the parent of a page', 'mah-domain'), __('Changed the parent of %PostTitle% page from %OldParentName% to %NewParentName%', 'mah-domain')),
			array(2048, E_CRITICAL, __('User changes the template of a page', 'mah-domain'), __('Changed the template of %PostTitle% page from %OldTemplate% to %NewTemplate%', 'mah-domain')),
		),
		'Custom Posts' => array(
			array(2029, E_NOTICE, __('User created a new post with custom post type and saved it as draft', 'mah-domain'), __('Created a new custom post called %PostTitle% of type %PostType%. Post ID is %PostID%', 'mah-domain')),
			array(2030, E_NOTICE, __('User published a post with custom post type', 'mah-domain'), __('Published a custom post %PostTitle% of type %PostType%. Post URL is %PostUrl%', 'mah-domain')),
			array(2031, E_NOTICE, __('User modified a post with custom post type', 'mah-domain'), __('Modified custom post %PostTitle% of type %PostType%. Post URL is %PostUrl%', 'mah-domain')),
			array(2032, E_NOTICE, __('User modified a draft post with custom post type', 'mah-domain'), __('Modified draft custom post %PostTitle% of type is %PostType%. Post URL is %PostUrl%', 'mah-domain')),
			array(2033, E_WARNING, __('User permanently deleted post with custom post type', 'mah-domain'), __('Deleted custom post %PostTitle% of type %PostType%', 'mah-domain')),
			array(2034, E_WARNING, __('User moved post with custom post type to trash', 'mah-domain'), __('Moved custom post %PostTitle% to trash. Post type is %PostType%', 'mah-domain')),
			array(2035, E_CRITICAL, __('User restored post with custom post type from trash', 'mah-domain'), __('Restored custom post %PostTitle% of type %PostType% from trash', 'mah-domain')),
			array(2036, E_NOTICE, __('User changed the category of a post with custom post type', 'mah-domain'), __('Changed the category(ies) of custom post %PostTitle% of type %PostType% from %OldCategories% to %NewCategories%', 'mah-domain')),
			array(2037, E_NOTICE, __('User changed the URL of a post with custom post type', 'mah-domain'), __('Changed the URL of custom post %PostTitle% of type %PostType% from %OldUrl% to %NewUrl%', 'mah-domain')),
			array(2038, E_NOTICE, __('User changed the author or post with custom post type', 'mah-domain'), __('Changed the author of custom post %PostTitle% of type %PostType% from %OldAuthor% to %NewAuthor%', 'mah-domain')),
			array(2039, E_NOTICE, __('User changed the status of post with custom post type', 'mah-domain'), __('Changed the status of custom post %PostTitle% of type %PostType% from %OldStatus% to %NewStatus%', 'mah-domain')),
			array(2040, E_WARNING, __('User changed the visibility of a post with custom post type', 'mah-domain'), __('Changed the visibility of custom post %PostTitle% of type %PostType% from %OldVisibility% to %NewVisibility%', 'mah-domain')),
			array(2041, E_NOTICE, __('User changed the date of post with custom post type', 'mah-domain'), __('Changed the date of custom post %PostTitle% of type %PostType% from %OldDate% to %NewDate%', 'mah-domain')),
		),
		'Widgets' => array(
			array(2042, E_CRITICAL, __('User added a new widget', 'mah-domain'), __('Added a new %WidgetName% widget in  %Sidebar%', 'mah-domain')),
			array(2043, E_WARNING, __('User modified a widget', 'mah-domain'), __('Modified the %WidgetName% widget in %Sidebar%', 'mah-domain')),
			array(2044, E_CRITICAL, __('User deleted widget', 'mah-domain'), __('Deleted the %WidgetName% widget from %Sidebar%', 'mah-domain')),
			array(2045, E_NOTICE, __('User moved widget', 'mah-domain'), __('Moved the %WidgetName% widget from %OldSidebar% to %NewSidebar%', 'mah-domain')),
		),
		'User Profiles' => array(
			array(4000, E_CRITICAL, __('A new user was created on WordPress', 'mah-domain'), __('User %NewUserData->Username% subscribed with a role of %NewUserData->Roles%', 'mah-domain')),
			array(4001, E_CRITICAL, __('A user created another WordPress user', 'mah-domain'), __('Created a new user %NewUserData->Username% with the role of %NewUserData->Roles%', 'mah-domain')),
			array(4002, E_CRITICAL, __('The role of a user was changed by another WordPress user', 'mah-domain'), __('Changed the role of user %TargetUsername% from %OldRole% to %NewRole%', 'mah-domain')),
			array(4003, E_CRITICAL, __('User has changed his or her password', 'mah-domain'), __('Changed the password', 'mah-domain')),
			array(4004, E_CRITICAL, __('A user changed another user\'s password', 'mah-domain'), __('Changed the password for user %TargetUserData->Username% with the role of %TargetUserData->Roles%', 'mah-domain')),
			array(4005, E_NOTICE, __('User changed his or her email address', 'mah-domain'), __('Changed the email address from %OldEmail% to %NewEmail%', 'mah-domain')),
			array(4006, E_NOTICE, __('A user changed another user\'s email address', 'mah-domain'), __('Changed the email address of user account %TargetUsername% from %OldEmail% to %NewEmail%', 'mah-domain')),
			array(4007, E_CRITICAL, __('A user was deleted by another user', 'mah-domain'), __('Deleted User %TargetUserData->Username% with the role of %TargetUserData->Roles%', 'mah-domain')),
		),
		'Plugins & Themes' => array(
			array(5000, E_CRITICAL, __('User installed a plugin', 'mah-domain'), __('Installed the plugin %NewPlugin->Name% in %NewPlugin->plugin_dir_path%', 'mah-domain')),
			array(5001, E_CRITICAL, __('User activated a WordPress plugin', 'mah-domain'), __('Activated the plugin %PluginData->Name% installed in %PluginFile%', 'mah-domain')),
			array(5002, E_CRITICAL, __('User deactivated a WordPress plugin', 'mah-domain'), __('Deactivated the plugin %PluginData->Name% installed in %PluginFile%', 'mah-domain')),
			array(5003, E_CRITICAL, __('User uninstalled a plugin', 'mah-domain'), __('Uninstalled the plugin %PluginData->Name% which was installed in %PluginFile%', 'mah-domain')),
			array(5004, E_WARNING, __('User upgraded a plugin', 'mah-domain'), __('Upgraded the plugin %PluginData->Name% installed in %PluginFile%', 'mah-domain')),
			array(5005, E_CRITICAL, __('User installed a theme', 'mah-domain'), __('Installed theme "%NewTheme->Name%" in %NewTheme->get_template_directory%', 'mah-domain')),
			array(5006, E_CRITICAL, __('User activated a theme', 'mah-domain'), __('Activated theme "%NewTheme->Name%", installed in %NewTheme->get_template_directory%', 'mah-domain')),
		),
		'System Activity' => array(
			array(0000, E_CRITICAL, __('Unknown Error', 'mah-domain'), __('An unexpected error has occurred', 'mah-domain')),
			array(0001, E_CRITICAL, __('PHP error', 'mah-domain'), __('%Message%', 'mah-domain')),
			array(0002, E_WARNING, __('PHP warning', 'mah-domain'), __('%Message%', 'mah-domain')),
			array(0003, E_NOTICE, __('PHP notice', 'mah-domain'), __('%Message%', 'mah-domain')),
			array(0004, E_CRITICAL, __('PHP exception', 'mah-domain'), __('%Message%', 'mah-domain')),
			array(0005, E_CRITICAL, __('PHP shutdown error', 'mah-domain'), __('%Message%', 'mah-domain')),
			array(6000, E_NOTICE, __('Events automatically pruned by system', 'mah-domain'), __('%EventCount% event(s) automatically deleted by system', 'mah-domain')),
			array(6001, E_CRITICAL, __('Option Anyone Can Register in WordPress settings changed', 'mah-domain'), __('%NewValue% the option "Anyone can register"', 'mah-domain')),
			array(6002, E_CRITICAL, __('New User Default Role changed', 'mah-domain'), __('Changed the New User Default Role from %OldRole% to %NewRole%', 'mah-domain')),
			array(6003, E_CRITICAL, __('WordPress Administrator Notification email changed', 'mah-domain'), __('Changed the WordPress administrator notifications email address from %OldEmail% to %NewEmail%', 'mah-domain')),
			array(6004, E_CRITICAL, __('WordPress was updated', 'mah-domain'), __('Updated WordPress from version %OldVersion% to %NewVersion%', 'mah-domain')),
			array(6005, E_CRITICAL, __('User changes the WordPress Permalinks', 'mah-domain'), __('Changed the WordPress permalinks from %OldPattern% to %NewPattern%', 'mah-domain')),
		),
		'MultiSite' => array(
			array(4008, E_CRITICAL, __('User granted Super Admin privileges', 'mah-domain'), __('Granted Super Admin privileges to %TargetUsername%', 'mah-domain')),
			array(4009, E_CRITICAL, __('User revoked from Super Admin privileges', 'mah-domain'), __('Revoked Super Admin privileges from %TargetUsername%', 'mah-domain')),
			array(4010, E_CRITICAL, __('Existing user added to a site', 'mah-domain'), __('Added existing user %TargetUsername% with %TargetUserRole% role to site %SiteName%', 'mah-domain')),
			array(4011, E_CRITICAL, __('User removed from site', 'mah-domain'), __('Removed user %TargetUsername% with role %TargetUserRole% from %SiteName% site', 'mah-domain')),
			array(4012, E_CRITICAL, __('New network user created', 'mah-domain'), __('Created a new network user %NewUserData->Username%', 'mah-domain')),
			array(7000, E_CRITICAL, __('New site added on network', 'mah-domain'), __('Added site %SiteName% to the network', 'mah-domain')),
			array(7001, E_CRITICAL, __('Existing site archived', 'mah-domain'), __('Archived site %SiteName%', 'mah-domain')),
			array(7002, E_CRITICAL, __('Archived site has been unarchived', 'mah-domain'), __('Unarchived site %SiteName%', 'mah-domain')),
			array(7003, E_CRITICAL, __('Deactivated site has been activated', 'mah-domain'), __('Activated site %SiteName%', 'mah-domain')),
			array(7004, E_CRITICAL, __('Site has been deactivated', 'mah-domain'), __('Deactivated site %SiteName%', 'mah-domain')),
			array(7005, E_CRITICAL, __('Existing site deleted from network', 'mah-domain'), __('Deleted site %SiteName%', 'mah-domain')),
		),
	));
