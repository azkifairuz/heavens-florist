const humbergerButt = document.querySelector(".humberger")
const crossButt     = document.querySelector(".cross")
const mobileNav     = document.querySelector(".mobilenav")
const arrowBot      = document.querySelectorAll(".arrowbot")
const arrowleft     = document.querySelectorAll(".arrowleft")
const menuAccount   = document.querySelectorAll(".menuAccount")
const myAccount     = document.querySelectorAll(".myAccount")
const catalog       = document.querySelector('.catalog')
const categories    = document.querySelector('.categories')
const categoriesPage = document.querySelector('.categoriesPage')
const homePage     =document.querySelector('.homePage')
const catalogPage  = document.querySelector('.catalogPage')
function menuHumberger() {
    humbergerButt.classList.toggle("hidden")
    crossButt.classList.toggle("hidden")
    mobileNav.classList.toggle("hidden")

}
function menuAkun() {
    arrowleft[0].classList.toggle("hidden")
    arrowBot[0].classList.toggle("hidden")
    menuAccount[0].classList.toggle("hidden")
    menuAccount[1].classList.toggle("hidden")
    arrowleft[1].classList.toggle("hidden")
    arrowBot[1].classList.toggle("hidden")

}

for (const akun of myAccount ){
    akun.addEventListener("click",menuAkun)
}
// myAccount.addEventListener("click",menuAkun)
humbergerButt.addEventListener("click", menuHumberger)
crossButt.addEventListener("click",menuHumberger)
catalog.addEventListener("click",function () {
    homePage.classList.add("hidden")
    categoriesPage.classList.add("hidden")
    catalogPage.classList.remove("hidden")
})
categories.addEventListener("click",function () {
    homePage.classList.add("hidden")
    catalogPage.classList.add("hidden")
    categoriesPage.classList.remove("hidden")
})
