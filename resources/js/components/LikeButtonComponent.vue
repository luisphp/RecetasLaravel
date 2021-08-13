<template>

<div>
        <div>
        <span class="like-btn" @click="likeReceta" :class="{ 'like-active' : isActive }">  </span> ( {{totalLikes}} )
        </div>
</div>

</template>

<script>
// import jquery from 'jquery';
export default {
    props: ['recetaid', 'like', 'likequantity'],
    data() {
      return {
        isActive: this.like,
        totalLikes :   this.likequantity
      }
    },
    mounted(){
                $('.like-btn').on('click', function() {
                $(this).toggleClass('like-active');
                });
    },
    computed: {
        cantidadLikes: function (){
          return this.totalLikes;
        }
    },
    methods: {
      likeReceta(){
        axios.post('../like/'+this.recetaid)
        .then(response => {
          
          this.likequantity += this.likequantity;

          if(response.data.attached.length > 0 )
          {
            this.totalLikes++;
          }else{
            this.totalLikes--;
          }

          this.isActive = !isActive;

        })
        .catch(err => {
          // cosole.log(err);
          if(err.response.status  === 401){
            window.location = '../register';
          }
        })


      }
    }
}


</script>

<style scoped>
.like-btn,
.clap-btn {
  display: inline-block;
  Cursor: pointer;
  width: 80px;
  height: 80px;
}

.like-btn {
  background: url('https://i.ibb.co/vw78mf3/heart.png') no-repeat 0% 50%;
  background-size: 2900%;
}

.clap-btn {
  background: url('https://i.ibb.co/GVsbrFF/claps.png') no-repeat 0% 50%;
  background-size: 900%;
 }

.like-active,
.clap-active {
  animation-name: animate;
  animation-duration: .8s;
  animation-iteration-count: 1;
  animation-fill-mode: forwards;
}
.like-active {
  animation-timing-function: steps(28);
}

.clap-active {
   animation-timing-function: steps(8);
}
@keyframes animate {
  0%   { background-position: left;  }
  50%  { background-position: right; }
  100% { background-position: right; }
}
</style>