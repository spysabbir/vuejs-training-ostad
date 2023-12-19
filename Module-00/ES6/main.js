// run terminal..... node main.js

// Use Strict Mode
    // "use strict";

// First ES6 Program Hello World
    // console.log("Hello ES6");

// Strict Mode
    // function test(){
    //     name = "Sabbir Ahammed";
    // }
    // test()

// Spread Operator
    // let poorCountry = ['Bangladesh', 'Srelanka'];
    // let rechCountry = ['China', 'Canada', "USA"];
    // let allCountry = [...poorCountry, ...rechCountry];
    // console.log(allCountry);

// Without Spread Operator
    // let poorCountry = ['Bangladesh', 'Srelanka'];
    // let rechCountry = ['China', 'Canada', "USA"];
    // poorCountry.push(rechCountry);
    // console.log(poorCountry);

// Rest Parameter
    // function restParameter(...numbers){
    //     let sum = 0;
    //     for(let i of numbers){
    //         sum = sum+i
    //     }
    //     console.log(sum);
    // }
    // restParameter(1, 2, 3, 4, 5)

// Dynamic Function
    // let name = function(value){
    //     return value;
    // }
    // console.log(name("Sabbir Ahammed"));

// ES6 Variable
    // // var 
    // var name = "Sabbir";
    // name = "Sovon"; //Reasign
    // var name = "Alif"; //Redeclare
    // console.log(name);
    // // let
    // let name = "Sabbir";
    // name = "Sovon"; //Reasign
    // // let name = "Alif"; //Redeclare
    // console.log(name);
    // // const
    // const name = "Sabbir";
    // // name = "Sovon"; //Reasign
    // // const name = "Alif"; //Redeclare
    // console.log(name);

// Variable Scope
    // // localScope
    // function localScope(){
    //     let name = "Sabbir"
    //     console.log(name);
    // }
    // localScope()
    // // globalScope
    // let name = "Sabbir"
    // function globalScope(){
    // }
    // globalScope()
    // console.log(name);

// Variable Hoisting
    // name = "Sabbir Ahammed";
    // console.log(name);
    // var name;

// Simple For Loop
    // var num;
    // for(num = 0; num<10; num++){
    //     console.log("Sabbir" + num);
    // }

// Simple For of Loop
    // var cityArray = ["Dhaka", "Khulna", "Ctg", "Jessore"]
    // for(let singleCity of cityArray){
    //     console.log(singleCity);
    // }

//  Object Basic Concept
    // var person = {
    //     name: "Sabbir",
    //     age: 26,
    //     address: "Dhaka, BD",
    //     email: "sabbir.gmail.com",
    //     phone: "0123456789",
    //     dress: {
    //         shart: true,
    //         pant: true,
    //     },
    // }
    // // console.log(person);
    // // console.log(person['dress']);
    // console.log(person['dress']['shart']);

// For in loop
    // var person = {
    //     name: "Sabbir",
    //     age: 26,
    //     address: "Dhaka, BD",
    //     email: "sabbir.gmail.com",
    //     phone: "0123456789",
    //     dress: {
    //         shart: true,
    //         pant: true,
    //     },
    // }
    // for(let item in person){
    //     // console.log(item);
    //     // console.log(person[item]);
    //     console.log(item + " : " + person[item]);
    // }

// decision making
    // var person = {
    //     name: "Sabbir",
    //     age: 23,
    //     address: "Dhaka, BD",
    //     email: "sabbir.gmail.com",
    //     phone: "0123456789",
    //     dress: {
    //         shart: true,
    //         pant: true,
    //     },
    // }
    // if(person['age'] >= 18){
    //     console.log("You are adult");
    // }else if(person['age'] == 1 && person['age'] < 18){
    //     console.log("You are child");
    // }else{
    //     console.log("Age not found");
    // }

// simple function and parameterized functions
    // // Simple Function
    // function simpleFunction(){
    //     var x = 5;
    //     var y = 5;
    //     var z = x + y;
    //     console.log(z);
    // }
    // simpleFunction();
    // // Parameterized Function
    // function parameterizedFunction(x, y){
    //     var z = x + y;
    //     console.log(z);
    // }
    // parameterizedFunction(20, 30);

// rest parameters functions
    // function restParametersFunctions(...x){
    //     // console.log(x);
    //     console.log(x[2]);
    // }
    // restParametersFunctions(10, 20, 30, 40, 50)

// function returns
    // function returnFunction(){
    //     return "Bangladesh";
    // }
    // console.log(returnFunction());
    // function funOne(){
    //     return 20;
    // }
    // function funTwo(){
    //     return 30;
    // }
    // console.log(funOne() + funTwo());
    // function funOne(){
    //     return 20;
    // }
    // function funTwo(){
    //     return funOne();
    // }
    // console.log(funTwo());

// anonymous functions
    // var anonymousFunctions = function(){
    //     return "Hello";
    // }
    // console.log(anonymousFunctions());
    // var anonymousFunctions = function(x){
    //     return x;
    // }
    // console.log(anonymousFunctions("Hello"));
    // var anonymousFunctions = function(...x){
    //     return x;
    // }
    // console.log(anonymousFunctions("Hello", 10, 20, 50, "Sabbir"));
    // var anonymousFunctions = function(){
    //     return "Hello";
    // }
    // var anonymousFunctions = function(){
    //     return "Hello Again";
    // }
    // console.log(anonymousFunctions());

