<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

    <?php if ($title_prefix || $title_suffix || $display_submitted || !$page): ?>
        <header>
            <?php print render($title_prefix); ?>
            <?php if (!$page): ?>
                <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
            <?php endif; ?>
            <?php print render($title_suffix); ?>

            <?php if ($display_submitted): ?>
                <div class="submitted">
                    <?php print $user_picture; ?>
                    <span class="glyphicon glyphicon-calendar"></span> <?php print $submitted; ?>
                </div>
            <?php endif; ?>
        </header>
    <?php endif; ?>

    <div class="content"<?php print $content_attributes; ?>>
        <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        hide($content['field_tags']);
        print render($content['body']);
        if (isset($content['field_description'])) {
            print render($content['field_description']);
        }
        if (isset($content['field_locations'])) {
            print render($content['field_locations']);
        }
        if (isset($content['field_phone'])) {
            print render($content['field_phone']);
        }
        if (isset($content['field_fax'])) {
            print render($content['field_fax']);
        }

        if (isset($content['field_email_address'])) {
            print '<div class="field field-name-field-contact-email field-type-email field-label-inline clearfix"><div class="field-label">Contact email:&nbsp;</div><div class="field-items"><div class="field-item even"><a href="mailto:' . $content['field_email_address']['#items'][0]['email'] . '?subject=REFERRAL:%20from%20Parents%20Helping%20Parents%20Website">' . $content['field_email_address']['#items'][0]['email'] . '</a></div></div></div>';
        }
        if (isset($content['field_website_url'])) {
            print render($content['field_website_url']);
        }

        if (isset($content['field_county'])) {
            print render($content['field_county']);
        }
        print '<div class="field field-name-field-contact-name field-type-text field-label-inline clearfix"><div class="field-label">Updated:&nbsp;</div><div class="field-items"><div class="field-item even">' . date("D, M d, o: g:i a", $content['body']['#object']->changed) . '</div></div></div>';
        print render($content['field_tags']);
        if (isset($content['field_services'])) {
            print render($content['field_services']);
        }
        print render($content['field_rate_the_service']);
        //      print render($content);
        ?>
    </div>

    <!--    --><?php //if (($tags = render($content['field_tags'])) || ($links = render($content['links']))): ?>
    <!--    <footer>-->
    <!--    --><?php //print render($content['field_tags']); ?>
    <!--    --><?php //print render($content['links']); ?>
    <!--    </footer>-->
    <!--    --><?php //endif; ?><!-- -->

    <?php print render($content['comments']); ?>

</article>