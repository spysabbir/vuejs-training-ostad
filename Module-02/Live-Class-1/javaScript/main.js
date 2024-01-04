// import './style.css'
import { calculator } from './calculator.js'

document.querySelector('#calculator').innerHTML = `
  <div>
    <input type="number" id="x" placeholder="Enter 1st Number">
    <input type="number" id="y" placeholder="Enter 2nd Number">

    <button type="button" id="add">+</button>
    <button type="button" id="minus">-</button>
    <button type="button" id="multiply">*</button>
    <button type="button" id="divided">/</button>

    <input type="number" id="result" placeholder="Showing Result" readonly>
  </div>
`

const add = document.getElementById('add');
add.addEventListener('click', function() {
  const x = parseInt(document.getElementById('x').value);
  const y = parseInt(document.getElementById('y').value);
  const result = document.getElementById('result');
  result.value = calculator.add(x, y);
})

const minus = document.getElementById('minus');
minus.addEventListener('click', function() {
  const x = parseInt(document.getElementById('x').value);
  const y = parseInt(document.getElementById('y').value);
  const result = document.getElementById('result');
  result.value = calculator.minus(x, y);
})

const multiply = document.getElementById('multiply');
multiply.addEventListener('click', function() {
  const x = parseInt(document.getElementById('x').value);
  const y = parseInt(document.getElementById('y').value);
  const result = document.getElementById('result');
  result.value = calculator.multiply(x, y);
})

const divided = document.getElementById('divided');
divided.addEventListener('click', function() {
  const x = parseInt(document.getElementById('x').value);
  const y = parseInt(document.getElementById('y').value);
  const result = document.getElementById('result');
  result.value = calculator.divided(x, y);
})
