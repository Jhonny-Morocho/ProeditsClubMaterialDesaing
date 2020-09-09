
     <!-- <link href="https://librien.github.io/wavesurfer-player.js/css/bootstrap.min.css" rel="stylesheet"1> -->
    <!-- <link href="https://librien.github.io/wavesurfer-player.js/css/font-awesome.min.css" rel="stylesheet"> -->
     
    <!-- <script src="https://librien.github.io/wavesurfer-player.js/js/bootstrap.min.js"></script>  -->
    <link rel="stylesheet" href="../../waveSurfer/waveMain.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.0.52/wavesurfer.min.js"></script>
    <script src="../../waveSurfer/waveMain.js"></script>



    <div id="wavesurfer-player" class="row main-content col-center-block music">
      <div class="col-sm-12 col-center-block">
        <div class="row audio-control">
          <div class="left">
            <div id="previous" class="button">
              <i class="fa fa-lg fa-fast-backward fa-fw" aria-hidden="true" title="Previous Song"></i>
            </div>
            <div id="play-pause" class="button">
              <i class="fa fa-lg fa-play fa-fw" aria-hidden="true" title="Play / Pause"></i>
            </div>
            <div id="stop" class="button">
              <i class="fa fa-lg fa-stop fa-fw" aria-hidden="true" title="Stop"></i>
            </div>
            <div id="next" class="button">
              <i class="fa fa-lg fa-fast-forward fa-fw" aria-hidden="true" title="Next Song"></i>
            </div>
            <div id="repeat" class="button">
              <i class="fa fa-lg fa-repeat fa-fw" aria-hidden="true" title="Toggle Repeat"></i>
            </div>
            <div id="shuffle" class="button">
              <i class="fa fa-lg fa-random fa-fw" aria-hidden="true" title="Toggle Shuffle"></i>
            </div>
          </div>
          <div id="volume-control" class="right">
            <div id="mute" class="button">
              <i class="fa fa-lg fa-volume-up fa-fw" aria-hidden="true"></i>
            </div>
            <div class="volume" title="Set volume">	
              <div class="volume-bar"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
   
    <div id="waveform">
      <div id="current-song">Stopped</div>
      <div id="current-time">00:00</div>
    </div>
     


