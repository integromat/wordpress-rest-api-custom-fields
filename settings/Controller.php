<?php

namespace IntegromatAPI;


Class Controller {

	public function init()
	{

		add_action('admin_init', function () {

			// POSTS
			require_once __DIR__ . '/ObjectTypes/PostMeta.php';
			$PostsMeta = new PostsMeta();
			$PostsMeta->init();

			// COMMENTS
			require_once __DIR__ . '/ObjectTypes/CommentsMeta.php';
			$CommentsMeta = new CommentsMeta();
			$CommentsMeta->init();

			// USERS
			require_once __DIR__ . '/ObjectTypes/UserMeta.php';
			$UsersMeta = new UsersMeta();
			$UsersMeta->init();

			// TERMS
			require_once __DIR__ . '/ObjectTypes/TermMeta.php';
			$TermsMeta = new TermsMeta();
			$TermsMeta->init();

		});
	}

}

