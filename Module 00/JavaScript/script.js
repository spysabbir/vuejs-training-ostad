// Hello JavaScript
    // document.write('Hello Javascript');

//  JS Variable
    // var x = 10;
    // var y = 15;
    // var z = x+y;
    // document.write(z);

// Non Primitive Data Type
    // Object
        // var person = {
        //     name: "Sabbir",
        //     age: 25,
        //     city: "Dhaka"
        // };
        // document.write(person.name);
    // Array
        // var city = ["Dhaka", "Khulna", "Jessore"];
        // // document.write(city);
        // document.write(city[1]);

// Introduce With Operator
    // Arithmetic Operators
        // Addition (+)
        // Subtraction (-)
        // Multiplication (*)
        // Division (/)
        // Modulus (%)
        // Increment (++)
        // Decrement (--)

    // Assignment Operators
        // =, +=, -=, *=, /=, %=
    // Comparison Operators
        // ==, ===, !=, !==, >, >=, <, <=
    // Logical Operators
        // &&, ||, !

// If Else Statement
    // var age = 19;
    // if(age > 18){
    //     document.write('You are Adult.')
    // }
    // var city = "Jessore";
    // if(city == "Dhaka"){
    //         document.write('You from Jessore.')
    // }else{
    //     document.write('You from Dhaka.')
    // }
    // var mark = 60;
    // if(mark >= 80 && mark <= 100){
    //     document.write('You are A+')
    // }else if(mark < 80 && mark >= 70){
    //     document.write('You are A')
    // }else if(mark < 70 && mark >= 60){
    //     document.write('You are A-')
    // }else if(mark < 60 && mark >= 50){
    //     document.write('You are B')
    // }else if(mark < 50 && mark >= 40){
    //     document.write('You are C')
    // }else if(mark < 40 && mark >= 33){
    //     document.write('You are D')
    // }else{
    //     document.write('You are F')
    // }

// Switch Case
    // var mark = 70;
    // switch(true){
    //     case (mark >= 80 && mark <= 100):
    //         document.write('You are A+');
    //     break;
    //     case (mark < 80 && mark >= 70):
    //         document.write('You are A');
    //     break;
    //     case (mark < 70 && mark >= 60):
    //         document.write('You are A-');
    //     break;
    //     case (mark < 60 && mark >= 50):
    //         document.write('You are B');
    //     break;
    //     case (mark < 50 && mark >= 40):
    //         document.write('You are C');
    //     break;
    //     case (mark < 40 && mark >= 33):
    //         document.write('You are D');
    //     break;
    //     default:
    //         document.write('You are F');
    // }

// Basic for loop
    // var num;
    // for(num = 0; num <= 10; num++){
    //     document.write(num + "<br>");
    // }

// Loop break continue
    // var num;
    // for(num = 0; num <= 10; num++){
    //     // if(num==5 || num==8){
    //     //     continue
    //     // }
    //     if(num==5){
    //         break
    //     }
    //     document.write(num + "<br>");
    // }

// While Loop
    // var num = 1;
    // while(num <= 10){
    //     document.write(num + "<br>");
    //     num++
    // }

// do while loop
    // var num = 1;
    // do{
    //     document.write(num + "<br>");
    //     num++
    // }while(num <= 10)

// JavaScript function
    // function addTwoNumber(){
    //     var num1 = 10;
    //     var num2 = 20;
    //     var result = num1+num2;
    //     document.write(result + "<br>")
    // }
    // addTwoNumber();
    // addTwoNumber();
    // addTwoNumber();
    // addTwoNumber();

// Function Parameter
    // function addTwoNumber(num1, num2){
    //     var result = num1+num2;
    //     document.write(result + "<br>")
    // }
    // addTwoNumber(30, 20);
    // addTwoNumber(15, 15);
    // function addManyNumber(num1, num2){
    //     var result = num1+num2;
    //     document.write(result + "<br>")
    // }
    // addTwoNumber(30, 20);
    // addTwoNumber(15, 15);

// Function Return
    // function addTwoNumber(num1, num2){
    //     return num1+num2;
    // }
    // var result = addTwoNumber(30.5, 20.00)+50;
    // document.write(result)

// JavaScript Object
    // var myLaptop = {
    //     brand: "HP",
    //     ram: "12GB",
    //     storage: "512GB",
    //     monitor: "12in",
    //     processor: "Core i5 7Gen",
    //     battery : "52.5Wh",
    //     isSSD : true,
    // }
    // // document.write(myLaptop['brand']);
    // document.write(myLaptop.processor)

// JavaScript Array
    // var citys = ["Dhaka", "Khulna", "CTG", "Jessore"];
    // // document.write(citys)
    // document.write(citys[0])

// For Loop Over Array
    // var citys = ["Dhaka", "Khulna", "CTG", "Jessore"];
    // var i;
    // for(i = 0; i < citys.length; i++){
    //     document.write(citys[i] + "<br>");
    // }

