// Create a WaveSurfer instance
var wavesurfer = Object.create(WaveSurfer);
var ctx = document.createElement('canvas').getContext('2d');
var linGrad = ctx.createLinearGradient(0, 64, 0, 200);
linGrad.addColorStop(0.5, 'rgba(255, 255, 255, 1.000)');
linGrad.addColorStop(0.5, 'rgba(183, 183, 183, 1.000)');

// Init on DOM ready
document.addEventListener('DOMContentLoaded', function () {
  wavesurfer.init({
    container: '#waveform',
    waveColor: '#fff',
    progressColor: '#fff',
    cursorColor: '#fff',
    normalize: true,
    barHeight:5,
    height:65,
    barWidth: 1
  });
});

/*
 * Playback Controls
 */

document.addEventListener('DOMContentLoaded', function () {

  // show progress while loading sound


  // 100% volume to start
  wavesurfer.setVolume(1);

  var currentTime;
  var elapsedSeconds = 0;

  // Get the page's current title, will append audio information to it
  pageTitle = document.title;

  // Begin playback when playPause button is clicked
  var playPause = document.getElementById('play-pause');
  playPause.addEventListener('click', function() {
    wavesurfer.playPause();
  });

  // Pause / resume playback with spacebar
  window.onkeydown = function(e) {
    if(e.keyCode == 32 && e.target == document.body) {
        wavesurfer.playPause();
        e.preventDefault();
        return false;
    }
  };

  function getCurrentTrackIndex(currentTitle) {
    // TODO: Fix incorrect title issue when rapidly switching between tracks.
    songIndex = Array.from(songs).findIndex(item => item.dataset.title === currentTitle);
    return songIndex;
  }

  function shuffle(a) {
    for (let i = a.length; i; i--) {
        let j = Math.floor(Math.random() * i);
        [a[i - 1], a[j]] = [a[j], a[i - 1]];
    }
  }

  // Gets list of songs from css class "song-row"
  var songNodeList = document.querySelectorAll('.song-row');

  var songs = [];

  // Convert nodeList to array
  function nodetoArray(nodeList, nodeArray) {
    for (var i = 0; i < nodeList.length; ++i) {
      nodeArray[i] = nodeList[i];
    }
    return nodeArray;
  }

  songs = nodetoArray(songNodeList, songs);

  var playInit = 0;
  var currentTrack = 0;
  var nextSong = false;
  var isShuffle = false;
  var isRepeat = false;
  var playPauseIcon = document.getElementById('play-pause').querySelector('.fa');

  document.getElementById('shuffle').addEventListener('click', function() {
    if (isShuffle) {
      isShuffle = false;

      //Reset order of playlist to unshuffle
      songs = nodetoArray(songNodeList, songs);
      console.log(songs);

      //Set next song in unshuffled playlist
      if (typeof currentTitle !== 'undefined') {
        nextSong = (getCurrentTrackIndex(currentTitle) + 1);
      }
      this.style.color = '#333';
    }
    else {
      isShuffle = true;
      this.style.color = '#3370a7';
      shuffle(songs);

      // Only reset current track if play hasn't been initialized.
      if (playInit == 0) {
        newTrack = Math.floor(Math.random()*songs.length);
        setCurrentSong(newTrack);
        playPauseIcon.classList.add("disabled");
      }
    }
  });

  document.getElementById('repeat').addEventListener('click', function() {
    if (isRepeat) {
      isRepeat = false;
      this.style.color = '#333';
    }
    else {
      isRepeat = true;
      this.style.color = '#3370a7';
    }
  });

  // Displays seconds.miliseconds in 00:00 format
  function getTimeString(totalSeconds) {
    function timeToString(num) {
      return ( num < 10 ? "0" : "" ) + num;
    }

    var hours = Math.floor(totalSeconds / 3600);
    totalSeconds = totalSeconds % 3600;

    var minutes = Math.floor(totalSeconds / 60);
    totalSeconds = totalSeconds % 60;

    var seconds = Math.floor(totalSeconds);

    // Pad the minutes and seconds with leading zeros, if required
    hours = timeToString(hours);
    minutes = timeToString(minutes);
    seconds = timeToString(seconds);

    // Compose the string for display
    var currentTimeString = minutes + ":" + seconds;

    return currentTimeString;
  }

  // Sets the elapsed time for current song
  function updateCurrentTime() {
    elapsedSeconds++;
    document.getElementById('current-time').textContent = getTimeString(elapsedSeconds) + ' / ' + currentSongLength;
  }

  // Resets the elapsed time for current song
  function clearTimer() {
    clearInterval(currentTime);
    document.getElementById('current-time').textContent = '00:00';
    document.getElementById('current-song').textContent = 'Stopped';
    elapsedSeconds = 0;
  }

  function playNow() {
    wavesurfer.on('ready', function () {
      wavesurfer.play();
    });
   // aqui inicia se carga automatico
  }

  wavesurfer.on('loading', function(status) {
    document.getElementById('current-song').textContent = 'Loading ' + status + '%';
    /** Need to think of a better way to do this
    *wave = document.getElementById('waveform');
    *wave.style.width = status+'%';
    */
    document.getElementById('play-pause').classList.add('disabled');
    if (status == 100) {
      document.getElementById('current-song').textContent = 'Generating Waveform';
    }
    wavesurfer.on('ready', function() {
      if (playInit === 0) {
        document.getElementById('current-song').textContent = 'Ready';
      }
      else {
        //document.getElementById('current-song').textContent = 'Stopped';
      }
      document.getElementById('play-pause').classList.remove("disabled");
      playNow();
    });
  });

  // Toggle play/pause
  wavesurfer.on('play', function () {
    playInit = 1;
    // Switch between play and pause icon in main audio-control class
    playPauseIcon.classList.remove('fa-play');
    playPauseIcon.classList.add('fa-pause');
  
    // Set title to include current song name
    currentTitle = songs[currentTrack].getAttribute('data-title');
    currentSongLength = getTimeString(songs[currentTrack].getAttribute('data-length'));
    title =  currentTitle + ' \u2013 ' + pageTitle;
    document.title = title;

    // Switch between play and pause icon on current song row
    var currentSongIcon = songs[currentTrack].querySelector('.play-song');

    currentSongIcon.classList.add('fa-pause');
    currentSongIcon.classList.remove('fa-play');

    if (wavesurfer.isPlaying() === true) {

      // Ensure timer resets to 0
      clearTimer();

      // Start timer for this song
      elapsedSeconds = -1; // Need 1 second offset for the timer (not sure why)
      currentTime = updateCurrentTime();
      elapsedSeconds = wavesurfer.getCurrentTime();
      currentTime = setInterval(updateCurrentTime,1000);
      document.getElementById('current-song').textContent = ('Now Playing: ' + currentTitle);
      document.getElementById('current-song').classList.remove('blink');
    }
  });

  // Update time when user clicks on wavesurfer waveform
  wavesurfer.on('seek', function () {
    elapsedSeconds = wavesurfer.getCurrentTime();
  });

  wavesurfer.on('pause', function () {

    // Replace play / pause icons
    playPauseIcon.classList.remove('fa-pause');
    playPauseIcon.classList.add('fa-play');
    document.getElementById('current-song').classList.add('blink');
    document.getElementById('current-song').textContent = ('Paused: ' + currentTitle);
    var songButtons = document.querySelectorAll('.play-song'),
      i;
    for (i = 0; i < songButtons.length; i++) {
      songButtons[i].classList.remove('fa-pause');
      songButtons[i].classList.add('fa-play');
    }
    clearInterval(currentTime);
  });

  document.getElementById('play-pause').addEventListener('click', function() {
    if (wavesurfer.isPlaying() === false) {
      playNow();

    }
    
  });

  // Load a track by index and highlight the corresponding link
  var setCurrentSong = function (index) {
    currentTrack = index;
    wavesurfer.load(songs[currentTrack].getAttribute('data-src'));
  };
  // Plays a track when clicked in the playlist, pauses if user clicks on currently playing track
  for (var i = 0; i < songs.length; i++) {
    songs[i].addEventListener('click', function(event) {

      if (this.getAttribute('data-src') === songs[currentTrack].getAttribute('data-src')) {

        // Stop timer at current time
        clearInterval(currentTime);

        //Toggle play / pause if clicked on current song
        wavesurfer.playPause();
      }
      else {
        var songTitle = this.getAttribute('data-title');
        var songIndex = getCurrentTrackIndex(songTitle);
        setCurrentSong(songIndex);
        playNow();
      }
    });
  }

  // Finds next track, used especially when shuffle is turned off
  function gotoNextSong(){
    if (!isRepeat) {
      if (((currentTrack + 1) % songs.length) > 0) {
        if (!nextSong) {
          setCurrentSong((currentTrack + 1) % songs.length);
          playNow();
        }
        else {
          setCurrentSong(nextSong);
          playNow();
          nextSong = false;
        }
      }
      else {
        // Do nothing, reached end of playlist
      }
    }
    else {
      if (!nextSong) {
        setCurrentSong((currentTrack + 1) % songs.length);
        playNow();
      }
      else {
        setCurrentSong(nextSong);
        playNow();
        nextSong = false;
      }
    }
  }

  // Go to the next track on finish
  wavesurfer.on('finish', function () {
    // ================================ comente esta liena de codigo para que no pase al siguiente
    //gotoNextSong();
  });

  // Go to next track when next button is clicked
  document.getElementById('next').addEventListener('click', function() {
    gotoNextSong();
  });

  // Go to previous track when previous button is clicked
  document.getElementById('previous').addEventListener('click', function() {
    if (elapsedSeconds < 2) {
      if (currentTrack > 0) {
        setCurrentSong((currentTrack - 1) % songs.length);
      }

      // Loop back to last song in playlist
      else {
        if (isRepeat) {
          setCurrentSong(songs.length - 1);
        }
        else {
          // Do nothing, reached end of playlist
        }
      }
    }
    else setCurrentSong(currentTrack);
  });

  // Stop on click
  document.getElementById('stop').addEventListener('click', function() {
    wavesurfer.stop();
    clearTimer();
    document.querySelectorAll('.play-song')[currentTrack].classList.remove('fa-pause');
    document.querySelectorAll('.play-song')[currentTrack].classList.add('fa-play');
    title = 'Stopped \u2013 ' + pageTitle;
    document.title = title;
  });

  
  // Load the first track if no url specified, otherwise load that song
  function getJsonFromUrl() {
    var query = location.search.substr(1);
    var result = {};
    query.split("?").forEach(function(part) {
      var item = part.split("=");
      result[item[0]] = decodeURIComponent(item[1]);
    });
    return result;
  }

  url = getJsonFromUrl();
  songFromUrl = document.querySelector("[data-slug='" + url.s + "']");
  if (songFromUrl) {
    var songFromUrl = songFromUrl.getAttribute('data-title');
    trackIndex = getCurrentTrackIndex(songFromUrl);
    setCurrentSong(trackIndex);
    wavesurfer.on('ready', function () {
      wavesurfer.play();
    });
  }
  else {
    setCurrentSong(currentTrack);
  }

});

