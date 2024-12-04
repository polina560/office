

<script setup lang="ts">
import { ref, computed } from 'vue';


const coords = ref([ 50, 50 ]);

const circleStyles = computed(() => ({
  left: `${coords.value[0]}px`,
  top: `${coords.value[1]}px`,
}));

const coordX = computed(() => {
  return coords.value;

});

// watch (coords, newX => {
//   coordXY.values = newX.values;
// })

const updateCoords = e => coords.value = [ e.pageX, e.pageY ];
const updateCoordsOn = () => document.addEventListener('mousemove', updateCoords);
const updateCoordsOff = () => document.removeEventListener('mousemove', updateCoords);
</script>

<template>

        <div
          class="circle"
          :style="circleStyles"
          @mousedown="updateCoordsOn"
          @mouseup="updateCoordsOff"
        ></div>
 <p>{{coordX}}</p>

</template>

<style scoped>
body {
  overflow: hidden;
}

.circle {
  position: relative;
  display: inline-block;
  transform: translate(-50%, -50%);
  width: 100px;
  height: 100px;
  background: blue;
  border-radius: 50%;
  cursor:grab;
}


.element-wrp {
  position: relative;
  width: 900px;
  height: 500px;
}
</style>
