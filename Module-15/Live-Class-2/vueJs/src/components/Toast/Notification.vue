<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-2 p-2">
        <button class="w-100 btn btn-success" @click="ToastSuccess">
          Toast Success
        </button>
      </div>
      <div class="col-2 p-2">
        <button class="w-100 btn btn-success" @click="ToastError">
          Toast Error
        </button>
      </div>
      <div class="col-2 p-2">
        <button class="w-100 btn btn-success" @click="ToastInfo">
          Toast Info
        </button>
      </div>
      <div class="col-2 p-2">
        <button class="w-100 btn btn-success" @click="ToastWarning">
          Toast Warning
        </button>
      </div>
      <div class="col-2 p-2">
        <button class="w-100 btn btn-success" @click="ToastDefault">
          Toast Default
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { createToaster } from "@meforma/vue-toaster";

const toaster = createToaster({
  /* options */
});

const ToastSuccess = () => {
  toaster.show(`Hey! I'm here`, { type: "success", position: "top-right", dismissible: false});
};
const ToastError = () => {
  toaster.show(`Hey! I'm here`, { type: "error", position: "bottom" });
};
const ToastInfo = () => {
  toaster.show(`Hey! I'm here`, { type: "info", position: "bottom" });
};
const ToastWarning = () => {
  toaster.show(`Hey! I'm here`, { type: "warning", position: "bottom" });
};
const ToastDefault = () => {
  toaster.show(`Hey! I'm here`, { position: "bottom" });
};
</script>
