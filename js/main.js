
var canvasElement = document.getElementById("pieChart");

var config = {
    type: "bar",
    data:{
        labels: ["Bill","Jeff","Micheal","Tim","Abdi"],
        datasets:[{label: "Number of Cookies", data:[5,9,12,19,3]}],
    },
};

var pieChart = new Chart(canvasElement, config);
