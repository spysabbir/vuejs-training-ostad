import { createWebHistory , createRouter } from 'vue-router'

import Home from './../views/Home.vue'
import BmiCalculator from './../views/BmiCalculator.vue'
import Calculator from './../views/Calculator.vue'
import Countdown from './../views/Countdown.vue'
import MediaPlayer from './../views/MediaPlayer.vue'
import PhotoGallery from './../views/PhotoGallery.vue'
import Quiz from './../views/Quiz.vue'
import CurrencyConverter from './../views/CurrencyConverter.vue'
import Weather from './../views/Weather.vue'
import Stopwatch from './../views/Stopwatch.vue'
import Todo from './../views/Todo.vue'
import UrlShortener from './../views/UrlShortener.vue'


const routes = [
  { path: '/', component: Home },
  { path: '/bmi-calculator', component: BmiCalculator },
  { path: '/calculator', component: Calculator },
  { path: '/countdown', component: Countdown },
  { path: '/media-player', component: MediaPlayer },
  { path: '/photo-gallery', component: PhotoGallery },
  { path: '/quiz', component: Quiz },
  { path: '/currency-converter', component: CurrencyConverter },
  { path: '/weather', component: Weather },
  { path: '/stopwatch', component: Stopwatch },
  { path: '/todo', component: Todo },
  { path: '/url-shortener', component: UrlShortener },
]

const router = createRouter({
  history: createWebHistory (),
  routes,
})

export default router