// arrow function
    // var arrowFunctions = ()=>{
    //     console.log("First arrow function");
    // }
    // arrowFunctions();
    // var arrowFunctions = (x)=>{
    //     console.log(x);
    // }
    // arrowFunctions("First arrow parameters function");
    // var arrowFunctions = (...x)=>{
    //     console.log(x);
    // }
    // arrowFunctions("A", 10, "B", 30, "C", 50);
    // var arrowFunctions = ()=>{
    //     return "Sabbir"
    // }
    // console.log(arrowFunctions());

// simple arrays
    // var myArr = ["A", "B", "C", "D", "E"];
    // var myArr2 = new Array("A", "B", "C", "D", "E");
    // // console.log(myArr);
    // // console.log(myArr[2]);
    // for(let item of myArr){
    //     console.log(item);
    // }

// Multidimensional Arrays
    // var arrOne = ["A", "B", "C", "D", "E"]
    // var arrTwo = [1, 2, 3, 4, 5]
    // var finalArr = [arrOne, arrTwo]
    // // console.log(finalArr);
    // console.log(finalArr[1][4]);

// array de-structuring
    // var country = ["Bangladesh", "India", "China", "Canada", "USA"]
    // // var[a,d,c,e,b]=country;
    // // console.log(e);
    // var[a,,,,b]=country;
    // console.log(b);

// es6 map
    // var country = new Map()
    // country.set('c1', "Bangladesh");
    // country.set('c2', "India");
    // country.set('c3', "China");
    // country.set('c4', "Canada")
    // country.set('c5', "USA")
    // country.set('c6', "Nepal")
    // console.log(country);
    // console.log(country.keys());
    // console.log(country.values());
    // for(let key of country.keys()){
    //     console.log(key);
    // }
    // for(let value of country.values()){
    //     console.log(value);
    // }
    // country.delete('c1');
    // country.delete('c2');
    // for(let value of country.values()){
    //     console.log(value);
    // }
    // country.clear()
    // for(let value of country.values()){
    //     console.log(value);
    // }
    // console.log(country.get('c1'));
    // if(country.has('c1')){
    //     console.log("Yes");
    // }else{
    //     console.log("No");
    // }

// es6 set
    // var mySet = new Set(["A", "B", "C", "D", "E", "A"]);
    // // console.log(mySet);
    // var mySet = new Set();
    // mySet.add('Bangladesh')
    // mySet.add('India')
    // mySet.add('China')
    // mySet.add('Bangladesh')
    // mySet.add('Nepal')
    // mySet.add('Butan')
    // mySet.add('USA')
    // mySet.add('Bangladesh')
    // // console.log(mySet);
    // // mySet.clear();
    // // console.log(mySet);
    // // mySet.delete('Nepal');
    // // console.log(mySet);
    // // console.log(mySet.size);
    // // console.log(mySet.values());
    // if(mySet.has('Butan')){
    //     console.log("Yes");
    // }else{
    //     console.log("No");
    // }

// es6 create class and use
    // class TestClass {
    //     myFun1(value) {
    //         console.log(value);
    //     }
    //     myFun2(value) {
    //         console.log(value);
    //     }
    //     myFun3(value) {
    //         console.log(value);
    //     }
    // }
    // var obj = new TestClass();
    // obj.myFun1(111);
    // obj.myFun2(222);
    // obj.myFun3(333);

// es6 class constructor
    // class MyClass{
    //     constructor(a, b){
    //         this.firstNumber = a;
    //         this.secondNumber = b;
    //         // console.log("Test Constructor");
    //         // console.log(a + b);
    //     }
    //     newFun(){
    //         let result = this.firstNumber + this.secondNumber
    //         console.log(result);
    //     }
    // }
    // var obj = new MyClass(20, 30);
    // obj.newFun();

// es6 static keyword
    // // Without static keyword
    // class MyClass{
    //     hello(){
    //         console.log("Hello World!");
    //     }
    // }
    // var obj = new MyClass();
    // obj.hello()
    // // With static keyword
    // class MyClass{
    //     static hello(){
    //         console.log("Hello World!");
    //     }
    // }
    // MyClass.hello()

// es6 class inheritance
    // class parent{
    //     hello1(){
    //         console.log("Parent hello1 Function");
    //     }
    //     hello2(){
    //         console.log("Parent hello2 Function");
    //     }
    // }
    // class child extends parent{
    //     hello2(){
    //         console.log("Child hello2 Function");
    //     }
    // }
    // var parentObj = new parent();
    // parentObj.hello1()
    // var childObj = new child();
    // childObj.hello2()

// es6 super keyword
    // class parent{
    //     hello1(){
    //         console.log("Parent hello1 Function");
    //     }
    //     hello2(){
    //         console.log("Parent hello2 Function");
    //     }
    // }
    // class child extends parent{
    //     demo(){
    //         super.hello1();
    //         super.hello2();
    //     }
    // }
    // var childObj = new child();
    // childObj.demo();

// es6 module export import
    
