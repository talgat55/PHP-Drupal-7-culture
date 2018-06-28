<?php

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see bartik_process_page()
 * @see html.tpl.php
 */
?>
<?php include('header.tpl.php'); ?>

    <div class="container">
        <div class="top-block-content">
            <?php if ($breadcrumb): ?>
                <div id="breadcrumb"><?php print $breadcrumb; ?></div>
            <?php endif; ?>
            <?php
            if (isset($node) && $node->type == 'culture_detail' || isset($node) && $node->type == 'article') {
                ?>
                <div class="share-block">
                    <?php
                    $uri = $_SERVER['HTTP_HOST'] . '/' . request_uri();

                    ?>
                    <p>Поделиться</p>
                    <div class="ya-share2" data-services="telegram,vkontakte,facebook"
                         data-title='<?php print $node->title; ?>' data-url="<?php echo $uri; ?>"></div>
                </div>
                <?php if ($node->type == 'article') { ?>
                    <a class="button-print" href="#" onClick="window.print()"><img src="data:image/svg+xml;base64,
PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNDgyLjUgNDgyLjUiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQ4Mi41IDQ4Mi41OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiPjxnPjxnPgoJPGc+CgkJPHBhdGggZD0iTTM5OS4yNSw5OC45aC0xMi40VjcxLjNjMC0zOS4zLTMyLTcxLjMtNzEuMy03MS4zaC0xNDkuN2MtMzkuMywwLTcxLjMsMzItNzEuMyw3MS4zdjI3LjZoLTExLjMgICAgYy0zOS4zLDAtNzEuMywzMi03MS4zLDcxLjN2MTE1YzAsMzkuMywzMiw3MS4zLDcxLjMsNzEuM2gxMS4ydjkwLjRjMCwxOS42LDE2LDM1LjYsMzUuNiwzNS42aDIyMS4xYzE5LjYsMCwzNS42LTE2LDM1LjYtMzUuNiAgICB2LTkwLjRoMTIuNWMzOS4zLDAsNzEuMy0zMiw3MS4zLTcxLjN2LTExNUM0NzAuNTUsMTMwLjksNDM4LjU1LDk4LjksMzk5LjI1LDk4Ljl6IE0xMjEuNDUsNzEuM2MwLTI0LjQsMTkuOS00NC4zLDQ0LjMtNDQuM2gxNDkuNiAgICBjMjQuNCwwLDQ0LjMsMTkuOSw0NC4zLDQ0LjN2MjcuNmgtMjM4LjJWNzEuM3ogTTM1OS43NSw0NDcuMWMwLDQuNy0zLjksOC42LTguNiw4LjZoLTIyMS4xYy00LjcsMC04LjYtMy45LTguNi04LjZWMjk4aDIzOC4zICAgIFY0NDcuMXogTTQ0My41NSwyODUuM2MwLDI0LjQtMTkuOSw0NC4zLTQ0LjMsNDQuM2gtMTIuNFYyOThoMTcuOGM3LjUsMCwxMy41LTYsMTMuNS0xMy41cy02LTEzLjUtMTMuNS0xMy41aC0zMzAgICAgYy03LjUsMC0xMy41LDYtMTMuNSwxMy41czYsMTMuNSwxMy41LDEzLjVoMTkuOXYzMS42aC0xMS4zYy0yNC40LDAtNDQuMy0xOS45LTQ0LjMtNDQuM3YtMTE1YzAtMjQuNCwxOS45LTQ0LjMsNDQuMy00NC4zaDMxNiAgICBjMjQuNCwwLDQ0LjMsMTkuOSw0NC4zLDQ0LjNWMjg1LjN6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiPjwvcGF0aD4KCQk8cGF0aCBkPSJNMTU0LjE1LDM2NC40aDE3MS45YzcuNSwwLDEzLjUtNiwxMy41LTEzLjVzLTYtMTMuNS0xMy41LTEzLjVoLTE3MS45Yy03LjUsMC0xMy41LDYtMTMuNSwxMy41UzE0Ni43NSwzNjQuNCwxNTQuMTUsMzY0LjQgICAgeiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIj48L3BhdGg+CgkJPHBhdGggZD0iTTMyNy4xNSwzOTIuNmgtMTcyYy03LjUsMC0xMy41LDYtMTMuNSwxMy41czYsMTMuNSwxMy41LDEzLjVoMTcxLjljNy41LDAsMTMuNS02LDEzLjUtMTMuNVMzMzQuNTUsMzkyLjYsMzI3LjE1LDM5Mi42eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIj48L3BhdGg+CgkJPHBhdGggZD0iTTM5OC45NSwxNTEuOWgtMjcuNGMtNy41LDAtMTMuNSw2LTEzLjUsMTMuNXM2LDEzLjUsMTMuNSwxMy41aDI3LjRjNy41LDAsMTMuNS02LDEzLjUtMTMuNVM0MDYuNDUsMTUxLjksMzk4Ljk1LDE1MS45eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIj48L3BhdGg+Cgk8L2c+CjwvZz48L2c+IDwvc3ZnPg==" /> Печать</a>
                <?php } ?>
                <?
            }

            ?>
        </div>


        <div id="content" class="column">
            <div class="section">


                <div id="content" class="column">
                    <div class="section">
                        <?php print render($title_prefix); ?>
                        <?php
                        $type = $node->type;
                        if ($type == 'culture_detail' || $type == 'article' || $type == 'afisha' || $type == 'place') {

                        } else {
                            if ($title):

                                echo '
                                    <h1 class="title-section bottom-border-title margin-top-10 margin-bottom-60 no-after">
                                       ' . $title . '
                                    </h1> ';
                            endif;
                        } ?>
                        <?php print render($title_suffix); ?>

                        <?php print render($page['content']); ?>


                    </div>
                </div> <!-- /.section, /#content -->


            </div>
        </div> <!-- /.section, /#content -->


    </div>
<?php
include('footer.tpl.php');
?>