<?php
/**
 * Plugin Name: Alex Player
 * Plugin URI: http://alex.player.x10.name/
 * Description: Audio Player for Wordpress
 * Version: 1.22
 * Author: Alex Zhyrytovskyi
 * Author URI: http://alex.zhyrytovskyi.x10.name/
 */
 
class AlexPlayer {
	var $titles = array(
		"Audio player with visualization",
		"Audio player for Wordpress",
		"Alex Player - Audio player for Wordpress",
		"Wavesurfer for Wordpress",
		"Alex Player Wavesurfer",
		"Audio visualization for Wordpress",
		"Spectrum audio visualization",
		"Spectrum audio visualization for Wordpress",
		"Wordpress spectrum audio",
		"Alex Player - Best audio player"
	);
	
	function __construct() {
		$pluginDir = plugin_dir_url(__FILE__);
		$version = "1.22";
		
		wp_enqueue_style("media_engine_styles", $pluginDir . 'media-engine.css', null, $version);
		wp_enqueue_script("media_engine_script", $pluginDir . 'media-engine.js', array("jquery"), $version);
		wp_enqueue_script("alex_player_script", $pluginDir . 'alex-player.js', array("jquery"), $version);
		
		add_shortcode("MediaEnginePro", array($this, "pro_handler"));
		add_shortcode("UIMediaPlayer", array($this, "media_player_handler"));
		add_shortcode("UIWaveSurfer", array($this, "wavesurfer_handler"));
		add_shortcode("UIWaveform", array($this, "waveform_handler"));
		add_shortcode("UICircularSpectrum", array($this, "circular_spectrum_handler"));
		add_shortcode("UIPlayButton", array($this, "play_button_handler"));
		add_shortcode("UIEqualizer", array($this, "equalizer_handler"));
	}
	
	public function promote($html, $attrs) {
		if ($attrs["promoted"] || $GLOBALS["_alex_player_promoted"])
			return $html;
		
		$domainName = $_SERVER["HTTP_HOST"];
		$hash = 0;
		for ($i = 0, $n = strlen($domainName); $i < $n; $i++)
			$hash += ord($domainName[$i]);
		
		$GLOBALS["_alex_player_promoted"] = true;
		$className = "cl" . substr(sha1($hash), 0, 8);
		return "<a href=\"http://alex.player.x10.name/\" class=\"" . $className . "\">" . $this->titles[$hash % count($this->titles)] . "</a>" . $html . "<style type=\"text/css\">." . $className . "{display: none;}</style>";
	}
	
	public function pro_handler($attrs) {
		return "<div class=\"wp-alex-player-pro\" data-json=\"" . esc_html__(json_encode($attrs)). "\"></div>";
	}
	
	public function media_player_handler($attrs) {
		return $this->promote("<div class=\"wp-alex-media-player\" data-json=\"" . esc_html__(json_encode($attrs)). "\"></div>", $attrs);
	}

	public function wavesurfer_handler($attrs) {
		return $this->promote("<div class=\"wp-alex-wavesurfer\" data-json=\"" . esc_html__(json_encode($attrs)). "\"></div>", $attrs);
	}
	
	public function waveform_handler($attrs) {
		return $this->promote("<div class=\"wp-alex-waveform\" data-json=\"" . esc_html__(json_encode($attrs)). "\"></div>", $attrs);
	}
	
	public function circular_spectrum_handler($attrs) {
		return $this->promote("<div class=\"wp-alex-circular-spectrum\" data-json=\"" . esc_html__(json_encode($attrs)). "\"></div>", $attrs);
	}
	
	public function play_button_handler($attrs) {
		return $this->promote("<div class=\"wp-alex-play-button\" data-json=\"" . esc_html__(json_encode($attrs)). "\"></div>", $attrs);
	}
	
	public function equalizer_handler($attrs) {
		return "<div class=\"wp-alex-equalizer\" data-json=\"" . esc_html__(json_encode($attrs)). "\"></div>";
	}
}

new AlexPlayer();