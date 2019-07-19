<?php

/**
 * Class MainController
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class MainController extends Controller
{
    /**
     * MainController constructor.
     *
     * @param App $app
     */
    public function __construct(App $app)
    {
        parent::__construct($app);
    }

    /**
     * index description
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function index()
    {
        $template = $this->loadView('index');
        $template->sets(['firstName' => 'Dinanath', 'lastName' => 'Thakur']);
        $template->render();
    }
}
