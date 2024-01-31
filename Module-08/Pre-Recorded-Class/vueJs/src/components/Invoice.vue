<script setup>
import { reactive } from 'vue'
import { invoice1 } from './../data/invoice'

const data = reactive({
  sender: '',
  billTo: '',
  shipTo: '',
  invoiceNumber: '',
  invoiceDate: '',
  dueDate: '',
  additionalNote: '',
  items: [
    {
      description: '',
      quantity: '',
      rate: '',
      amount: '',
    }
  ],
  subTotal: '',
  tax: '',
  grandTotal: '',
  paidAmount: '',
  dueAmount: '',
  notes: '',
})
function getSubTotal(){
  let subTotal = 0;
  data.items.forEach(item => {
    subTotal += item.amount
  })
  data.subTotal = subTotal;
  return subTotal;
}
function getGrandTotal(){
  const tax = data.subTotal * data.tax / 100
  data.grandTotal = data.subTotal + tax
  return data.grandTotal;
}
function getDueAmount(){
  data.dueAmount = data.grandTotal - data.paidAmount
  return data.dueAmount;
}
function addMoreItem() {
  data.items.push({
    description: '',
    quantity: '',
    rate: '',
    amount: '',
  })
}
</script>

<template>
<div class="bg-gray-50 dark:bg-slate-900">
  <!-- Invoice -->
  <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
    <div class="sm:w-11/12 lg:w-4/5 mx-auto py-3">
      <!-- Buttons -->
      <div class="mb-3 flex justify-end gap-x-3">
        <button class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" @click="Object.assign(data,invoice1)">
          <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
          Load Invoice
        </button>
        <button class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
          <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>
          Print
        </button>
      </div>
      <!-- End Buttons -->
      
      <!-- Card -->
      <div class="flex flex-col p-4 sm:p-10 bg-white shadow-md rounded-xl dark:bg-gray-800">
        <!-- Grid -->
        <div class="flex justify-between">
          <div>
            <svg class="w-10 h-10" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 26V13C1 6.37258 6.37258 1 13 1C19.6274 1 25 6.37258 25 13C25 19.6274 19.6274 25 13 25H12" class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2"/>
              <path d="M5 26V13.16C5 8.65336 8.58172 5 13 5C17.4183 5 21 8.65336 21 13.16C21 17.6666 17.4183 21.32 13 21.32H12" class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2"/>
              <circle cx="13" cy="13.0214" r="5" fill="currentColor" class="fill-blue-600 dark:fill-white"/>
            </svg>

            <h1 class="mt-2 text-lg md:text-xl font-semibold text-blue-600 dark:text-white">Sender</h1>
            <address class="mt-4 not-italic text-gray-800 dark:text-gray-200">
              <textarea v-model="data.sender" placeholder="Sender"></textarea>
            </address>
          </div>
          <!-- Col -->
          <div class="text-end">
            <h2 class="text-xl  my-2">
              <span class="font-semibold text-gray-800 dark:text-gray-200">Invoice #</span>
              <input v-model="data.invoiceNumber" placeholder="Invoice number" type="number" class="w-48 ml-2">
            </h2>

            <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
              <dl class="grid sm:grid-cols-5 gap-x-3">
                <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Invoice date:</dt>
                <dd class="col-span-2 text-gray-500"><input type="date" v-model="data.invoiceDate"></dd>
              </dl>
              <dl class="grid sm:grid-cols-5 gap-x-3">
                <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Due date:</dt>
                <dd class="col-span-2 text-gray-500"><input type="date" v-model="data.dueDate"></dd>
              </dl>
            </div>
          </div>
          <!-- Col -->
        </div>
        <!-- End Grid -->

        <!-- Grid -->
        <div class="mt-8 grid sm:grid-cols-2 gap-3">
          <div>
            <lable class="text-lg font-semibold text-gray-800 dark:text-gray-200">Bill to:</lable>
            <div class="mt-2 not-italic text-gray-500">
              <textarea v-model="data.billTo" placeholder="Bill to"></textarea>
            </div>
          </div>
          <div>
            <lable class="text-lg font-semibold text-gray-800 dark:text-gray-200">Ship to:</lable>
            <div class="mt-2 not-italic text-gray-500">
              <textarea v-model="data.shipTo" placeholder="Ship to"></textarea>
            </div>
          </div>
          <!-- Col -->

          <div class="sm:text-end space-y-2">
            <!-- Grid -->
            <div class="">
              <dl class="grid sm:grid-cols-5 gap-x-3">
                <lable class="col-span-2 font-semibold text-gray-800 dark:text-gray-200">Additional note:</lable>
                <textarea v-model="data.additionalNote" placeholder="Additional note" class="w-96"></textarea>
              </dl>
            </div>
            <!-- End Grid -->
          </div>
          <!-- Col -->
        </div>
        <!-- End Grid -->

        <!-- Table -->
        <div class="mt-6">
          <div class="border border-gray-200 p-4 rounded-lg space-y-4 dark:border-gray-700">
            <div class="hidden sm:grid sm:grid-cols-5">
              <div class="sm:col-span-2 text-xs font-medium text-gray-500 uppercase">Item</div>
              <div class="text-start text-xs font-medium text-gray-500 uppercase">Qty</div>
              <div class="text-start text-xs font-medium text-gray-500 uppercase">Rate</div>
              <div class="text-end text-xs font-medium text-gray-500 uppercase">Amount</div>
            </div>

            <div class="hidden sm:block border-b border-gray-200 dark:border-gray-700"></div>

            <div class="grid grid-cols-3 sm:grid-cols-5 gap-2" v-for="(item, index) in data.items" :key="index">
              <div class="col-span-full sm:col-span-2">
                <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Item</h5>
                <p class="font-medium text-gray-800 dark:text-gray-200"><textarea rows="1" v-model="item.description" placeholder="Description"></textarea></p>
              </div>
              <div>
                <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Qty</h5>
                <p class="text-gray-800 dark:text-gray-200"><input type="number" class="w-28" v-model="item.quantity" placeholder="Quantity"></p>
              </div>
              <div>
                <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Rate</h5>
                <p class="text-gray-800 dark:text-gray-200"><input type="number" class="w-32" v-model="item.rate" placeholder="Rate"></p>
              </div>
              <div>
                <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Amount</h5>
                <p class="sm:text-end text-gray-800 dark:text-gray-200">{{ item.amount = item.quantity * item.rate }}</p>
              </div>
            </div>
            <button class="px-1 py-1 bg-green-700" @click="addMoreItem()">Add More</button>
          </div>
        </div>
        <!-- End Table -->
        
        <!-- Flex -->
        <div class="mt-8 flex sm:justify-end">
          <div class="w-full max-w-2xl sm:text-end space-y-2">
            <!-- Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
              <dl class="grid sm:grid-cols-5 gap-x-3">
                <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Subtotal:</dt>
                <dd class="col-span-2 text-gray-500"><input type="text" :value="getSubTotal()" readonly></dd>
              </dl>

              <dl class="grid sm:grid-cols-5 gap-x-3">
                <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Tax (%):</dt>
                <dd class="col-span-2 text-gray-500"><input type="number" v-model="data.tax" placeholder="Tax"></dd>
              </dl>

              <dl class="grid sm:grid-cols-5 gap-x-3">
                <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Total:</dt>
                <dd class="col-span-2 text-gray-500"><input type="text" :value="getGrandTotal()" readonly></dd>
              </dl>

              <dl class="grid sm:grid-cols-5 gap-x-3">
                <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Paid Amount:</dt>
                <dd class="col-span-2 text-gray-500"><input type="number" v-model="data.paidAmount" placeholder="Paid Amount"></dd>
              </dl>

              <dl class="grid sm:grid-cols-5 gap-x-3">
                <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Due Amount:</dt>
                <dd class="col-span-2 text-gray-500"><input type="text" :value="getDueAmount()" readonly></dd>
              </dl>
            </div>
            <!-- End Grid -->
          </div>
        </div>
        <!-- End Flex -->

        <div class="mt-8 sm:mt-12">
          <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Thank you!</h4>
          <p class="text-gray-500"><textarea v-model="data.notes" placeholder="Notes"></textarea></p>
        </div>

        <p class="mt-5 text-sm text-gray-500">© 2024 Spy Sabbir.</p>
      </div>
      <!-- End Card -->
    </div>
  </div>
  <!-- End Invoice -->
</div>
</template>

<style scoped>
input, textarea{
  background-color: #313131;
  border-radius: 5px;
  color: #ddd;
  padding: 5px;
}
</style>
