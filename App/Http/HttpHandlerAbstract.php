<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/5/2018
 * Time: 8:37 PM
 */

namespace App\Http;


use Core\DataBinderInterface;
use Core\TemplateInterface;

class HttpHandlerAbstract
{
    /** @var TemplateInterface */
    private $template;
    /** @var DataBinderInterface */
    protected $dataBinder;
    /**
     * HttpHandlerAbstract constructor.
     * @param TemplateInterface $template
     */
    public function __construct(TemplateInterface $template, DataBinderInterface $dataBinder)
    {
        $this->template = $template;
        $this->dataBinder = $dataBinder;
    }
    public function render(string $templateName, $data = null){
        $this->template->render($templateName,$data);
    }
    public function redirect($url){
        header("Location: $url");
    }

}