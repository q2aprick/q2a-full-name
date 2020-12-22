<?php

  
	function qa_get_one_user_html($handle, $microdata = false, $favorited = false)
	{
		if (strlen($handle) === 0) {
			return qa_lang('main/anonymous');
		}

		$url = qa_path_html('user/' . $handle);
		$favclass = $favorited ? ' qa-user-favorited' : '';
		$userprofiles = qa_db_select_with_pending(qa_db_user_profile_selectspec($handle,false));
		if (strlen($userprofiles['name']) > 0) {
		  		  $fullname =   $userprofiles['name'];
		$userHtml =   	$microdata ? '<span itemprop="author" itemscope itemtype="https://schema.org/Person"><a href="' . $url . '" class="qa-user-link' . $favclass . '" itemprop="url" rel="nofollow"> <span style="font-weight: bolder;" itemprop="name">' . qa_html($fullname) . '</span></a> @'.qa_html($handle).'</span>': '<a href="' . $url . '" class="qa-user-link' . $favclass . '" rel="nofollow"><span style="font-weight: bolder;">'. qa_html($fullname).'</span></a> @'.qa_html($handle) ;
		}
       else {
        $userHtml =   	$microdata ? '<span itemprop="author" itemscope itemtype="https://schema.org/Person"><a href="' . $url . '" class="qa-user-link' . $favclass . '" itemprop="url" rel="nofollow"> <span itemprop="name">' . qa_html($handle) . '</span></a></span>': '<a href="' . $url . '" class="qa-user-link' . $favclass . '" rel="nofollow">'.qa_html($handle).'</a>'; 
                }

		return $userHtml;
	}

/*
	Omit PHP closing tag to help avoid accidental output
*/