// For In Loop Over Array
    // var citys = ["Dhaka", "Khulna", "CTG", "Jessore"];
    // for (var city in citys) {
    //     document.write(citys[city] + "<br>");
    // }

// For In Loop Over Object
    // var myLaptop = {
    //     brand: "HP",
    //     ram: "12GB",
    //     storage: "512GB",
    //     monitor: "12in",
    //     processor: "Core i5 7Gen",
    //     battery : "52.5Wh",
    //     isSSD : true,
    // }
    // for (const item in myLaptop) {
    //     document.write(myLaptop[item] + "<Br>")
    // }

//  Array Concate And Array Form
    // const arr1 = ["A", "B", "C"]
    // const arr2 = ["D", "E", "F"]
    // const result = arr1.concat(arr2)
    // document.write(result)
    // const title = "Learn Javascript"
    // const titleArray = Array.from(title);
    // // document.write(titleArray)
    // document.write(titleArray[0])

// Array Filter
    // const mark = [10, 20, 30, 40, 50]
    // const result = mark.filter(function(item){
    //     return item > 20;
    // })
    // document.write(result)

// Array Find & Find Index
    // const numArr = [10, 20, 30, 40, 50]
    // // const result = numArr.find(function(value){
    // //     // return value < 30
    // //     return value > 10
    // // })
    // const result = numArr.findIndex(function(value){
    //     // return value < 30
    //     return value > 20
    // })
    // document.write(result)

// Array ForEach Method
    // const numArr = [10, 20, 30, 40, 50]
    // numArr.forEach(function(item){
    //     document.write(item + "<br>")
    // })

// Array Includes And IndexOf
    // const numArr = [10, 20, 30, 40, 50]
    // // const result = numArr.includes(50)
    // // const result = numArr.includes(60)
    // // const result = numArr.indexOf(50)
    // const result = numArr.indexOf(60)
    // document.write(result)

// Array Pop Push Reverse
    // const numArr = [10, 20, 30, 40, 50]
    // // const result = numArr.reverse()
    // // document.write(result)
    // // numArr.push(60)
    // numArr.pop()
    // numArr.pop()
    // numArr.pop()
    // document.write(numArr)

// Array Slice And Sort
    // const numArr = [10, 30, 20, 50, 40]
    // // const result = numArr.sort()
    // // const result = numArr.sort().reverse()
    // const result = numArr.slice(1,3)
    // document.write(result)

// Array splice
    // const numArr = [10, 30, 20, 50, 40]
    // // const result = numArr.splice(1, 1)
    // // const result = numArr.splice(1, 4)
    // const result = numArr.splice(0, 0, 5)
    // document.write(numArr)
    
// String Methods
    // const country = "Bangladesh"
    // const city = " Khulna"
    // document.write(
    //     // country.charAt(5)
    //     // country.concat(city)
    //     // country.indexOf('d')
    //     // country.lastIndexOf('a')
    //     // country.replace("desh", "deshi")
    //     // country.substr(0, 6)
    //     // country.substring(6, 10)
    //     // country.toLowerCase()
    //     // country.toUpperCase()
    //     city.trim()
    // )

// JavaScript Date Object
    // const date = new Date();
    // document.write(
    //     // date
    //     // date.getDate()
    //     // date.getFullYear()
    //     // date.getDay()
    //     // date.getMonth()
    //     // date.getHours()
    //     // date.getMinutes()
    //     // date.getSeconds()
    //     date.getTime()
    // )

// JavaScript Math Object
    // document.write(
    //     // Math.abs(-7)
    //     // Math.ceil(7.1)
    //     // Math.floor(7.9)
    //     // Math.max(20, 50, 80, 40, 30)
    //     // Math.min(50, 80, 40, 30)
    //     // Math.random()
    //     Math.round(7.5)
    // )

//  JavaScript Numbers
    // const num = 4.554554545
    // document.write(
    //     // Number.isFinite(8.5)
    //     // Number.isInteger(8)
    //     // Number.parseFloat("7.7")
    //     // Number.parseInt("7.7")
    //     // num.toFixed(2)
    //     num.toString()
    // )

// JS Window Object
    // function objAlert(){
    //     alert("Click done")
    // }
    // function objConfirm(){
    //     const result = confirm("Are you confirm")
    //     document.write(result)
    // }
    // function objPrompt(){
    //     const result = prompt("Enter your name")
    //     document.write(result)
    // }
    // function objOpen(){
    //     open()
    // }
    // function objClose(){
    //     close()
    // }
    // setTimeout(function(){
    //     alert("Alert after 5 secend.")
    // }, 5000)

