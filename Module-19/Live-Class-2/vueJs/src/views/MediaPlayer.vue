<template>
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">Media Player</h1>

    <div class="flex flex-col lg:flex-row">
        <div class="w-full bg-gray-100 rounded-md overflow-hidden shadow-lg p-4 m-2">
            <h2 class="text-xl font-semibold mb-4 bg-lime-400 text-center">Video List</h2>
            <ul>
                <li v-for="(video, index) in videos" :key="video.id" @click="playVideo(index)" class="cursor-pointer py-2 px-4 mb-2 rounded-md hover:bg-indigo-200" :class="{ 'bg-indigo-300': currentVideoIndex === index }">
                    {{ video.title }}
                </li>
            </ul>
        </div>

        <div class="w-full bg-gray-500 rounded-md overflow-hidden shadow-lg p-4 m-2">
            <div class="bg-gray-800 text-white px-4 py-2">
                <h2>{{ currentVideo.title }}</h2>
            </div>

            <video ref="videoPlayer" class="w-full h-[350px] " @timeupdate="updateProgress" @ended="handleVideoEnd" @click="togglePlayPause" @loadedmetadata="setTotalTime">
                <source :src="currentVideo.url" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            <div class="flex items-center justify-between bg-gray-800 text-white px-4 py-2">
                <div class="relative flex-grow mx-4">
                    <div class="h-1 bg-gray-600 rounded-full">
                        <div class="h-full bg-blue-500 rounded-full" :style="{ width: progressPercentage }"></div>
                    </div>
                    <input type="range" min="0" max="100" step="0.1" v-model="progress" @input="seek" class="absolute top-0 left-0 w-full h-1 opacity-0 cursor-pointer"/>
                </div>

                <div class="text-white mx-2">
                    {{ currentTime }} / {{ totalTime }}
                </div>
            </div>

            <div class="flex items-center justify-between bg-gray-700 text-white px-4 py-2">
                <button @click="togglePlayPause" class="focus:outline-none bg-green-600 hover:bg-indigo-600 rounded">
                    <svg v-if="!isPlaying" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-6.084-3.212A1 1 0 007 8.882v6.236a1 1 0 001.668.738l6.084-3.212a1 1 0 000-1.476z" />
                    </svg>
                    <svg v-else class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6" />
                    </svg>
                </button>

                <div>
                    <button @click="prevVideo" class="focus:outline-none bg-gray-600 hover:bg-indigo-600 rounded mx-1">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5M12 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button @click="nextVideo" class="focus:outline-none bg-gray-600 hover:bg-indigo-600 rounded mx-1">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7l7 7-7 7" />
                        </svg>
                    </button>
                </div>
                    
                <div class="flex items-center">
                    <button @click="toggleMute" class="focus:outline-none bg-blue-600 hover:bg-indigo-600 rounded mx-1 pl-1">
                        <svg v-if="isMuted" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5v14l-7-7m16 0a9 9 0 01-18 0 9 9 0 0118 0zm-6 2l-6-6" />
                        </svg>
                        <svg v-else class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5v14l-7-7m16 0a9 9 0 01-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                    <div>
                        <input v-model="volume" type="range" min="0" max="1" step="0.01" class="w-16 mx-2" @input="adjustVolume" />
                    </div>
                </div>

                <button @click="toggleFullscreen" class="focus:outline-none bg-blue-600 hover:bg-indigo-600 rounded p-1">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 6H6v4H2V6a2 2 0 012-2h4v2zm8-2h4a2 2 0 012 2v4h-2V6h-4V4zm-8 12H6v4h4v2H6a2 2 0 01-2-2v-4h2zm10 2v-4h2v4a2 2 0 01-2 2h-4v-2h4z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
</template>
  
<script setup>
import { ref, onMounted } from 'vue';

const videos = ref([
    { id: 1, title: 'Sample Video 1', url: 'https://www.w3schools.com/html/mov_bbb.mp4' },
    { id: 2, title: 'Sample Video 2', url: 'https://www.w3schools.com/html/movie.mp4' },
]);

const currentVideoIndex = ref(0);
const currentVideo = ref(videos.value[currentVideoIndex.value]);
const videoPlayer = ref(null);
const isPlaying = ref(false);
const progressPercentage = ref('0%');
const volume = ref(0.5);
const isMuted = ref(false);
const currentTime = ref('00:00');
const totalTime = ref('00:00');

const togglePlayPause = () => {
    if (videoPlayer.value.paused) {
        videoPlayer.value.play();
        isPlaying.value = true;
    } else {
        videoPlayer.value.pause();
        isPlaying.value = false;
    }
};

const updateProgress = () => {
    const progress = (videoPlayer.value.currentTime / videoPlayer.value.duration) * 100;
    progressPercentage.value = `${progress}%`;
    currentTime.value = formatTime(videoPlayer.value.currentTime);
};

const progress = ref(0);
    const seek = () => {
    const seekTime = (progress.value / 100) * videoPlayer.value.duration;
    videoPlayer.value.currentTime = seekTime;
};

const handleVideoEnd = () => {
    isPlaying.value = false;
    progressPercentage.value = '0%';
    nextVideo();
};

const adjustVolume = () => {
    videoPlayer.value.volume = volume.value;
};

const toggleMute = () => {
    isMuted.value = !isMuted.value;
    videoPlayer.value.muted = isMuted.value;
};

const toggleFullscreen = () => {
    if (document.fullscreenElement) {
        document.exitFullscreen();
    } else {
        videoPlayer.value
        videoPlayer.value.requestFullscreen();
    }
};

const nextVideo = () => {
    currentVideoIndex.value = (currentVideoIndex.value + 1) % videos.value.length;
    currentVideo.value = videos.value[currentVideoIndex.value];
    videoPlayer.value.load();
    isPlaying.value = false;
    progressPercentage.value = '0%';
    resetTime();
    videoPlayer.value.onloadedmetadata = () => {
        totalTime.value = formatTime(videoPlayer.value.duration);
    };
};

const prevVideo = () => {
    currentVideoIndex.value = (currentVideoIndex.value - 1 + videos.value.length) % videos.value.length;
    currentVideo.value = videos.value[currentVideoIndex.value];
    videoPlayer.value.load();
    isPlaying.value = false;
    progressPercentage.value = '0%';
    resetTime();
    videoPlayer.value.onloadedmetadata = () => {
        totalTime.value = formatTime(videoPlayer.value.duration);
    };
};

const setTotalTime = () => {
    totalTime.value = formatTime(videoPlayer.value.duration);
};

const formatTime = (time) => {
    const minutes = Math.floor(time / 60);
    const seconds = Math.floor(time % 60);
    return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
};

const resetTime = () => {
    currentTime.value = '00:00';
    totalTime.value = '00:00';
};

const playVideo = (index) => {
    currentVideoIndex.value = index;
    currentVideo.value = videos.value[currentVideoIndex.value];
    videoPlayer.value.load();
    togglePlayPause();
};

onMounted(() => {
    document.addEventListener('keydown', (event) => {
        if (event.code === 'Space') {
            togglePlayPause();
        } else if (event.code === 'ArrowRight') {
            videoPlayer.value.currentTime += 5;
        } else if (event.code === 'ArrowLeft') {
            videoPlayer.value.currentTime -= 5;
        } else if (event.code === 'ArrowUp') {
            volume.value = Math.min(volume.value + 0.1, 1);
            adjustVolume();
        } else if (event.code === 'ArrowDown') {
            volume.value = Math.max(volume.value - 0.1, 0);
            adjustVolume();
        }
    });
});
</script>

<style scoped>

</style>
