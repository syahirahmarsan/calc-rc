<template>
    <div class="tooltip">
        <slot />
        <span class="tooltiptext whitespace-pre-line px-2 lg:w-96 md:w-52">
            {{ text }}
        </span>
    </div>
</template>

<script>
export default {
  props: { 
    text: {
      type: String,
      required: true
    }
  },
}
</script>

<style>
.tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
  visibility: hidden;
  background-color: #c8c8c8;
  color: #000000;
  text-align: center;
  border-radius: 6px;
  padding: 10px 0;
  margin-left: 25px;
  margin-top: -20px;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>