// JS Navigator Object
    // const appCodeName = navigator.appCodeName;
    // const appName = navigator.appName;
    // const appVersion = navigator.appVersion;
    // const cookieEnabled = navigator.cookieEnabled;
    // const language = navigator.language;
    // const userAgent = navigator.userAgent;
    // const platform = navigator.platform;
    // document.write(appCodeName + "<br>")
    // document.write(appName + "<br>")
    // document.write(appVersion + "<br>")
    // document.write(cookieEnabled + "<br>")
    // document.write(language + "<br>")
    // document.write(userAgent + "<br>")
    // document.write(platform + "<br>")

// js geolocation
    // navigator.geolocation.getCurrentPosition(function(position){
    //     const altitude = position.coords.altitude
    //     const latitude = position.coords.latitude
    //     const longitude = position.coords.longitude
    //     const speed = position.coords.speed

    //     document.write("altitude: " + altitude + "<br>")
    //     document.write("latitude: " + latitude + "<br>")
    //     document.write("longitude: " + longitude + "<br>")
    //     document.write("speed: " + speed + "<br>")
    // })

// Js common events
    // function myEvent(eventName) {
    //     console.log(eventName);
    // }

// Finding Elements By DOM
    // const idElement = document.getElementById('myId');
    // idElement.innerHTML="Hello Id Element";
    // const classElements = document.getElementsByClassName('myClass');
    // classElements[0].innerHTML="Hello Class Element";
    // const nameElements = document.getElementsByName('myName');
    // nameElements[0].innerHTML="Hello Name Element";
    // const tagElements = document.getElementsByTagName('h4');
    // tagElements[0].innerHTML="Hello Tag Element";

// HTML DOM Document
    // function demo() {
    //     // let info = document.cookie;
    //     // let info = document.domain;
    //     // let info = document.lastModified;
    //     // let info = document.title;
    //     let info = document.URL;
    //     document.getElementsByTagName('span')[0].innerHTML=info;
    // }
    // function demo() {
    //     document.open('text/html',"replace");
    //     document.write("<h4>Md Sabbir Ahammed</h4>");
    //     document.close();
    // }
    // function demo() {
    //     let w = window.open()
    //     w.document.open();
    //     w.document.write("<h4>Md Sabbir Ahammed</h4>");
    //     w.document.close();
    // }
    // function demo() {
    //     let myItems = document.getElementsByTagName('p')
    //     let itemCount = myItems.length;
    //     alert(itemCount)
    // }
    
// JS DOM Working With Form Input
    // function result(){
    //     let num1 = document.getElementById('num1').value;
    //     let num2 = document.getElementById('num2').value;
    //     let result = parseInt(num1) + parseInt(num2);
    //     alert(result)
    // }

// DOM Manipulate CSS Class
    // function addStyle(){
    //     let myId = document.getElementById('myId')
    //     myId.classList.add('text-info')
    // }
    // function removeStyle(){
    //     let myId = document.getElementById('myId')
    //     myId.classList.remove('text-info')
    // }\

// Create Element Append Element
    // function addItem() {
    //     let itemValue = document.getElementById('itemValue').value;

    //     let itemList = document.createElement('li')
    //     itemList.innerHTML=itemValue;

    //     let allItem = document.getElementById('allList');
    //     allItem.appendChild(itemList)
    // }

// DOM Change Attribute Value
    // function changeAttr(){
    //     let myImg = document.getElementById('myImg')
    //     myImg.width="100";
    //     myImg.height="100";
    //     myImg.src="https://spysabbir.com/asset/images/hero.png"
    // }

// DOM Query Selector
    // function finding(){
    //     document.querySelector('h1').innerHTML="Tag Selector"
    //     document.querySelector('#myId').innerHTML="Id Selector"
    //     document.querySelector('.myClass').innerHTML="Class Selector"
    //     document.querySelector('p[name="myName"]').innerHTML="Name Selector"
    // }

// Ajax Get Request In Details
    // function ajaxGetRequest(){
    //     let url = "https://crud.teamrabbil.com/api/v1/ReadProduct";
    //     let configuration = {
    //         method: "GET"
    //     };
    //     fetch(url, configuration)
    //     .then(response=>response.json())
    //     .then(result=>console.log(result))
    //     .catch(error=>console.log(error))
    // }

// Ajax Post Request In Details
    // function ajaxPostRequest(){
    //     let url = "https://crud.teamrabbil.com/api/v1/CreateProduct";
    //     let bodyData = {
    //         Img: 'testtest.jpg',
    //         ProductCode: 'test',
    //         ProductName: 'test',
    //         Qty: '1',
    //         TotalPrice: '100',
    //         UnitPrice: '100',
    //     }
    //     let configuration = {
    //         method: "POST",
    //         headers: {'Accept': 'application/json', 'Content-Type': 'application/json'},
    //         body: JSON.stringify(bodyData)
    //     };
    //     fetch(url, configuration)
    //     .then(response=>response.json())
    //     .then(result=>console.log(result))
    //     .catch(error=>console.log(error))
    // }