<?php


namespace view\home;

class Form
{
    public $data;
    public function __construct($data)
    {
      $this->data = $data;  
    }


    private function getValue($index)
    {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }


    public function label(string $name, string $text, string $class)
    {
        return "<label for=\"{$name}\" class=\"$class\">{$text}</label>";
    }

    public function input(string $name, string $type, string $class, string $required = null)
    {
        return "<input type=\" {$type} \" class=\"{$class}\" id=\"{$name}\" name=\"{$name}\" value = \"{$this->getValue($name)}\" $required/>";
    }

  
    public function submit(string $type = "submit", string $text = "Envoyer")
    {
       return "<button type=\"{$type}\">{$text}</button>";
    }
}