<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?> | My Theme by Simon</title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />

    <?php wp_head(); ?>
</head>
<body>
    <!--  HEADER  -->
    <header id="header">

        <!--  TITLE  -->
        <h1 id="title"><?php bloginfo('name'); ?></h1>
        <!--  /TITLE  -->

        <!--  NAVIGATION  -->
        <nav id="navigation">
            <?php wp_nav_menu(array('theme_location' => 'main')); ?>
        </nav>
        <!--  /NAVIGATION  -->
    </header>
    <!--  /HEADER  -->

    <!--  WRAP  -->
    <div id="wrap">

        <!--  CONTENT  -->
        <section id="content">
            <?php if(have_posts()): ?>

                <!--  LOOP  -->
                <div id="loop">
                    <?php while(have_posts()) : the_post(); ?>

                    <!--  ARTICLE  -->
                    <article>
                        <h2><?php the_title(); ?></h2>
                        <p>Publié le <?php the_time('d/m/Y'); ?> <?php if(!is_page()) : ?> dans <?php the_category(', '); ?><?php endif; ?></p>
                        <?php if(is_singular()): ?> 
                            <?php the_content(); ?>
                        <?php else : ?>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>">Lire la suite</a>
                        <?php endif; ?>
                    </article>
                    <!--  /ARTICLE  -->

                    <?php endwhile; ?>
                </div>
                <!--  /LOOP  -->

            <?php else : ?>
                <p>Aucun résultat</p>
            <?php endif; ?>
        </section>
        <!--  /CONTENT  -->

        <!--  SIDEBAR  -->
        <aside id="sidebar">
            <?php dynamic_sidebar('main-sidebar'); ?>
        </aside>
        <!--  /SIDEBAR  -->
    </div>
    <!--  /WRAP  -->

    <!--  PAGINATION  -->
    <div id="pagination">
        <?= paginate_links(); ?>
    </div>
    <!--  /PAGINATION  -->

    <!--  FOOTER  -->
    <footer id="footer">
        <?php dynamic_sidebar('footer-sidebar'); ?>
    </footer>
    <?php wp_footer(); ?>
    <!--  /FOOTER  -->
</body>
</html>