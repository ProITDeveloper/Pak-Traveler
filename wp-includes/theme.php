<?php
/**
 * Theme, template, and stylesheet functions.
 *
 * @package WordPress
 * @subpackage Theme
 *
 * @link https://core.trac.wordpress.org/ticket/39752
 *
 * @since 4.8.0
 * @access private
 * @see wp_delete_auto_drafts()
 *
 * @param string   $new_status Transition to this post status.
 * @param string   $old_status Previous post status.
 * @param \WP_Post $post       Post data.
 * @global wpdb $wpdb
 */
function _wp_keep_alive_customize_changeset_dependent_auto_drafts( $new_status, $old_status, $post ) {
	global $wpdb;
	unset( $old_status );

	// Short-circuit if not a changeset or if the changeset was published.
	if ( 'customize_changeset' !== $post->post_type || 'publish' === $new_status ) {
		return;
	}

	$data = json_decode( $post->post_content, true );
	if ( empty( $data['nav_menus_created_posts']['value'] ) ) {
		return;
	}

	/*
	 * Actually, in lieu of keeping alive, trash any customization drafts here if the changeset itself is
	 * getting trashed. This is needed because when a changeset transitions to a draft, then any of the
	 * dependent auto-draft post/page stubs will also get transitioned to customization drafts which
	 * are then visible in the WP Admin. We cannot wait for the deletion of the changeset in which
	 * _wp_delete_customize_changeset_dependent_auto_drafts() will be called, since they need to be
	 * trashed to remove from visibility immediately.
	 */
	if ( 'trash' === $new_status ) {
		foreach ( $data['nav_menus_created_posts']['value'] as $post_id ) {
			if ( ! empty( $post_id ) && 'draft' === get_post_status( $post_id ) ) {
				wp_trash_post( $post_id );
			}
		}
		return;
	}

	$post_args = array();
	if ( 'auto-draft' === $new_status ) {
		/*
		 * Keep the post date for the post matching the changeset
		 * so that it will not be garbage-collected before the changeset.
		 */
		$post_args['post_date'] = $post->post_date; // Note wp_delete_auto_drafts() only looks at this date.
	} else {
		/*
		 * Since the changeset no longer has an auto-draft (and it is not published)
		 * it is now a persistent changeset, a long-lived draft, and so any
		 * associated auto-draft posts should likewise transition into having a draft
		 * status. These drafts will be treated differently than regular drafts in
		 * that they will be tied to the given changeset. The publish meta box is
		 * replaced with a notice about how the post is part of a set of customized changes
		 * which will be published when the changeset is published.
		 */
		$post_args['post_status'] = 'draft';
	}

	foreach ( $data['nav_menus_created_posts']['value'] as $post_id ) {
		if ( empty( $post_id ) || 'auto-draft' !== get_post_status( $post_id ) ) {
			continue;
		}
		$wpdb->update(
			$wpdb->posts,
			$post_args,
			array( 'ID' => $post_id )
		);
		clean_post_cache( $post_id );
	}
}
