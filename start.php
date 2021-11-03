<?php

elgg_register_event_handler('init', 'system', 'creador_init');

function creador_init() {

    elgg_extend_view('elgg.css', 'tema/p_css'); // no funciona
    $bootstrap_creador_custom_css = "/mod/proy_taller2021/views/default/tema/p_css.css"; // no funciona
    elgg_register_css('creador_custom_css', $bootstrap_creador_custom_css); // no funciona
    
    $jquery_js = "/mod/proy_taller2021/vendors/jquery351.js";
    $js_filesaver = "/mod/proy_taller2021/vendors/FileSaver.js";
    $jspdf = "/mod/proy_taller2021/vendors/jspdf.min.js";
    elgg_register_js('jquery_js', $jquery_js);
    elgg_register_js('js_filesaver', $js_filesaver);
    elgg_register_js('jspdf', $jspdf);

    elgg_load_css('creador_custom_css');
    elgg_load_js('jquery_js');
    elgg_load_js('js_filesaver');
    elgg_load_js('jspdf');
    
}