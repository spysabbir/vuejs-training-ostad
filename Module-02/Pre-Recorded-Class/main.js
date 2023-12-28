// let-and-const...
// let name = "Sabbir Ahammed";
// console.log(name);

// const name = "Sabbir Ahammed";
// console.log(name);

// const person = {
//     name: "Sovon Ahammed",
//     age: 23
// };
// person.name = "Sabbir Ahammed";
// person.age = 25;
// console.log(person);

// const revString = function(str) {
//     return str.split('').reverse().join('');
// }
// console.log(revString("Sabbir Ahammed"));

// Parameter vs Argument...
// function great(name) { //Parameter
//     console.log("Hello " + name);
// }
// great("Sabbir") //Argument

// Arrow-Functions...
// const great = (name) => {
//     console.log("Hello " + name);
// }
// great("Sabbir")

// const add = (num1, num2) => {
//     return num1 + num2;
// }
// console.log(add(30, 20))

// const addv2 = (num1, num2) => num1 + num2;
// console.log(addv2(50, 30))

// const sum = (n) => {
//     return n.reduce(function(o, n) {
//         return o + n;
//     })
// }
// console.log(sum([2, 3, 4]))

// const sumv2 = (n) => {
//     return n.reduce((o, n) => o + n)
// }
// console.log(sumv2([2, 3, 4]))

// const sumv3 = (n) => n.reduce((o, n) => o + n);
// console.log(sumv3([2, 3, 4]))

// const revString = (str) => str.split('').reverse().join('');
// console.log(revString("Sabbir Ahammed"));

// Template-Literals
// const fname = "Sabbir";
// const lname = "Ahammed";
// const fullname = "I am " + fname + " " + lname;
// console.log(fullname);
// const fullnamev2= `I am ${fname} ${lname}`;
// console.log(fullnamev2);

// const n1 = 20;
// const n2 = 30;
// const result = "Total: " + n1 + " + " + n2 + " = " + (n1 + n2);
// console.log(result);
// const resultv2= `Total: ${n1} + ${n2} = ${n1 + n2}`;
// console.log(resultv2);

// Object literal changes...
// const fname = "Sabbir";
// const lname = "Ahammed";
// const person = {
//     fname: fname,
//     lname: lname,
//     fullName: function() {
//         console.log("I am " + this.fname + " " + this.lname)
//     }
// }
// console.log(person);
// person.fullName();

// const person_es6 = {
//     fname,
//     lname,
//     fullName() {
//         console.log(`I am ${this.fname} ${this.lname}`)
//     },
// }
// console.log(person_es6);
// person_es6.fullName();

// Spread operator...
// function sum(n1, n2, n3, n4) {
//     return n1 + n2 + n3 + n4
// }
// console.log(sum(2, 4, 6, 8));

// function sumUseSpread(...numbers) {
//     return numbers.reduce((o, n) => o+n);
// }
// console.log(sumUseSpread(2, 4, 6, 8, 10, 12, 14, 16));

// const sumUseSpreadV2 = (...numbers) => numbers.reduce((o, n) => o+n);
// console.log(sumUseSpreadV2(2, 4, 6, 8, 10, 12, 14, 16));

// Destructuring...
// const data = [1, 2, 3, 4, 5, 6, 7, 8, 9]
// const [a, b, c, d, e] = data;
// console.log(a);
// const [a, , b, , c, d, , e] = data;
// console.log(c);
// const [a, , b, ...c] = data;
// console.log(c);

// const person = {
//     fname: "Sabbir",
//     lname: "Ahammed",
//     age: 25,
//     sex: "Male"
// }
// const {fname, lname} = person
// console.log(fname)
// const {fname, lname, ...rest} = person
// console.log(rest)

// function getData() {
//     const country = "Bangladesh"
//     const capital = "Dhaka"
//     return {country, capital}
// }
// const details = getData();
// console.log(details);
// const {country, capital} = getData();
// console.log(country)

// Default parameters...
// function great(name, title="Mr.") {
//     console.log(`Hello ${title} ${name}`);
// }
// great('Sabbir', 'Mr.')
// great('Sovon')

// for in for of...
// const names = ['Sabbir', 'Sovon', 'Alif', 'Shaharier']
// for (name in names) {
//     console.log(names[name]);
// }
// for (name of names) {
//     console.log(name);
// }

// const person = {
//     fname: "Sabbir",
//     lname: "Ahammed",
//     age: 25,
//     sex: "Male"
// }
// for (item in person) {
//     console.log(item);
//     console.log(person[item]);
// }

// Object Cloning...
// const person = {
//     fname: "Sabbir",
//     lname: "Ahammed",
//     age: 25,
//     sex: "Male"
// }
// console.log(person);

// const newPerson = Object.assign({}, person)
// newPerson.fname = "Sovon"
// console.log(newPerson);