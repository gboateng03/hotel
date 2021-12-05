<?php
if (!function_exists('erios_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function erios_posted_on() {
        echo '<div class="entry-meta-inner">';

        /* translators: used between list items, there is a space after the comma */
        $separate_meta = esc_html__(',	&nbsp;', 'erios');

        // Get Categories for posts.
        $categories_list = get_the_category_list($separate_meta);
        $categories = '';
        if ('post' === get_post_type()) {
            // Make sure there's more than one category before displaying.
            if ($categories_list && erios_categorized_blog()) {

                $categories = sprintf(
                /* translators: %s: post author */
                    ' %s',
                    '<span class="entry-category">' . wp_kses_post($categories_list) . '</span>'
                );
            }
        }
        echo wp_kses_post($categories) . '<span class="post-date">' . erios_time_link() . '</span>';
        // Finally, let's write all of this to the page.
        echo '</div>';
    }
endif;


if (!function_exists('erios_time_link')) :
    /**
     * Gets a nicely formatted string for the published date.
     */
    function erios_time_link() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf($time_string,
            get_the_date(DATE_W3C),
            get_the_date(),
            get_the_modified_date(DATE_W3C),
            get_the_modified_date()
        );

        // Wrap the time string in a link, and preface it with 'Posted on'.
        return '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>';
    }
endif;



if (!function_exists('erios_entry_footer')):
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function erios_entry_footer() {

        // Get Tags for posts.
        $tags_list = get_the_tag_list('', ' ');

        // We don't want to output .entry-footer if it will be empty, so make sure its not.
        if ($tags_list) {

            echo '<footer class="entry-footer">';

            if ('post' === get_post_type()) {
                erios_social_share();
                echo '<div class="cat-tags-links">';
                if ($tags_list) {
                    echo '<span class="tags-links">' . $tags_list . '</span>';
                }
                echo '</div>';
            }

            echo '</footer> <!-- .entry-footer -->';
        }
    }
endif;


if (!function_exists('erios_edit_link')) :
    /**
     * Returns an accessibility-friendly link to edit a post or page.
     *
     * This also gives us a little context about what exactly we're editing
     * (post or page?) so that users understand a bit more where they are in terms
     * of the template hierarchy and their content. Helpful when/if the single-page
     * layout with multiple posts/pages shown gets confusing.
     */
    function erios_edit_link() {
        edit_post_link(
            sprintf(
            /* translators: %s: Name of current post */
                __('Edit<span class="screen-reader-text"> "%s"</span>', 'erios'),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function erios_categorized_blog() {
    $category_count = get_transient('erios_categories');

    if (false === $category_count) {
        // Create an array of all the categories that are attached to posts.
        $categories = get_categories(array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ));

        // Count the number of categories that are attached to the posts.
        $category_count = count($categories);

        set_transient('erios_categories', $category_count);
    }

    // Allow viewing case of 0 or 1 categories in post preview.
    if (is_preview()) {
        return true;
    }

    return $category_count > 1;
}


/**
 * Flush out the transients used in erios_categorized_blog.
 */
function erios_category_transient_flusher() {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient('erios_categories');
}

add_action('edit_category', 'erios_category_transient_flusher');
add_action('save_post', 'erios_category_transient_flusher');