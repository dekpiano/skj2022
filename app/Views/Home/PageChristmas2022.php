<style>
    @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Patua+One&display=swap');

    #snowflake{
    width: 20px;
}

.snow {
  font-size: 20px;
  position: fixed;
  top: -5vh;
  transform: translateY(0);
   transform : rotate(180deg);
  animation: fall 7s linear forwards;
}

@keyframes fall {
  to {
    transform: translateY(105vh);
  }
}


.content1{
    height: 100vh;
  /* display:flex;
  justify-content: center;
  align-items: center; */
  background-image: url(https://images.freecreatives.com/wp-content/uploads/2016/03/Beautiful-High-Quality-Snow-Background-Wallpapers.jpg);
  background-size: cover;
  background-position: center;
}
.iced-text{
  font-family: 'Fredoka One', cursive;
  font-size: 12vmin;
  text-align: center;
  line-height: .8em;
  position:relative;
  letter-spacing: -0.02em;
  padding: 120px 50px 0px;
  display: flex;
    align-items: center;
    justify-content: center;
}
@media (orientation: landscape) {
  .iced-text {
    font-size: 12vmax;
  }
}
.iced-text-back{
  position: absolute;
  top: 0;
  left: 0;
  color: white;
  z-index: -1;
  -webkit-text-stroke: 0.1em white;
  filter:drop-shadow(0 0 0.05em #0c6dbd);
}
.iced-text-front{
  background: #0c6dbd;
  background-image: url();
  color: transparent;
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-stroke: 0.05em white;
}
#canvas{
  position: absolute;
}


.countdown-container h1 {
  font-size: 4rem;
  letter-spacing: 0.2rem;
}

#timer {
  font-size: 7.5rem;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-template-rows: 128px 80px;
  justify-items: center;
  grid-column-gap: 40px;
  font-family: "Patua One", cursive;
  color:#fff;
  -webkit-text-stroke: 0.05em black;
}

#timer .animated {
  animation-name: pulse;
  animation-duration: 1s;
  animation-timing-function: linear;
  animation-fill-mode: both;
  animation-iteration-count: infinite;
}
.label {
  font-size: 2.5rem;
  color: #fec54d;
  -webkit-text-stroke: 0.05em black;
}

/* Media Queries */
@media screen and (max-width: 690px) {
  #timer {
    font-size: 5.5rem;
  }

  h1 {
    text-align: center;
  }

  .start-quiz-btn {
    visibility: hidden;
  }
}

@media screen and (max-width: 518px) {
  #timer {
    font-size: 4rem;
    grid-template-rows: 70px 50px;
  }

  h1 {
    font-size: 2.5rem;
  }

  .label {
    font-size: 1.7rem;
  }
}

@media screen and (max-width: 453px) {
  #timer {
    grid-template-columns: repeat(4, 1fr);
    /* grid-template-rows: repeat(2, 70px 60px); */
    grid-column-gap: 0px;
  }

  #timer span:nth-of-type(-n + 2) {
    grid-row: 2/3;
  }

  .iced-text {
    padding: 50px 50px 0px;
    font-size: 18vmin;
  }
}

@keyframes pulse {
  100% {
    transform: scaleX(1);
  }

  30%,
  50%,
  80% {
    transform: scale3d(1.1, 1.1, 1.1);
  }

  0% {
    transform: scaleX(1);
  }
}




@media (max-width: 575.98px) { 
    
}

@media (max-width: 767.98px) { 
    
}

@media (max-width: 991.98px) { 
}

@media (max-width: 1199.98px) {
    
}

@media (max-width: 1399.98px) { 
    
}

</style>
<div class="content1">
  <div class="iced-text">
    <div class="iced-text-front">Merry<br>Christmas 2022</di>
  </div>
</div>
<div class="countdown-container">
        <div id="timer">
          <div id="days"></div>
          <div id="hours"></div>
          <div id="mins"></div>
          <div id="secs" class="animated"></div>
          <span class="label">Days</span>
          <span class="label">Hours</span>
          <span class="label">Mins</span>
          <span class="label">Secs</span>
        </div>
      </div>

<script>
    function createSnow() {
  const snow = document.createElement("div");

  snow.innerHTML = "<img id='snowflake' src='https://static.vecteezy.com/system/resources/thumbnails/011/025/390/small/christmas-snowflake-winter-free-png.png'>";
  snow.classList.add("snow");

  document.body.appendChild(snow);

  snow.style.left = Math.random() * 100 + "vw";

  snow.style.animationDuration = math.random() * 5 + 8 + "s";

  setTimeout(() => {
    snow.remove();
  }, 5000);
}

setInterval(createSnow, 800);

// Countdown section
const { body } = document;
const daysEl = document.getElementById('days');
const hoursEl = document.getElementById('hours');
const minsEl = document.getElementById('mins');
const secsEl = document.getElementById('secs');

function calculateChristmasCountdown() {
  const now = new Date();
  const currentMonth = now.getMonth() + 1;
  const currentDay = now.getDate();

  // Figure out the year that the next Christmas will occur on
  let nextChristmasYear = now.getFullYear();
  if (currentMonth === 12 && currentDay > 25) {
    nextChristmasYear += 1;
  }

  const nextChristmasDate = `Dec 25, ${nextChristmasYear} 0:0:0`;
  const christmasDate = new Date(nextChristmasDate);
  const timeLeft = christmasDate - now; // in milliseconds

  let days = 0;
  let hours = 0;
  let mins = 0;
  let secs = 0;

  // Don't calculate the time left if it is Christmas day
  if (currentMonth !== 12 || (currentMonth === 12 && currentDay !== 25)) {
    days = Math.floor(timeLeft / 1000 / 60 / 60 / 24);
    hours = Math.floor(timeLeft / 1000 / 60 / 60) % 24;
    mins = Math.floor(timeLeft / 1000 / 60) % 60;
    secs = Math.floor(timeLeft / 1000) % 60;
  }
  daysEl.innerHTML = days < 10 ? `0${days}` : days;
  hoursEl.innerHTML = hours < 10 ? `0${hours}` : hours;
  minsEl.innerHTML = mins < 10 ? `0${mins}` : mins;
  secsEl.innerHTML = secs < 10 ? `0${secs}` : secs;
}

function createSnowFlake() {
  const snow_flake = document.createElement('i');
  snow_flake.classList.add('far');
  snow_flake.classList.add('fa-snowflake');
  snow_flake.style.left = `${Math.random() * window.innerWidth}px`;
  snow_flake.style.animationDuration = `${Math.random() * 3 + 2}s`;
  snow_flake.style.opacity = Math.random();

  body.appendChild(snow_flake);

  setTimeout(() => {
    snow_flake.remove();
  }, 5000);
}

setInterval(calculateChristmasCountdown, 1000);
</script>