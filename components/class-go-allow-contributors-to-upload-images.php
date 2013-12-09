<?php
/**
 * All we do is to add a user_has_cap filter to grant contributor role
 * the 'upload_files' capability.
 */
class GO_Allow_Contributors_To_Upload_Images
{
	public function __construct()
	{
		add_filter( 'user_has_cap', array( $this, 'user_has_cap' ), 10, 3);
	}//END __construct

	/**
	 * add the upload_files user capability if the requester has the
	 * contributor capability.
	 */
	public function user_has_cap( $all_caps, $cap, $args )
	{
		if ( isset( $all_caps['contributor'] ) && $all_caps['contributor'] )
		{
			$all_caps['upload_files'] = TRUE;
		}
		return $all_caps;
	}//END user_has_cap
}//END GO_Fix_Upload_Files_Capability


function go_allow_contributors_to_upload_images()
{
	global $go_allow_contributors_to_upload_images;

	if ( ! $go_allow_contributors_to_upload_images )
	{
		$go_allow_contributors_to_upload_images = new GO_Allow_Contributors_To_Upload_Images();
	}

	return $go_allow_contributors_to_upload_images;
}//END go_allow_contributors_to_upload_images