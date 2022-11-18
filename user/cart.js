const qty = document.querySelector(".qty") 
const addQty = document.querySelector(".addQty") 
const minQty = document.querySelector(".minQty") 
const price = document.querySelector(".price") 
const totalPrice = document.querySelector(".totalprice") 
const totalCost = document.querySelector(".totalCost") 



addQty.addEventListener("click",function () {
    qty.value ++
    let jumlah = parseInt(price.value) * qty.value
    totalPrice.value = jumlah + "k"
    totalCost.value = parseInt(totalPrice.value) + "k"
})

minQty.addEventListener("click",function () {
    qty.value --
    let jumlah = parseInt(price.value) *qty.value
    totalPrice.value = jumlah + "k"
    totalCost.value = parseInt(totalPrice.value) + "k"
})