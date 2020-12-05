<?php

  
	function qa_get_one_user_html($handle, $microdata = false, $favorited = false)
	{
		if (strlen($handle) === 0) {
			return qa_lang('main/anonymous');
		}

		$url = qa_path_html('user/' . $handle);
		$favclass = $favorited ? ' qa-user-favorited' : '';
		$userprofiles = qa_db_select_with_pending(qa_db_user_profile_selectspec($handle,false));
		if (isset($userprofiles['name'])) {
		  		  $fullname =   $userprofiles['name'];
		$userHtml =   	$microdata ? '<span itemprop="author" itemscope itemtype="https://schema.org/Person"><a href="' . $url . '" class="qa-user-link' . $favclass . '" itemprop="url"> <span itemprop="name">' . qa_html($fullname) . '</span></a> @'.qa_html($handle).'</span>': qa_html($fullname).' @'.qa_html($handle) ;
		}
       else {
        $userHtml =   	$microdata ? '<span itemprop="author" itemscope itemtype="https://schema.org/Person"><a href="' . $url . '" class="qa-user-link' . $favclass . '" itemprop="url"> <span itemprop="name">' . qa_html($handle) . '</span></a></span>': qa_html($handle); 
       }

		return $userHtml;
	}

/*
	Omit PHP closing tag to help avoid accidental output
*/
