<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

/**
 * This ApiController is used to maintain consistancy for the api responses.
 * Also common function for apis can be added in this
 *
 * @author Nitin Kumar Soni
 */
class ApiController extends BaseController {

    /**
     * API response code
     * @var int
     */
    private $responseCode = 200;
    protected $apiResponse = array(
        'response_code' => 200,
        'message' => '',
        'data' => []
    );

    /**
     * Send json response
     * @return type
     */
    protected function sendResponse()
    {
        $this->apiResponse['response_code'] = $this->responseCode;
        return response()->json($this->apiResponse, $this->responseCode);
    }

    /**
     * 
     * @return type
     */
    function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * 
     * @param type $responseCode
     */
    function setResponseCode($responseCode)
    {
        $this->responseCode = $responseCode;
    }

}
