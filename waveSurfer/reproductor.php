
<div class="row">
    <div class="col ondaMusica">
      <div id="waveform">
          <!-- Here be waveform -->
      </div>
    </div>
</div>
<div class="row">
     <div class="col">
          <ul class="nav  lighten-4 controlesReproductor">
            <li class="nav-item" id="playPause">
              <span id="play" class="iconoPlayList" title="play">
                    <i class="fa fa-play-circle glyphicon glyphicon-play" aria-hidden="true"></i>
                </span>
                <span id="pause" style="display: none" class="iconoPlayList mr-1" title="pause">
                      <i class="far fa-pause-circle  glyphicon glyphicon-pause"></i>
                </span>
            </li>
            <li class="nav-item">
                <span class="iconoPlayList stopIcon ml-1" title="stop">
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
    .controlesReproductor{
    background-color: #262626 ;
    color: white;
    padding: 8px;
}

.controlesReproductor i{
  font-size: 30px;
}




/* ==================== CUANDO HAYA PLAY EL RERPODUCTOR APARECE ============== */
.reproducir {
   
   opacity: 0;
}

.reproducir{

    clear: both;
    width: 100%;
    position: fixed;
    overflow: hidden;
    bottom: -6px; 
    z-index: 9999;
}

.filaItemProducto:hover {
    background-color: red !important;
    color: white;
    font-family: 'Lato', sans-serif;
}
.filaItemProducto{
  color: white;
  font-size: 15px;
}
.producto a{
    display: inline-block;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    max-width: 100%;
    vertical-align: middle;
    color: white !important;
    font-family: 'Lato', sans-serif;
}
.genero span{
    display: inline-block;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    max-width: 100%;
    vertical-align: middle;
    color: white !important;
    font-family: 'Lato', sans-serif;
}

div#waveform {
    background: black;
}

/* ==== activar el hover cuando haga click en el producto=============== */
.row.filaItemProducto.black.active {
  background-color: red !important;
}


/* =================== REPRODUCTOR DE AUDIO ESTILOS =============== */
/* =================== REPRODUCTOR DE AUDIO ESTILOS =============== */
/* =================== REPRODUCTOR DE AUDIO ESTILOS =============== */
.mute{
  position:absolute;

    right: 50px;
    height:20px;
}

span#mute {
    position: absolute;

    right: 260px;
  }

.volume {
    position:absolute;
    cursor:pointer;
    width: 200px;

    right: 50px;
    height:20px;
    background-color:white;
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




        <style>
        


#loading_flag {
  position: absolute;
    /* display: none ; */
    top: 63%;
    left: 20%;
    width: auto;
    background-color: #00c28d;
    text-align: center;
    font-family: Verdana, Geneva, sans-serif;
    height: auto;
}

@media only screen and (max-width: 480px) {

  span#mute {
    position: absolute;
    margin-top: 4px;
    right: 130px;
    }

}


        </style>


<div id="loading_flag">
			
</div>