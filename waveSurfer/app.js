// Create a WaveSurfer instance
var wavesurfer;

// Init on DOM ready
document.addEventListener('DOMContentLoaded', function() {
    wavesurfer = WaveSurfer.create({
        container: '#waveform',
        waveColor: '#c8e6c9 ',
        progressColor: '#43a047',
        cursorColor: '#fff',
        barWidth:0,
        barHeight:1.5,
        height: 50
    });
});

// Bind controls
document.addEventListener('DOMContentLoaded', function() {
      // 100% volume to start


    
    var playPause = document.querySelector('#playPause');
    playPause.addEventListener('click', function() {
        wavesurfer.playPause();
    });

    // Toggle play/pause text
    wavesurfer.on('play', function() {
     

        document.querySelector('#play').style.display = 'none';
        document.querySelector('#pause').style.display = '';
    });
    wavesurfer.on('pause', function() {
        document.querySelector('#play').style.display = '';
        document.querySelector('#pause').style.display = 'none';
    });

    // The playlist links
    var links = document.querySelectorAll('#playlist a');
    var filaItemProducto=document.querySelectorAll('#playlist .filaItemProducto');
    console.log(filaItemProducto);
    console.log(filaItemProducto);
    var currentTrack = 0;

    // ================== CARGANDO TRACK ====================
    // ================== CARGANDO TRACK ====================
    // ================== CARGANDO TRACK ====================
    // Load a track by index and highlight the corresponding link
    var setCurrentSong = function(index) {
      filaItemProducto[currentTrack].classList.remove('active');
        currentTrack = index;
        filaItemProducto[currentTrack].classList.add('active');
        wavesurfer.load(links[currentTrack].href);
    };

    wavesurfer.on('loading', function(X, evt) {
     
      UpdateLoadingFlag(X);
    });

    function UpdateLoadingFlag(Percentage) {
      hideStickyPlayer();
      if (document.getElementById("loading_flag")) {
        document.getElementById("loading_flag").innerText = "Loading " + Percentage + "%";
        if (Percentage >= 100) {
          document.getElementById("loading_flag").style.display = "none";
        } else {
          document.getElementById("loading_flag").style.display = "block";
        }
      }
    }
    // clean up etc., when wavesurfer fires the "ready" event
  wavesurfer.on('ready', function() {
    console.log("ready fired");
    document.getElementById("loading_flag").style.display = "none";
    //document.getElementById("loading_flag").style.opacity = "0";
  });

  // ================== END TRACK ====================

    // Load the track on click
    Array.prototype.forEach.call(links, function(link, index) {
    
        link.addEventListener('click', function(e) {
            e.preventDefault();
            setCurrentSong(index);
        });
    });

    // Play on audio load
    wavesurfer.on('ready', function() {
      
        wavesurfer.play();
        console.log(wavesurfer.getDuration());// segundos
    });

    wavesurfer.on('error', function(e) {
        console.warn(e);
    });

    // Go to the next track on finish
    wavesurfer.on('finish', function() {
        // no va a la siguiente cancion
      //  setCurrentSong((currentTrack + 1) % links.length);
    });

    // Load the first track
    // cuando inicia q no cargue la primera cancion comente yo esta liena

   // setCurrentSong(currentTrack);


   // ============ hacer aparecer el reproductor===============
function hideStickyPlayer(){
    $(".reproducir").animate({
              opacity: '1',
              width: '100%'
    },1500);
  }

  $('.stopIcon').on('click',function(e){
    wavesurfer.stop();
  });
 
//   ================= volumene ====================
// iniciar con el 100% de volumen
wavesurfer.setVolume(1);
  // Update time when user clicks on wavesurfer waveform

  // tiempo de carga 
  wavesurfer.on('seek', function () {
    elapsedSeconds = wavesurfer.getCurrentTime();
    console.log(elapsedSeconds);
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

});
