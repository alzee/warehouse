let ctx1 = document.getElementById('chart1');
let months = document.querySelectorAll('.month');
console.log(months);
let labels = [];
let data = [];
for (let i = 0; i < months.length; i++){
  labels.push(months[i].dataset.month);
  data.push(months[i].dataset.quan);
}
data = [1,4,3,5,2,8,7,6,5,4,2,7,9,1];

let options = {
    responsive:true,
    maintainAspectRatio: false,
};

let chart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: '领用统计',
            backgroundColor: '#0d6efd',
            barPercentage: 0.5,
            data: data
        }]
    },
    options: options
});
