<?php
/**
 * Created by PhpStorm.
 * User: talga
 * Date: 26.04.2018
 * Time: 11:42
 */
?>
<div class="news-holder">
    <div class="container relative">

        <div class="special-row margin-10">
            <ul class="news home-page clearfix">
                <?php
                $i = 0;
                foreach ($view->style_plugin->rendered_fields as $view_field): ?>
                    <?php // krumo($view_field);exit;


                    $datefield = explode(',', $view_field['created']);
                    $datefieldinvert = explode(' ', trim($datefield[1]));

                    if ($i == 8) {
                        echo '</ul>';
                        echo '
                   
                        ';
                        print views_embed_view('banner_news', 'block');
                        // print views_embed_view('faculty_core','block_1', $node->nid);

                        echo '<ul class="news home-page clearfix margin-botom-news-custom">';
                    }


                    echo '
                <li class="item-news-page">
                    <a href="' . $view_field['path'] . '">
                    <div class="news-item">
                    <div class="date-news">' . $datefieldinvert[1] . ' ' . $datefieldinvert[0] . '</div>
                    <img src="'.$view_field["field_image"].'"/>
                    <h3>' . $view_field["title"] . '</h3>
                    <div  class="news-text-block">
                        ' . $view_field["field_anons"] . '
                    </div>
                    </div>
                    </a>
                </li>
                ';


                    $i++;
                endforeach; ?>


            </ul>
            <div class="item-list">
                <ul class="pager pager-load-more  news">
                    <a href="#">показать еще</a>
                </ul>
            </div>

        </div>
    </div>
</div>
