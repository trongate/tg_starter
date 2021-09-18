<?php
class Templates extends Trongate {

    function public($data) {
        if (isset($data['additional_includes_top'])) {
            $data['additional_includes_top'] = $this->_build_additional_includes($data['additional_includes_top']);
        } else {
            $data['additional_includes_top'] = '';
        }

        if (isset($data['additional_includes_btm'])) {
            $data['additional_includes_btm'] = $this->_build_additional_includes($data['additional_includes_btm']);
        } else {
            $data['additional_includes_btm'] = '';
        }

        load('public', $data);
    }

    function _build_additional_includes($files) {

        $html = '';
        foreach ($files as $file) {

            $last_four = substr($file, -4);
            
            if ($last_four == '.css') {
                $html.= $this->_build_css_include_code($file);
                
            } else {
               $html.= $this->_build_js_include_code($file);
            }

            $html.= '
    ';
        }

        $html = trim($html);
        $html.= '
';
        return $html;
    }

}