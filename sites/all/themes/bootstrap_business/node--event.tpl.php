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
        //        print render($content['field_reserve_seats']);
        if (isset($content['already_registered']) && $content['already_registered']['value'] == TRUE) {
            print "<div class='already-registered'>You are already registered to this event</div>";
        }
        if (isset($content['field_reserve_seats'])) {
            print "<div class='field field-name-field-reserve-seats field-type-link-field field-label-hidden'><div class='field-items'><a href='" . $content['field_reserve_seats'][0]['#element']['display_url'] . "'>Reserve Seats</a></div></div>";
        }
        if (isset($content['field_start_date']) && isset($content['field_end_date'])) {
            $date_formatted = date("D, M d, o: g:i a", strtotime($content['field_start_date']['#items'][0]['value'])) . " to " . date("g:i a", strtotime($content['field_end_date']['#items'][0]['value']));
            print "<strong>" . $date_formatted . "</strong>";
        }
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        hide($content['field_tags']);
        hide($content['field_start_date']);
        hide($content['field_end_date']);
        print render($content['body']);
        if (isset($content['field_attach_pdf'])) {
            print render($content['field_attach_pdf']);
        }
        if (isset($date_formatted)) {
            print '<div class="field field-name-field-contact-name field-type-text field-label-inline clearfix"><div class="field-label">Date:&nbsp;</div><div class="field-items"><div class="field-item even">' . $date_formatted . '</div></div></div>';
        }

        if (isset($content['field_locations'])) {
            print render($content['field_locations']);
        }

        if (isset($content['field_fee_description'])) {
            print render($content['field_fee_description']);
        }

        if (isset($content['field_contact_name'])) {
            print render($content['field_contact_name']);
        }

        if (isset($content['field_contact_phone'])) {
            print render($content['field_contact_phone']);
        }

        if (isset($content['field_member_fee'])) {
            print render($content['field_member_fee']);
        }

        if (isset($content['field_nonmember_fee'])) {
            print render($content['field_nonmember_fee']);
        }
        if (isset($content['field_contact_email'])) {
            print '<div class="field field-name-field-contact-email field-type-email field-label-inline clearfix"><div class="field-label">Contact email:&nbsp;</div><div class="field-items"><div class="field-item even"><a href="mailto:' . $content['field_contact_email']['#items'][0]['email'] . '?subject=REFERRAL:%20from%20Parents%20Helping%20Parents%20Website">' . $content['field_contact_email']['#items'][0]['email'] . '</a></div></div></div>';
        }
        //        print render($content['field_contact_email']);

        if (isset($content['field_presented_in'])) {
            print render($content['field_presented_in']);
        }
        if (isset($content['field_sponsor_url'])) {
            print render($content['field_sponsor_url']);
        }
        if (isset($content['field_reserve_seats'])) {
            print "<div class='field field-name-field-reserve-seats field-type-link-field field-label-hidden'><div class='field-items'><a href='" . $content['field_reserve_seats'][0]['#element']['display_url'] . "'>Reserve Seats</a></div></div>";
        }
        //        print render($content);
        ?>
    </div>

    <?php if (($tags = render($content['field_tags'])) || ($links = render($content['links']))): ?>
        <footer>
            <?php print render($content['field_tags']); ?>
            <?php print render($content['links']); ?>
        </footer>
    <?php endif; ?>

    <?php print render($content['comments']); ?>

</article>