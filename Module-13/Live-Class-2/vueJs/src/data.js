import {reactive} from "vue";
import fn from "./functions";

const data = reactive({
    posts: null,
    page: 1,
});

export {data, fn};