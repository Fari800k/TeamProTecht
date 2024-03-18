document.addEventListener("DOMContentLoaded", function(){
    var page = document.querySelector("html");
    var basketNav = document.getElementById("buttonbasket");
    var basketNavView = document.getElementById("mybasketdropdown");
    var coll = document.getElementsByClassName("collapsible");

    page.addEventListener("click", function(event){
        if(basketNavView.style.display === "flex"){
            basketNavView.style.display = "none";
            event.stopPropagation();
        }
    });

    basketNav.addEventListener("mouseover", function(){
        if(basketNavView.style.display !== "flex"){
            basketNavView.style.display = "flex";
        }
    });

    for (var i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            } 
        });
    }

    document.addEventListener("DOMContentLoaded", function(){
        var accountNav = document.getElementById("buttonaccount");
        var accountNavView = document.getElementById("myaccountdropdown");

        accountNavView.addEventListener("mouseleave", function(){
            if(accountNavView.style.display === "block"){
                accountNavView.style.display = "none";
            }
        });

        accountNav.addEventListener("mouseover", function(){
            if(accountNavView.style.display !== "block"){
                accountNavView.style.display = "block";
            }
        });
    });
});

function priceChange(){
    const min = document.getElementsByName('minprice');
    const max = document.getElementsByName('maxprice');

    if(min >= max){
        document.getElementsByID("myPrices").innerHTML = "Min price needs to be smaller than max price.";
    }
}

//stored search item gets put back into search bar
function getSearch(){
    localStorage.getItem('search');
}

function resetFilters() {
    window.location.href = 'browse.php';
}

function notLoggedIn(){
    alert(window.location('accountlogin.php'));
}

// Function to open the full popup menu
function openPopupMenu() {
    document.querySelector('.popup-menu-overlay').style.display = 'block';
    document.querySelector('.popup-menu').style.display = 'block';
}

// Function to close the full popup menu
function closePopupMenu() {
    document.querySelector('.popup-menu-overlay').style.display = 'none';
    document.querySelector('.popup-menu').style.display = 'none';
}

function registerPopup(){
    document.getElementById('createUserPopup').style.display='block';
}

function cancelRegisterPopup(){
    document.getElementById('createUserPopup').style.display='none';
}

function registerButton() {
    var popup = document.getElementById('createUserPopup');
    if(popup !== "block"){
        popup.style.display = "block";
    }
}

