// DOM manipulations...
// const testDom = document.getElementById('test-id');
// const testDom = document.querySelector('#test-id');
// const testDom = document.querySelector('.test-class1');
// const testDom = document.querySelector('div');
// testDom.textContent = "New World!"
// testDom.style.color = 'red'
// testDom.style.backgroundColor = 'blue'

// const testDom = document.querySelectorAll('.test');
// testDom[0].textContent = "New World!"
// testDom[0].style.color = 'red'
// testDom[1].style.backgroundColor = 'blue'

// const testDom = document.querySelectorAll('.test');
// for(let i = 0; i < testDom.length; i++){
//     testDom[i].textContent = "New World!"
//     testDom[i].style.color = 'red'
//     testDom[i].style.backgroundColor = 'blue'
//     testDom[i].style.margin = '2px'
// }

// event handling...
// const testEvent = document.querySelector('#test-button');
// testEvent.addEventListener('click', function(){
//     console.log("Click");
// })

// OOP concept...
// const car = {
//     brand: 'Odi',
//     model: 'Sports',
//     year: 2022,
//     color: 'yellow',
//     start: function() {
//         console.log('Engine Start 1');
//     },
// }
// console.log(car);
// car.start();

// function Car(brand, model, year, color) {
//     this.brand = brand;
//     this.model = model;
//     this.year = year;
//     this.color = color;
//     this.start = function() {
//         console.log('Engine Start 2');
//     }
// }
// let car2 = new Car('Toyota', 'Sports', 2023, 'blue')
// console.log(car2);
// car2.start();

// Asynchronous JavaScript...
// function fatchData(callback){
//     setTimeout(function() {
//         const data = 'fatch data done';
//         callback(data);
//     }, 2000)
// }
// function processingAsyncData(data) {
//     console.log("Processing Data: ", data);
// }
// fatchData(processingAsyncData);
// afterDataFatch();
// function afterDataFatch() {
//     console.log("Last line of code")
// }

// function fatchData(){
//     return new Promise(function(resolve, reject) {
//         setTimeout(function() {
//             const data = 'fatch data done';
//             if(data){
//                 resolve(data);
//             }else{
//                 reject("Something went wrong.");
//             }
//         }, 2000)
//     })
// }
// fatchData()
//     .then(function(data) {
//         console.log("Processing Data: ", data);
//         afterDataFatch();
//     })
//     .catch(function(error) {
//         console.log("Processing Rejected. Error: ", error);
//         afterDataFatchError();
//     });
// function afterDataFatch() {
//     console.log("Last line of code")
// }
// function afterDataFatchError() {
//     console.log("Last line of code from error")
// }

// Fetch API...
// const fatchUrl = 'https://jsonplaceholder.typicode.com/posts';
// fetch(fatchUrl)
//     .then(response => {
//         return response.json()
//     })
//     .then(data => {
//         console.log("Last line of code")
//         console.log(data)
//     })
//     .catch(error => {
//         console.log("Processing Rejected. Error: ", error);
//         console.log("Last line of code from error")
//     });

// Axios...
// const fatchUrl = 'https://jsonplaceholder.typicode.com/posts';
// axios.get(fatchUrl)
//     .then(response => {
//         console.log("Processing Data: ", response.data);
//     })
//     .catch(error => {
//         console.log("Processing Rejected. Error: ", error);
//     });

// const customAxios = axios.create({
//     baseURL: 'https://jsonplaceholder.typicode.com',
//     timeout: 5000,
// });
// customAxios.get('/posts')
//     .then(response => {
//         console.log("Processing Data: ", response.data);
//     })
//     .catch(error => {
//         console.log("Processing Rejected. Error: ", error);
//     });
// customAxios.get('/posts/1')
//     .then(response => {
//         console.log("Single Processing Data: ", response.data);
//     })
//     .catch(error => {
//         console.log("Processing Rejected. Error: ", error);
//     });