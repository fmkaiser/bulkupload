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

use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;

class PageController extends Controller {

	public function __construct($AppName, IRequest $request, $UserId){
		parent::__construct($AppName, $request);
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function index() {
		$savePath = "/bulkupload";	
		if (\OC\Files\Filesystem::file_exists($savePath) === false ){
			$status = \OC\Files\Filesystem::mkdir($savePath);
		}

		return new TemplateResponse('bulkupload', 'main', $params);  // templates/main.php
	}

}
