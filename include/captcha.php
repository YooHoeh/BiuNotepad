<?php 
    require 'captcha.class.php';
    $an = new Captcha();
    $an->ext_num_type = '';
    $an->ext_pixel = true; //干扰点
    $an->ext_line = true; //干扰线
    $an->ext_rand_y = true; //Y轴随机
    $an->green = 238;
    $an->create();
?>