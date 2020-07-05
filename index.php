<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php wp_title(); ?></title>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <header>
            <h1>Wandervogel</h1>
            <p>Blog Theme</p>
        </header>

        <div class="body">
            <main class="grid-item">
                <article>
                <? php the_post(); ?>
                </article>
            </main>

            <div class="side grid-item">
                <nav>
                    <h2>Links</h2>
                    <ul>
                        <li>Index</li>
                        <li>Category 1</li>
                        <li>Category 2</li>
                        <li>Category 3</li>
                    </ul>
                </nav>

                <aside>
                    <h2>Info</h2>

                    <dl>
                        <dt>Created</dt>
                        <dd>2020/4/1</dd>

                        <dt>Update</dt>
                        <dd>2020/4/2</dd>

                        <dt>Author</dt>
                        <dd>Author</dd>

                        <dt>Tags</dt>
                        <dd>Tag 1</dd>
                        <dd>Tag 2</dd>
                        <dd>Tag 3</dd>

                        <dt>Category</dt>
                        <dd>Category</dd>
                    </dl>
                </aside>
            </div>
        </div>

        <footer>
            <p>(c) 2020 Author</p>
            <p>Powered by WordPress and Love &lt;3 </p>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>