/*
 * Volume Controls
 */
// TODO: Update whenever fontawesome puts out a mute icon instead of volume-off icon.
var percentage = 100;
var volumeBar = document.querySelector('.volume-bar');
var muted = false;
var muteIcon = document.querySelector('#mute i');
function mute() {
  if (muted == false) {
    wavesurfer.toggleMute();
    muted = true;

    // Remember volume setting for when we unmute
    oldpercentage = percentage;

    percentage = 0;
    muteIcon.classList.remove('fa-volume-up');
    muteIcon.classList.remove('fa-volume-down');
    muteIcon.classList.add('fa-volume-off');
    document.querySelector('.volume-bar').style.width = 0 + '%';
  }
  else {
    wavesurfer.toggleMute();
    muted = false;
    percentage = oldpercentage;

    if ((percentage < 70) && (percentage > 0)) {
      muteIcon.classList.remove('fa-volume-up');
      muteIcon.classList.remove('fa-volume-off');
      muteIcon.classList.add('fa-volume-down');
    } else {
      muteIcon.classList.remove('fa-volume-off');
      muteIcon.classList.remove('fa-volume-down');
      muteIcon.classList.add('fa-volume-up');
    }
    document.querySelector('.volume-bar').style.width = percentage + '%';
  }
}

// Toggle mute on click

  document.getElementById('mute').addEventListener('click', function() {
    mute();
  });
  

