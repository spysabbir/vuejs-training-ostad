// variable...
// var x = 10;
// x = 15;
// var x = 18;
// console.log(x)

// let y = 20;
// y = 25;
// console.log(y)

// const z = 30;
// console.log(z)

// template literals...
// const name = "Sabbir";
// const great = `Hello ${name} `;
// console.log(great);

// arrow function...
// function sum() {
//     return 5 + 5;
// }
// console.log(sum());

// const add = () => 15 + 5;
// console.log(add());

// const add2 = (x, y) => x + y;
// console.log(add2(10, 20));

// const sum = (x) => x * x
// console.log(sum(5));

// const sub = (a, b) => {
//     return a - b;
// }
// console.log(sub(10, 5));

// const num = [1, 2, 3];
// const squared = num.map(num => num * num)
// console.log(squared);

// ternary operator...
// const age = 18;
// const isAdult = age >= 18 ? "Adult" : "Child";
// console.log(isAdult);

// nullish coalescing operator...
// const userInput = null;
// const userName = userInput ?? "Default User";
// console.log(userName);

// short circuit...
// const a = true;
// const b = false;
// const result = a && b;
// console.log(result);

// const a = true;
// const b = false;
// const result = a || b;
// console.log(result);

// object...
// const person = {
//     firstName: "Sabbir",
//     lastName: "Ahammed",
//     age: 25,
//     great: function(){
//         console.log("Hello " + this.firstName + " " + this.lastName);
//     }
// }
// console.log(person.firstName);
// const lName = person.lastName;
// console.log(lName)
// person.age = 50;
// console.log(person.age)
// person.great()

// const car = {
//     brand: 'Toyta',
//     model: 'Corolla',
//     year: 2023,
// }
// console.log(Object.keys(car));
// console.log(Object.values(car));
// console.log(Object.entries(car));

// destructuring assignment...
// const numbers = [1, 2, 3, 4, 5];
// const[ , second, thard, , five] = numbers;
// console.log(second);
// console.log(thard);
// console.log(five);

// const person = {
//     firstName: "Sabbir",
//     lastName: "Ahammed",
//     age: 25
// }
// const{ firstName, lastName, age } = person;
// console.log(firstName);
// console.log(lastName);
// console.log(age);

// spread operator...
// const numbers = [1, 2, 3, 4, 5];
// const newNumbers = [...numbers, 6, 7, 8, 9, 10];
// console.log(newNumbers);

// fetch api...
// async function fatchData() {
//     try {
//         const response = await fetch("https://jsonplaceholder.typicode.com/todos/1");
//         if(!response.ok){
//             throw new Error("Something went wrong!");
//         }
//         const data = await response.json();
//         console.log(data);
//     } catch (error) {
//         console.log("Fatal Error", error);
//     }
// }
// fatchData()

// map...
// const numbers = [1, 2, 3]
// const squarednumber = numbers.map((num) => num * 2)
// console.log(squarednumber);