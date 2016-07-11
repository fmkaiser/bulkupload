<?php
/**
 * ownCloud - bulkupload
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Florian Kaiser <florian.kaiser@mpcdf.mpg.de>
 * @copyright Florian Kaiser 2015
 */

namespace OCA\BulkUpload\AppInfo;

//\OCP\App::addNavigationEntry([
\OC::$server->getNavigationManager()->add([
	// the string under which your app will be referenced in owncloud
	'id' => 'bulkupload',

	// sorting weight for the navigation. The higher the number, the higher
	// will it be listed in the navigation
	'order' => 10,

	// the route that will be shown on startup
	'href' => \OC::$server->getURLGenerator()->linkToRoute('bulkupload.page.index'),

	// the icon that will be shown in the navigation
	// this file needs to exist in img/
	'icon' => \OC::$server->getURLGenerator()->imagePath('bulkupload', 'app.svg'),

	// the title of your application. This will be used in the
	// navigation or on the settings page of your app
	'name' => \OCP\Util::getL10N('bulkupload')->t('Bulk Upload')
]);
