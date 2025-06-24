<?php
    class TemplateController {
        public function template(){

            include($_SERVER['DOCUMENT_ROOT'].'/Views/template.php');
        }
    }
