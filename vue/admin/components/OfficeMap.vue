<script setup lang="ts">
import { onMounted, ref } from 'vue'

interface MapProps {
  xInputName: string
  yInputName: string
  backgroundImage: string
  xCoordinate: number // 0 - 1
  yCoordinate: number // 0 - 1
}

const props = defineProps<MapProps>()

const marker = ref<HTMLSpanElement>()
const map = ref<HTMLDivElement>()
const img = ref<HTMLImageElement>()
const xCoord = ref(props.xCoordinate)
const yCoord = ref(props.yCoordinate)
const isDragging = ref(false)

onMounted(() => {
  if (!map.value || !img.value) {
    // eslint-disable-next-line no-console
    console.error('Карта не найдена')
    return
  }
  map.value.addEventListener('mousemove', event => {
    if (!map.value) {
      // eslint-disable-next-line no-console
      console.error('Карта не найдена')
      return
    }
    if (!marker.value) {
      // eslint-disable-next-line no-console
      console.error('Маркер не найден')
      return
    }
    if (isDragging.value) {
      let x = xCoord.value * map.value.offsetWidth,
        y = yCoord.value * map.value.offsetHeight

      x += event.movementX
      y += event.movementY

      x = Math.max(marker.value.offsetWidth / 2, x)
      x = Math.min(x, map.value.offsetWidth - (marker.value.offsetWidth / 2))

      y = Math.max(marker.value.offsetHeight / 2, y)
      y = Math.min(y, map.value.offsetHeight - (marker.value.offsetHeight / 2))

      if (Math.abs(event.offsetX - x) > marker.value.offsetWidth && event.offsetX > marker.value.offsetWidth) {
        x = event.offsetX
      }
      if (Math.abs(event.offsetY - y) > marker.value.offsetHeight && event.offsetY > marker.value.offsetHeight) {
        y = event.offsetY
      }
      xCoord.value = x / map.value.offsetWidth
      yCoord.value = y / map.value.offsetHeight
    }
  })

  document.addEventListener('mouseup', () => {
    isDragging.value = false
  })
})
</script>

<template>
  <div class="wrapper">
    <div
      ref="map"
      class="map"
      :style="{ backgroundImage: `url(${backgroundImage})` }"
    >
      <img
        ref="img"
        :src="backgroundImage"
        alt="#"
      />
      <span
        ref="marker"
        class="marker"
        :style="{ left: xCoord * 100 + '%', top: yCoord * 100 + '%' }"
        @mousedown.prevent="isDragging = true"
      >
      </span>
    </div>

    <input
      type="hidden"
      :name="xInputName"
      :value="xCoord"
    />
    <input
      type="hidden"
      :name="yInputName"
      :value="yCoord"
    />
  </div>
</template>

<style scoped lang="sass">
.wrapper
  position: relative

.map
  position: relative
  width: 100%
  background-size: contain
  background-repeat: no-repeat
  img
    visibility: hidden
    width: 100%

.marker
  width: 20px
  height: 20px
  background-color: red
  position: absolute
  cursor: pointer
  border-radius: 50%
  transform: translate(-10px, -10px)
</style>
