<?php
/**
 * Created by PhpStorm.
 * User: talga
 * Date: 26.04.2018
 * Time: 11:42
 */
?>
<div class="culture-detail-holder">
    <div class="container relative">
        <div class="special-row margin-12">
            <ul class="culture-detail home-page clearfix">
                <?php

                foreach ($view->style_plugin->rendered_fields as $key => $view_field): ?>
                    <?php // krumo($view_field);exit;

                    $datefield = explode(',', $view_field['field_date_culture']);
                    $datefieldinvert = explode(' ', trim($datefield[1]));
                    if ($view_field['field_place_culture'] == 'Нет') {
                        $place = '';
                    } else {
                        $place = '<img src="/' . path_to_theme() . '/images/gl.png"" alt="иконка места проведения события" /> ' . $view_field['field_place_culture'];
                    }
                    if ($key == 0) {
                        $redyimg = $view_field['field_image_home_1_culture'];
                    } else {
                        $redyimg = $view_field['field_image_home_2_culture'];
                    }

                    if ($view_field['field_image_home_1_culture'] == "" AND $view_field['field_image_home_2_culture'] == "") {
                        $redyimg = $view_field['field_image_culture'];
                    }


                    echo '
                        <li class="culture-detail-item lazy"   data-src="'.$redyimg.'"   >
                        <a href="' . $view_field['path'] . '">
                            <div class="overlay-culture-detail"></div>
                                   <div  class="culture-top-block clearfix">
                                        <div class="culture-date">' . $datefieldinvert[1] . ' ' . $datefieldinvert[0] . '</div>
                                        <div class="cultre-place">' . $place . '</div>
                                    </div>
                                    <div class="culture-bottom-block">
                                        <h3>' . $view_field['title'] . '</h3>
                                        <div>' . $view_field['field_excerpt_culture'] . '</div>
                                    </div>
                        </a>
                        </li>
                ';
                    //var_dump($view_field);
                    /*  $params = array(
                          'style_name' => 'original',
                          'path' => $view_field['field_main_img'],
                          'alt' => '',
                          'title' => '',
                          'attributes' => array('class' => array('image')),
                          'getsize' => FALSE,
                      );
                      */
                endforeach; ?>


            </ul>


            <div class="col-md-12">
                <a href="/culturedetails" class="link-to-mateerial">Все материалы</a>
            </div>


        </div>
    </div>
</div>
