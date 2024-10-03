@extends('layouts.main')

@section('content')
    <section class="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="banner-profile-img">
                        <figure>
                            <img src="{{ asset('images/proflel.png') }}" class="img-fluid" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="member-info">
                        <h4>{{ $users->name }}</h4>
                        <ul>
                            <li>
                                <p>Age </p>
                                <p> {{ $profile->age ?? '' }}</p>
                            </li>
                            <li>
                                <p>Sex</p>
                                <p> {{ $profile->gender ?? '' }}</p>
                            </li>
                            <li>
                                <p>Email</p>
                                <p> {{ $users->email ?? '' }}</p>
                            </li>
                            <li>
                                <p>Location </p>
                                <p> {{ $profile->address ?? '' }}</p>
                            </li>
                            <li>
                                <p>Web </p>
                                <p> {{ $profile->domain ?? '' }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- <section class="video-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-video-bar">
                        <div class="video-line-bar">
                            <div id="player">
                                <div id="menu">
                                    <button id="prev"><i class="fa fa-step-backward"></i></button>
                                    <button id="play"><i class="fa fa-play"></i></button>
                                    <button id="next"><i class="fa fa-step-forward"></i></button>
                                </div>
                                <div id="bar">
                                    <div id="currentTime">1:14</div>
                                    <div id="progress-bar">
                                        <div id="progress" style="width: 1.20032%;"><i id="progressButton"
                                                class="fa fa-circle"></i></div>
                                    </div>
                                    <div id="totalTime">3:27</div>
                                </div>
                                <div id="menu">
                                    <button id="repeat" style="color:grey"><i class="fa fa-repeat"></i></button>

                                    <button id="shuffle" style="color:grey"><i class="fa fa-random"></i></button>
                                </div>
                                <div id="menu">
                                    <button><i class="fa-solid fa-volume-high"></i></button>
                                    <div id="progress-bar">
                                        <div id="progress" style="width: 1.20032%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="video-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="aWrap"
                        data-src="{{ $audio_latest_max_stars->audio_link }}" style=" width: 100% !important; height: 120px !important; ">
                        <button class="aPlay" disabled><span class="aPlayIco"><i class="fa fa-play"></i></span></button>
                        <div class="range">
                            <span class="under-ranger"></span>
                            <input class="aSeek" type="range" min="0" value="0" step="1" disabled><span
                                class="change-range"></span>
                        </div>
                        <div class="aCron">
                            <span class="aNow"></span> / <span class="aTime"></span>
                        </div>
                        <div class="volume-container">
                            <span class="aVolIco"><i class="fa fa-volume-up"></i></span>
                            <div class="range-volume">
                                <span class="under-ranger"></span>
                                <input class="aVolume" type="range" min="0" max="1" value="1"
                                    step="0.1" disabled><span class="change-range"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="booth-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="back_leaf">

                        <h2> Top 10 <span class="type_span" data-typetext="freestyles"> </span> <img
                                src="{{ asset('images/heading_leaf.png') }}" class="img-fluid" alt="">
                        </h2>
                    </div>
                    <div class="main-booth">
                        <div class="boxes-rap">
                            <div class="row">
                                @foreach ($audio as $val)
                                    <div class="col-lg-4">
                                        <div class="rap-box">
                                            <div class="band-img">
                                                <figure>
                                                    <img src="{{ $val->image_link }}" class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="rap-discription">
                                                <h3>{{ $val->audio_title }}</h3>
                                                <p>
                                                    @if (!empty($val->description))
                                                        {{ Illuminate\Support\Str::words($val->description, 3) }}
                                                    @endif
                                                </p>
                                                <h6>{{ $val->genre }} <span>{{ $val->auth->name }}</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="freestyle-sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="back_leaf">
                        <h2> All<span class="type_span" data-typetext="freestyles"> </span> <img
                                src="{{ asset('images/heading_leaf.png') }}" class="img-fluid" alt="">
                        </h2>
                    </div>
                    <div class="rate-man">
                        <ul>
                            @php
                                $dateString = $audio_latest_5_stars->created_at;
                                $date = new DateTime($dateString);
                                $dateOnly = $date->format('Y-m-d');
                            @endphp
                            <li>
                                <h6>Date</h6>
                            </li>
                            <li>
                                <h6>Stars</h6>
                            </li>
                            <li>
                                <h6>Artist Name</h6>
                            </li>
                            <li>
                                <h6>Genre</h6>
                            </li>
                            <li>
                                <h6>Freestyle Name</h6>
                            </li>
                        </ul>
                        <ul class="rating-ul">
                            <li>
                                <h6>{{ $dateOnly }}</h6>
                            </li>
                            <li>
                                @if ($audio_latest_max_stars->stars == 5)
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                @elseif($audio_latest_max_stars->stars == 4)
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                @elseif($audio_latest_max_stars->stars == 3)
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                @elseif($audio_latest_max_stars->stars == 2)
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                @elseif($audio_latest_max_stars->stars == 1)
                                    <i class="fa-solid fa-star"></i>
                                @endif
                            </li>
                            <li>
                                <h6>{{ $audio_latest_max_stars->auth->name }}</h6>
                            </li>
                            <li>
                                <h6>{{ $audio_latest_max_stars->genre }}</h6>
                            </li>
                            <li>
                                <h6>{{ $audio_latest_max_stars->free_style_name }}</h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('newsletter')
@endsection

@section('css')
    <style>
/* (A) MATERIAL ICONS */
.aWrap .svg-inline--fa {
  color: white !important;
}

/* (B) WRAPPER */
.aWrap {
  font-family: Arial, Helvetica, sans-serif;
  display: flex;
  align-items: center;
  justify-content: space-between;
  /* allow buttons to wrap into another row on small screens */
  /* flex-wrap: wrap; */
  width: 550px;
  padding: 10px 30px;
  margin: 5px 0;
  border-radius: 10px;
  background: black;
  gap: 1rem;
}

.aWrap,
.aWrap * {
  box-sizing: border-box;
}

/* (C) PLAY/PAUSE BUTTON */
.aPlay {
  padding: 0;
  margin: 0;
  background: 0;
  border: 0;
  cursor: pointer;
  color: white;
}

/* (D) TIME */
.aCron {
  font-size: 14px;
  color: #cbcbcb;
  margin: 0 10px;
}

/* (E) RANGE SLIDERS */
/* (E1) HIDE DEFAULT */
.aWrap input[type="range"] {
  appearance: none;
  border: none;
  outline: none;
  box-shadow: none;
  width: 368px;
  padding: 0;
  margin: 0;
  background: 0;
}

.range,
.range-volume {
  position: relative;
  display: flex;
  align-items: center;
}

.range input,
.range-volume input {
  position: relative;
  z-index: 1;
}

.range .change-range,
.range-volume .change-range {
  position: absolute;
  left: 0;
  top: 0;
  height: 6px;
  width: 0px;
  background-color: rgb(187, 187, 187);
  border-radius: 10px 0 0 10px;
}

.range-volume .change-range {
  height: 10px;
  width: 95%;
}

.under-ranger {
  position: absolute;
  left: 0;
  top: 0;
  height: 6px;
  width: 100%;
  background-color: rgb(63, 63, 63);
  border-radius: 10px;
}

.range-volume .under-ranger {
  height: 10px;
}

.aWrap input[type="range"]::-webkit-slider-thumb {
  appearance: none;
}

/* (E2) CUSTOM SLIDER TRACK */
.aWrap input[type="range"]::-webkit-slider-runnable-track {
  background: transparent;
  height: 6px;
  border-radius: 10px;
}

/* (E3) CUSTOM SLIDER BUTTON */
.aWrap input[type="range"]::-webkit-slider-thumb {
  width: 16px;
  height: 16px;
  border-radius: 50%;
  border: 0;
  background: #fff;
  position: relative;
  cursor: pointer;
  margin-top: -5px;
}

.aWrap input[type="range"]::-moz-range-thumb {
  width: 16px;
  height: 16px;
  border-radius: 50%;
  border: 0;
  background: #fff;
  position: relative;
  cursor: pointer;
  margin-top: -5px;
}

/* (F) VOLUME */
.aVolIco {
  margin: 0 10px;
  cursor: pointer;
}

input.aVolume {
  width: 100px !important;
}

.aVolume::-webkit-slider-runnable-track {
  height: 10px !important;
}

.aVolume::-webkit-slider-thumb {
  margin-top: -3px !important;
}

.aVolume::-moz-range-thumb {
  margin-top: -3px !important;
}

.volume-container {
  display: flex;
  align-items: center;
}

    </style>
@endsection

@section('js')
    <script type="text/javascript">

var timeString = (secs) => {
  // (A1) HOURS, MINUTES, SECONDS
  let ss = Math.floor(secs),
    hh = Math.floor(ss / 3600),
    mm = Math.floor((ss - hh * 3600) / 60);
  ss = ss - hh * 3600 - mm * 60;

  // (A2) RETURN FORMATTED TIME
  if (hh > 0) {
    mm = mm < 10 ? "0" + mm : mm;
  }
  ss = ss < 10 ? "0" + ss : ss;
  return hh > 0 ? `${hh}:${mm}:${ss}` : `${mm}:${ss}`;
};

function setProgress(elTarget) {
  let divisionNumber = elTarget.getAttribute("max") / 100;
  let rangeNewWidth = Math.floor(elTarget.value / divisionNumber);
  if (rangeNewWidth > 95) {
    elTarget.nextSibling.style.width = "95%";
  } else {
    elTarget.nextSibling.style.width = rangeNewWidth + "%";
  }
}

for (let i of document.querySelectorAll(".aWrap")) {
  // (B) AUDIO + HTML SETUP + FLAGS
  i.audio = new Audio(encodeURI(i.dataset.src));
  (i.aPlay = i.querySelector(".aPlay")),
    (i.aPlayIco = i.querySelector(".aPlayIco")),
    (i.aNow = i.querySelector(".aNow")),
    (i.aTime = i.querySelector(".aTime")),
    (i.aSeek = i.querySelector(".aSeek")),
    (i.aVolume = i.querySelector(".aVolume")),
    (i.aVolIco = i.querySelector(".aVolIco"));
  i.seeking = false; // user is dragging the seek bar

  // (C) PLAY & PAUSE
  // (C1) CLICK TO PLAY/PAUSE
  i.aPlay.onclick = () => {
    if (i.audio.paused) {
      i.audio.play();
    } else {
      i.audio.pause();
    }
  };

  // (C2) SET PLAY/PAUSE ICON
  i.audio.onplay = () => (i.aPlayIco.innerHTML = '<i class="fa fa-pause"></i>');
  i.audio.onpause = () => (i.aPlayIco.innerHTML = '<i class="fa fa-play"></i>');

  // (D) TRACK PROGRESS & SEEK TIME
  // (D1) TRACK LOADING
  i.audio.onloadstart = () => {
    i.aNow.innerHTML = "Loading";
    i.aTime.innerHTML = "";
  };

  // (D2) ON META LOADED
  i.audio.onloadedmetadata = () => {
    // (D2-1) INIT SET TRACK TIME
    i.aNow.innerHTML = timeString(0);
    i.aTime.innerHTML = timeString(i.audio.duration);

    // (D2-2) SET SEEK BAR MAX TIME
    i.aSeek.max = Math.floor(i.audio.duration);

    // (D2-3) USER CHANGE SEEK BAR TIME
    i.aSeek.oninput = () => (i.seeking = true); // prevents clash with (d2-4)
    i.aSeek.onchange = () => {
      i.audio.currentTime = i.aSeek.value;
      if (!i.audio.paused) {
        i.audio.play();
      }
      i.seeking = false;
    };

    // (D2-4) UPDATE SEEK BAR ON PLAYING
    i.audio.ontimeupdate = () => {
      if (!i.seeking) {
        i.aSeek.value = Math.floor(i.audio.currentTime);
      }
      i.aNow.innerHTML = timeString(i.audio.currentTime);
      let divisionNumber = i.aSeek.getAttribute("max") / 100;
      let rangeNewWidth = Math.floor(i.aSeek.value / divisionNumber);
      if (rangeNewWidth > 95) {
        i.aSeek.nextSibling.style.width = "95%";
      } else {
        i.aSeek.nextSibling.style.width = rangeNewWidth + "%";
      }
    };
  };

  // (E) VOLUME
  i.aVolIco.onclick = () => {
    i.audio.volume = i.audio.volume == 0 ? 1 : 0;
    i.aVolume.value = i.audio.volume;
    i.aVolIco.innerHTML =
      i.aVolume.value == 0
        ? '<i class="fa fa-volume-off"></i>'
        : '<i class="fa fa-volume-up"></i>';
    if (i.aVolume.value == 0) {
      i.aVolume.nextSibling.style.width = "0%";
    } else {
      i.aVolume.nextSibling.style.width = "95%";
    }
  };
  i.aVolume.onchange = () => {
    i.audio.volume = i.aVolume.value;
    i.aVolIco.innerHTML =
      i.aVolume.value == 0
        ? '<i class="fa fa-volume-off"></i>'
        : '<i class="fa fa-volume-up"></i>';
  };

  // (F) ENABLE/DISABLE CONTROLS
  i.audio.oncanplaythrough = () => {
    i.aPlay.disabled = false;
    i.aVolume.disabled = false;
    i.aSeek.disabled = false;
  };
  i.audio.onwaiting = () => {
    i.aPlay.disabled = true;
    i.aVolume.disabled = true;
    i.aSeek.disabled = true;
  };

  i.aSeek.addEventListener("input", function () {
    setProgress(this);
  });

  i.aVolume.addEventListener("input", function () {
    setProgress(this);
  });
}
</script>
@endsection
