<?php

/**
 * Class Controller
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class Controller
{
    /**
     * @var App|null
     */
    private $app = null;
    /**
     * @var DBConnection|null
     */
    private $DBConnection = null;

    /**
     * setApp description
     *
     * @param $app
     *
     * @return $this
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function setApp($app)
    {
        $this->app = $app;
        return $this;
    }

    /**
     * initialize description
     *
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function initialize()
    {
        if ($this->app) {
            $this->DBConnection = $this->app->getDBConnection();
        }
    }

    /**
     * loadModel description
     *
     * @param $name
     *
     * @return mixed
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function loadModel($name)
    {
        require APP_DIR . MODEL_FOLDER . DIRECTORY_SEPARATOR . $name . '.php';
        return new $name($this->DBConnection);
    }

    /**
     * loadView description
     *
     * @param $name
     *
     * @return View
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function loadView($name)
    {
        return new View($name);
    }

    /**
     * loadPlugin description
     *
     * @param $name
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function loadPlugin($name)
    {
        require APP_DIR . PLUGIN_FOLDER . DIRECTORY_SEPARATOR . $name . '.php';
    }

    /**
     * loadHelper description
     *
     * @param $name
     *
     * @return mixed
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function loadHelper($name)
    {
        require APP_DIR . HELPER_FOLDER . DIRECTORY_SEPARATOR . $name . '.php';
        return new $name;
    }

    /**
     * redirect description
     *
     * @param $loc
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function redirect($loc)
    {
        header('Location: ' . $loc);
    }
}
