<?php
namespace Services;
use Exception;

class Template {
    private $templatePath;
    private $vars;

    public function __construct($templatePath = 'templates') {
        $this->templatePath = rtrim($templatePath, '/\\') . '/';
        $this->vars = [];
    }

    public function assign($key, $value) {
        $this->vars[$key] = $value;
    }

    public function render($templateFile, $variables = []) {
        $output = '';
        $path = $this->templatePath . $templateFile;

        if (file_exists($path)) {
            $vars = array_merge($this->vars, $variables);

            ob_start();
            extract($vars);
            include $path;
            $output = ob_get_clean();
        } else {
            throw new Exception("Template not found: {$path}");
        }

        return $output;
    }
}