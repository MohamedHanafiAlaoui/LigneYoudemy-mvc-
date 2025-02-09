<?php
/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */

class Core {

    protected $currentController = 'Pages'; // Default Controller (change as needed)
    protected $currentMethod = 'index';      // Default Method
    protected $params = [];                  // URL Parameters

    public function __construct() {
        $url = $this->getUrl();

        // Check if controller file exists
        if (isset($url[0]) && file_exists('../App/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        // Require and instantiate the current controller
        require_once '../App/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        // Check if method exists in the controller
        if (isset($url[1]) && method_exists($this->currentController, $url[1])) {
            $this->currentMethod = $url[1];
            unset($url[1]);
        }

        // Get remaining parameters
        $this->params = $url ? array_values($url) : [];

        // Call the controller method with the provided parameters
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    /**
     * Parse and sanitize the URL
     * @return array
     */
    public function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }
}
?>
