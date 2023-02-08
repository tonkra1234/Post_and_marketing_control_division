for (let index = 1; index < 44; index++) {
    $("#select".concat(index)).change(function () {
        $('#text'.concat(index)).prop('readonly', !(this.value === "No" || this.value === "NA"))
    })
}


