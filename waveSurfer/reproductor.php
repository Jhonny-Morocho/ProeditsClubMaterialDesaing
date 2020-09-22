<!-- 
	  <link rel="stylesheet" href="../../waveSurfer/waveMain.css">


      <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.0.52/wavesurfer.min.js"></script>
      <script src="../../waveSurfer/waveMain.js"></script>

    
    
     <div id="waveform">
       <div id="current-song">Stopped</div>
       <div id="current-time">00:00</div>
     </div>
    <div id="wavesurfer-player" class="row main-content  music animated  fadeInLeftBig">
      <div class="col-lg-12 black">
        <div class="audio-control">
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
     

 -->


<div class="row">
    <div class="col ondaMusica">
      <div id="waveform">
          <!-- Here be waveform -->
      </div>
    </div>
</div>
<div class="row">
     <div class="col ">
          <ul class="nav  lighten-4 btnReproducir">
            <li class="nav-item" id="playPause">
              <span id="play" class="iconoPlayList" title="play">
                    <i class="fa fa-play-circle glyphicon glyphicon-play" aria-hidden="true"></i>
                </span>
                <span id="pause" style="display: none" class="iconoPlayList" title="pause">
                      <i class="far fa-pause-circle  glyphicon glyphicon-pause"></i>
                </span>
            </li>
            <li class="nav-item">
                <span class="iconoPlayList stopIcon" title="stop">
                  <i class="fas fa-stop"></i>
                </span>
            </li>
            <li class="nav-item">
              <div id="volume-control" class="right">
                <span id="mute" class="button iconoPlayList">
                  <i class="fa fa-lg fa-volume-up fa-fw" aria-hidden="true"></i>
                </span>
                <div class="volume iconoPlayList" title="Set volume">	
                  <div class="volume-bar"></div>
                </div>
              </div>
            </li>
          </ul>
      </div>
  </div>



  <style>
            .btnReproducir{
    background-color: #262626 ;
    padding-top: 3px;
    padding-bottom: 3px;

}


.ondaMusica{
    background-color: black;
}

/* ==================== CUANDO HAYA PLAY EL RERPODUCTOR APARECE ============== */
.reproducir {
   
   opacity: 0;
}

.reproducir{

clear: both;
    width: 100%;
    left: 15px;
    position: fixed;
    overflow: hidden;
    bottom: -6px; 
    z-index: 9999;
}

.list-group-item.active {

    background-color: #fd0002 !important;
    border-color: #fd0002 !important;
 
}


#playlist a:hover {
    background-color: red !important;
    color: white;
    font-family: 'Lato', sans-serif;
}
#playlist a {

    display: inline-block;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    max-width: 100%;
    vertical-align: middle;
    font-size: 12px;
    background-color: black;

  
    color: white !important;
    font-family: 'Lato', sans-serif;
}
.iconoPlayList{

  cursor: pointer;
  color: white;
    margin-left: 20px;
    font-size: 25px;
 
}

/* .volume-control{
    visibility: hidden;
    background-color: #2c3e50;
    color: #fff;
    width: 42px;
    height: 42px;
    text-align: center;
    line-height: 38px;
    position: fixed;
    bottom: 120px;
    right: 20px;
    z-index: 90;
    cursor: pointer;
    opacity: 0;
    border-radius: 3px;
    -webkit-transform: translateZ(0);
    transition: all .4s;
    } */
#demo i.fas.fa-cart-plus {
    color: white;
    font-size: 12px;
}

.mute{
  position:absolute;
   top: 14px;
    right: 50px;
    height:20px;
}

span#mute {
    position: absolute;
    top: 7px;
    right: 260px;
  }

.volume {
    position:absolute;
    cursor:pointer;
    width: 200px;
    top: 14px;
    right: 50px;
    height:20px;
    background-color:white;
    /* opacity: 0; */
    transition: opacity 1s;
    z-index: 8;
}

@media (max-width: 640px) {
  .volume {
    display: none;
  }
}

.volume-bar {
    display: block;
    opacity: 1;
    height:20px;
    position:absolute;
    top:0;
    left:0;
    background-color:red;
    z-index:10;
    width: 100%;
    transition: opacity 1s;
}

.volume3 {
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 0 50px 100px;
    border-color: transparent transparent #007bff transparent;
    line-height: 0px;
    _border-color: #000000 #000000 #007bff #000000;
    _filter: progid:DXImageTransform.Microsoft.Chroma(color='#000000');
}

        </style>