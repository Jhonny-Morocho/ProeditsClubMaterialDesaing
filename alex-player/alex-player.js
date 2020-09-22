/* Alex Player v1.22, Author: Alex Zhyrytovskyi, 2019-2020. URL: http://alex.player.x10.name/ */

var alexPlayer = MediaEngine();
alexPlayer.setAutoplay(false);

var alexPlayerInstances = {};
var alexPlayerInstancesRendered = {};

jQuery(function() {
	var $ = jQuery;
	
	function trim(str) {
		return String(str || '').trim();
	}
	
	function getInstance(data) {
		var url = data['file'] || data['stream'];
		
		if (Object.keys(alexPlayerInstances).length == 0) {
			alexPlayerInstances[url] = alexPlayer;
			return alexPlayer;
		}
		
		if (!alexPlayerInstances.hasOwnProperty(url)) {
			var instance = MediaEngine();
			instance.setAutoplay(false);
			alexPlayerInstances[url] = instance;
			return instance;
		}
		
		return alexPlayerInstances[url];
	}
	
	function tryRender(player, data) {
		var url = data['file'] || data['stream'];
		if (!url || alexPlayerInstancesRendered.hasOwnProperty(url))
			return;
		
		if (data['file'])
			player.renderFile(url);
		else
			player.renderURLStream(url);
		
		alexPlayerInstancesRendered[url] = true;
	}
	
	$('.wp-alex-player-pro').each(function() {
		var data = JSON.parse($(this).attr('data-json'));
		window['MEDIA_ENGINE_DOMAIN'] = data['domain'];
		window['MEDIA_ENGINE_KEY'] = data['key'];
	});
	
	$('.wp-alex-media-player').each(function() {
		var thisJQ = $(this);
		var data = JSON.parse(thisJQ.attr('data-json'));
		var player = getInstance(data);

		var options = {
			'player': player
		};
		
		if (data.hasOwnProperty('mode'))
			options['mode'] = data['mode'];
		
		if (data.hasOwnProperty('style'))
			options['style'] = data['style'];

		if (data.hasOwnProperty('color'))
			options['lineColor'] = data['color'];

		if (data.hasOwnProperty('max_width')) // !deprecated
			options['width'] = data['max_width'];
		
		if (data.hasOwnProperty('width'))
			options['width'] = data['width'];

		if (data.hasOwnProperty('vis_type'))
			options['visType'] = data['vis_type'];
		
		if (data.hasOwnProperty('equalizer_color'))
			options['equalizerColor'] = data['equalizer_color'];
		
		if (data.hasOwnProperty('looped'))
			player.setLooped(data['looped']);
		
		if (data.hasOwnProperty('show_video'))
			options['showVideo'] = data['show_video'];
		
		if (data.hasOwnProperty('spectrum')) {
			var parts = String(data['spectrum']).split(' ');
			if (parts.length == 2) {
				options['spectrumEnabled'] = true;
				options['spectrumColor'] = parts[0];
				options['spectrumSize'] = parts[1];
			}
			else if (parts.length == 1) {
				options['spectrumEnabled'] = true;
				options['spectrumColor'] = parts[0];
			}
		}
		
		if (data.hasOwnProperty('hide_play_button'))
			options['hidePlayButton'] = data['hide_play_button'];

		thisJQ.UIMediaPlayer(options);
		tryRender(player, data);
	});

	$('.wp-alex-wavesurfer').each(function() {
		var thisJQ = $(this);
		var data = JSON.parse(thisJQ.attr('data-json'));
		var player = getInstance(data);

		var options = {
			'player': player
		};

		if (data.hasOwnProperty('color'))
			options['mainColor'] = data['color'];

		if (data.hasOwnProperty('color2'))
			options['secondaryColor'] = data['color2'];
		
		if (data.hasOwnProperty('cached'))
			options['cachedWave'] = data['cached'];
		
		if (data.hasOwnProperty('looped'))
			player.setLooped(data['looped']);
		
		if (data.hasOwnProperty('selection_enabled'))
			player.setLooped(data['selection_enabled']);
		
		if (data.hasOwnProperty('hide_play_button'))
			options['hidePlayButton'] = data['hide_play_button'];

		thisJQ.UIWaveSurfer(options);
		tryRender(player, data);
	});

	$('.wp-alex-waveform').each(function() {
		var thisJQ = $(this);
		var data = JSON.parse(thisJQ.attr('data-json'));
		var options = {};
		
		if (data.hasOwnProperty('file'))
			options['player'] = getInstance(data);

		if (data.hasOwnProperty('color'))
			options['color'] = data['color'];

		if (data.hasOwnProperty('opacity'))
			options['opacity'] = data['opacity'];

		if (data.hasOwnProperty('height'))
			options['height'] = data['height'];

		var owner = data['owner'];
		if (owner) {
			options['ghostMode'] = true;
			options['ghostTop'] = data['owner_top'];
			$(owner).UIWaveform(options);
		}
		else
			thisJQ.UIWaveform(options);
	});
	
	$('.wp-alex-play-button').each(function() {
		var thisJQ = $(this);
		var data = JSON.parse(thisJQ.attr('data-json'));
		var player = getInstance(data);
		var options = {
			'player': player
		};
		
		if (data.hasOwnProperty('size')) {
			var size = trim(data['size']).split(' ');
			options['size'] = size[0];
			if (size.length > 1)
				options['outerSize'] = size[1];
		}
		
		if (data.hasOwnProperty('color')) {
			var colorParts = trim(data['color']).split(' ');
			options['color'] = colorParts[0];
			if (colorParts.length > 1)
				options['hoverColor'] = colorParts[1];
			if (colorParts.length > 2)
				options['hoverDuration'] = colorParts[2];
		}
		
		if (data.hasOwnProperty('id'))
			options['id'] = data['id'];
		
		if (data.hasOwnProperty('looped'))
			player.setLooped(data['looped']);
		
		var owner = data['owner'];
		if (owner)
			$(owner).UIPlayButton(options);
		else
			thisJQ.UIPlayButton(options);
		tryRender(player, data);
	});
	
	$('.wp-alex-circular-spectrum').each(function() {
		var data = JSON.parse($(this).attr('data-json'));
		
		var size = trim(data['size']).split(' ');
		if (size.length != 2)
			return;
		
		var bars = trim(data['bars']).split(' ');
		if (bars.length != 5)
			return;
		
		var options = {
			'innerSize': size[0],
			'outerSize': size[1],
			'barCount': bars[0],
			'barSize': bars[1],
			'barColor': bars[2],
			'barSpeed': bars[3],
			'multiplier': bars[4]
		};
		
		if (data.hasOwnProperty('peaks')) {
			var peaks = trim(data['peaks']).split(' ');
			if (peaks.length == 2) {
				options['showPeaks'] = true;
				options['peakColor'] = peaks[0];
				options['peakSpeed'] = peaks[1];
			}
		}
		
		if (data.hasOwnProperty('opacity'))
			options['opacity'] = data['opacity'];
		
		var ownerSelector = data['owner'];
		$(ownerSelector).UICircularSpectrum(options);
	});
	
	$('.wp-alex-equalizer').each(function() {
		var data = JSON.parse($(this).attr('data-json'));
		var player = getInstance(data);

		var options = {
			'player': player
		};
		
		if (data.hasOwnProperty('color'))
			options['color'] = data['color'];
		
		$(this).UIEqualizer(options);
	});
});