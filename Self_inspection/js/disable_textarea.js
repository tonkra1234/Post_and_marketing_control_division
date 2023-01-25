for (let index = 1; index < 44; index++) {
    $("#select".concat(index)).change(function () {
        $('#text'.concat(index)).prop('readonly', !(this.value === "No" || this.value === "NA"))
    })
}


// for (let i = 1; i < 44; i++) {
//     var element = document.getElementById("select".concat(i));
//     if (element === 'No') {
//         element.removeAttribute("readonly");
//     }
//     else{
//         element.setAttribute("readonly", "readonly");
//     }
// }

