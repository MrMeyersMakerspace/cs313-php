// JavaScript source code
var totalItems = 0;

function addMini() {
    var numMini = document.getElementById("miniQuantity").value;
    document.getElementById("test").innerHTML = numMini;
    if (numMini > 0) {
        totalItems = parseInt(totalItems) + parseInt(numMini);
        document.getElementById("items").innerHTML = totalItems;
        document.getElementById("items").style.display = "inline";
    } else {
        alert("Please select a number to add to the cart");
    }
}

function addEnder() {
    var numEnder = document.getElementById("enderQuantity").value;
    document.getElementById("test").innerHTML = numEnder;
    if (numEnder > 0) {
        totalItems = parseInt(totalItems) + parseInt(numEnder);
        document.getElementById("items").innerHTML = totalItems;
        document.getElementById("items").style.display = "inline";
    } else {
        alert("Please select a number to add to the cart");
    }
}

function addVoxel() {
    var numVoxel = document.getElementById("voxelQuantity").value;
    document.getElementById("test").innerHTML = numVoxel;
    if (numVoxel > 0) {
        totalItems = parseInt(totalItems) + parseInt(numVoxel);
        document.getElementById("items").innerHTML = totalItems;
        document.getElementById("items").style.display = "inline";
    } else {
        alert("Please select a number to add to the cart");
    }
}

function addCR10() {
    var numCR10 = document.getElementById("cr10Quantity").value;
    document.getElementById("test").innerHTML = numCR10;
    if (numCR10 > 0) {
        totalItems = parseInt(totalItems) + parseInt(numCR10);
        document.getElementById("items").innerHTML = totalItems;
        document.getElementById("items").style.display = "inline";
    } else {
        alert("Please select a number to add to the cart");
    }
}

function addCR10S() {
    var numCR10S = document.getElementById("cr10sQuantity").value;
    document.getElementById("test").innerHTML = numCR10S;
    if (numCR10S > 0) {
        totalItems = parseInt(totalItems) + parseInt(numCR10S);
        document.getElementById("items").innerHTML = totalItems;
        document.getElementById("items").style.display = "inline";
    } else {
        alert("Please select a number to add to the cart");
    }
}

function addPrusa() {
    var numPrusa = document.getElementById("prusaQuantity").value;
    document.getElementById("test").innerHTML = numPrusa;
    if (numPrusa > 0) {
        totalItems = parseInt(totalItems) + parseInt(numPrusa);
        document.getElementById("items").innerHTML = totalItems;
        document.getElementById("items").style.display = "inline";
    } else {
        alert("Please select a number to add to the cart");
    }
}