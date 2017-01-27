<?php

namespace Frm\Core;

class Request 
{

    /**
     * 
     * Initialize request
     */
    public function __construct()
    {
        $this->init();
    }    
    
    /**
     * 
     * Init request params from globals
     */
    protected function init()
    {
        global $argv;
        $this->argv = $argv;
        $this->server = isset($_SERVER) ? $_SERVER : array();
        $this->isAjax =
            isset($this->server['X_HTTP_REQUEST_WITH']) &&
            strtolower($this->server['X_HTTP_REQUEST_WITH'] === 'xhrhttprequest');
        $this->isConsole = defined('PHP_SAPI') && PHP_SAPI === 'cli';
        $this->post = $_POST;
        $this->get = $_GET;
        $this->uri = isset($this->server['REQUEST_URI']) ?
            $this->server['REQUEST_URI'] :
            '';
        $this->queryString = isset($this->server['QUERY_STRING']) ?
            $this->server['QUERY_STRING'] :
            '';
        $this->ip = isset($this->server['REMOTE_ADDR']) ?
            $this->server['REMOTE_ADDR'] :
            null;
        $this->userAgent = isset($this->server['USER_AGENT']) ?
            $this->server['USER_AGENT'] :
            '';
        $this->method = isset($this->server['HTTP_METHOD']) ?
            strtoupper($this->server['HTTP_METHOD']) :
            null;
        $this->files = isset($_FILES) ?
            $_FILES :
            array();
    } 

    /**
     * 
     * @return array
     */
    public function getConsoleArguments()
    {
        return $this->argv;
    }

    /**
     * 
     * @return bool
     */
    public function hasConsoleArguments()
    {
        return count($this->argv) > 0;
    }

    /**
     * 
     * @param null $param
     *
     * @return mixed|null|array
     */
    public function getServer($param = null)
    {
        return $this->getArrayFieldParam('server', $param);
    }

    /**
     * 
     * @param null $param
     *
     * @return array|mixed|null
     */
    public function getPost($param = null)
    {
        return $this->getArrayFieldParam('post', $param);
    }

    /**
     * 
     * @param null $param
     *
     * @return array|mixed|null
     */
    public function getQuery($param = null)
    {
        return $this->getArrayFieldParam('query', $param);
    }

    /**
     * 
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * 
     * HTTP Method in uppercase
     *
     * @return null|string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * 
     * @return null|string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * 
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * 
     * @return bool
     */
    public function isAjax()
    {
        return $this->isAjax;
    }

    public function isPost()
    {
        return $this->method === 'POST';
    }

    /**
     * 
     * @return bool
     */
    public function isConsole()
    {
        return $this->isConsole;
    }

    /**
     * 
     * @return string
     */
    public function getQueryString()
    {
        return $this->queryString;
    }

    /**
     * 
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * 
     * @param $arrayField
     * @param $param
     *
     * @return mixed|null|array
     */
    protected function getArrayFieldParam($arrayField, $param = null)
    {
        if($param === null) {
            return $this->$arrayField;
        }
        elseif(isset($this->$arrayField[$param])) {
            return $this->$arrayField[$param];
        }

        return null;
    }    
}
