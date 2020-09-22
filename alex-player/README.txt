=== Alex Player ===
Contributors: iamzhirik
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=iamzhirik@gmail.com&lc=US&no_note=0&item_name=For+Alex+Player+development&cn=&curency_code=USD&bn=PP-DonationsBF:btn_donateCC_LG.gif:NonHosted
Tags: audio player, mp3 player, wavesurfer 
Requires at least: 4.3
Tested up to: 5.5
Stable tag: 4.3
Requires PHP: 5.3.13
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Alex Player is simple audio player designed to play and visualize local audio on your Wordpress website.

== Description ==

This audio player is designed to play and visualize the local audio on your Wordpress website. It has 5 components: media player, wavesurfer, waveform visualization, circular spectrum and play button.
If you want to make a donation or financially help to develop this project you can [contact me](http://alex.zhyrytovskyi.x10.name/).

== Screenshots ==

1. /screenshot.png

== Live Demo ==

[View live demo here](http://alex.player.x10.name/)

== Installation ==

To install this plugin you need to do the following:

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Insert shortcodes into the text of your post, list of the shortcodes provided below.

== Shortcodes ==

Media player shortcode:

	[UIMediaPlayer file="/demo.mp3" color="#c0c0c0" width="600"]

Wavesurfer shortcode:

	[UIWaveSurfer file="/demo.mp3" color="#4fcb1d" color2="#8b8b8b"]

Waveform visualization shortcode:

	[UIWaveform color="#727272" opacity="0.8" height="64"]
	
Circular spectrum + play button shortcode:

	[UIPlayButton file="/demo.mp3" id="my-play-button" size="48 64" color="#b0b0b0 #727272 400"]
	[UICircularSpectrum owner="#my-play-button" size="64 180" bars="257 1.5 #e0e0e0 2.0 4.0"]
	
== Frequently Asked Questions ==

After I modify the shortcode it stopped working, why?
When you modify the text the wordpress editor could insert invisible markup. To remove that markup you can copy the shortcode to notepad, and than copy it back from notepad to wordpress editor.

Why this player does not play media file from remote url?
Due to web browser security policy it does not allow to read and process audio which located on remote host. The exception are files where "Access-Control-Allow-Origin: *" is present, such files can be played remotely.

== Changelog ==

= 1.22 =
* Added: Wordpress 5.5 support

= 1.21 =
* Added: Added ability to hide play button for media player and wavesurfer

= 1.20 =
* Added: Spectrum visualization on top of media player

= 1.19 =
* Added: Only one instance at a time can play right now, all the other instances will be paused
* Added: Wavesurfer selection

= 1.18 =
* Added: Local video playback ability

= 1.17 =
* Added: Ability to play url streams

= 1.16 =
* Fixed: Equalizer multiple instance support
* Added: Looped playback option

= 1.15 =
* Fixed: On small audio files wavesurfer stops not on the end of file

= 1.14 =
* Fixed: Volume change does not slow down the performance
* Added: Bars visualization for media player
* Added: Equalizer

= 1.13 =
* Fixed: z-index bug for circular spectrum
* Fixed: Player now works on iOS

= 1.12 =
* Improved: Wavesurfer time line updates more smoothly
* Added: Ability to play remote URLs which are not blocked by CORS

= 1.11 =
* Fixed: Waveform visualization on wide screens

= 1.10 =
* Added: Circular spectrum component
* Added: Play button component

= 1.09 =
* Fixed: Real time visualization right now works immediately
* Fixed: Waveform right now displays global audio from all media players inside the page

= 1.08 =
* Fixed: All the components with same file name will be connected together
* Added: For the big audio files it takes long time for wavesurfer to load visual data, this problem solved by adding one more file near current mp3 file that already has cached visual data

= 1.07 =
* Fixed width bug

= 1.05, 1.06 =
* Initial release for Wordpress