<template>
    <div>
	  <section>
	  	<div class="container">
            <div class="circle-container" v-for="index in 200" :key="index">
                <div class="circle"></div>
            </div>
	  		<div class="counter">
	  				<p>PRÓXIMO VIVO</p>
	  				<span id="countdown" class="row timer">
	  					<div class="col block-time days">
	  						<span class="num"></span>
	  						<span class="text">Días</span>
	  					</div>
	  					<div class="col block-time hours">
	  						<span class="num"></span>
	  						<span class="text">Horas</span>
	  					</div>
	  					<div class="col block-time minutes">
	  						<span class="num"></span>
	  						<span class="text">Min.</span>
	  					</div>
	  					<div class="col block-time seconds">
	  						<span class="num"></span>
	  						<span class="text">Seg.</span>
	  					</div>
	  				</span>
  			</div>

	  		<div class="row content-logo">
	  			<a><img src="img/forosas/logo.png"></a>
	  		</div>

	  		
            <div class="content-date">
                <img src="img/forosas/date.png">
            </div>
	  	
	  	</div>
	  </section>

    </div>
</template>

<script>
    export default {
        props : {
            segundosRestantes: {
                type: Number,
                default: 0
            },
            ahora: {
                type: String
            }
        },
        data () {
            return {
                seconds: this.segundosRestantes,
                countdownTimer: null,
                info: {
                },
                errors: [],
            }
        },
        mounted () {
            console.debug('Home mounted',this.ahora, this.segundosRestantes);

            this.countdownTimer = setInterval(this.timer, 1000);
        },
        methods: {
            timer () {
                
                var days        = Math.floor(this.seconds/24/60/60);
                var hoursLeft   = Math.floor((this.seconds) - (days*86400));
                var hours       = Math.floor(hoursLeft/3600);
                var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
                var minutes     = Math.floor(minutesLeft/60);
                var remainingSeconds = this.seconds % 60;
                function pad(n) {
                return (n < 10 ? "0" + n : n);
                }
                const $count = $('#countdown');
                $count.find('.days .num').html(days);
                $count.find('.hours .num').html(hours);
                $count.find('.minutes .num').html(minutes);
                $count.find('.seconds .num').html(remainingSeconds);
                //document.getElementById('countdown').innerHTML = pad(days) + ":" + pad(hours) + ":" + pad(minutes) + ":" + pad(remainingSeconds);
                if (this.seconds == 0) {
                    clearInterval(this.countdownTimer);
                } else {
                    this.seconds--;
                }
            }            
        }
    }
</script>
<style scoped>
</style>