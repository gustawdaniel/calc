(function () {

    var submitArea = document.getElementsByClassName("submit-area")[0];
    var card = document.getElementsByClassName("card")[0];
    var a = document.getElementById("a");
    var b = document.getElementById("b");
    var c = document.getElementById("c");

    submitArea.addEventListener('click',function (e) {
        if(e.target.name=='sum') {
            c.value = (a.value*1) + (b.value*1);
        } else if(e.target.name=='diff') {
            c.value = a.value - b.value;
        }

        $.post("api.php/action", {a: a.value, b: b.value, c: c.value, action: e.target.getAttribute('name')}, function (data) {
            console.log(data);
        })
    });

})();