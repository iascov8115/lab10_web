<?php
namespace services;
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
            // Merge global and local variables
            $vars = array_merge($this->vars, $variables);

            // Start output buffering
            ob_start();

            // Extract variables for the template
            extract($vars);

            // Include the template file
            include $path;

            // Get the contents of the output buffer
            $output = ob_get_clean();
        } else {
            throw new Exception("Template not found: {$path}");
        }

        return $output;
    }
}