<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// section default
$template['default']['template'] = 'default/default_template';
$template['default']['regions'] = array(
    'top',
    'menu',
    'left',
    'content',
    'right',
    'bottom'
);
$template['default']['parser'] = 'parser';
$template['default']['parser_method'] = 'parse';
$template['default']['parse_template'] = FALSE;

// section Frontend 
$template['frontend']['template'] = 'frontend/default_template';
$template['frontend']['regions'] = array(
    'header_nav',
    'main',
    'footer'
);
$template['frontend']['parser'] = 'parser';
$template['frontend']['parser_method'] = 'parse';
$template['frontend']['parse_template'] = FALSE;

// section admin
$template['admin']['template'] = 'admin/default_template';
$template['admin']['regions'] = array(
    'header',
    'leftpanel',
    'content',
    'breadcrumbs',
    'title' => array('content' => array('')),
    'desption' => array('content' => array(''))
);
$template['admin']['parser'] = 'parser';
$template['admin']['parser_method'] = 'parse';
$template['admin']['parse_template'] = FALSE;

// section admin metronic
$template['backend']['template'] = 'backend/default_template';
$template['backend']['regions'] = array(
    'header',
    'siderbar',
    'content',
    'footer',
    'title' => array('content' => array('')),
    'desption' => array('content' => array('')),
    'khi'=> array('content' => array(''))
);
$template['backend']['parser'] = 'parser';
$template['backend']['parser_method'] = 'parse';
$template['backend']['parse_template'] = FALSE;
//$template['admin']['regions']['title'] = array('content' => array('<h1>CI Rocks!</h1>'));

// section Home 
$template['home']['template'] = 'home_frontend/default_template';
$template['home']['regions'] = array(
    'header_nav',
    'footer',
    'sidebar',
    'home_page'

);
$template['home']['parser'] = 'parser';
$template['home']['parser_method'] = 'parse';
$template['home']['parse_template'] = FALSE;