var volumeControl = document.getElementById('volume-control');
// Prevents volume bar from hiding itself (on mouseout) if user is actively click/dragging volume bar.
var isDown = false;

try {
  volumeControl.addEventListener('mousedown', function() {
    isDown = true;
  });
  
} catch (error) {
  console.log(error);
}

try {
  volumeControl.addEventListener('mouseup', function() {
    isDown = false;
  });
  
} catch (error) {
  console.log(error);
}

function showVolume(){
  document.querySelector('.volume').style.opacity = 1;
}

function hideVolume(){
  if (isDown == false) {
    document.querySelector('.volume').style.opacity = 0;
  }
}

// Show volume bar on hover
try {
  volumeControl.addEventListener('mouseover', showVolume);
  volumeControl.addEventListener('mouseout', hideVolume);
  
} catch (error) {
  console.log(error);
}

// Prevents volume bar from showing on mobile tap (hopefully) and mutes

try {
  volumeControl.addEventListener('touchstart', function(e) {
    e.preventDefault();
    e.stopPropagation();
    mute();
  });
  
} catch (error) {
  console.log(error);
}

// Listen for scroll, call to adjust volume up or down

try {
  if (volumeControl.addEventListener) {
    // IE9, Chrome, Safari, Opera
    volumeControl.addEventListener("mousewheel", MouseWheelHandler, false);
    // Firefox
    volumeControl.addEventListener("DOMMouseScroll", MouseWheelHandler, false);
  }
  // IE 6/7/8
  else volumeControl.attachEvent("onmousewheel", MouseWheelHandler);
  function MouseWheelHandler(e) {
    var e = window.event || e; // old IE support
    var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
    if (delta > 0 /*|| e.detail < 0*/) {
      scrollVolume(5);
    }
    else {
      scrollVolume(-5);
    }
  
    // Prevent page from scrolling when controlling volume bar by mouse wheel
    e.preventDefault();
  }
  
} catch (error) {
  console.log(error);
}

