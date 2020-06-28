<?php


/**
 * Class View
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class View implements IView
{
    /**
     * @var string
     */
    private $errorMSGKey = '__errorMSG';
    /**
     * @var null
     */
    private $viewName = null;
    /**
     * @var bool|string|null
     */
    private $viewPath = null;
    /**
     * @var bool|string|null
     */
    private $headerPath = null;
    /**
     * @var bool|string|null
     */
    private $footerPath = null;
    /**
     * @var array
     */
    private $pageData = [];


    /**
     * View constructor.
     *
     * @param $viewName
     */
    public function __construct($viewName)
    {
        $this->viewName = $viewName;
        $this->viewPath = $this->viewPath($viewName);
        $this->headerPath = $this->viewPath('header');
        $this->footerPath = $this->viewPath('footer');
    }

    /**
     * viewPath description
     *
     * @param $viewName
     *
     * @return bool|string
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    private function viewPath($viewName)
    {
        return realpath(VIEW_FOLDER . DIRECTORY_SEPARATOR . $viewName . '.php');
    }

    /**
     * withError description
     *
     * @param null $errorMSG
     *
     * @return $this
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function withError($errorMSG = null)
    {
        $this->setData($this->errorMSGKey, $errorMSG);
        return $this;
    }

    /**
     * setHeader description
     *
     * @param $header
     *
     * @return $this
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function setHeader($header)
    {
        $this->headerPath = $this->viewPath($header);
        return $this;
    }

    /**
     * setFooter description
     *
     * @param $footer
     *
     * @return $this
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function setFooter($footer)
    {
        $this->footerPath = $this->viewPath($footer);
        return $this;
    }

    /**
     * noHeader description
     *
     * @return $this
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function noHeader()
    {
        $this->headerPath = null;
        return $this;
    }

    /**
     * noFooter description
     *
     * @return $this
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function noFooter()
    {
        $this->footerPath = null;
        return $this;
    }

    /**
     * render description
     *
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function render()
    {
        extract($this->getPageData());
        if ($this->headerPath) {
            include_once $this->headerPath;
        }

        include_once $this->viewPath;

        if ($this->footerPath) {
            include_once $this->footerPath;
        }
    }

    /**
     * setData description
     *
     * @param $key
     * @param $value
     *
     * @return $this
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function setData($key, $value)
    {
        $this->pageData[$key] = $value;
        return $this;
    }

    /**
     * setPageData description
     *
     * @param array $pageData
     *
     * @return $this
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function setPageData($pageData)
    {
        foreach ($pageData as $key => $value) {
            $this->setData($key, $value);
        }
        return $this;
    }

    /**
     * getPageData description
     *
     * @return array
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    private function getPageData()
    {
        return $this->pageData;
    }
}
