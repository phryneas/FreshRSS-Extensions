<?php
declare(strict_types=1);

class TTRSS_APIExtension extends Minz_Extension {
	public function init() {
		$this->registerHook(
			'post_update',
			array($this, 'postUpdateHook')
		);
	}

	public function install() {
		// this is mounted in via docker, nothing to install

		return true;
	}

	public function uninstall() {
		// this is mounted in via docker so it will be removed via docker - nothing to do

		return true;
	}

	public function postUpdateHook() {
		$res = $this->install();

		if ($res !== true) {
			Minz_Log::warning('Problem during TTRSS API extension post update: ' . $res);
		}
	}
}