function scrollVolume(amount) {
  percentage = percentage + amount;
  if (percentage > 100) percentage = 100;
  if (percentage < 0) percentage = 0;
  setVolume(percentage);
}

var volumeDrag = false;

try {
  
  document.querySelector('.volume').addEventListener('mousedown', function (e) {
    volumeDrag = true;
    muted = false;
    updateVolume(e.pageX);
  });
} catch (error) {
  console.log(error);
}

document.addEventListener('mouseup', function(e) {
  if (volumeDrag) {
    volumeDrag = false;
    updateVolume(e.pageX);
  }
});

document.addEventListener('mousemove', function(e) {
  if (volumeDrag) {
    updateVolume(e.pageX);
  }
});

var updateVolume = function (x, vol) {
  var volume = document.querySelector('.volume');
  if (vol) {
    percentage = vol * 100;
  } else {
    var rect = volume.getBoundingClientRect();
    var offsetLeft = rect.left + document.body.scrollLeft;
    var position = x - offsetLeft;
    width = parseInt(window.getComputedStyle(volume).getPropertyValue('width'),10);
    percentage = 100 * position / width;
  }
  if (percentage > 100) {
    percentage = 100;
  }
  if (percentage < 0) {
    percentage = 0;
  }
  setVolume(percentage);
}

function setVolume(percentage) {
  // Update volume bar css and player volume
  volumeBar.style.width = percentage + '%';
  wavesurfer.setVolume(percentage / 100);

  // Change sound icon based on volume
  if (percentage == 0) {
    muteIcon.classList.remove('fa-volume-up');
    muteIcon.classList.remove('fa-volume-down');
    muteIcon.classList.add('fa-volume-off');
  } else if ((percentage < 70) && (percentage > 0)) {
    muteIcon.classList.remove('fa-volume-up');
    muteIcon.classList.remove('fa-volume-off');
    muteIcon.classList.add('fa-volume-down');
  } else {
    muteIcon.classList.remove('fa-volume-down');
    muteIcon.classList.remove('fa-volume-off');
    muteIcon.classList.add('fa-volume-up');
  }
}