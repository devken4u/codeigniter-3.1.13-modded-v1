<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * App_Session Library
 *
 * A custom CodeIgniter 3 library to encapsulate and manage session operations.
 * This provides a centralized point for all session-related functions
 * and abstracts the direct usage of CodeIgniter's native Session library.
 */
class App_Session
{
    /**
     * @var CI_Controller $CI CodeIgniter Super Object instance
     */
    protected $CI;

    /**
     * Class constructor.
     *
     * Loads the CodeIgniter Session library.
     */
    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
    }

    /**
     * Sets a session user data item.
     *
     * @param string $key The key for the session item.
     * @param mixed $value The value to store in the session.
     * @return void
     */
    public function set($key, $value)
    {
        $this->CI->session->set_userdata($key, $value);
    }

    /**
     * Retrieves a session user data item.
     *
     * @param string $key The key of the session item to retrieve.
     * @return mixed The value of the session item, or NULL if not found.
     */
    public function get($key)
    {
        return $this->CI->session->userdata($key);
    }

    /**
     * Retrieves all session user data.
     *
     * @return array An associative array containing all session data.
     */
    public function get_all_data()
    {
        return $this->CI->session->all_userdata();
    }

    /**
     * Destroys the current session.
     *
     * This will clear all session data and regenerate the session ID.
     * @return void
     */
    public function destroy()
    {
        $this->CI->session->sess_destroy();
    }

    /**
     * Checks if a specific session user data item exists and is not null.
     *
     * @param string $userdata The key of the session item to check.
     * @return bool TRUE if the session item exists and is not null, FALSE otherwise.
     */
    public function is_userdata_existing($userdata)
    {
        // Using $this->get() ensures consistency with this library's methods
        if (is_null($this->get($userdata))) {
            return false;
        }
        return true;
    }
}