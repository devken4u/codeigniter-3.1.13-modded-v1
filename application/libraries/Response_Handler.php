<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Response_Handler
{

    /**
     * @var CI_Controller $CI CodeIgniter Super Object instance
     */
    protected $CI;


    public function __construct()
    {
        $this->CI = &get_instance();
    }

    /**
     * Sends a successful JSON response (HTTP 200 OK).
     *
     * @param string $message A descriptive success message.
     * @param array $data Optional additional data to include in the response.
     * @param int $status_code Optional HTTP status code (defaults to 200).
     * @return CI_Output Returns the CI_Output object for chaining if desired.
     */
    public function success($message = 'Operation successful.', $data = [], $status_code = 200)
    {
        $response_data = [
            'status' => 'ok',
            'message' => $message
        ];

        // Merge additional data if provided
        if (!empty($data) && is_array($data)) {
            $response_data = array_merge($response_data, $data);
        }

        return $this->CI->output
            ->set_content_type('application/json')
            ->set_status_header($status_code)
            ->set_output(json_encode($response_data));
    }

    /**
     * Sends an error JSON response (HTTP 500 Internal Server Error by default).
     *
     * @param string $message A descriptive error message.
     * @param int $status_code Optional HTTP status code (defaults to 500).
     * @param array $errors Optional array of specific error details.
     * @return CI_Output Returns the CI_Output object for chaining if desired.
     */
    public function error($message = 'An error occurred.', $status_code = 500, $errors = [])
    {
        $response_data = [
            'status' => 'error',
            'message' => $message
        ];

        // Include specific error details if provided
        if (!empty($errors) && is_array($errors)) {
            $response_data['errors'] = $errors;
        }

        return $this->CI->output
            ->set_content_type('application/json')
            ->set_status_header($status_code)
            ->set_output(json_encode($response_data));
    }

}