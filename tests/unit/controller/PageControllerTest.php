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

namespace OCA\BulkUpload\Controller;

use PHPUnit_Framework_TestCase;

use OCP\AppFramework\Http\TemplateResponse;


class PageControllerTest extends PHPUnit_Framework_TestCase {

	private $controller;
	private $userId = 'john';

	public function setUp() {
		$request = $this->getMockBuilder('OCP\IRequest')->getMock();

		$this->controller = new PageController(
			'bulkupload', $request, $this->userId
		);
	}

}
