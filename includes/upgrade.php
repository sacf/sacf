<?php
/**
 * Used to some things after a version update
 *
 * @since 2.0.0
 * @package sacf\utils
 */

namespace sacf;

class upgrade {

	public function __construct() {
		$dbVersion = get_option("sacf_version", null);
		if ($dbVersion === null) {
			$this->maybeUpgrade("2.0.0");
		} else if (version_compare($dbVersion, SACF_VERSION) < 0) {
			$this->maybeUpgrade($dbVersion);
		}
	}

	private static function adminNotice($text, $button = false, $dismissable = null) {
		if (is_null($dismissable)) {
			$dismissable = $button !== false;
		}

		echo '<div class="notice notice-success' . ($dismissable ? " is-dismissable" : "") . '">';
		echo '<p>' . $text . '</p>';
		if ($button) {
			echo '<p>' . $button . '</p>';
		}
		echo '</div>';
	}

	private function maybeUpgrade($v) {
		if ($v === "2.0.0") {
			if (isset($_GET["sacf_upgrade_db"]) && boolval($_GET["sacf_upgrade_db"])) {
				add_action("sacf_after_group_make", [__CLASS__, "fixOldStyleKeys"]);
				add_action('admin_notices', function () {
					self::adminNotice(__('Thank you for updating SmartACF.', 'sacf'), false, true);
					update_option("sacf_version", SACF_VERSION);
				});
			} else {
				add_action('admin_notices', [__CLASS__, "oldStyleKeyUpgradeNotice"]);
				return false;
			}
		}
	}

	public static function oldStyleKeyUpgradeNotice() {
		$button = '<a href="?sacf_upgrade_db=true" class="button button-primary">' . __('Upgrade database', 'sacf') . '</a>';
		self::adminNotice(__('Thank you for updating SACF, click this button to upgrade the database:', 'sacf'), $button, false);
	}

	private static function unpack($arr, $ret = []) {

		foreach ($arr as $k => $field) {
			$ret[] = ["name" => $field->name, "newkey" => $field->key, "oldkey" => "field_" . md5($field->name)];

			if (isset($field->sub_fields) && !empty($field->sub_fields)) {
				$isFC = gettype(array_keys($field->sub_fields)[0]) === "string";
				if ($isFC) {
					foreach ($field->sub_fields as $layout) {
						foreach ($layout["fields"] as $subField) {
							$subFieldUnpacked = self::unpack([$subField], []);
							$ret = array_merge($subFieldUnpacked, $ret);
						}
					}
				} else {
					$ret = self::unpack($field->sub_fields, $ret);
				}
			}
		}
		return $ret;
	}

	public static function fixOldStyleKeys($fields) {
		if (gettype($fields) === "array") {
			$fields = self::unpack($fields, []);
		} else {
			$fields = self::unpack([$fields], []);
		}
		foreach ($fields as $field) {
			global $wpdb;
			$query = $wpdb->prepare("UPDATE $wpdb->postmeta SET meta_value = %s WHERE meta_value = %s", $field["newkey"], $field["oldkey"]);
			$queryOptions = $wpdb->prepare("UPDATE $wpdb->options SET option_value = %s WHERE option_value = %s", $field["newkey"], $field["oldkey"]);
			$wpdb->query($query);
			$wpdb->query($queryOptions);
		}
	}

}
