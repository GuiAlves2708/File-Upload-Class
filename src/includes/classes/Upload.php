<?php

class Upload {

	private $_supportedFormats = ['image/jpg', 'image/jpeg', 'image/png'];

	private function encryption($str) {
		return md5($str);
	}

	private function verify_file($file) {
		if (is_array($file)) {
			return true;
		} else {
			return false;
		}
	}

	private function verify_format($file) {
		if ($this->verify_file($file)) {
			if (in_array($file['type'], $this->_supportedFormats)) {
				return true;
			}
		} else {
			return false;
		}
	}

	private function verify_size($file) {
		$file_size = $file['size'];

		if ($file_size > 2097152) {
			return false;
		} else {
			return true;
		}
	}

	public function upload_file($file) {
		if ($this->verify_format($file)) {
			if ($this->verify_size($file)) {
				move_uploaded_file($file['tmp_name'], FOLDER_UPLOADS . '/' . $this->encryption($file['name']) . '.' . pathinfo($file['name'],PATHINFO_EXTENSION));
			} else {
				return false;
			}
			return true;
		} else {
			return false;
		}
	}
}